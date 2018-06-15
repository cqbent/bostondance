<?php
/**
 * Template Name: Fiscal Sponsorship
 *
 * This is the template that display page which has sponsorship. 
 */

if( is_page( 'thank-you' ) ) {
	acf_form_head();
}
get_header(); 

include( locate_template( 'template-parts/header-image.php' ) ); ?>

<div id="content" class="site-content"><!--site content start-->
    <div class="container"><!--container Start-->
        <div class="row"><!--row start-->
			
			<div class="col-sm-10 primary-part">
				<?php
				while ( have_posts() ) : the_post(); ?>

					<div id="primary" class="content-area"><!--primary start-->
				        <main id="main" class="site-main" role="main"><!--site main start-->
							<h3><?php the_title( ); ?></h3>
							<div class="image-thumbnail alignleft">
								<?php 
								the_content();
							 if ( get_field( 'sponsors_left' ) ) {
									echo '<div class="sponsors-left">';
									the_field( 'sponsors_left' );
									echo '</div>';
								}
								if( get_field( 'sponsors_right' ) ) {
									echo '<div class="sponsors-right">';
									the_field( 'sponsors_right' );
									echo '</div>';
								} 
								

       						?>
                            
                     
							</div> <!-- End primary div -->
						</main>
					</div>
				<?php
				endwhile; // End of the loop. 
				?>
			</div>

			<?php get_sidebar(); ?>
		
		</div><!--row end-->
	</div><!--container end-->
</div><!--site content End-->


<?php get_footer(); ?>