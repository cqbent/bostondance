<?php
/**
 * Template Name: Post and Event
 *
 */
acf_form_head();
get_header();

echo '<style type="text/css">
		.acf-checkbox-list input[type="checkbox"] { display: inline-block !important; }
		</style>';

?>

<?php include( locate_template( 'template-parts/header-image.php') ); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="container"><!--container Start-->
			<div class="row"><!--row start-->
				<div class="col-sm-10 primary-part">

					<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content', 'page' ); ?>	

					<?php

						acf_form(array(
							'post_id'		=> 'new_post',
							'post_title'	=> 'Event Name',
							'post_content'	=> true,
							'post_thumbnail' => true,
							'new_post'		=> array(
								'post_type'		=> 'bda_event',
								'post_status'	=> 'draft'
							),
							'return'		=> home_url('thank-you?subtype=event'),
							'submit_value' => __("Submit", 'acf')
						));

					?>

				<?php endwhile; // End of the loop. ?>

			</div>

			<?php get_sidebar(); ?>
			
			</div>
		</div>
	</main><!-- #main -->
</div><!-- #primary -->

<?php // acf_enqueue_uploader();
 get_footer(); ?>
