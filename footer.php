	</div>

	<div class="footer">
		<?php wp_nav_menu( array('fallback_cb' => 'super_light_menu_flat', 'container' => false, 'menu' => 'secondary', 'depth' => '1', 'theme_location' => 'secondary', 'link_before' => '', 'link_after' => '') ); ?>

		<p><?php bloginfo('name');?> | <?php _e('Powered by', 'super_light'); ?> <a href="http://wordpress.org/">WordPress</a></p>
	</div>
	<?php wp_footer(); ?>
</div>
</body>
</html>