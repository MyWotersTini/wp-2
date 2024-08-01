<?php 

get_header();

$title = get_the_title();
?>

    <div class="container">
        <div class="title">
            <h1>
                <?php echo $title; ?>
            </h1>
        </div>
    </div>
    <div class="content">
        <?php echo get_the_content(); ?>
    </div>
<?php
get_footer();

?>