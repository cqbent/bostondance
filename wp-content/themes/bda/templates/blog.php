<?php 

/** 
 * Template Name: Our Blog
 *
 */

get_header( ); ?>
<!-- this templated include the dynamic header image and breadcrumbs -->
<?php include( locate_template( 'template-parts/header-image.php')); ?>

<div id="content" class="site-content"><!--site content start-->
	<div class="container"><!--container Start-->
		<div class="row"><!--row start-->
			<div class="col-sm-10 primary-part">
				<div id="primary" class="content-area"><!--primary start-->
					<main id="main" class="site-main" role="main"><!--site main start-->
						<?php 
						if( !isset( $_GET['search'] ) ) {
							$bda_post_type = get_post_type( get_the_ID() ); 
							if( $bda_post_type != 'post' ) {
								if( have_posts() ):
									while( have_posts() ) : the_post();
										the_title('<h3>', '</h3>');
									endwhile;
								endif; 
							}

						} elseif ( isset( $_GET['search'] ) ) { 
							echo '<h3>Search Result For:'. $_GET['search'].'</h3>';

						}elseif ( is_archive( 'type=monthly' ) ) { ?>
							 <h3>Search Result For: <?php single_month_title( ' ' ); ?> </h3>
				<?php	}
						
						$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
						$posts_per_page = get_option( 'posts_per_page' );
						$args = array(

							'post_type' => 'post',
							'posts_per_page' => $posts_per_page,
							'paged' => $paged,
						); 
						if( isset( $_GET['search'] ) ) {
							$args['s'] = $_GET['search'];
						}
						if ( is_category() ) {
						
							$bda_cat_id = get_cat_id( single_cat_title("",false) );
							$args['cat'] = $bda_cat_id ; 
							echo '<h3>Search Result For: '. get_cat_name( $bda_cat_id ) . '</h3>' ;
												
						} elseif ( is_archive( 'type=monthly' ) ) {

							$month = get_the_time( 'm' );
							$year = get_the_time( 'Y' );
							$args['date_query']  = array(
								'year'  => $year,
								'month' => $month,
							);
							
						?>

							<h3>Search Result For:<?php single_month_title( ' ' ); ?></h3>
						
						<?php 
						}

						$query_jobs = new WP_Query( $args ); 
						if( $query_jobs -> have_posts() ):
						?>
                        <div class="blogs">
                        <?php
							while( $query_jobs->have_posts() ) : $query_jobs -> the_post(); ?>
						<div class="blog bda_post">
							<div class="row">
								<?php if( has_post_thumbnail( ) ){ ?>
									<div class="post-image col-sm-5">
										<?php the_post_thumbnail( ); ?>
									
									</div>
									<div class="blogs-content-excerpt col-sm-7">
									<?php } else { ?>
												<div class="blogs-content-excerpt col-sm-12"> 
									<?php } ?>
									<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
									<?php the_terms($post->ID, 'category',' ',' | '); ?>
									<span class="blogs-date"><?php echo get_the_date('M j, Y'); ?></span>
									<?php the_excerpt(); ?>
									<a class="all" href="<?php the_permalink();?>">MORE</a>
								</div>
							</div>
						</div>

						<?php 
							 
							endwhile ; wp_reset_postdata();
							                        	
						?>
                        </div>
                    <?php

						else:
							echo 'No Results Found';
	                    endif;
	                    bda_pagination( $query_jobs ); ?>
                        
					</main><!--site main end-->
				</div><!--primary End-->
			</div>
			
			<?php get_sidebar(); ?>

		</div><!--row end-->

	</div><!--container end-->
</div><!--site content End-->
<?php get_footer( );?>
