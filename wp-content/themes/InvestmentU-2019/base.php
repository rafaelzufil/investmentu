<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W57MZD"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <style type="text/css">
      .container ins center a img {
        width: 100%
      }
    </style>

    <!--[if IE]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
    <?php
      do_action('get_header');
      get_template_part('templates/header');
    ?>
    <!-- <div class="wrap container" role="document">
      <div class="content row">
        <main> -->
          <?php include Wrapper\template_path(); ?>
        <!-- </main>/.main -->
        <?php /*if (Setup\display_sidebar()) : ?>
          <aside class="sidebar">
            <?php include Wrapper\sidebar_path(); ?>
          </aside><!-- /.sidebar -->
        <?php endif;*/ ?>
      <!-- </div>/.content -->
    <!-- </div>/.wrap -->
    <?php
      do_action('get_footer');
      get_template_part('templates/footer');
      wp_footer();
    ?>

    <!-- WebP Image support for browsers not supporting it -->
    <script>
        (function(){var WebP=new Image();WebP.onload=WebP.onerror=function(){
            if(WebP.height!=2){var sc=document.createElement('script');sc.type='text/javascript';sc.async=true;
                var s=document.getElementsByTagName('script')[0];sc.src='<?php echo get_template_directory_uri() ?>/assets/scripts/webpjs-0.0.2.min.js';s.parentNode.insertBefore(sc,s);}};
            WebP.src='data:image/webp;base64,UklGRjoAAABXRUJQVlA4IC4AAACyAgCdASoCAAIALmk0mk0iIiIiIgBoSygABc6WWgAA/veff/0PP8bA//LwYAAA';})();
    </script>
  </body>
</html>
