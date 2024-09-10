<?php 
$post_id = $args['post_id'];

$query = new WP_Query(array(
    'post_type'         => 'news',
    'posts_per_page'    => 10, 
    'orderby'           => 'date',
    'order'             => 'DESC',
    'fields'            => 'ids',
    'post__not_in'      => [$post_id]
));
$posts_id = $query->posts;

wp_reset_postdata();

echo '<div class="news-list">';

foreach($posts_id as $post_id){
    $title = get_the_title($post_id);
    $link = get_permalink($post_id);
    $date = get_the_date('H:i', $post_id); 
    
    echo '<li>';
    echo '<span class="news-date">' . $date . '</span> ';
    echo '<a href="' . $link . '" class="news-title">' . $title . '</a>';
    echo '</li>';
}

echo '</div>';
?>