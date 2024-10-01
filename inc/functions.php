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

function get_remaining_tickets($event_id, $time_key) {
    // Получаем все заказы для данного события и времени
    $args = array(
        'post_type'  => 'orders',
        'posts_per_page' => -1, // Получить все посты
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key'     => 'event_id',
                'value'   => $event_id,
                'compare' => '='
            ),
            array(
                'key'     => 'time_id',
                'value'   => $time_key,
                'compare' => '='
            )
        )
    );
    
    $orders = get_posts($args);
    
    // Подсчитываем общее количество проданных билетов
    $total_tickets_sold = 0;
    foreach ($orders as $order) {
        $ticket_count = get_post_meta($order->ID, 'ticket_count', true);
        $total_tickets_sold += intval($ticket_count);
    }

    // Получаем доступное количество билетов из события
    $event_times = get_field('time_list', $event_id);
    
    if (isset($event_times[$time_key])) {
        $available_tickets = intval($event_times[$time_key]['tickets_count']);
    } else {
        return 0; // Если время не найдено
    }

    // Рассчитываем оставшиеся билеты
    $remaining_tickets = $available_tickets - $total_tickets_sold;

    return $remaining_tickets > 0 ? $remaining_tickets : 0; // Возвращаем 0, если все билеты проданы
}