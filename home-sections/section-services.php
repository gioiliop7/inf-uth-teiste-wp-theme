<section id="services">
   <div class="container">
      <h2 class="text-center pt-3 "> ΗΛΕΚΤΡΟΝΙΚΕΣ ΥΠΗΡΕΣΙΕΣ </h2>
      <h5 class="text-center mb-5"> Όλες οι ηλεκτρονικές υπηρεσίες, διαθέσιμες για τους φοιτητές!</h5>
      <div class="row justify-content-center">
         <?php

         // Check rows exists.
         if (have_rows('services','option')) :

            // Loop through rows.
            while (have_rows('services','option')) : the_row();

               // Load sub field value.
               $title = get_sub_field('service_title');
               $link = get_sub_field('service_link');
               $icon = get_sub_field('icon');
         ?>
               <div class="col-md-3 service-item text-center mb-3">
                  <a href="<?php echo $link;?>" target="blank">
                     <div class="service-icon"><?php echo $icon;?></div>
                     <h2 class="service-text"> <?php echo $title;?> </h2>
                  </a>
               </div>
         <?php
            // End loop.
            endwhile;
         // Do something...
         endif;
         ?>

      </div>
   </div>
</section>