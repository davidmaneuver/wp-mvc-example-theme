<?php

include('common.php');

/**
 * Create a list of templates Timber will look for to render.
 */
$templates = ['notfound'];

/**
 * Show single post.
 **/
if ( is_single() ) {
  array_unshift($templates, 'post');

  // Find the current post_type. This is different when viewing a preview.
  $post_type = is_preview() ? get_post_type($context['post']->post_parent) : $context['post']->post_type;
  
  array_unshift($templates, $post_type);
  array_unshift($templates, $post_type . '-' . $context['post']->ID);

/**
 * Show frontpage.
 * Show homepage. (this is the main posts listing page, set in Settings > Reading)
 **/
} elseif (is_front_page() || is_home()) {
  array_unshift($templates, 'home');

/**
 * Show page.
 **/
} elseif ( is_page() ) {
  array_unshift($templates, 'page');
  array_unshift($templates, 'page-' .  $context['post']->ID);

/**
 * Show taxonomy page.
 **/
} elseif ( is_tax() ) {
  array_unshift($templates, 'taxonomy');

/**
 * Show archive page of a post type.
 **/
} elseif (is_archive()) {
  $post_type = get_query_var('post_type');

  array_unshift($templates, 'archive');
  array_unshift($templates, 'archive-' . $post_type);

/**
 * Show category page.
 **/
} elseif ( is_category() ) {
  array_unshift($templates, 'category');


/**
 * Show tag page.
 **/
} elseif ( is_tag() ) {
  array_unshift($templates, 'tag');


/**
 * Show profile.
 **/
} elseif ( is_author() ) {
  array_unshift($templates, 'author');


/**
 * Show search results.
 **/
} elseif ( is_search() ) {
  array_unshift($templates, 'search');


/**
 * Well, this is an actual 404.
 **/
} elseif ( is_404()) {
  // 404 is already present in templates.

}

// Set correct templates paths.
$templates = array_map(function($t){ return "views/{$t}.twig"; }, $templates);

// Find template and render it.
Timber::render($templates, $context );
