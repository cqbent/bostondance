<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bda
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="blogs-wrapper">
		<div class="row">
			<div class="post-image col-sm-5">
				<?php if( has_post_thumbnail( ) ):
				the_post_thumbnail( );
				endif ; ?>
			</div>
			<div class="blogs-content-excerpt col-sm-7">
				<!-- <header class="entry-header"> -->
					<h3><?php the_title( ); ?></h3>

					<?php if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<?php the_terms($post->ID, 'category',' ',' | '); ?>
						<span class="blogs-date"><?php echo get_the_date('M j, Y'); ?></span>
					</div><!-- .entry-meta -->
				<?php endif; ?>
				<!-- </header>.entry-header -->

			<div class="entry-content">
				<?php
				the_excerpt( ); ?>

				<a class="all" href="<?php the_permalink();?>">MORE</a>
				</div><!-- .entry-content -->
				</div>
			</div>
		</div>
		<footer class="entry-footer">
			<?php //bda_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</article><!-- #post-## -->
