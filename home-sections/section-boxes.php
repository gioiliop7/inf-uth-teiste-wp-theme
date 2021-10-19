<section id="section-boxes">
<div class="container box-wrapper">
    <div class="row justify-content-center text-center">
        
    <?php 
    if(have_rows('front_boxes','option')):
        while(have_rows('front_boxes','option')) : the_row(); 
            $icon = get_sub_field('front_box_icon'); //returns <i> of font-awesome
            $name = get_sub_field('front_box_name');
            $url = get_sub_field('front_box_url');
    ?>
    <a class="mr-3" href="<?php echo $url;?>" target="_blank">
        <div class="col boxes ">
            <div class="box-icon"> <?php echo $icon;?> </div>
            <div class="box-name"> <?php echo $name;?> </div>
        </div>
    </a>
    <?php
    endwhile;
    endif;
    ?>
 
    </div>
</div>
</section>