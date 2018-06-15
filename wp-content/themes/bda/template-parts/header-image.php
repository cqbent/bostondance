<div class="container">
	<div class="banner">
		<?php 
			//gid current global id;

		if( is_tax() ) {

				/**
				 * $term is passed form taxonomy-staff_category.php
				 * It is an object
				 *
				 * In this case we thought there is not need to check the parent category image so used directly home page header image
				 */
				

				if( get_field( 'header_image', $term ) ) {
					$gid = $term;
				} else {
					$gid = 28; // home page id (default one)
				}

			} elseif( is_page() || is_single() ) {

				
				if( get_field( 'header_image', $post->ID) ) {
					$gid = $post->ID;
				} elseif( get_field( 'header_image', wp_get_post_parent_id( $post->ID) ) ) {
					$gid =  wp_get_post_parent_id( $post->ID); 
				} else {
					$gid = 28; // home page id (default one)
				}
			} else {
				$gid = 28; // home page id (default one)
			}
			?>
			<img src="<?php the_field('header_image', $gid ); ?>" alt="community header" width="1007" height="185"/>
		</div>
		<div class="row">


			<div class="col-xs-9">
				<div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
					<?php	
					if(!isset($_GET['s'])){ ?>
					<?php if(function_exists('bcn_display'))
					{
						bcn_display();
					}
				}
				?>
			</div>
		</div>	

		<div class="col-xs-3">
			<div class="photo-credit">
				<p>
					<?php 
					if( get_field( 'header_image_caption' ) ) {
						the_field('header_image_caption', $gid); 
					} else{
						echo "&nbsp;";
					}
					?>
				</p>
			</div>
		</div>
	</div>
</div>