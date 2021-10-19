<!DOCTYPE html>
<html <?php language_attributes();?>>

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v0.0.4/css/unicons.css">
<script src="https://kit.fontawesome.com/4b9ba14b0f.js" crossorigin="anonymous"></script>
<?php wp_head(); ?>
</head>

<?php 
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
    $image = $image[0];
    $tel = get_field('gramm_info','option')['tel_gramm'];
    ?>
<body <?php body_class();?>>
<?php do_action('wp_body_open');?>


<header>

  <div class="container-fluid">
    <div class="row rowheader">
      <div class="col-md-6">
        <div class="header-thl"><i class="fas fa-phone text-center mr-3"></i> <?php echo $tel;?> </div>
      </div>
      <div class="col-md-6 headericons">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
      </div>
    </div>
  </div>


    <nav class="navbar navbar-expand-lg navbar-light headersection">
        <div class="container">
          <div class="row">
            <a class="navbar-brand" href="<?php echo get_home_url();?>"><img class="header-logo" src="<?php echo $image;?>"></a>
            <a href="<?php echo get_home_url();?>" class="text-left mr-3 align-self-center headertext"> Πρόγραμμα Σπουδών <br> Μηχανικών Πληροφορικής Τ.Ε. </a>
          </div>  
            <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="<?php esc_attr('Toggle navigation','inf-uth');?>">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="row">
            <?php
              wp_nav_menu( array(
                'theme_location'  => 'header_menu',
                'depth'	          => 2, // 1 = no dropdowns, 2 = with dropdowns.
                'container'       => 'div',
                'container_class' => 'collapse navbar-collapse',
                'container_id'    => 'bs-example-navbar-collapse-1',
                'menu_class'      => 'navbar-nav mr-auto',
                'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                'walker'          => new WP_Bootstrap_Navwalker(),
              ) );
            ?>
            </div>
      </div>
    </nav>

</header>
<main>