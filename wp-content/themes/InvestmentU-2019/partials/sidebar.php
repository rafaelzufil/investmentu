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

              exit;

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

          }

          echo "
            <!-- Revive Adserver Asynchronous JS Tag - Generated with Revive Adserver v4.2.1 -->
            <ins
            data-revive-zoneid="11"
            data-revive-ct0="INSERT_ENCODED_CLICKURL_HERE"
            data-revive-block="1"
            data-revive-blockcampaign="1"
            data-revive-id="e381927fbe56d09bfb1b715794e5c109"></ins>
          ";

         ?>
         <script async src="https://ads.web.oxfordclub.com/www/delivery/asyncjs.php"></script>
    </div>
</div>
