<?php

// for removing the activation error of Gravity form or extension
add_filter( 'deprecated_constructor_trigger_error', '__return_false' );


/**
 * Preint functions
 */
function preint( $param ) {
	echo '<pre>';
	print_r( $param );
	echo '</pre>';
}


// function bda_get_valid_field_post_content( $field )
// {
// 	print_r($field);
// 	if( is_admin() )
// 		return $field;

//     if ( $field['name'] == '_post_content' ) {
//     	$field['type'] = 'textarea';
//     	$field['maxlength'] = 400;
//     	$field['disabled'] = false;
//     	$field['readonly'] = false;
//     	$field['placeholder'] = '';
//     	$field['required'] = true;
//     }

//     return $field;
// }


/**
 * add an acf custom field event_image as a event's featured image while adding the event from the front end (post an event page)
 *
 * http://support.advancedcustomfields.com/forums/topic/set-image-as-featured-image/
 *
 */
function bda_set_featured_image( $value, $post_id, $field ) { // makes the acf event image as featured image

	if ( $value != '' ) {

		//Add the value which is the image ID to the _thumbnail_id meta data for the current post
		update_post_meta( $post_id, '_thumbnail_id', $value );
	}

	return $value;
}

if ( ! is_admin() ) {

	// acf/update_value/name={$field_name} - filter for a specific field based on it's name
	add_filter( 'acf/update_value/name=event_image', 'bda_set_featured_image', 10, 3 );
	add_filter( 'acf/update_value/name=class_image', 'bda_set_featured_image', 10, 3 );
	add_filter( 'acf/update_value/name=workshop_image', 'bda_set_featured_image', 10, 3 );
	// add_filter('acf/get_valid_field/type=wysiwyg', 'bda_get_valid_field_post_content');

}


/**
 * adds a custom css for acf field only in admin area no to the front end.
 *
 * http://www.wpguru.com.au/wordpress-development-tips/add-custom-css-js-advanced-custom-fields-plugin/
 *
 */
function bda_acf_admin_head() {
	?>
    <style type="text/css">

        /* ... */

        /*[data-name="event_category"],*/
        [data-name="event_image"] {
            display: none;
        }

        [data-name="class_image"] {
            display: none;
        }

        [data-name="workshop_image"] {
            display: none;
        }

        #event_categorydiv,
        #acf-group_56f278868036b {
            display: none;
        }

    </style>

    <script type="text/javascript">
        (function ($) {

            /* ... */

        })(jQuery);
    </script>
	<?php
}

add_action( 'admin_head', 'bda_acf_admin_head' );
// add_action('acf/input/admin_head', 'my_acf_admin_head');


/**
 * Removes the events category meta box from the backend of the evnent post type
 *
 * It was conflicting with the acf Chose Event Category field especially while edition event posts
 */
function bda_remove_meta_boxes() {
	remove_meta_box( 'event_categorydiv', 'bda_event', 'side' );
}

add_action( 'admin_menu', 'bda_remove_meta_boxes' );


/**
 * Changes the label of fields in front end
 *
 * http://www.advancedcustomfields.com/resources/acfprepare_field/
 *
 */
function bda_change_title_label( $field ) {
	global $post;
	if ( "page" == $post->post_type && 1924 == $post->ID ) {
		$field['label'] = 'Job Name';
	} elseif ( "page" == $post->post_type && 1455 == $post->ID ) {
		$field['label'] = 'Workshop Name';
	} else {
		$field['label'] = 'Name';
	}

	// $field['label'] = 'Event Name';

	return $field;

}

add_filter( 'acf/prepare_field/name=_post_title', 'bda_change_title_label' );


function bda_change_content_label( $field ) {

	// print_r($field);
	$field['label']        = 'Description (Maximum 1000 Characters)';
	$field['instructions'] = 'Please indicate level of proficiency required and if project includes paid performance opportunities';
	$field['maxlength']    = 1000;
	$field['disabled']     = false;
	$field['readonly']     = false;
	$field['placeholder']  = '';
	$field['required']     = true;
	$field['type']         = 'textarea';

	return $field;

}

add_filter( 'acf/prepare_field/name=_post_content', 'bda_change_content_label' );

function bda_change_date_label( $field ) {
	// preint( $field );
	$field['button_label']                 = 'Add Date and Time';
	$field['sub_fields'][1]['time_format'] = 'h:mm am or pm';
	$field['sub_fields'][2]['time_format'] = 'h:mm am or pm';

	return $field;
}

// add_filter( 'acf/prepare_field/name=class_dates', 'bda_change_date_label' );
// add_filter( 'acf/prepare_field/name=workshop_dates', 'bda_change_date_label' );
// add_filter( 'acf/prepare_field/name=event_dates', 'bda_change_date_label' );
// add_filter( 'acf/prepare_field/name=audition_dates', 'bda_change_date_label' );


/**
 * http://www.advancedcustomfields.com/resources/query-posts-custom-fields/
 *
 * filter the % query
 */
