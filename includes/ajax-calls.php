<?php

function title_filter($where, &$wp_query)
{
    global $wpdb;
    if ($search_term = $wp_query->get('search_subject_title')) {
        $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'%' . esc_sql(like_escape($search_term)) . '%\'';
    }
    return $where;
}

function ajax_subjects()
{
    $subjects = (isset($_POST['subjects']) ? $_POST['subjects'] : '');
    $examino = (isset($_POST['examino']) ? $_POST['examino'] : '');
    $kateuthinsi = (isset($_POST['kateuthinsi']) ? $_POST['kateuthinsi'] : '');
    $original_paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $paged = (isset($_POST['paged']) ? $_POST['paged'] : $original_paged);

    $number_of_posts = 6;

    if (empty($examino) && !empty($subjects) && !empty($kateuthinsi)) { //it works
        $args = array(
            'post_type' => 'subjects',
            'posts_per_page' => $number_of_posts,
            'paged' => $paged,
            'search_subject_title' => $subjects,
            'post_status' => 'publish',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'kateuthinsi',
                    'value' => $kateuthinsi,
                    'compare' => 'LIKE',
                ),
            ),
        );
    } elseif (!empty($examino) && empty($subjects) && empty($kateuthinsi)) {
        $args = array(
            'post_type' => 'subjects',
            'posts_per_page' => $number_of_posts,
            'paged' => $paged,
            'post_status' => 'publish',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'examino',
                    'value' => $examino,
                    'compare' => '=',
                    'type' => 'numeric'
                ),
            ),
        );
    } elseif (empty($examino) && empty($kateuthinsi) && empty($subjects)) {
        $args = array(
            'post_type' => 'subjects',
            'posts_per_page' => $number_of_posts,
            'paged' => $paged
        );
    } elseif (!empty($examino) && !empty($kateuthinsi) && !empty($subjects)) {
        $args = array(
            'post_type' => 'subjects',
            'posts_per_page' => $number_of_posts,
            'paged' => $paged,
            'search_subject_title' => $subjects,
            'post_status' => 'publish',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'examino',
                    'value' => $examino,
                    'compare' => '=',
                    'type' => 'NUMERIC'
                ),
                array(
                    'key' => 'kateuthinsi',
                    'value' => $kateuthinsi,
                    'compare' => 'LIKE',
                ),
            ),
        );
    } elseif (empty($examino) && empty($kateuthinsi) && !empty($subjects)) {
        $args = array(
            'post_type' => 'subjects',
            'posts_per_page' => $number_of_posts,
            'paged' => $paged,
            'search_subject_title' => $subjects
        );
    } elseif (empty($examino) && !empty($kateuthinsi) && empty($subjects)) {
        $args = array(
            'post_type' => 'subjects',
            'posts_per_page' => $number_of_posts,
            'paged' => $paged,
            'post_status' => 'publish',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'kateuthinsi',
                    'value' => $kateuthinsi,
                    'compare' => 'LIKE',
                ),
            ),
        );
    } elseif (!empty($examino) && empty($kateuthinsi) && !empty($subjects)) {
        $args = array(
            'post_type' => 'subjects',
            'posts_per_page' => $number_of_posts,
            'paged' => $paged,
            'search_subject_title' => $subjects,
            'post_status' => 'publish',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'examino',
                    'value' => $examino,
                    'compare' => '=',
                    'type' => 'NUMERIC'
                ),
            ),
        );
    } elseif (!empty($examino) && !empty($kateuthinsi) && empty($subjects)) {
        $args = array(
            'post_type' => 'subjects',
            'posts_per_page' => $number_of_posts,
            'paged' => $paged,
            'post_status' => 'publish',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'examino',
                    'value' => $examino,
                    'compare' => '=',
                    'type' => 'NUMERIC'
                ),
                array(
                    'key' => 'kateuthinsi',
                    'value' => $kateuthinsi,
                    'compare' => 'LIKE',
                ),
            ),
        );
    }

    add_filter('posts_where', 'title_filter', 10, 2);
    $ajaxsubjects = new WP_Query($args);
    remove_filter('posts_where', 'title_filter', 10, 2);

    // Check that we have query results.
    if ($ajaxsubjects->have_posts()) {
        ob_start();

        // Start looping over the query results.
        while ($ajaxsubjects->have_posts()) {

            $ajaxsubjects->the_post(); ?>

            <div class="col-md-3 subject-box mr-3 mb-3">
                <a href="<?php echo get_the_permalink(); ?>">
                    <div class="subject-title mb-3">
                        <h5> <?php echo the_title(); ?> </h5>
                    </div>
                </a>
                <div class="row flex-column">
                    <div class="examino"><strong>Εξάμηνο</strong>: <?php echo get_field('examino'); ?></div>
                    <div class="kateuthinsi"><strong>Κατέυθυνση</strong>: <?php echo get_field('kateuthinsi'); ?></div>
                    <div class="ects"><strong>ECTS</strong>: <?php echo get_field('ects'); ?></div>
                </div>
            </div>

        <?php
        }
    } else { ?>
        <div class="mt-3 text-center">
            <p> Δεν υπάρχουν καταχωρημένα στοιχεία με τα συγκεκριμένα κριτήρια </p>
        </div>
<?php }
    $content = ob_get_contents();

    ob_end_clean();



    // Restore original post data.
    wp_reset_postdata();

    $big = 999999999; // an unlikely integer
    ob_start();
    echo paginate_links(array(
        'base'            => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format'          => '?paged=%#%', # or '/page/%#%'
        'current'         => max(1, $paged),
        'total'           => $ajaxsubjects->max_num_pages,
        'prev_text'       => __('<span class="meta-nav">&larr;</span> Προηγούμενη', 'inf-uth'),
        'next_text'       => __('Επόμενη <span class="meta-nav">&rarr;</span>', 'inf-uth'),
    ));
    $pagination = ob_get_contents();
    ob_end_clean();


    wp_send_json_success(array('content' => $content, 'pagination' => $pagination));
}

add_action('wp_ajax_subjects', 'ajax_subjects');
add_action('wp_ajax_nopriv_subjects', 'ajax_subjects');
