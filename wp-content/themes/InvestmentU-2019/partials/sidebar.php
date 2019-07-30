<!-- MAKE THIS STICKY -->
<div class="col-12 col-md-4 sticky-top pb-5">
    <div class="sticky-top">
        <?php dynamic_sidebar('sidebar-primary'); ?>
        <?php

          $terms = json_decode(json_encode(get_the_tags()), true);

          $i = 0;

          foreach ($terms as $item) {
            if ($item['slug'] === 'wealthy-retirement') {
              $zone = 11;
              break;
            }
            if ($item['slug'] === 'liberty-through-wealth') {
              $zone = 12;
              break;
            }
            if ($item['slug'] === 'early-investing') {
              $zone = 13;
              break;
            }
            if ($item['slug'] === 'manward-digest') {
              $zone = 14;
              break;
            }
            if ($item['slug'] === 'trade-of-the-day') {
              $zone = 15;
              break;
            }
            if ($item['slug'] === 'profit-trends') {
              $zone = 16;
              break;
            }
            $i++;
          };

          if (!isset($zone)) {
            $zone = 18;
          }

          revive_display( $zone );

         ?>

    </div>
</div>
