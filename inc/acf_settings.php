<?php
function acf_register_gutenberg_blocks(){
    $name = 'news_card';
    if ( function_exists( 'acf_register_block_type' ) ) {
        acf_register_block_type( 
            array( 
                'name'            => $name . '-block', 
                'title'           => __( THEME_NAME, THEME_NAME ) . ' | ' . ucwords( str_replace( '-', ' ', $name ) ), 
                'description'     => ucwords( str_replace( '-', ' ', $name ) ) . __( ': ACF block for Gutenberg Editor', THEME_NAME ), 
                'render_template' => 'template-parts/block-' . $name . '.php', 
                'render_callback' => 'block_render', 
                'category'        => THEME_NAME . '-custom-blocks', 
                'icon'            => 'wordpress', 
                'mode'            => 'edit', 
                'supports'        => array( 
                    'mode' => false, 
                ), 
                'example' => array( 
                    'attributes' => array( 
                        'mode' => 'preview', 
                        'data' => array( 
                            'image' => '<img src="' . get_template_directory_uri() . '/template-parts/previews/' . str_replace( '-', ' ', $name )  . '.png' . '" style="width:100%;display: block; margin: 0 auto;">' 
                        ), 
                    ), 
                ), 
            ) 
        );
    }
}

add_action('acf/init', 'acf_register_gutenberg_blocks');

