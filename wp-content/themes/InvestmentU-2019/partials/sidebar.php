<!-- MAKE THIS STICKY -->
<div class="col-12 col-md-4 sticky-top pb-5">
    <div class="sticky-top">
        <h5 class="pb-2" style="border-bottom: 1px solid #d3d3d3;font-weight: bold;">Popular Posts</h5>
        <nav class="nav-primary ">
        <?php
            if (has_nav_menu('sidebar_navigation')) :
                wp_nav_menu(['theme_location' => 'sidebar_navigation', 'menu_class' => 'h-popular-posts p-0 mb-4']);
            endif; 
            ?>
        </nav>
        <?php dynamic_sidebar('sidebar-primary'); ?>
        <?php

          $zone = revive_zone('sidebar');
          revive_display( $zone );

         ?>

    </div>
</div>
