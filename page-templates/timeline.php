<?php
/**
* Template Name: Timeline
*
*/

get_header();
?>

<div class="container pt-5 pb-5">
<h2 class="timeline-title text-center"><?php echo the_title();?> </h2>

<?php
        // check if the repeater field has rows of data
  if( have_rows('timeline', 'option') ):

    // loop through the rows of data
      while ( have_rows('timeline', 'option') ) : the_row();

          // display a sub field value
          ?>


  <div class="timeline">
    <div class="timeline__group">
      <span class="timeline__year time" aria-hidden="true"><?php the_sub_field('timeline_date', 'option'); ?></span>
      <div class="timeline__cards">
        <div class="timeline__card card">
          <div class="card__content">
            <p><?php the_sub_field('event', 'option'); ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>


          <?php

      endwhile;
  endif;

  ?>

</div>




<style>
    .r-title{
  margin-top: var(--rTitleMarginTop, 0) !important;
  margin-bottom: var(--rTitleMarginBottom, 0) !important;
}


p:not([class]){
  line-height: var(--cssTypographyLineHeight, 1.78);
  margin-top: var(--cssTypographyBasicMargin, 1em);
  margin-bottom: 0;
}

p:not([class]):first-child{
  margin-top: 0;
}


.text{
  display: var(--textDisplay, inline-flex);
  font-size: var(--textFontSize, 1rem);  
}


.time{
  display: var(--timeDisplay, inline-flex);
}

.time__month{
  margin-left: var(--timelineMounthMarginLeft, .25em);
}

.time{
  padding: var(--timePadding, .25rem 1.25rem .25rem);
  background-color: var(--timeBackgroundColor, #f0f0f0);

  font-size: var(--timeFontSize, 15px);
  font-weight: var(--timeFontWeight, 700);
  text-transform: var(--timeTextTransform, uppercase);
  color: var(--timeColor, currentColor);
}


.card{
  padding: var(--timelineCardPadding, 1.5rem 1.5rem 1.25rem);
}

.card{
  border-radius: var(--timelineCardBorderRadius, 2px);
  border-left: var(--timelineCardBorderLeftWidth, 3px) solid var(--timelineCardBorderLeftColor, var(--uiTimelineMainColor));
  box-shadow: var(--timelineCardBoxShadow, 0 1px 3px 0 rgba(0, 0, 0, .12), 0 1px 2px 0 rgba(0, 0, 0, .24));
  background-color: var(--timelineCardBackgroundColor, #fff);
}

.card__title{
  --rTitleMarginTop: var(--cardTitleMarginTop, 1rem);
  font-size: var(--cardTitleFontSize, 1.25rem);
}


.timeline{
  display: var(--timelineDisplay, grid);
  grid-row-gap: var(--timelineGroupsGap, 2rem);
}

.timeline__year{
  margin-bottom: 1.25rem; /* 1 */
}

.timeline__cards{
  display: var(--timeloneCardsDisplay, grid);
  grid-row-gap: var(--timeloneCardsGap, 1.5rem);
}

.timeline{
  --uiTimelineMainColor: var(--timelineMainColor, #222);
  --uiTimelineSecondaryColor: var(--timelineSecondaryColor, #fff);

  border-left: var(--timelineLineWidth, 3px) solid var(--timelineLineBackgroundColor, var(--uiTimelineMainColor));
  padding-top: 1rem;
  padding-bottom: 1.5rem;
}

.timeline__year{
  --timePadding: var(--timelineYearPadding, .5rem 1.5rem);
  --timeColor: var(--uiTimelineSecondaryColor);
  --timeBackgroundColor: var(--uiTimelineMainColor);
  --timeFontWeight: var(--timelineYearFontWeight, 400);
}

.timeline__card{
  position: relative;
  margin-left: var(--timelineCardLineGap, 1rem);
}

.timeline__cards{
  overflow: hidden;
  padding-top: .25rem; /* 1 */
  padding-bottom: .25rem; /* 1 */
}

.timeline__card::before{
  content: "";
  width: 100%;
  height: var(--timelineCardLineWidth, 2px);
  background-color: var(--timelineCardLineBackgroundColor, var(--uiTimelineMainColor));

  position: absolute;
  top: var(--timelineCardLineTop, 1rem);
  left: -50%;
  z-index: -1;
}

.timeline{
  --timelineMainColor: #8c2a00;
}

</style>

<?php get_footer();?>