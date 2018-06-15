<?php
/**
 * Template Name: Auditions
 */

get_header( );

include( locate_template( 'template-parts/header-image.php') ); ?>

<div id="content" class="site-content"><!--site content start-->
	<div class="container"><!--container Start-->
		<div class="row"><!--row start-->
			<div class="col-sm-10 primary-part">
				<div id="primary" class="content-area"><!--primary start-->
					<main id="main" class="site-main" role="main"><!--site main start-->
						<?php
							if ( isset( $_GET['search'] ) )  {

								$search_key = $_GET['search'];
								$search_key = str_replace( '+', ' ', $search_key );
								echo '<h3>Search Result For: ' . $search_key . '</h3>';

							} elseif ( isset( $_GET['audition_month'] ) ) {

								echo '<h3>Search Auditions For: ' . date( "F", mktime( 0, 0, 0, $_GET['audition_month'], 10 ) ) . '</h3>';

							} else {

								if( have_posts() ):
									while( have_posts() ) : the_post();
										echo '<h3>' . get_the_title() . '</h3>';
									endwhile;
								endif;

							}

							$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
							$posts_per_page = get_option( 'posts_per_page' );
							$args = array(
									'post_type' => 'bda_auditions',
									'posts_per_page' => $posts_per_page,
									'paged' => $paged,

									'meta_query' => array(
										array(
											'key'     => 'audition_dates_%_audition_date',
											'compare' => '>=',
											'meta_type' => 'DATE',
											'value'   => date('Ymd'),
										),
									),
									'orderby' => 'meta_value_num',
	                            	'order' => 'ASC',
							);

							if( isset( $search_key ) ) {
								$args['s'] = $search_key;
							}

							if( isset( $_GET['audition_month'] ) ) {
								$month = $_GET['audition_month'];
								$year  =  date('Y');
			                    $start_date = $year.$month.'01' ;
			                    $end_date = $year.$month .'31' ;
								$args['meta_query'] = array(
								            'key' => 'audition_date',
								            'value' => array( $start_date, $end_date ),
								            'compare' => 'BETWEEN',
								            'type' => 'DATE'
							        	);

							}

							$query_jobs = new WP_Query( $args );
							if( $query_jobs->have_posts() ):
								while( $query_jobs->have_posts() ) : $query_jobs->the_post(); ?>

									<div class="auditions-wrapper">
										<!-- <h3 class="auditions-title"><?php the_title(); ?></h3> -->
										<div class="row">
											<div class="date-time col-sm-3">
												<h3 class="auditions-title"><?php the_title(); ?></h3>										    
											</div>
											<div class="auditions-content-excerpt col-sm-9">

												<div class="audition-meta">
													<div class="audition-meta-label">Where</div>
													<div>
														<?php if( get_field( 'audition-venue' )) ?>	
														<span class="audition-venue nobold"><b><?php the_field( 'audition_venue' ); ?></b><br />
														<?php the_field( 'audition_venue_street_address' ); ?><br />
														<?php the_field( 'audition_venue_city' ); ?><br /></span>
													</div>
												</div>

												<div class="audition-meta">
													<div class="audition-meta-label">Organization or Choreographer </div>
													<div>
														<span class="audition-venue"><b><?php the_field( 'audition_choreographer' ); ?></b></span>
													</div>
												</div>

												<?php if( get_field( 'audition_website' ) ): ?>
												<div class="audition-meta">
													<div class="audition-meta-label">Website</div>
													<div>
														<span class="audition-venue"><b><?php the_field( 'audition_website' ); ?></b></span>
													</div>
												</div>
												<?php endif; ?>

												<?php if( get_field( 'audition_suggested_attire' ) ): ?>
												<div class="audition-meta">
													<div class="audition-meta-label">Suggested Attire </div>
													<div>
														<span class="audition-venue nobold"><?php the_field( 'audition_suggested_attire' ); ?></span>
													</div>
												</div>
												<?php endif; ?>

												<div class="audition-meta">
													<div class="audition-meta-label">Fee for Audition </div>
													<div>
														<span class="audition-venue nobold"><?php the_field( 'fee_for_audition' ); ?>,&nbsp;
															<?php if( get_field( 'fee_for_audition' ) == 'Yes' ): ?>
																<?php the_field( 'audition_price' ); ?>
															<?php endif; ?>
														</span>
													</div>
												</div>

												<div class="audition-meta">
													<div class="audition-meta-label">Audition Dates</div>
													<div>
														<span class="audition-venue nobold "><?php get_template_part( 'template-parts/content', 'audition-date' ); ?></span>
													</div>
												</div>

												<?php the_content(); ?>
												
											    <b>&nbsp;</b><br>
																								
												
												<!-- <div class="audition-meta">
													<span class="audition-meta-label">Contact Name: </span>
													<?php //the_field( 'audition_contact_name' ); ?>
												</div>
												<div class="audition-meta">
													<span class="audition-meta-label">Contact Email: </span>
													<?php // the_field( 'audition_contact_email' ); ?>
												</div>	 -->
										</div>
									</div>
								</div>

						<?php   endwhile; wp_reset_postdata();
							else:
								echo 'No Results Found';
							endif;
							bda_pagination( $query_jobs );
						?>

					</main><!--site main end-->
				</div><!--primary End-->
			</div>

			<?php get_sidebar(); ?>

		</div><!--row end-->

	</div><!--container end-->
</div><!--site content End-->
<?php get_footer( );?>



