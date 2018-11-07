<?php

include('common.php');

// Params come from Routes::load() method in Routes.php.
global $params;

$templates = ['notfound'];

if (isset($params['template'])) {
  array_unshift($templates, $params['template']);
}

if (!empty($params['add_to_context'])) {
  $context = array_merge($context, $params['add_to_context']);
}

// Set correct templates paths.
$templates = array_map(function($t){ return 'templates/' . $t . '.twig'; }, $templates);

// Find template and render it.
Timber::render($templates, $context);
