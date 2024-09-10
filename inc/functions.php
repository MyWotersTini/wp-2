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

function get_date_by_week($num){
    $days_of_week = array(
        'Неділя', 'Понеділок', 'Вівторок', 'Середа', 'Четвер', 'П’ятниця', 'Субота'
    ); /* #hardcode */

    return $days_of_week[$num];
}
