<?php 

    $id = get_field('id');
    $type = get_field('type');


    $img_id = get_field('image');
    $desc = get_field('description');
?>

<section
    <?php echo $id ? "id='" . $id . "'" : ""; ?>
    class="news_card-section
    news_card-<?php echo $type; ?>";
>
    <div class="container">
        <div class="img"><?php 
                    echo wp_get_attachment_image(
                        $img_id,
                        'full', 
                        false, 
                        [
                            'alt' => 'news_card_id', 
                            'title' => 'news_card_id' 
                        ]
                    ); 
                ?>
            </div>
        <div class="desc"><?php echo $desc  ?></div>
        
    </div>

</section>