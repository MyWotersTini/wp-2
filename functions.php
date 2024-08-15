<?php 

define('VERSION', '1.1.2');

// enqueue scripts and syles
require 'inc/wp_enqueue.php';

// enqueue options
require 'inc/options.php';

// Add SVG Format
require 'inc/add_svg.php';

function create_contact_item($info) {
    ?>
    <div class="contact-item">
        <?php 
            echo wp_get_attachment_image(
                $info['icon']['ID'],
                'full', 
                false, 
                [
                    'alt' => $info['link']['title'], 
                    'title' => $info['link']['title'] 
                ]
            );
        ?>  
        <a 
            href="<?php echo $info['link']['url']; ?>"
            target="<?php echo $info['link']['target']; ?>"
        >
            <?php echo $info['link']['title']; ?>
        </a>
    </div>
    <?php
}

function social_icons($class){
    $socials = get_field('social_icons', 'options');
    // echo "<pre>";
    // var_dump($socials);
    // echo "</pre>";

    ?>
    <div class="<?php echo $class ?>">
         <?php foreach($socials as $item): ?>   
            <a
                href="<?php echo $item["link"] ?>" 
                target="_blank"
            >
                <?php 
                    echo wp_get_attachment_image($item["icon"]["ID"],'full', false,[
                        'alt' => 'sdasdsa',
                        'title' => 'title'
                    ]);
                ?>
                <!-- <img
                    src="<?php echo $item["icon"]["url"] ?>";
                    alt="<?php echo $item["icon"]["alt"] ?>";
                    title="<?php echo $item["icon"]["title"] ?>";
                > -->
            </a>
        <?php endforeach; ?>
    </div>
<?php

}


add_theme_support('post-thumbnails');

