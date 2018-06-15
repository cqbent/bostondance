<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bda
 */
// if( is_page( 'thank-you' ) || is_page( 'reservation-form' ) ) {

if( is_page( 'thank-you' ) ) {
	acf_form_head();
}
get_header(); 

include( locate_template( 'template-parts/header-image.php')); ?>

<div id="content" class="site-content"><!--site content start-->
    <div class="container"><!--container Start-->
        <div class="row"><!--row start-->
			
			<div class="col-sm-10 primary-part">
				<?php
				while ( have_posts() ) : the_post(); 

				get_template_part( 'template-parts/content', 'page' );

				endwhile; // End of the loop. 
				?>
			</div>

			<?php get_sidebar(); ?>
		
		</div><!--row end-->
	</div><!--container end-->
</div><!--site content End-->


<?php get_footer(); ?>
