<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' );?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <?php wp_body_open(); ?>

        <div class="first-line-header">
            <div class="left-section">
                <span>Телефон: <a href="tel:+123456789">+123456789</a></span>
                <span>Email: <a href="mailto:example@example.com">example@example.com</a></span>
            </div>
            <div class="right-section">
                <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
                <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    
