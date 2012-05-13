<?php
if ( ! isset( $content_width ) )
$content_width = 650;

add_action( 'widgets_init', 'super_light_sidebars' );

function super_light_sidebars() {
register_sidebar(array(
	'name' => __( 'Sidebar Widget Area', 'super_light'),
	'id' => 'sidebar-widget-area',
	'description' => __( 'The sidebar widget area', 'super_light'),
	'before_widget' => '<div class="widget">',
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>',
));
}

register_nav_menus(
	array(
	  'primary' => __('Header Menu', 'super_light'),
	  'secondary' => __('Footer Menu', 'super_light')
	)
);

//Multi-level pages menu
function super_light_page_menu() {

if (is_page()) { $highlight = "page_item"; } else {$highlight = "menu-item current-menu-item"; }
echo '<ul class="menu">';
wp_list_pages('sort_column=menu_order&title_li=&link_before=&link_after=&depth=3');
wp_list_categories('depth=3&title_li=');
echo '</ul>';
}

//Single-level pages menu
function super_light_menu_flat() {
	if (is_page()) { $highlight = "page_item"; } else {$highlight = "menu-item current-menu-item"; }
	echo '<ul class="menu">';
	wp_list_pages('sort_column=menu_order&title_li=&link_before=&link_after=&depth=1');
	echo '</ul>';
}

// add category nicenames in body and post class
function category_id_class($classes) {
	global $post;
	foreach((get_the_category($post->ID)) as $category){
		$classes[] = $category->category_nicename;
		$parent = $category->category_parent;
		$classes[] = get_cat_name($parent);
	}
	return $classes;
}
add_filter('post_class', 'category_id_class');
add_filter('body_class', 'category_id_class');


function inherit_template() {
  if (is_category()) {
    $catid = get_query_var('cat');
    if ( file_exists(TEMPLATEPATH . '/category-' . $catid . '.php') ) {
      include( TEMPLATEPATH . '/category-' . $catid . '.php');
      exit;
    }

    $cat = &get_category($catid);
    $parent = $cat->category_parent;
    while ($parent) {
      $cat = &get_category($parent);
      if ( file_exists(TEMPLATEPATH . '/category-' . $cat->cat_ID . '.php') ) {
        include (TEMPLATEPATH . '/category-' . $cat->cat_ID . '.php');
        exit;
      }

      $parent = $cat->category_parent;
    }
  }
}

add_action('template_redirect', 'inherit_template', 1);


add_editor_style();
add_theme_support('automatic-feed-links');
add_theme_support('post-thumbnails');

set_post_thumbnail_size( 300, 162, true ); // Default size

// Make theme available for translation
// Translations can be filed in the /languages/ directory
load_theme_textdomain('super_light', get_template_directory() . '/languages');




?>