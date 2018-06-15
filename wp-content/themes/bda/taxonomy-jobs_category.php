<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bda
 */

get_header(); 
$taxonomy = get_queried_object();
?>
<?php include( locate_template( 'template-parts/header-image.php')); ?>
<div id="content" class="site-content"><!--site content start-->
	<div class="container"><!--container Start-->
		<div class="row"><!--row start-->

			<div class="col-sm-10 primary-part">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">

						<?php

						if ( have_posts() ) : ?>

						<header class="page-header">
							<?php
							the_archive_title( '<h3 class="page-title">', '</h3>' );
							// the_archive_description( '<div class="taxonomy-description">', '</div>' );
							if ( get_field( 'category_description', $taxonomy ) ) {
								the_field( 'category_description', $taxonomy ) ;
							}

							?>
						</header> <!-- page-header -->
						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>

						<div class="auditions-wrapper">
							<h3 class="auditions-title"><?php the_title(); ?></h3>
							<div class="row">
								<div class="date-time col-sm-3">
									<?php the_terms($post->ID, 'jobs_category'); ?>
									
									<?php //if( get_field('audition-date' )) { ?>
									<span class="audition-date"><?php  $dateformatstring = "F d";
									$unixtimestamp = strtotime(get_field('audition_date'));
									echo date_i18n($dateformatstring, $unixtimestamp); 
                                           // } ?>
                                       </span>
                                       <?php if( get_field('audition-time' )) ?>
                                       <span class="audition-time"><?php the_field('audition_time'); ?></span>
                                       <?php if( get_field('audition-venue' )) ?>
                                       <span class="audition-venue"><?php the_field('audition_venue'); ?></span>
                                   </div>
                                   <div class="audiions-content-excerpt col-sm-9">
                                   	<?php the_excerpt(); ?>
                                   </div>
                               </div>
                           </div>

                    <?php endwhile; 

                    else :
                    	echo 'No Result found';
	            	endif;

               		?>

           </main><!-- #main -->
       </div><!-- #primary -->
   </div>

   <?php get_sidebar(); ?>

</div>
</div>
</div>
<?php get_footer(); ?>
