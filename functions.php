<?php 

define('VERSION', '1.1.2');
define('THEME_NAME', 'my_test_theme');

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

// Add Ajax functions
require 'inc/ajax.php';

require 'inc/acf_settings.php';

// Add Custom Post Type
// require 'inc/cpt.php';


add_theme_support('post-thumbnails');

