<div class="main single">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<div class="top-note cf">
			<div class="thumb left">
				<?php the_post_thumbnail(); ?>
			</div>
			<div class="note left">
				<p>I skinned this site using HTML, CSS and Javascript, on top of ASP.NET.</p>
				<p>However, I don't design it (PSD). Design credit goes to designer in my team.</p>
				
				<?php 
					$siteURL = get_post_meta($post->ID, 'siteURL', true); 
					if ($siteURL != ''){
				?>
					<div class="siteURL blue-button">
						<a href="<?php echo $siteURL; ?>" target="_blank">Visit Site</a>
					</div>
				<?php } ?> 

			</div>
		</div>
		
		<div class="allthumbs cf">
		<?php
			$featured_thumb_ID = get_post_thumbnail_id( $post->ID );
			$args = array(
				'post_type' => 'attachment',
				'numberposts' => -1,
			    'post_status' => null,
			    'post_parent' => $post->ID,
			    'order' => 'ASC',
			    'exclude' => $featured_thumb_ID,
			);

			$attachments = get_posts( $args );
			if ( $attachments ) {
				foreach ( $attachments as $attachment ) {
					$full_img_url = wp_get_attachment_image_src( $attachment->ID, 'full' );
					echo '<div class="imageWrapper"><a href="' . $full_img_url[0] .'">' 
						.wp_get_attachment_image( $attachment->ID, 'medium' ) . "</a></div>";
				}
			}		
		?>
		</div>
	
		<?php //the_content(); ?>
		
		
		<p><?php edit_post_link(__('Edit this entry', 'super_light'), '', ''); ?></p>
		
		<?php wp_link_pages(array('before' => '<p class="pages"><strong>'.__('Pages', 'super_light').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

		<p><?php posts_nav_link(); ?></p>
		<p class="pagination">
			<span class="prev"><?php previous_post_link('%link'); ?></span>
			<span class="next"><?php next_post_link('%link'); ?></span>
		</p>

	<?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>
