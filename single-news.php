<?php 

get_header();

$title = get_the_title();
$news_name = get_field('news_head');
?>

    <div class="container">
        <div class="title">
            <h1>
                <?php echo $title; ?>
            </h1>
        </div>
    </div>
    <div class="content">
        <div class="content-main">
            <?php the_content(); ?>
        </div>
        <div class="content-aside">
            <h3><?php echo $news_name; ?></h3>
            <?php get_template_part('parts/news', 'aside', ['post_id' => get_the_ID()]) ?>
        </div>
    </div>
<?php
get_footer();

?>