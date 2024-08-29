<?php 

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
            </a>
        <?php endforeach; ?>
    </div>
<?php

}

function enqueue_uikit_assets() {
    wp_enqueue_style('uikit-css', 'https://cdn.jsdelivr.net/npm/uikit@3.16.24/dist/css/uikit.min.css');
    wp_enqueue_script('uikit-js', 'https://cdn.jsdelivr.net/npm/uikit@3.16.24/dist/js/uikit.min.js', array('jquery'), null, true);
    wp_enqueue_script('uikit-icons', 'https://cdn.jsdelivr.net/npm/uikit@3.16.24/dist/js/uikit-icons.min.js', array('uikit-js'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_uikit_assets');
