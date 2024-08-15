<?php 
 $phone_info = get_field('phone_info', 'options');
 $mail_info = get_field('mail_info', 'options');
 
?>

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
                <?php 
                    create_contact_item($phone_info);  
                    create_contact_item($mail_info);  
                ?> 
            </div>
            <?php social_icons("social-icons") ?>
        </div>
    
