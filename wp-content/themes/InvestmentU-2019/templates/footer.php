<!-- <footer class="content-info">
  <div class="container">
    &copy; <?php echo date('Y'); ?> Monument Traders Alliance, LLC
    <?php dynamic_sidebar('sidebar-footer'); ?>
  </div>
</footer> -->
<!-- <footer>
  <nav class="container-fluid py-4">
    <ul class="nav justify-content-center">
      <li class="nav-item">
        <a class="nav-link" href="#">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Disclaimer</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">FAQ</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pivacy Policy</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Whitelist</a>
      </li>
    </ul>
  </nav>
</footer>-->
<footer>
  <nav class="container-fluid py-4">
     <div class="row">
          <div class="container">
             <div class="row">
                <!-- <ul class="nav mx-auto footer-nav">
                    <li class="nav-item">
                      <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Disclaimer</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">FAQ</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Pivacy Policy</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Whitelist</a>
                    </li>
                </ul> -->
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

<!-- Optional Bootstrap JavaScript | jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous">
</script>
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
  integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script> -->

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

<script>
// Homepage Author Carousel
<?php
// more details about how to properly add jQuery code in WP templates here: https://digwp.com/2011/09/using-instead-of-jquery-in-wordpress/
?>
(function($) {
//    $('#myCarousel').carousel({
//   interval: 10000
// })

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
}) (jQuery);
</script>
