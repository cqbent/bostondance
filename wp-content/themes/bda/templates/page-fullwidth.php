<?php
/**
 *Template Name: Full Width (no sidebars)
 */
get_header(); 

include( locate_template( 'template-parts/header-image.php')); ?>

<div id="content" class="site-content"><!--site content start-->
    <div class="container"><!--container Start-->
        <div class="row"><!--row start-->
			
			<div class="col primary-part">
				<?php
				while ( have_posts() ) : the_post(); 

				get_template_part( 'template-parts/content', 'page' );

				endwhile; // End of the loop. 
				?>
			</div>

		</div><!--row end-->
	</div><!--container end-->
</div><!--site content End-->


<?php get_footer(); ?>
