<?php

//$today = date('Y-m-d'); // формат Ymd используется для соответствия формату даты ACF

// Параметры для WP_Query

//$query = new WP_Query($args);

//$posts_id = $query->posts;
//var_dump($posts_id);
//wp_reset_postdata();
?>

<?php
$today = date('Y-m-d');

$args = array(
    'post_type' => 'events',
    'meta_query' => array(
        array(
            'key' => 'event_date',
            'value' => $today,
            'compare' => '>=',
            'type' => 'DATE'
        ),
    ),
    'posts_per_page' => -1,
    'orderby' => 'meta_value',
    'order' => 'ASC',
    'meta_key' => 'event_date',
    'fields' => 'ids',
);

$query = new WP_Query($args);
$order_id_list = $query->posts;
wp_reset_postdata();
?>

<div class="event-order-container">
    <!-- Date Time -->
    <div class="step">
        <h2>ОБРАТИ ДАТУ ТА ЧАС ЗУСТРІЧІ</h2>
        <div class="date-selection">
            <?php 
            if (!empty($order_id_list)) {
                foreach ($order_id_list as $order_id) {
                    $event_date     = get_post_meta($order_id, 'event_date', true);
                    $event_day      = date('l', strtotime($event_date));
                    $event_day_ua   = get_date_by_week(date('w', strtotime($event_date))); 

                    
                    $event_day_number = date('d', strtotime($event_date));
                    $event_month = date('M', strtotime($event_date));

                    echo "<button class='date-button' data-order='{$order_id}'>{$event_day_ua}<br>{$event_day_number} {$event_month}</button>";
                }
            } else {
                echo "<p>Немає доступних дат для бронювання.</p>";
            }
            ?>
        </div>

        <!-- Time-->
        <div class="time-selection">
            <label>Доступний час</label>
            <div id="available-times">
            <?php 
            if (!empty($order_id_list)) {
                foreach ($order_id_list as $order_id) {
                    $event_date     = get_field('event_date', $order_id);
                    $event_times    = get_field('time_list', $order_id);
                    foreach($event_times as $time){
                        echo "<button class='time-button' data-date='{$event_date}' data-price='{$time['price']}' data-count='{$time['tickets_count']}' data-order='{$order_id}'>{$time['time']}</button>";
                    }
                }
            } else {
                echo "<p>Немає доступних дат для бронювання.</p>";
            }
            ?>  
            </div>
        </div>
    </div>

    <!-- Offer -->
    <div class="order">
        <h3>ЗАМОВЛЕННЯ</h3>
        <p id="selected-date">Выберите дату и время</p>
        <div class="ticket-quantity">
            <button id="decrease-quantity">-</button>
            <input type="number" id="ticket-count" value="1" min="1" />
            <button id="increase-quantity">+</button>
        </div>
        <p id="total-price"></p>
        <button id="confirm-order">Замовлення підтверджую</button>
    </div>
</div>

