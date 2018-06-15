<?php

acf_form_head();
get_header();

$taxonomy = get_queried_object();

global $wp_query;
// preint( $wp_query );

?>

<!-- this templated include the dynamic header image and breadcrumbs -->
<?php include( locate_template( 'template-parts/header-image.php')); ?>

<div id="content" class="site-content"><!--site content start-->
	<div class="container"><!--container Start-->
		<div class="row"><!--row start-->
			<div class="col-sm-10 primary-part">
				<div id="primary" class="content-area"><!--primary start-->
					<main id="main" class="site-main" role="main"><!--site main start-->
						<?php 
						if ( get_field( 'category_description', $taxonomy ) ) {
							the_field( 'category_description', $taxonomy ); 
						}

						if( have_posts() ):
							echo '<div class="blogs">';
								while( have_posts() ) : the_post();								
								?>
									<div class="blog bda_event">
										<div class="row">
											<div class="post-image col-sm-4">
												<?php if( has_post_thumbnail( ) ){
													the_post_thumbnail( );
												} ?>
											</div>
											<div class="blogs-content-excerpt col-sm-8">
											
												<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
												<span class="audition-venue"><?php the_field( 'venue' ); ?></span>
												<?php the_terms( get_the_ID(), 'event_category', ' ', ' | ' ); ?>
												<div class="row">
													<div class="col-sm-5 date-time date-list">
														<?php get_template_part( 'template-parts/content', 'date' ); ?>
													</div>

		                                            <div class="col-sm-7 bda_excerpt">
														<?php the_excerpt(); ?>
													</div>
												</div>

												<!-- <a class="all" href="<?php // the_permalink();?>">MORE</a>  -->
											</div>
										</div>
									</div>
								<?php 	
								endwhile; wp_reset_postdata();

							echo '</div>';

						else :

							echo '<h3> No Result found for ' . $taxonomy->name . ' ! </h3>';
							
						endif;
						bda_pagination( $wp_query );
						?>		

					</main>
				</div>
			</div>
			
			<?php get_sidebar(); ?>

		</div>
	</div>
</div>		

<?php get_footer(); ?>