<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes('xhtml'); ?>>
<head profile="http://gmpg.org/xfn/11">
  <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
  <meta name="Description" content="" />
  <meta name="Keywords" content="" />
	<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'super_light'), max( $paged, $page ) );

	?></title>


	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" />
	<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
<div class="fullscreen"><img src="<?php bloginfo('template_directory');?>/images/fullscreen.jpg" alt="background"></div>
<div class="overlay"></div>

<div class="mainWrapper">

	<div class="header">
		
			<?php get_search_form(); ?>
			<p class="title"><a href="<?php echo home_url(); ?>/" name="top"><?php bloginfo('name'); ?></a></p>
			<p class="tagline"><?php bloginfo('description'); ?></p>
			

			<div class="nav mainmenu">
				<?php wp_nav_menu( array('fallback_cb' => 'super_light_page_menu', 'menu' => 'primary', 'depth' => '3', 'theme_location' => 'primary', 'link_before' => '', 'link_after' => '', 'container' => false) ); ?>
				<div class="clear"><!-- --></div>
			</div>
			<div class="clear"><!-- --></div>
		
	</div>


	<div class="content">