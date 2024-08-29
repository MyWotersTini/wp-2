<?php 

add_shortcode('social-icons', 'shortcode_social_icons');
function shortcode_social_icons( $attr ){
    $attr = shortcode_atts([
        'class' => 'social-icons'
    ],$attr);
    social_icons($attr['class']);
}

