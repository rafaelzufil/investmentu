<footer>
  <nav class="container-fluid py-4">
     <div class="row">
          <div class="container">
             <div class="row">
                <?php
                  wp_nav_menu(array(
                    'theme_location' => 'footer_navigation',
                    'depth' => 2,
                    'container' => 'false',
                    'menu_class' => 'nav mx-auto footer-nav',
                    'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                    'walker' => new wp_bootstrap_navwalker())
                  );
                ?>
              </div>
          </div>
      </div>
  </nav>
</footer>

<?php if (!(function_exists( 'is_amp_endpoint' ) && is_amp_endpoint())): ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>

    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('p:has(img.aligncenter)').addClass('aligncenter');

            $('[data-toggle=search-form]').click(function () {
                $('.navbar').toggleClass('mb-5');
                $('.search-form-wrapper').toggleClass('open');
                $('.search-form-wrapper .search').focus();
                $('html').toggleClass('search-form-open');
            });

            $('[data-toggle=search-form-close]').click(function () {
                $('.search-form-wrapper').removeClass('open');
                $('html').removeClass('search-form-open');
            });

            $('.search-form-wrapper .search').keypress(function (event) {
                if ($(this).val() == "Search") $(this).val("");
            });

            $('.search-close').click(function (event) {
                $('.search-form-wrapper').removeClass('open');
                $('html').removeClass('search-form-open');
            });

            // Homepage carousel
            $('.carousel .carousel-item').each(function(){
                var minPerSlide = 3;
                var next = $(this).next();
                if (!next.length) {
                    next = $(this).siblings(':first');
                }
                next.children(':first-child').clone().appendTo($(this));

                for (var i=0;i<minPerSlide;i++) {
                    next=next.next();
                    if (!next.length) {
                        next = $(this).siblings(':first');
                    }

                    next.children(':first-child').clone().appendTo($(this));
                }
            });
        });
    </script>
<?php else: ?>
    <amp-analytics type="newrelic" id="newrelic">
    <script type="application/json">
      {
        "vars": {
          "appId": "37639091",
          "licenseKey": "81c385adef09e912618c587afdc2a1ef5657eb7a"
        }
      }
    </script>
    </amp-analytics>
<?php endif; ?>
