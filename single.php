<?php get_header();?>

<div class="container-fluid text-center pt-3 pb-5">
    <h2 class="post_title pb-5"> <?php echo get_the_title(); ?></h2>
    <h6> <?php echo the_time('F j, Y G:i');?> </h6>
</div>

<div class="container">

    <div class="post-content mb-5">
        <?php echo the_content();?>
    </div>

</div>

<?php get_footer();?>

