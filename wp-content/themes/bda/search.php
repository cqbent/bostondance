<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package koshish
 */

get_header(); ?>

<section id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<div class="container"><!--container Start-->
			<div class="row"><!--row start-->
				<div class="col-sm-10 primary-part">

					<?php if ( have_posts() ) : ?>

					<header class="page-header">
						<h3 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'bda' ), '<span>' . get_search_query() . '</span>' ); ?></h3>
					</header><!-- .page-header -->
					<div class="blogs">
						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>

						<?php
							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'template-parts/content', 'search' );
							?>

							<?php endwhile; ?>
							<div class="bda-pagination">
								<?php echo paginate_links(  ); ?>
							</div>

					</div>
					<?php else : ?>

					<?php get_template_part( 'template-parts/content', 'none' ); ?>

					<?php endif; ?>
				
				</div>

				<?php  get_sidebar(); ?>
			
			</div>
		</div>

	</main><!-- #main -->
</section><!-- #primary -->

<?php get_footer(); ?>
