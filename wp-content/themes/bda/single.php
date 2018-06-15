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

get_header(); ?>

<?php include( locate_template( 'template-parts/header-image.php')); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="container"><!--container Start-->
			<div class="row"><!--row start-->
				<div class="col-sm-10 primary-part">
					<div class="blogs-wrapper">
						<div class="row">
							<?php
							while ( have_posts() ) : the_post(); ?>
								<h3><?php the_title( );?></h3>
								<?php 
								if(has_post_thumbnail( )){ ?>
									<div class="post-image col-sm-5">
								<?php	the_post_thumbnail(); ?>
									</div>
									<div class="post-content col-sm-7">
								<?php
							 	} else { ?>
									<div class="post-content col-sm-12"> 
								<?php 	
								} ?>
										<span class="post-category"><?php the_terms($post->ID, 'category',' ',' | '); ?></span>
										<span class="post-date"><?php the_date('M d, Y');?></span>
										<div class="content">
											<?php the_content( );?>
										</div>

										<!-- social sharing -->
										<div id="share-wrapper" class="white-popup mfp-hide">	
											<ul class="sb_share">

												<!-- share on email -->
												<li><a href="mailto:?subject=<?php echo esc_attr(get_the_title()); ?>&body=<?php echo esc_url(get_permalink() );?>" title="Share via Mail" class="none" target="_blank"><i class="fa fa-envelope"> Email </i></a></li>

												<!-- share on facebook -->
												<li class="sbfacebook"><a href="#" title="Share on Facebook" class="sbsoc-fb" target="_blank"><i class="fa fa-facebook"> Post </i></a></li>

												<!-- share on twitter -->
												<li class="sbtwitter"><a href="#" data-title="<?php the_title(); ?>" title="Share on Twitter" class="sbsoc-tw" target="_blank" ><i class="fa fa-twitter"> Tweet </i></a></li>

												<!-- share on google plus -->
												<li class="sbgoogle-plus"><a href="#" title="Share on Google Plus
													" class="sbsoc-gplus" target="_blank"><i class="fa fa-google-plus"> Plus </i></a></li>

												<!-- share on pinterest -->
												<li class="sbpiniterest"><a href="#" title="Share on Pinterest" class="sbsoc-pinterest" target="_blank"><i class="fa fa-pinterest"> Pin </i></a></li>
													
											</ul>
										</div>
									</div>
							<?php 
							endwhile; // End of the loop. ?>
						</div>
					</div>
				</div>

				<?php get_sidebar(); ?>
				
			</div>
		</div>
	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
