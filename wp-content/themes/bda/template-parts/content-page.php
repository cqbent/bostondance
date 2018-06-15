<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bda
 */

?>
	<div id="primary" class="content-area"><!--primary start-->
        <main id="main" class="site-main" role="main"><!--site main start-->
			<h3><?php the_title( ); ?></h3>
			<div class="image-thumnail alignleft">
				<?php the_content();  ?>
			</div>
		</main>
	</div>
	