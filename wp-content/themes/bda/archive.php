<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bda
 */

 	$bda_post_type = get_post_type( get_the_ID() ); 

	if ( is_category() ) 
		$cur_cat_id = get_cat_id( single_cat_title( "", false ) ); 	

	get_template_part( 'templates/blog');

	

