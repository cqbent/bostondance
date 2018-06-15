<?php get_header();
$taxonomy = 'staff_category';
$term_slug = get_query_var( $taxonomy ); // gets term slug
$term = get_term_by( 'slug', get_query_var( $taxonomy ), $taxonomy ); //gets term object
$children = get_term_children( $term->term_id, $taxonomy );
?>
<script type="text/javascript">
	var udata = [];
</script>

<?php include( locate_template( 'template-parts/header-image.php')); ?>

<div id="content" class="site-content"><!--site content start-->
    <div class="container"><!--container Start-->
        <div class="row"><!--row start-->

            <div class="col-sm-12 primary-part">
                <div id="primary" class="content-area"><!--primary start-->
                    <main id="main" class="site-main" role="main"><!--site main start-->
						<?php

							$args = array( 'post_type' => 'bda_staff', 'posts_per_page' => -1 );
							$count = 0;

							foreach( $children as $child):

								$term = get_term_by( 'id', $child, $taxonomy ); //gets term object

								$args['tax_query'] = array(
									array(
										'taxonomy' => 'staff_category',
										'field'    => 'id',
										'terms'    => $term->term_id,
									),
								);

								echo '<h3 class="staff-ctg-title">' . $term->name . get_field( 'label', $term ) .  '</h3>';

								echo '<div class="staffs">';
								$query = new WP_Query( $args );
								if( $query->have_posts() ):

									while( $query->have_posts() ) : $query->the_post();

									// code for image url in javascript data
									$staff_img = wp_get_attachment_thumb_url( get_post_thumbnail_id( get_the_ID() ) );

									?>

										<div class="staff" data-index="<?php echo $count; ?>">
											<h3><?php the_title(); ?></h3>
											<?php if( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
											<div class="designation"><?php the_field( 'designation' ); ?></div>
										</div>

										<script>

											var udata_part = [{
												username: "<?php the_title(); ?>",
												// userWebsite_href: 'http://paulirish.com',
												userAvatarUrl_img: "<?php echo $staff_img; ?>",
												// userLocation: 'San Francisco'
												userDesignation: "<?php echo get_field( 'designation' ); ?>",
												userDescription: `<?php echo get_the_content(); ?>`

											}];

											Array.prototype.push.call(udata, udata_part[0]);

										</script>
										<?php
										$count++;
									endwhile;
								endif;
								echo '</div>';

							endforeach;
						?>
					</main><!--site main end-->
                </div><!--primary End-->
            </div>

       </div><!--row end-->
    </div><!--container end-->
</div><!--site content End-->

<script type="text/javascript">
	// http://dimsemenov.com/plugins/magnific-popup/documentation.html#options
	// http://codepen.io/dimsemenov/pen/sHoxp
	// http://codepen.io/stufu/pen/vOdzbe - indexing
	jQuery(function($) {

		// initalize popup
		$('.staff').each(function(){
			var $this = $(this),
      			index = $this.data('index');
			$(this).magnificPopup({
				key: 'my-popup',
				items: udata,
				index: index,
				type: 'inline',
				inline: {
				    // Define markup. Class names should match key names.
				    markup: '<div class="white-popup">'+
				    			'<div class="mfp-controls"><span class="mfp-left-control"></span><span class="mfp-right-control"></span><div class="mfp-close"></div></div>'+
				    			'<div class="mfp-wrapper clearfix">'+
				    				// '<div class="mfp-close"></div>'+

		    							// '<a class="mfp-userWebsite">'+
									    '<div class="mfp-userAvatarUrl"></div>'+
									    '<div class="mfp-info">'+
									    	'<h2 class="mfp-username"></h2>'+
									    	'<p class="mfp-userDesignation"></p>'+
									    	'<p class="mfp-userDescription"></p>'+
									    // '</a>'+
									    '</div>'+
								    	// '<div class="mfp-userLocation"></div>'+
								    '</div>'+
							    '</div>'+
						    '</div>'
				},
				gallery: {
					enabled: true
				},
				// callbacks: {
				// 	markupParse: function(template, values, item) {
				//       // optionally apply your own logic - modify "template" element based on data in "values"
				//       // console.log('Parsing:', template, values, item);
				//   }
				// }
			});
		});


		$('body').on( 'click', 'span.mfp-left-control', function(){
			$('.mfp-arrow-left').trigger('click');
		});

		$('body').on( 'click', 'span.mfp-right-control', function(){
			$('.mfp-arrow-right').trigger('click');
		});

	});





</script>

<?php get_footer(); ?>
