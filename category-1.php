<?php get_header(); ?>
<div class="main">

	<div id="portfolio">
		<h1><?php single_cat_title(); ?></h1>
		<?php 
			if (have_posts()) : while (have_posts()) : the_post();
		?>
				<!-- Start: Post -->
				<div <?php post_class(); ?>>
					<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_post_thumbnail(array(300,162)); ?></a>
				</div>
				<!-- End: Post -->
			<?php endwhile; ?>
			
		<p class="pagination">
			<span class="prev"><?php next_posts_link(__('Previous Posts', 'super_light')) ?></span>
			<span class="next"><?php previous_posts_link(__('Next posts', 'super_light')) ?></span>
		</p>			
			
		<?php else : ?>
			<h2 class="center"><?php _e( 'Not found', 'super_light' ); ?></h2>
			<p class="center"><?php _e( 'Sorry, but you are looking for something that isn\'t here.', 'super_light' ); ?></p>
			<?php get_search_form(); ?>
		<?php endif; ?>
	</div>
</div>
<?php get_footer(); ?>
