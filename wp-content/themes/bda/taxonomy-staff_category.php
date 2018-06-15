<?php
	get_header();
	$term_slug = get_query_var( $taxonomy ); // gets term slug
	$term = get_term_by( 'slug', get_query_var( $taxonomy ), $taxonomy ); //gets term object
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
						
						<h3 class="staff-ctg-title"><?php echo $term->name; ?></h3>
						<div class="staffs">
							<?php

							if( have_posts() ):
								$count = 0;  
								while( have_posts() ) : the_post();

									// code for image url in javascript data
									$staff_img = wp_get_attachment_thumb_url( get_post_thumbnail_id( get_the_ID() ) ); ?>

									<div class="staff" data-index="<?php echo $count; ?>">
										<h3><?php the_title(); ?></h3>
										<?php if( has_post_thumbnail() ) { the_post_thumbnail( 'large' ); } ?>
										<div class="designation"><?php the_field( 'designation' ); ?></div>
									</div>
									<script type="text/javascript">
										var udata_part = [{
											username: "<?php the_title(); ?>",
											userAvatarUrl_img: "<?php echo $staff_img; ?>",
											userDesignation: "<?php echo get_field( 'designation' ); ?>",
											userDescription: `<?php echo get_the_content(); ?>`

										}];
										Array.prototype.push.call(udata, udata_part[0]);
									</script>
								<?php 
								$count++;
								endwhile; wp_reset_postdata();
							endif;

							?>	

						</div>

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
				    				'<div class="mfp-userAvatarUrl"></div>'+
									    '<div class="mfp-info">'+
									    	'<h2 class="mfp-username"></h2>'+
									    	'<p class="mfp-userDesignation"></p>'+
									    	'<p class="mfp-userDescription"></p>'+
									    '</div>'+
								    '</div>'+
							    '</div>'+
						    '</div>'
				},
				gallery: {
					enabled: true 
				},
				
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