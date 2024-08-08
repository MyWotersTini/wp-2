<?php
    $map_frame = get_field('map_code', 'options');
    
    $phone_info = get_field('phone_info', 'options');
    $map_info = get_field('map_info', 'options');
    $mail_info = get_field('mail_info', 'options');

?>


<div class="first-line-footer">
            <div class="left-section">
                <?php echo $map_frame; ?>
            </div>
            <div class="right-section">
                <div class="footer-contact-list">
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
                        src="<?php echo $map_info['icon']['url']; ?>" 
                        alt="<?php echo $map_info['link']['title']; ?>"
                        title="<?php echo $map_info['link']['title']; ?>"
                        >

                        <a 
                            href="<?php echo $map_info['link']['url']; ?>"
                            target="<?php echo $map_info['link']['target']; ?>"
                        >
                            <?php echo $map_info['link']['title']; ?>
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

                <div class="social-icons">
                    <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>

        <?php wp_footer(); ?>
    </body>
</html>