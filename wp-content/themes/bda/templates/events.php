<?php

/**
 * Template Name: Events Page
 *
 */ 
acf_form_head();
get_header();

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
							if ( isset( $_GET['search'] ) ) {
								
								$search_key = $_GET['search'];
								$search_key = str_replace( '+', ' ', $search_key );
								echo '<h3>Search Result For: '.$search_key.'</h3>';

								
							} else {
								
								if( have_posts() ):
									while( have_posts() ) : the_post();
										the_title('<h3>', '</h3>');
	                                endwhile;
								endif; 
								
							} 

							//check if event is searched by calendar
							if( isset( $_GET['search_date'] ) ) {

								$search_date = $_GET['search_date'];
								$compare = '=';
								$value = $search_date;

							} else {

								$compare = '>=';
								// $value = 20150101; just checking for null case passing this date but no need as the past event should be omitted
								$value = date('Ymd');
							}

							$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
							$posts_per_page = get_option( 'posts_per_page' );
							
							$args = array( 
								'post_type' => 'bda_event',
								'posts_per_page' => $posts_per_page,
								'meta_query' => array(
									array(
										'key'     => 'event_dates_%_date',
										'compare' => $compare,
										'meta_type' => 'DATE',
										'value'   => $value, 
									),
								),
								'orderby' => 'meta_value_num',
                            	'order' => 'ASC',
								'paged' => $paged,
							 );

							

							if( isset( $_GET['search'] ) ) {
								$args['s'] = $search_key;
								// cannot remove meta query here because still the event should be in pullend in ascending order.
								$args['meta_query'][0]['compare'] = '>=';
								$args['meta_query'][0]['value'] = 20150101;
							}
							
							$query = new WP_Query( $args ); 
							if( $query->have_posts() ):

								echo '<div class="blogs">';
								while( $query->have_posts() ) : $query->the_post(); ?>

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
												<span class="event-category"><?php the_terms( get_the_ID(), 'event_category', ' ', ' | ' ); ?></span>
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

						<?php 	endwhile; wp_reset_postdata();
								echo '</div>';

							else:
								echo 'No Results Found';	
							endif;

						bda_pagination( $query );	
						?>		
						

					</main>
				</div>
			</div>

			<?php get_sidebar(); ?>

		</div>
	</div>
</div>		

<?php get_footer(); ?>