<?php 

// add_action( 'wp_ajax_create_order', 'create_order_callback' );
// add_action( 'wp_ajax_nopriv_create_order', 'create_order_callback' );

// function create_order_callback(){
//     wp_send_json_success(['success' => true]);
// }

add_action('wp_ajax_create_order', 'create_order');
add_action('wp_ajax_nopriv_create_order', 'create_order');

function create_order() {
    $userName = isset($_POST['userName']) ? trim($_POST['userName']) : '';
    $userMail = isset($_POST['userMail']) ? trim($_POST['userMail']) : '';
    $ticketCount = isset($_POST['ticketCount']) ? intval($_POST['ticketCount']) : 0;
    $event_id = isset($_POST['event_id']) ? intval($_POST['event_id']) : 0;
    $data_key = isset($_POST['data_key']) ? $_POST['data_key'] : '';

    if (empty($userName)) {
        wp_send_json_error(['error' => 'name_error', 'message' => 'Поле "Ім\'я" не може бути порожнім']);
        return;
    }

    if (empty($userMail)) {
        wp_send_json_error(['error' => 'email_error', 'message' => 'Поле "Email" не може бути порожнім']);
        return;
    }

    if (!filter_var($userMail, FILTER_VALIDATE_EMAIL)) {
        wp_send_json_error(['error' => 'email_error', 'message' => 'Некоректний формат Email']);
        return;
    }
    
    if (empty($ticketCount) || empty($event_id) || (empty($data_key) && $data_key !== "0")) {
        wp_send_json_error(['error' => 'generic_error', 'message' => 'Щось пішло не так. Будь ласка, спробуйте ще раз.']);
        return;
    }

    // Перевірка, чи існує пост з таким event_id
    $args = array(
        'post_type'         => 'events',
        'posts_per_page'    => 1, 
        'post__in'          => [$event_id]
    );
    $event = get_posts($args);
    if (!$event) {
        wp_send_json_error(['error' => 'generic_error', 'message' => 'Щось пішло не так. Подія не знайдена.']);
        return;
    }

    $event_times = get_field('time_list', $event_id);

    if (!$event_times || !isset($event_times[$data_key])) {
        wp_send_json_error(['error' => 'generic_error', 'message' => 'Щось пішло не так. Час події не знайдено.']);
        return;
    }

    $time_id = $data_key; 
    // закинул расчет цены в отдельную переменную
    $price = $ticketCount * $event_times[$data_key]['price']; 

    // Створення нового посту (ордера)
    $new_post = array(
        'post_title'   => 'New title', 
        'post_status'  => 'publish',   
        'post_author'  => 1,          
        'post_type'    => 'orders',    
    );
    $post_id = wp_insert_post($new_post, true);

    if ($post_id) {
        $args = array(
            'ID'            => $post_id,
            'post_title'    => "#" . $post_id . " | " . date('Y-m-d H:i:s') . ' | ' . $ticketCount . ' Ticket(s) | ' . $userMail,
        );
        wp_update_post($args);
        
        update_post_meta($post_id, 'client_name', $userName);                   
        update_post_meta($post_id, 'ticket_count', $ticketCount);              
        update_post_meta($post_id, 'client_email', $userMail);                    
        update_post_meta($post_id, 'total_price', $price);                         
        update_post_meta($post_id, 'payment_status', 'pending');                

        // Event ID Time ID
        update_post_meta($post_id, 'event_id', $event_id);                         
        update_post_meta($post_id, 'time_id', $time_id);                         
    }

    wp_send_json_success(['message' => 'Замовлення успішно створено']);
}
