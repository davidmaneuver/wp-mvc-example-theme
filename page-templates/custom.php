<?php
/*
 * Template Name: Custom Templaste
 * Description: Example Page Template
 */

// Include common code.
require "common.php";

// Render template.
Timber::render('views/custom.twig', $context);
