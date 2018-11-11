<?php

/**
 * This theme requires the Timber plugin.
 */
if (!class_exists('Timber')){
	add_action( 'admin_notices', function() {
		echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
	});
	return;
}

/**
 * Setup theme support.
 */
add_theme_support( 'post-thumbnails' );
add_theme_support( 'menus' );
add_theme_support( 'title' );

/**
 *  On wordpress init.
 **/
function wp_mvc_init() {

  // Add menu location.
  register_nav_menus(
    array(
      'header' => __( 'Header' ),
    )
  );
}
add_action( 'init', 'wp_mvc_init' );

/* Serve 404 header when loading the notound.twig tenplate */
add_filter('timber_render_file', function($template) {
  if (strpos($template, 'notfound.twig')) {
    status_header(404);
  }
  return $template;
});