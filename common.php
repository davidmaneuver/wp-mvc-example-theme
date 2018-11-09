<?php

/**
 * Get context.
 **/
$context = Timber::get_context();

/**
 * Retrieve current language.
 **/
$locale = get_bloginfo('language');
$context['lang'] = substr($locale, 0, 2);

/**
 * Make current url available to templates.
 **/
if (!empty($wp)) {
  $context['current_url'] = home_url($wp->request);
}

/**
 * Load in defined menus.
 **/
if ($locs = get_nav_menu_locations()) {
  foreach ($locs as $name => $id) {
    $context['menus'][$name] = new TimberMenu($id);
  }
}

/**
 * Retrieve posts.
 **/
if (is_singular()) {
  $context['post'] = \Timber::get_post();
  $context['is_preview'] = is_preview();
} else {
  $context['posts'] = \Timber::get_posts();
}
