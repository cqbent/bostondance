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
acf_form_head();
get_header();

include( locate_template( 'template-parts/header-image.php' ) ); ?>

<div id="content" class="site-content"><!--site content start-->
    <div class="container"><!--container Start-->
        <div class="row"><!--row start-->

			<div class="col-sm-10 primary-part">
				<div class="row event-pagination">
						<div class="col-sm-6 prev-next">
							<?php // previous_post_link( '%link', 'PREVIOUS WORKSHOP', $in_same_term = false ); ?>
							<?php // next_post_link( '&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; %link', 'NEXT WORKSHOP', $in_same_term = false ); ?>
						</div>
						<div class="col-sm-6 back-all-events"><a href="<?php echo esc_url( home_url( '/' ) ); ?>/events/workshops">BACK TO ALL WORKSHOPS</a></div>
				</div>
				<div class="row">
					<div class="blogs-wrapper">
						<?php
						while ( have_posts() ) : the_post(); ?>

							<div class="post-image col-sm-5">
								<?php
									if ( has_post_thumbnail() ) {
										the_post_thumbnail();
									}

									if( get_field( 'workshop_website' ) ) {
										echo '<a href="'. esc_url( get_field( 'workshop_website' ) ) . '" target="_blank"><button class="cta-ticket">Ticket Information</button></a>';
									}
								?>

							</div>

							<div class="post-content col-sm-7">
								<div class="content">

									<h3><?php the_title();?></h3>
									<?php if( get_field( 'workshop_presented_by') ): ?>
									<span class="presented_by">Presented by <?php the_field( 'workshop_presented_by' ); ?></span>
									<?php endif; ?>



									<div class="event-meta">
										<div class="event-meta-label">WHERE</div>
										<div>
											<span class="audition-venue"><?php the_field( 'workshop_venue_name' ); ?></span>
											<?php

												the_field( 'workshop_venue_street_address' );
												if( get_field( 'workshop_venue_city' ) )
												{
													echo ', ' . get_field( 'workshop_venue_city' );
												}

											?>
										</div>
									</div>

									<div class="event-meta">
										<div class="event-meta-label">WHEN</div>
										<div><?php $date_format = 3; $fpd = false; include( locate_template( 'template-parts/content-workshop-date.php' ) ); ?>
										</div>
									</div>

									<?php if( get_field( 'workshop_price' ) ): ?>
									<div class="event-meta">
										<div class="event-meta-label">COST</div>
										<div><span class="audition-venue"><?php the_field( 'workshop_price' ); ?></span></div>
									</div>
									<?php endif; ?>

									<?php if( get_field( 'workshop_teacher_name' ) ): ?>
									<div class="event-meta">
										<div class="event-meta-label">Teacher</div>
										<div><span class="audition-venue"><?php the_field( 'workshop_teacher_name' ); ?></span></div>
									</div>
									<?php endif; ?>

									<div class="event-meta">
										<div class="event-meta-label">Genre</div>
										<div><span class="audition-venue"><?php the_field( 'workshop_genre' ); ?></span></div>
									</div>

									<div class="event-meta">
										<div class="event-meta-label">Who is this class for?</div>
										<div><span class="audition-venue"><?php the_field( 'workshop_who_is_this_class_for' ); ?></span></div>
									</div>

									<!-- <div class="event-meta full-width-meta">
										<div class="event-meta-label">BDA Discount?</div>
										<div><span class="audition-venue"><?php the_field( 'workshop_bda_discount' ); ?></span></div>
									</div> -->

									<?php if( get_field( 'workshop_suggested_attire') ): ?>
									<div class="event-meta">
										<div class="event-meta-label">Suggested Attire</div>
										<div><span class="audition-venue"><?php the_field( 'workshop_suggested_attire' ); ?></span></div>
									</div>
									<?php endif; ?>

									<!-- <div class="event-meta full-width-meta">
										<div class="event-meta-label">Contact Name</div>
										<div><span class="audition-venue"><?php the_field( 'workshop_contact_name' ); ?></span></div>
									</div> -->

									<!-- <div class="event-meta full-width-meta">
										<div class="event-meta-label">Contact Email</div>
										<div><span class="audition-venue"><?php the_field( 'workshop_contact_email' ); ?></span></div>
									</div> -->

									<div class="event-desc"><?php the_content(); ?></div>

								</div>
							</div>
						<?php
						endwhile; // End of the loop. ?>
					</div>
				</div>
			</div>

			<?php get_sidebar(); ?>

		</div><!--row end-->
    </div><!--container end-->
</div><!--site content End-->


<?php get_footer(); ?>
