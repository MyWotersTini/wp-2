<?php 
/* Template Name: Contact Page
*/


get_header();

$title = get_the_title();
?>

    <div class="container">
        <div class="title">
            <h1>
                <?php echo $title; ?>
            </h1>
        </div>
        <hr>
        <hr>
        <div class="content">
            <?php the_content(); ?>
        </div>
    </div>
<?php
get_footer();

?>