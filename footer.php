<?php
    $map_frame = get_field('map_code', 'options');
    
    $phone_info = get_field('phone_info', 'options');
    $map_info = get_field('map_info', 'options');
    $mail_info = get_field('mail_info', 'options');

    $args = array(
        'post_type'         => 'post',
        'posts_per_page'    => 6, 
        'orderby'           => 'date',
        'order'             => 'ASC',
        'cat'               => '1,2',
    );

    $query = new WP_Query($args);

?>

        <div class="latest-news uk-section uk-section-muted">
            <div class="uk-container">
                <h2 class="uk-heading-line uk-text-center"><span>Останні Новини</span></h2>

                <div class="uk-slider-container-offset" uk-slider>

                    <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">

                        <div class="uk-slider-items uk-child-width-1-3@s uk-grid">
                            <?php
                                if ($query->have_posts()) :
                                    while ($query->have_posts()) : $query->the_post();
                                        ?>
                                            <div>
                                                <div class="uk-card uk-card-default">
                                                    <div class="uk-card-media-top">
                                                        <?php the_post_thumbnail('full'); ?>
                                                    </div>
                                                    <div class="uk-card-body"> 
                                                        <a href="<?php the_permalink(); ?>">
                                                            <h3 class="uk-card-title"><?php echo get_the_title() ?></h3> 
                                                        </a>
                                                        <p><?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                    endwhile;
                                    wp_reset_postdata();
                                endif;
                            ?>
                        </div>

                        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href uk-slidenav-previous uk-slider-item="previous"></a>
                        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href uk-slidenav-next uk-slider-item="next"></a>

                    </div>

                    <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>

                </div>
                
            </div>
        </div>


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