<?php
/**
* Template Name: Επικοινωνία
*
*/

get_header();
?>

<div class="container pb-5 d-flex flex-column align-items-center">
    <h2 class="text-center mb-5 pt-3"><?php echo the_title();?> </h2>
    <?php the_content();?>
</div>

<?php get_footer();?>
