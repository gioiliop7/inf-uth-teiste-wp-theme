<?php get_header();?>
<div class="container mt-3">
    <div class="container subjectbox mb-3">
        <h2 class="text-center pb-5 pt-3"> <?php echo get_the_title();?> </h2>
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <p> Εξάμηνο </p>
            </div>
            <div class="col-md-6 text-center">
                <p> <?php echo get_field("examino");?></p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <p> Διδακτικές Μονάδες </p>
            </div>
            <div class="col-md-6 text-center">
                <p> <?php echo get_field("ects");?></p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <p> Εργαστήριο </p>
            </div>
            <div class="col-md-6 text-center">
                <?php if (get_field("ergasthrio") == true){ ?>
                    <p> Ναι </p>
                <?php }else{ ?>
                    <p> Όχι </p>
                <?php } ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <p> Κατέυθυνση </p>
            </div>
            <div class="col-md-6 text-center">
                <p> <?php echo get_field("kateuthinsi");?></p>
            </div>
        </div>
    </div>
    <div class="mb-5"><?php echo the_content();?></div>
</div>
<?php get_footer();?>