<!-- MAKE THIS STICKY -->
<div class="col-12 col-md-4 sticky-top pb-5">
    <div class="sticky-top">
        <?php dynamic_sidebar('sidebar-primary'); ?>
        <?php

          $terms = json_decode(json_encode(get_the_tags()), true);

          $i = 0;

          foreach ($terms as $item) {

            if ($item['slug'] === 'test') {

              $zone = 11;

            }

            /*

            if ($item['slug'] === 'test') {

              echo '
                <div id="revive-1"></div>
                <script>
                  revive.display(1);
                </script>
              ';

            }

            if ($item['slug'] === 'test') {

              echo '
                <div id="revive-1"></div>
                <script>
                  revive.display(1);
                </script>
              ';

            }

            if ($item['slug'] === 'test') {

              echo '
                <div id="revive-1"></div>
                <script>
                  revive.display(1);
                </script>
              ';

            }

            if ($item['slug'] === 'test') {

              echo '
                <div id="revive-1"></div>
                <script>
                  revive.display(1);
                </script>
              ';

            }

            if ($item['slug'] === 'test') {

              echo '
                <div id="revive-1"></div>
                <script>
                  revive.display(1);
                </script>
              ';

            } */

            $i++;

          };

          revive_display( $zone );

         ?>

    </div>
</div>
