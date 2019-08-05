<header class="banner">
  <div class="container">
    <a class="brand" href="<?= esc_url(home_url('/')); ?>"><img class="main-logo" src="<?php echo get_home_url() . '/wp-content/themes/' . get_template(); ?>/assets/images/logo.png" style="width: 150px;" /></a>
    <nav class="nav-primary float-right">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
      endif;
      ?>
      <br />
      <span style="margin-right: 30px; color: #fff;"><strong>My Profile</strong></span><span style="color: #fff"><strong>Sign Out</strong></span>
    </nav>
  </div>
</header>
