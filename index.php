<?php get_header(); ?>
<div class="main">

	<div id="portfolio">
		<h1 id="latest-work">Latest Work <span><a href="category/portfolio/portal-skinning/">(More...)</a></span></h1>
		<?php $portfolio = new WP_Query('cat=1&showposts=12');
		if($portfolio->have_posts()) : while($portfolio->have_posts()) : $portfolio->the_post(); ?>
				<!-- Start: Post -->
				<div <?php post_class(); ?>>
					<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_post_thumbnail(array(300,162)); ?></a>
				</div>
				<!-- End: Post -->
			<?php endwhile; ?>
			
		<?php else : ?>
			<h2 class="center"><?php _e( 'Not found', 'super_light' ); ?></h2>
			<p class="center"><?php _e( 'Sorry, but you are looking for something that isn\'t here.', 'super_light' ); ?></p>
			<?php get_search_form(); ?>
		<?php endif; ?>
	</div>
</div>
<?php get_footer(); ?>
