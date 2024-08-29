<?php 

get_header();

$title      = get_the_title();
$post_id    = get_the_ID();
$image      = get_post_thumbnail_id($post_id);
$date       = date('M, j Y', strtotime(get_the_date()));
$author     = get_userdata(get_post_field('post_author', $post_id)); 
$author     = $author->data->user_nicename;

$test_name  = get_field('test_name');
$test_link  = get_field('test_link');
$test_rep   = get_field('test_rep');

?>

    <div class="container">
        <div class="title">
            <h1>
                <?php echo $title; ?>
            </h1>
        </div>
        <div class="post_info">
            <span class="author">
                <?php echo $author; ?> 
            </span>
            <span class="date">
                <?php echo $date; ?> 
            </span>
        </div>
        <div class="image">
        <?php 
            echo wp_get_attachment_image(
                $image,
                'full', 
                false, 
                [
                    'alt' => $title, 
                    'title' => $title 
                ]
            );
        ?>  
            <!-- <img 
                src="<?php echo $image?>" 
                alt="<?php echo $title?>"
                title="<?php echo $title?>"  
            > -->
        </div>
        <div class="content">
            <?php the_content(); ?>
        </div>
    </div>

    <div class="custom_fields">
        <h2><?php echo $test_name; ?></h2>
        <a 
            href="<?php echo $test_link['url']; ?>"
            title="<?php echo $test_link['title']; ?>"
            target="<?php echo $test_link['target']; ?>"
        >
            <?php echo $test_link['title']; ?>
        </a>
        <div class="block_list">
            <?php foreach($test_rep as $item): ?>
                <?php
                    // echo '<pre>';
                    // var_dump($item);
                    // echo '</pre><hr>';
                    
                ?>
                <div class="block_item">
                
                    <div class="block_content">
                        <div class="block_title">
                            <?php echo $item["text"]; ?>
                        </div>
                        <div class="block_descr">
                            <?php echo $item["description"]; ?>
                        </div>
                    </div>

                    <div class="block_media">
                        <div class="block_img">
                            <?php 
                                echo wp_get_attachment_image(
                                    $item["image"]["ID"] ,
                                    'full', 
                                    false, 
                                    [
                                        'alt' => $item["image"]["alt"], 
                                        'title' => $item["image"]["title"] 
                                    ]
                                );
                            ?>  
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
<?php

// echo do_shortcode('[wpforms id="73"]');
// echo do_shortcode('[social-icons]');

get_footer();

?>