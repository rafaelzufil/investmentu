<!-- other links section -->
<div class="container py-4" id="section05">
<h3>Populat Posts</h3>
    <div class="row">
        <div class="col-12 col-sm-6 col-lg-3">
            <nav class="nav-primary ">
                <?php
                if (has_nav_menu('col1_navigation')) :
                    wp_nav_menu(['theme_location' => 'col1_navigation', 'menu_class' => 'home-links']);
                endif; 
                ?>
            </nav>
        </div>
        <div class="col-12 col-sm-6 col-lg-3 d-none d-md-block">
            <nav class="nav-primary ">
                <?php
                if (has_nav_menu('col2_navigation')) :
                    wp_nav_menu(['theme_location' => 'col2_navigation', 'menu_class' => 'home-links']);
                endif; 
                ?>
            </nav>
        </div>
        <div class="col-12 col-sm-6 col-lg-3 d-none d-lg-block">
            <nav class="nav-primary ">
                <?php
                if (has_nav_menu('col3_navigation')) :
                    wp_nav_menu(['theme_location' => 'col3_navigation', 'menu_class' => 'home-links']);
                endif; 
                ?>
            </nav>
        </div>
        <div class="col-12 col-sm-6 col-lg-3 d-none d-lg-block">
            <nav class="nav-primary">
                <?php
                if (has_nav_menu('col4_navigation')) :
                    wp_nav_menu(['theme_location' => 'col4_navigation', 'menu_class' => 'home-links']);
                endif; 
                ?>
            </nav>
        </div>
    </div>
</div>