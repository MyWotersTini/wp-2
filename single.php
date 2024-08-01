<?php 

get_header();

$title      = get_the_title();
$post_id    = get_the_ID();
$image      = get_the_post_thumbnail_url($post_id);
$date       = date('M, j Y', strtotime(get_the_date()));
$author     = get_userdata(get_post_field('post_author', $post_id)); 
$author     = $author->data->user_nicename;
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
            <img 
                src="<?php echo $image?> " 
                alt="<?php echo $title?> "
                title="<?php echo $title?>"  
            >
        </div>
        <div class="content">
            <?php echo get_the_content(); ?>
        </div>
    </div>
<?php
get_footer();

?>