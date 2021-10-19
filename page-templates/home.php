<?php
/**
* Template Name: Main Page
*
*/

get_header();
?>



<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>
<?php get_template_part('home-sections/section','hero'); ?>
<?php get_template_part('home-sections/section','boxes'); ?>
<?php get_template_part('home-sections/section','info'); ?>
<?php get_template_part('home-sections/section','photos'); ?>
<?php get_template_part('home-sections/section','announcements'); ?>
<?php get_template_part('home-sections/section','numbers'); ?>
<?php get_template_part('home-sections/section','calendar'); ?>
<?php get_template_part('home-sections/section','services'); ?>
<?php get_template_part('home-sections/section','contact'); ?>
<?php get_template_part('home-sections/section','useful'); ?>



<?php get_footer();?>
