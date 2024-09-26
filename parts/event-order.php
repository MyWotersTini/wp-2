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
                    foreach($event_times as $key => $time){
                        $max_ticket_count   = min(10, $time['tickets_count']);
                        echo "<button class='time-button' data-date='{$event_date}' data-price='{$time['price']}' data-count='{$max_ticket_count}' data-order='{$order_id}' data-order-time='{$key}'>{$time['time']}</button>";
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
        <div class="order-header">
            <h3>ЗАМОВЛЕННЯ</h3>
        </div>

        <div class="order-content">
            <div class="order-line">
                <label for="ticket-count">Count of tickets</label>
                <div class="ticket-quantity">
                    <button id="decrease-quantity">-</button>
                    <input type="number" id="ticket-count" value="1" min="1"/>
                    <button id="increase-quantity">+</button>
                </div>
                <p id="total-price"></p>
            </div>

            <div class="order-line">
                <label for="user_name">Name, SecondName</label><br>
                <input type="text" class="Name" placeholder="Ivan" id="user_name">
            </div>
            
            <div class="order-line">
                <label for="user_mail">Your mail</label><br>
                <input type="text" class="email" placeholder="1234@gmail.com" id="user_mail">
            </div> 

        </div>

        <div class="order-footer">
            <button id="confirm-order">Замовлення підтверджую</button>
        </div>
    </div>
</div>

