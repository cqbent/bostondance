<h3 class="staff-ctg-title"><?php echo $term->name; ?></h3>
<div class="staffs">
<?php
	wp_reset_postdata();
	$args = array(
		'post_type' => 'bda_staff',
		'tax_query' => array(
			'taxonomy' => 'staff_category',
			'field'    => 'id',
			'terms'    => $term->term_id,
		),
	);
	preint($args);
	
	$query = new WP_Query( $args );
	
	if( $query->have_posts() ):
		$count = 0;  
		while( $query->have_posts() ) : $query->the_post();

			// code for image url in javascript data
			$staff_img = wp_get_attachment_thumb_url( get_post_thumbnail_id( get_the_ID() ) ); ?>

			<div class="staff" data-index="<?php echo $count; ?>">
				<h3><?php the_title(); ?></h3>
				<?php if( has_post_thumbnail() ) { the_post_thumbnail( 'large' ); } ?>
				<div class="designation"><?php the_field( 'designation' ); ?></div>
			</div>
			<script type="text/javascript">
				var udata_part = [{
					username: "<?php the_title(); ?>",
					userAvatarUrl_img: "<?php echo $staff_img; ?>",
					userDesignation: "<?php echo get_field( 'designation' ); ?>",
					userDescription: `<?php echo get_the_content(); ?>`
					
				}];

				Array.prototype.push.call(udata, udata_part[0]);
			</script>
<?php 
			$count++;
		endwhile; wp_reset_postdata();
	endif; ?>	

</div>