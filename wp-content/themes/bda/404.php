<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package bda
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="container"><!--container Start-->
				<div class="row"><!--row start-->
					<div class="col-sm-10 primary-part">
						<section class="error-404 not-found">
							<header class="page-header">
								<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'bda' ); ?></h1>
							</header><!-- .page-header -->

							<div class="page-content">
								<p><?php esc_html_e( 'It looks like nothing was found at this location.  Maybe try one of the links below or a search?', 'bda' ); ?></p>
								<ul>
								     <li><a href="/event_category/performances/">Events</a></li>
								     <li><a href="/put-on-a-show/dance-floor/">The Dance Floor</a></li>
								     <li><a href="/our-community/membership-benefits/">Join the Boston Dance Alliance</a></li>
								     <li><a href="/auditions/">Local Auditions</a></li>
								     <li><a href="/about-bda">About Boston Dance Alliance</a></li>
								</ul>
								<p>&nbsp;</p>
								<?php /* get_search_form(); */ ?>

							</div><!-- .page-content -->
						</section><!-- .error-404 -->

					</div>
				</div>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
