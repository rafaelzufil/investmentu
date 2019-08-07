<div class="col-12 col-lg-3 d-none d-md-none d-lg-block" id="sidebar-banner-ad">

  <?php
    if (!isset($_COOKIE['INVESTME'])) { 
        $zone = revive_zone('home-native');
        revive_display( $zone );
    } else {
  ?>
    <h5 class="p-blue m-0 pb-2" style="border-bottom: 1px solid #d3d3d3;">Popular Posts</h5>

    <nav class="nav-primary ">
        <?php
        if (has_nav_menu('sidebar_navigation')) :
            wp_nav_menu(['theme_location' => 'sidebar_navigation', 'menu_class' => 'h-popular-posts p-0']);
        endif;
        ?>
    </nav>
  <?php } ?>
</div>
<div class="col-md-12 d-block d-md-block d-lg-none pt-4" id="sidebar-banner-ad">
  <?php revive_display( 2 ); ?>
</div>
