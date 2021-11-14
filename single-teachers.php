<?php get_header(); ?>
<?php
$facebook_url = get_field('teacher_social')['teacher_facebook'];
$instagram_url = get_field('teacher_social')['teacher_instagram'];
$linkedin_url = get_field('teacher_social')['teacher_linkedin'];
?>

<div class="container">
    <h2 class="text-center mb-5"><?php echo the_title(); ?></h2>
    <div class="row w-100 justify-content-center">
        <div class="col-md-4">
            <?php if (has_post_thumbnail()) { ?>
                <img src="<?php echo the_post_thumbnail_url(); ?>" class="teacher-photo">
            <?php } ?>
        </div>
        <div class="col-md-8">
            <div class="teacher-info mb-5">
                <p class="text-left"><strong>Email: </strong><?php echo get_field('teacher-email'); ?></p>
                <hr>
                <p class="text-left"><strong>Τηλέφωνο: </strong><?php echo get_field('teacher-tel'); ?></p>
                <hr>
                <a target="_blank" href="<?php echo get_field('teacher_cv'); ?>" class="text-left cv-text">Βιογραφικό</a>
                <hr>
            </div>
            <div class="row socials-row w-100">
                <?php if ($facebook_url) { ?>
                    <div class="social-teacher">
                        <a href="<?php echo $facebook_url; ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    </div>
                <?php } ?>
                <?php if ($instagram_url) { ?>
                    <div class="social-teacher">
                        <a href="<?php echo $instagram_url; ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                    </div>
                <?php } ?>
                <?php if ($linkedin_url) { ?>
                    <div class="social-teacher">
                        <a href="<?php echo $linkedin_url; ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>