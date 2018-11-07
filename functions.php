<?php

/**
 * This theme requires the Timber plugin.
 */
if (!class_exists('Timber')){
  echo 'Timber is not activated. Make sure you activate the plugin in <a href="/wp-admin/plugins.php#timber">/wp-admin/plugins.php</a>';
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
