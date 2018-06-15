<?php 

add_filter('widget_text', 'do_shortcode');

//shortcode for event calender
function bda_event_calendar_init() {

	ob_start();

	?>
	
	<form id="frm_event_calendar" method="get" action="<?php echo get_bloginfo( 'url' ); ?>/events">
		<div id="datepicker"></div>
		<input type="hidden" value="" id="ip_event_date" name="search_date"> 
		<!-- <input type="submit"> -->
	</form>
<?php 
	$contents = ob_get_clean();
	return $contents;
}
add_shortcode( 'bda_event_calendar', 'bda_event_calendar_init' );



//shortcode for class calender
function bda_class_calendar_init() {

	ob_start();

	?>
	
	<form id="frm_class_calendar" method="get" action="<?php echo get_bloginfo( 'url' ); ?>/events/classes">
		<div id="class_datepicker"></div>
		<input type="hidden" value="" id="ip_class_date" name="search_date"> 
		<!-- <input type="submit"> -->
	</form>
<?php 
	$contents = ob_get_clean();
	return $contents;
}
add_shortcode( 'bda_class_calendar', 'bda_class_calendar_init' );


//shortcode for workshop calender
function bda_workshop_calendar_init() {

	ob_start();

	?>
	
	<form id="frm_workshop_calendar" method="get" action="<?php echo get_bloginfo( 'url' ); ?>/events/workshops">
		<div id="workshop_datepicker"></div>
		<input type="hidden" value="" id="ip_workshop_date" name="search_date"> 
		<!-- <input type="submit"> -->
	</form>
<?php 
	$contents = ob_get_clean();
	return $contents;
}
add_shortcode( 'bda_workshop_calendar', 'bda_workshop_calendar_init' );


// shortcode for audition 
function bda_audition_archive_init() {

	ob_start();

	?>
	
	<form id="frm_audition_archive" method="get" action="<?php echo get_bloginfo( 'url' ); ?>/auditions-and-jobs">
		<select class="month-archive" name="audition_month">
			<option value="0"> Search By Month </option>
			<option value="1"> January </option>
			<option value="2"> February </option>
			<option value="3"> March </option>
			<option value="4"> April </option>
			<option value="5"> May </option>
			<option value="6"> June </option>
			<option value="7"> July </option>
			<option value="8"> August </option>
			<option value="9"> September </option>
			<option value="10"> October </option>
			<option value="11"> November </option>
			<option value="12"> December </option>
		</select>
	</form>
<?php 
	$contents = ob_get_clean();
	return $contents;
}
add_shortcode( 'bda_audition_archive', 'bda_audition_archive_init' );

/**
 * shows the customizer social links with shortcode [bda_social_icons]
 *
 */
function bda_social_icons_init() {
	ob_start(); ?>
	<div class="social-icon">
		<ul>
			<?php
			$facebook   = get_theme_mod( 'facebook_link' ); 
			$twitter   = get_theme_mod( 'twitter_link' );
			$pinterest  = get_theme_mod( 'pinterest_link' );
			$instagram = get_theme_mod( 'instagram_link' ); 
			?>
			<?php if( !empty( $facebook ) ) { ?>
			<li><a href="<?php echo esc_url( $facebook ); ?>" target="_blank"></a></li>

			<?php } if( !empty( $twitter ) ) { ?>   
			<li><a href="<?php echo esc_url( $twitter ); ?>" target="_blank"></a></li>

			<?php } if( !empty( $pinterest ) ) { ?>
			<li><a href="<?php echo esc_url( $pinterest ); ?>" target="_blank"></a></li>

			<?php } if( !empty( $instagram ) ) { ?>
			<li><a href="<?php echo ( $instagram ); ?>" target="_blank"></a></li>

			<?php }?>
		</ul>
	</div> <!-- social-icons end -->
<?php 
	$contents = ob_get_clean();
	return $contents;	
}
add_shortcode( 'bda_social_icons', 'bda_social_icons_init' );


function bda_thankyou_init() {

	if( isset( $_GET['subtype'] ) ) {
		$type = $_GET['subtype'];
		if( $type == 'event' ) {
			echo '<p><strong>Thank you</strong> for sending us your event!<p>
					<p>Please understand that events will be accepted at the sole discretion of the Boston Dance Alliance. We will be in touch if we need further information.</p>';
		} elseif( $type == 'class' ) {
			echo '<p><strong>Thank you</strong> for sending us your class!</p>
			<p>Please understand that classes will be accepted at the sole discretion of the Boston Dance Alliance. We will be in touch if we need further information.</p>';
		} elseif( $type == 'workshop' ) {
			echo '<p><strong>Thank you</strong> for sending us your workshop!</p>
			<p>Please understand that workshops will be accepted at the sole discretion of the Boston Dance Alliance. We will be in touch if we need further information.</p>';
		} elseif( $type == 'audition' ) {
			echo '<p><strong>Thank you</strong> for sending us your audition!</p>
			<p>Please understand that auditions will be accepted at the sole discretion of the Boston Dance Alliance. We will be in touch if we need further information.</p>';
		} elseif( $type == 'jobs' ) {
			echo '<p><strong>Thank you</strong> for sending us your jobs!</p>
			<p>Please understand that jobs will be accepted at the sole discretion of the Boston Dance Alliance. We will be in touch if we need further information.</p>';
		}
	}

}
add_shortcode( 'bda_thankyou', 'bda_thankyou_init' );



?>