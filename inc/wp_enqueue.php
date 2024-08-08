<?php 

function enqueue_custom_scripts() {

wp_enqueue_style(
    'main',
    get_template_directory_uri() . '/style.css',
    array(), 
    VERSION 
);

wp_enqueue_style(
    'global',
    get_template_directory_uri() . '/css/global.css',
    array(), 
    VERSION 
);

if(is_single()){
    wp_enqueue_style(
        'single',
        get_template_directory_uri() . '/css/single.css',
        array(), 
        VERSION 
    );
};

if(is_page()){
    wp_enqueue_style(
        'page',
        get_template_directory_uri() . '/css/page.css',
        array(), 
        VERSION 
    );
};

wp_enqueue_script(
    'header-script',
    get_template_directory_uri() . '/js/header-script.js',
    array(),
    VERSION,
    false // false означає, що скрипт завантажується в head
);

// Підключення footer-1 скрипта після footer-2
wp_enqueue_script(
    'footer-script-1',
    get_template_directory_uri() . '/js/footer-script-1.js',
    array('footer-script-2'), 
    VERSION,
    true // true означає, що скрипт завантажується в footer 
);

// Підключення footer-2 скрипта
wp_enqueue_script(
    'footer-script-2',
    get_template_directory_uri() . '/js/footer-script-2.js',
    array(),
    VERSION,
    true // true означає, що скрипт завантажується в footer
);

wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');
}

add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');