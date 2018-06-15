<?php
/**
 * Template Name: Jobs
 */

get_header();

include( locate_template( 'template-parts/header-image.php' ) ); ?>

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
							echo '<h3>Search Result For: ' . $search_key . '</h3>';


						} else {

							if ( have_posts() ):
								while ( have_posts() ) : the_post();
									the_title( '<h3>', '</h3>' );
								endwhile;
							endif;

						}

						//check if event is searched by calendar
						if ( isset( $_GET['search_date'] ) ) {

							$search_date = $_GET['search_date'];
							$compare     = '=';
							$value       = $search_date;

						} else {

							$compare = '>=';
							// $value = 20150101; just checking for null case passing this date but no need as the past event should be omitted
							$value = date( 'Ymd' );
						}

						$paged          = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
						$posts_per_page = get_option( 'posts_per_page' );
						// var_dump( $posts_per_page );

						$args = array(
							'post_type'      => 'bda_jobs',
							'posts_per_page' => 5,
							'meta_query'     => array(
								array(
									//'key'     => 'job_dates_%_date',
									'compare'   => $compare,
									'meta_type' => 'DATE',
									'value'     => $value,
								),
							),
							'orderby'        => 'ID',
							'order'          => 'DESC',
							'paged'          => $paged,
						);


						if ( isset( $_GET['search'] ) ) {
							$args['s'] = $search_key;
							// cannot remove meta query here because still the event should be in pulled in ascending order.
							$args['meta_query'][0]['compare'] = '>=';
							$args['meta_query'][0]['value']   = 20150101;
						}

						$query_jobs = new WP_Query( $args );


						if ( $query_jobs->have_posts() ):
							while ( $query_jobs->have_posts() ) : $query_jobs->the_post();

								//hide jobs older than 60 days
								//Old Code, fails when 2 jobs on the same day limitation of the_date : $job_post_date = the_date('Y-m-d', '', '', FALSE);
								$job_post_date = get_the_date('Y-m-d',$post->ID);
								// $job_post_hide_date = date('Y-m-d', strtotime($job_post_date . " + 60 days"));
								// $compare_date = current_time('Y-m-d');
								//echo $job_post_date."<br/>";
								//echo $job_post_hide_date."<br/>";

								// if( $compare_date >= $job_post_hide_date){
								// 	continue;
								// }


								?>

                                <div class="auditions-wrapper">
                                    <!-- <h3 class="auditions-title"><?php the_title(); ?></h3> -->
                                    <div class="row">
                                        <div class="date-time col-sm-3">
                                            <h3 class="auditions-title"><?php the_title(); ?></h3>
                                        </div>
                                        <div class="auditions-content-excerpt col-sm-9">

                                            <div class="audition-meta">
                                                <div class="audition-meta-label">Organization</div>
                                                <div>
                                                    <span class="audition-venue"><b><?php the_field( 'organization' ); ?></b></span>
                                                </div>
                                            </div>

                                            <div class="audition-meta">
                                                <div class="audition-meta-label">Workplace street address</div>
                                                <div>
                                                    <span class="audition-venue"><b><?php the_field( 'workplace_street_address' ); ?></b></span>
                                                </div>
                                            </div>

                                            <div class="audition-meta">
                                                <div class="audition-meta-label">City</div>
                                                <div>
                                                    <span class="audition-venue"><b><?php the_field( 'city' ); ?></b></span>
                                                </div>
                                            </div>

                                            <div class="audition-meta">
                                                <div class="audition-meta-label">State</div>
                                                <div>
                                                    <span class="audition-venue"><b><?php the_field( 'state' ); ?></b></span>
                                                </div>
                                            </div>

                                            <div class="audition-meta">
                                                <div class="audition-meta-label">Select One</div>
                                                <div>
                                                    <span class="audition-venue"><b><?php the_field( 'select_one' ); ?></b></span>
                                                </div>
                                            </div>

											<?php if ( get_the_content() ): ?>
                                                <div class="audition-meta">
                                                    <div class="audition-meta-label">Description</div>
                                                    <div>
                                                        <span class=""><?php the_content(); ?></span>
                                                    </div>
                                                </div>

                                                <div class="audition-meta">
                                                    <div class="audition-meta-label">Posted On</div>
                                                    <div>
                                                        <span class=""><?php echo date( 'F j, Y', strtotime( $job_post_date ) ); ?></span>
                                                    </div>
                                                </div>

											<?php endif; ?>

											<?php if ( get_field( 'url_for_posted_information' ) || get_field( 'email_for_further_information' ) ) : ?>
                                                <div class="audition-meta">
                                                    <div class="audition-meta-label">For More Information</div>
                                                    <div>
														<?php if ( get_field( 'url_for_posted_information' ) && get_field( 'email_for_further_information' ) ) : ?>
                                                            <span class="audition-venue"><?php the_field( 'url_for_posted_information' ); ?>
                                                                , <?php the_field( 'email_for_further_information' ); ?></span>
														<?php elseif ( get_field( 'url_for_posted_information' ) ): ?>
                                                            <span class="audition-venue"><?php the_field( 'url_for_posted_information' ); ?></span>
														<?php else: ?>
                                                            <span class="audition-venue"><?php the_field( 'email_for_further_information' ); ?></span>
														<?php endif; ?>
                                                    </div>
                                                </div>
											<?php else: ?>
											<?php endif; ?>

                                        </div>
                                    </div>
                                </div>

							<?php endwhile;
							wp_reset_postdata();
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
<?php get_footer(); ?>



