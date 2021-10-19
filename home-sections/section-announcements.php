<section id="announcements">

<?php
$args = array(
    'category_name' => 'announcements',
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_page' => '4'
); ?>
 <div class="container pt-3 pb-5">
    <h2 class="text-center pb-3 pt-3"> ΑΝΑΚΟΙΝΩΣΕΙΣ </h2>
    <?php
// the query
$announcements = new WP_Query($args); ?>
    
    <?php if ($announcements->have_posts()): ?>
    
    
        <!-- the loop -->
    
        <div class="row">
        <?php while ($announcements->have_posts()):
        $announcements->the_post(); ?>
        <?php $title = get_the_title();?>

                <div class="col announcementsbox mr-3">
                    <div class="row justify-content-center">
                        <div class="announcements-date">
                            <p> <?php echo the_date(); ?></p>
                        </div>  
                    </div>
                    <div class="announcements-title">
                        <?php if(strlen($title)>115){?>
                            <h6> <?php echo wp_trim_words($title,6);?> </h6>
                        <?php }else{ ?>
                            <h6> <?php echo $title;?> </h6>
                        <?php } ?>
                    </div>
                    <div class="more">
                        <a href="<?php echo get_permalink($announcements->ID);?>"> Περισσότερα >> </a>
                    </div>
                </div>
           
        <?php
    endwhile; ?>
    </div> 

        <!-- end of the loop -->
        
        <?php wp_reset_postdata(); ?>
    
    <?php
else: ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php
endif; ?>


<div class="row justify-content-center mt-5">
<a href="#" class="more-button-announcements">
    ΠΕΡΙΣΣΟΤΕΡΑ
</a>
</div>

</div>



</section>
