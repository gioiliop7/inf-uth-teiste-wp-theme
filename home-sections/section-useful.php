<section id="useful-links">
    <div class="container">
        <h2 class="text-center pt-3 mb-5"> ΧΡΗΣΙΜΟΙ ΣΥΝΔΕΣΜΟΙ </h2>
        <div class="row w-100 justify-content-center mb-5">
            <?php
        // check if the repeater field has rows of data
  if( have_rows('useful_links', 'option') ):

    // loop through the rows of data
      while ( have_rows('useful_links', 'option') ) : the_row();

          // display a sub field value
          ?>
          <div class="col-md-3 useful-links text-center mx-auto">
            <a href="<?php the_sub_field('link', 'option'); ?>" target="_blank">
              <img src="<?php the_sub_field('link_photo', 'option'); ?>" title="<?php the_sub_field('link_title', 'option'); ?>" style="background-color: #fff;">
            </a>
          </div>
          <?php

      endwhile;
  endif;

  ?>
        </div>
    </div>
</section>