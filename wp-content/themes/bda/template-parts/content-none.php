<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bda
 */

?>

<!-- <section class="no-results not-found"> -->
	<header class="page-header">
		<h3 class="page-title"><?php esc_html_e( 'Nothing Found', 'bda' ); ?></h3>
	</header><!-- .page-header -->

	<!-- <div class="page-content"> -->
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'bda' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'bda' ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'bda' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
	<!-- .page-content -->
<!-- </section> -->
<!-- .no-results -->
