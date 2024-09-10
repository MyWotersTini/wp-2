<?php 
/*
* Creating a function to create our CPT
*/
  
function custom_post_type() {
  
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Movies', 'Post Type General Name', THEME_NAME ),
        'singular_name'       => _x( 'Movie', 'Post Type Singular Name', THEME_NAME ),
        'menu_name'           => __( 'Movies', THEME_NAME ),
        'parent_item_colon'   => __( 'Parent Movie', THEME_NAME ),
        'all_items'           => __( 'All Movies', THEME_NAME ),
        'view_item'           => __( 'View Movie', THEME_NAME ),
        'add_new_item'        => __( 'Add New Movie', THEME_NAME ),
        'add_new'             => __( 'Add New', THEME_NAME ),
        'edit_item'           => __( 'Edit Movie', THEME_NAME ),
        'update_item'         => __( 'Update Movie', THEME_NAME ),
        'search_items'        => __( 'Search Movie', THEME_NAME ),
        'not_found'           => __( 'Not Found', THEME_NAME ),
        'not_found_in_trash'  => __( 'Not found in Trash', THEME_NAME ),
    );
        
// Set other options for Custom Post Type
        
    $args = array(
        'label'               => __( 'movies', THEME_NAME ),
        'description'         => __( 'Movie news and reviews', THEME_NAME ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'category' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,
    
    );
        
    // Registering your Custom Post Type
    register_post_type( 'movies', $args );
    
}
    
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
    
add_action( 'init', 'custom_post_type', 0 );