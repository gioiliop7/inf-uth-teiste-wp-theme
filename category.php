<?php echo get_header();
$queried_obj = get_queried_object();
$cat_title = $queried_obj->name;
$cat_slug = $queried_obj->slug;
?>

<div class="container-fluid text-center pt-3 pb-5">
    <h2 class="post_title pb-3"> <?php echo $cat_title; ?></h2>
</div>

<?php
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args = array(
    'category_name' => $cat_slug,
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_page' => 6,
    'paged' => $paged
); ?>
<div class="container pt-3 pb-5">
    <?php
    // the query
    $announcements = new WP_Query($args); ?>

    <?php if ($announcements->have_posts()) : ?>


        <!-- the loop -->

        <div class="row announncements-row">
            <?php while ($announcements->have_posts()) :
                $announcements->the_post(); ?>
                <?php $title = get_the_title(); ?>

                <div class="col-md-4 announcementsbox mr-3">
                    <div class="row justify-content-center">
                        <div class="announcements-date">
                            <p> <?php echo the_date(); ?></p>
                        </div>
                    </div>
                    <div class="announcements-title">
                        <?php if (strlen($title) > 115) { ?>
                            <h6> <?php echo wp_trim_words($title, 6); ?> </h6>
                        <?php } else { ?>
                            <h6> <?php echo $title; ?> </h6>
                        <?php } ?>
                    </div>
                    <div class="more">
                        <a href="<?php echo get_permalink($announcements->ID); ?>"> Περισσότερα >> </a>
                    </div>
                </div>

            <?php
            endwhile; ?>
        </div>

        <!-- end of the loop -->

        <?php wp_reset_postdata(); ?>

    <?php
    else : ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php
    endif; ?>

    <div class="container-fluid mt-5 text-center">
        <div class="row justify-content-center">
            <div class="pagination">
                <?php
                $big = 999999999; // an unlikely integer
                echo paginate_links(array(
                    'base'            => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                    'format'          => '?paged=%#%', # or '/page/%#%'
                    'current'         => max(1, get_query_var('paged')),
                    'total'           => $announcements->max_num_pages,
                    'prev_text'       => __('<span class="meta-nav">&larr;</span> Προηγούμενη', 'inf-uth'),
                    'next_text'       => __('Επόμενη <span class="meta-nav">&rarr;</span>', 'inf-uth'),
                ));
                ?>
            </div>
        </div>
    </div>

    <?php echo get_footer(); ?>