function bda_posts_where( $where ) {

	global $wpdb;

	// for events
	$where = str_replace( "meta_key = 'event_dates_%_date", "meta_key LIKE 'event_dates_%_date", $wpdb->remove_placeholder_escape( $where ) );

	// for auditions
	$where = str_replace( "meta_key = 'audition_dates_%_audition_date", "meta_key LIKE 'audition_dates_%_audition_date", $wpdb->remove_placeholder_escape( $where ) );

	// for classes
	$where = str_replace( "meta_key = 'class_dates_%_date", "meta_key LIKE 'class_dates_%_date", $wpdb->remove_placeholder_escape( $where ) );

	// for workshops
	$where = str_replace( "meta_key = 'workshop_dates_%_workshop_date", "meta_key LIKE 'workshop_dates_%_workshop_date", $wpdb->remove_placeholder_escape( $where ) );

	return $where;
}

add_filter( 'posts_where', 'bda_posts_where' );


/**
 * to load the events sorted by event dates asc in term archive page.
 *
 */
function customize_event_taxonomy_archive_display( $query ) {

	if ( ( $query->is_main_query() ) && ( is_tax( 'event_category' ) ) ) {
		$query->set( 'meta_key', 'event_dates_%_date' );
		$query->set( 'meta_value', date( 'Ymd' ) );
		$query->set( 'meta_compare', '>=' );
		$query->set( 'orderby', 'meta_value' );
		$query->set( 'order', 'ASC' );
	} elseif ( ( $query->is_main_query() ) && ( is_tax( 'jobs_category' ) ) ) {
		$query->set( 'meta_key', 'audition_date' );
		$query->set( 'orderby', 'meta_value' );
		$query->set( 'order', 'ASC' );
	} elseif ( ( $query->is_main_query() ) && ( is_tax( 'staff_category' ) ) ) {
		$query->set( 'posts_per_page', - 1 );
		$taxonomy = 'staff_category';
		$term     = get_term_by( 'slug', get_query_var( $taxonomy ), $taxonomy ); //gets term object
		if ( $term->term_id == 14 ) {
			$query->set( 'meta_key', 'champions_year' );
			$query->set( 'meta_value', '' );
			$query->set( 'meta_compare', '!=' );

			$query->set( 'orderby', 'meta_value_num' );
			$query->set( 'order', 'DESC' );
		}
	}

}

add_action( 'pre_get_posts', 'customize_event_taxonomy_archive_display' );


/**
 * Numeric pagination for all - blog, events and jobs
 *
 * @param $query -  query results
 */

function bda_pagination( $query ) { ?>

    <div class="bda-pagination">
		<?php

		global $wp_query;
		$big = 999999999; // need an unlikely integer

		echo paginate_links( array(
			'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format'  => '?paged=%#%',
			'current' => max( 1, get_query_var( 'paged' ) ),
			'total'   => $query->max_num_pages
		) );
		?>
    </div>
	<?php
}


/**
 * Remove [] from excerpt
 */
function bda_excerpt_more( $more ) {
	return '...';
}

add_filter( 'excerpt_more', 'bda_excerpt_more' );


/**
 * dequeue the stylesheets for a specific form mainly datepicker css.
 *
 * https://www.gravityhelp.com/documentation/article/gform_enqueue_scripts/#1-enqueue-custom-script
 */
add_action( 'gform_enqueue_scripts', 'dequeue_gf_stylesheets', 11 );
function dequeue_gf_stylesheets() {
	wp_dequeue_style( 'gforms_datepicker_css' );
}

/**
 * Sends an email to info@bostondancealliance.org when an event is posted from the front end.
 * An acf front end submission is used so need to use acf hook
 */
add_action( 'acf/save_post', 'bda_send_mail' );
function bda_send_mail( $post_id ) {

	// bail early if not a contact_form post
	$bail_arr = array( 'bda_event', 'bda_class', 'bda_workshop', 'bda_jobs' );
	if ( ! in_array( get_post_type( $post_id ), $bail_arr ) ) {
		return;
	}

	// bail early if editing in admin
	if ( is_admin() ) {
		return;
	}


	// vars
	$post = get_post( $post_id );

	// email data
	$to      = 'info@bostondancealliance.org';
	$headers = 'From: Bostondance <info@bostondancealliance.org>' . "\r\n";
	$subject = $post->post_title;
	if ( get_post_type( $post_id ) == 'bda_event' ) {

		$body = 'This is a notification email from bostondancealliance.org to short notice about the addition of a new event "' . $post->post_title . '" from front end event submission.';

	} elseif ( get_post_type( $post_id ) == 'bda_class' ) {

		$body = 'This is a notification email from bostondancealliance.org to short notice about the addition of a new class "' . $post->post_title . '" from front end class submission.';

	} elseif ( get_post_type( $post_id ) == 'bda_workshop' ) {

		$body = 'This is a notification email from bostondancealliance.org to short notice about the addition of a new workshop "' . $post->post_title . '" from front end workshop submission.';
	} elseif ( get_post_type( $post_id ) == 'bda_jobs' ) {

		$body = 'This is a notification email from bostondancealliance.org to short notice about the addition of a new audition "' . $post->post_title . '" from front end audition submission.';
	}
	$body .= "\r\n";
	$body .= "Thanks.";

	// send email
	wp_mail( $to, $subject, $body, $headers );
}
