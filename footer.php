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
                    <?php 
                        create_contact_item($phone_info); 
                        create_contact_item($map_info);  
                        create_contact_item($mail_info);  
                    ?>
                </div>

                <?php social_icons("social-icons") ?>
            </div>
        </div>

        <?php wp_footer(); ?>
    </body>
</html>