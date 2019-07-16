<!-- <header class="banner">
  <div class="container">
  <?php /* ?>
    <a class="brand" href="<?= esc_url(home_url('/')); ?>"><img class="main-logo" src="<?php echo get_home_url() . '/wp-content/themes/' . get_template(); ?>/assets/images/logo.png" style="width: 150px;" /></a>
    <nav class="nav-primary float-right">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
      endif; */
      ?>
      <br />
      <span style="margin-right: 30px; color: #fff;"><strong>My Profile</strong></span><span style="color: #fff"><strong>Sign Out</strong></span>
    </nav>
  </div>
</header> -->

<!-- main nav -->
<!-- main nav -->
<nav class="navbar navbar-expand-lg navbar-light nav-fill">
    <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>">
      <img src="<?php bloginfo('template_directory');?>/assets/images/logo.png" alt="Investment U" class="mx-auto my-3 img-fluid" id="logo">
    </a>
    <ul class="nav nav-social d-none d-sm-flex d-lg-none">
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fab fa-facebook-square"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fab fa-youtube"></i></a>
      </li>
      <li class="nav-item d-none d-lg-inline-block">
        <!-- <i class="nav-link" href="#"><i class="fas fa-search"></i></a> -->
        <div id="navbar" class="navbar-collapse collapse">
          <div class="hidden-xs navbar-form navbar-right">
              <a href="#search" class="search-form-tigger nav-link"  data-toggle="search-form"><i class="fa fa-search" aria-hidden="true"></i></a>
          </div>
        </div>
      </li>
      <div id="top-search">
        
      </div>
    </ul>

    <div class="d-lg-none nav-search nav-item" style="text-align: right; margin-right: 1rem; font-size: 1.55rem; ">
      <a href="#" class="nav-link"><i class="fas fa-search"></i></a>
    </div>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapse-nav"
      aria-controls="collapse-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="collapse-nav">
    
      <?php
        wp_nav_menu(array(
          'theme_location' => 'primary_navigation',
          'depth' => 2,
          'container' => 'false',
          'menu_class' => 'nav nav-links',
          'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
          'walker' => new wp_bootstrap_navwalker())
        );
      ?>
      <ul class="nav nav-social d-sm-none d-lg-flex">
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fab fa-facebook-square"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fab fa-youtube"></i></a>
        </li>
        <li class="nav-item d-none d-lg-inline-block">
          <!-- <i class="nav-link" href="#"><i class="fas fa-search"></i></a> -->
          <div id="navbar" class="navbar-collapse collapse">
            <div class="hidden-xs navbar-form navbar-right">
                <a href="#search" class="search-form-tigger nav-link"  data-toggle="search-form"><i class="fa fa-search" aria-hidden="true"></i></a>
            </div>
          </div>
        </li>
      </ul>
    </div> 
    <div class="search-form-wrapper">
      <!-- <form class="search-form" id="" action="">
          <div class="input-group">
            <input type="text" name="search" class="search form-control" placeholder="Search">
            <span class="input-group-addon" id="basic-addon2"><i class="fa fa-search" aria-hidden="true"></i>
            </span>
            <span class="input-group-addon search-close" id="basic-addon2"><i class="fa fa-window-close" aria-hidden="true"></i>
            </span>
          </div>
      </form> -->
      <?php get_search_form(); ?>
    </div>
  </nav>
  
  

  <!-- sticky signup form -->
  <div class="sticky-top container-fluid py-2" id="small-signup-form">
    <div class="row">
      <div class="container">
        <form class="row justify-content-center form-inline my-2 my-md-0">
          <p class="p-0 m-0 pr-4">
            <strong>
              Sign up for this sheeeesh kebab.
            </strong>
          </p>
          <input class="form-control col-11 col-md-6 col-lg-5" type="text" placeholder="Email">
          <input class="form-control col-1 btn-default" type="submit" value="&#xbb;">
        </form>
      </div>
    </div>
  </div>
  