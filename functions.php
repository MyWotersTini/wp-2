<?php 

define('VERSION', '1.1.2');

// enqueue scripts and syles
require 'inc/wp_enqueue.php';

// enqueue options
require 'inc/options.php';

// Add SVG Format
require 'inc/add_svg.php';

// Add Custom Functions
require 'inc/functions.php';

// Add Shortcodes
require 'inc/shortcodes.php';

add_theme_support('post-thumbnails');

