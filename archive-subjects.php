<?php get_header();
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'post_type' => 'subjects',
    'posts_per_page' => 6,
    'paged' => $paged
);

$subjects = new WP_Query($args); ?>

<div class="container pb-5 text-center">
    <h2 class="pb-5"> Πρόγραμμα σπουδών </h2>
    <div class="row mb-5 w-100 inputs-row">
        <form id="forms" class="col w-100 form-control">
            <label for="subjectsname">Μάθημα</label>
            <input type="text" id="subjectsname" name="subjectsname">
            <form id="forms" class="col w-100 form-control">
                <label for="semester">Εξάμηνο</label>
                <select name="semester" id="semester">
                    <option selected disabled>Κανένα</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                </select>
                <label for="kat">Κατεύθυνση</label>
                <select name="kat" id="kat">
                    <option selected disabled>Κανένα</option>
                    <option value="Γενικής Παιδείας">Γενικής Παιδείας</option>
                    <option value="Μηχανικοί Δικτύων">Μηχανικοί Δικτύων</option>
                    <option value="Μηχανικοί Λογισμικού">Μηχανικοί Λογισμικού</option>
                    <option value="Μηχανικοί Υλικού">Μηχανικοί Υλικού</option>
                </select>
            </form>
    </div>
    <button id="clearbutton" class="mb-5">Καθαρισμός φίλτρων</button>
    <div class="row justify-content-center content-row">
        <?php
        if ($subjects->have_posts()) {
            while ($subjects->have_posts()) {
                $subjects->the_post(); ?>
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
            <?php }
        } else { ?>
            <div class="mt-3 text-center">
                <p> Δεν υπάρχουν καταχωρημένα στοιχεία με τα συγκεκριμένα κριτήρια </p>
            </div>
        <?php  }
        /* Restore original Post Data */
        wp_reset_postdata();
        ?>
    </div>
</div>


<div class="container-fluid pb-5 text-center">
    <div class="row justify-content-center">
        <div class="pagination">
            <?php
            $big = 999999999; // an unlikely integer
            echo paginate_links(array(
                'base'            => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format'          => '?paged=%#%', # or '/page/%#%'
                'current'         => max(1, get_query_var('paged')),
                'total'           => $subjects->max_num_pages,
                'prev_text'       => __('<span class="meta-nav">&larr;</span> Προηγούμενη', 'inf-uth'),
                'next_text'       => __('Επόμενη <span class="meta-nav">&rarr;</span>', 'inf-uth'),
            ));
            ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>