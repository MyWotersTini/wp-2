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
            <div class="contact-item">
                <img 
                src="<?php echo $phone_info['icon']['url']; ?>" 
                alt="<?php echo $phone_info['link']['title']; ?>"
                title="<?php echo $phone_info['link']['title']; ?>"
                >

                <a 
                    href="<?php echo $phone_info['link']['url']; ?>"
                    target="<?php echo $phone_info['link']['target']; ?>"
                >
                    <?php echo $phone_info['link']['title']; ?>
                </a>
            </div>
            <div class="contact-item">
                <img 
                src="<?php echo $mail_info['icon']['url']; ?>" 
                alt="<?php echo $mail_info['link']['title']; ?>"
                title="<?php echo $mail_info['link']['title']; ?>"
                >

                <a 
                    href="<?php echo $mail_info['link']['url']; ?>"
                    target="<?php echo $mail_info['link']['target']; ?>"
                >
                    <?php echo $mail_info['link']['title']; ?>
                </a>
            </div>
                
            </div>
            <div class="right-section">
                <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
                <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    
