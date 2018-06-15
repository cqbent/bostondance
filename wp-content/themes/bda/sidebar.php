<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bda
 */

?>
<div class="col-sm-2 secondary-part">
	<div id="secondary" class="widget-area sidebar" role="complementary"><!--secondary start-->

		<?php 
		if ( is_active_sidebar( 'custom-widget-area' ) ) {
				dynamic_sidebar( 'custom-widget-area' );
		}
		?>
		        
    </div><!--secondary end-->
</div> <!-- .secondary-part -->
        