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

    if(get_post_type() == 'news'){
        wp_enqueue_style(
            'news',
            get_template_directory_uri() . '/css/single-news.css',
            array(), 
            VERSION 
        );
    };

    wp_enqueue_script(
        'script',
        get_template_directory_uri() . '/js/script.js',
        array(),
        VERSION,
        false 
    );


    wp_enqueue_style('uikit-css', 'https://cdn.jsdelivr.net/npm/uikit@3.16.24/dist/css/uikit.min.css');
    wp_enqueue_script('uikit-js', 'https://cdn.jsdelivr.net/npm/uikit@3.16.24/dist/js/uikit.min.js', array('jquery'), null, true);
    wp_enqueue_script('uikit-icons', 'https://cdn.jsdelivr.net/npm/uikit@3.16.24/dist/js/uikit-icons.min.js', array('uikit-js'), null, true);

    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');

    wp_enqueue_style('event-order-style', get_template_directory_uri() . '/css/event-order.css');
    wp_enqueue_script('event-order-script', get_template_directory_uri() . '/js/event-order.js', array('jquery'), null, true);
    
}

add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');