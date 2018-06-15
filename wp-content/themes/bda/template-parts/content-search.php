<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bda
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
	<div class="blog">
		<!-- <div class="row"> -->
		<div class="blogs-content-excerpt">
			<header class="entry-header">
				<?php the_title('<h3>', '</h3>' ); ?>

				<?php if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php if( get_terms($post->ID, 'category'))
					the_terms($post->ID, 'category',' ',' | '); ?>
					<span class="blogs-date"><?php echo get_the_date('M j, Y'); ?></span>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->
	</div>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
		<?php if( get_the_content()){ ?>
			<a class="all" href="<?php the_permalink(); ?>">MORE</a>
		<?php } ?>
	</div><!-- .entry-summary -->
<!-- </div> -->
</div>
</article>

