<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

<?php if (!(function_exists( 'is_amp_endpoint' ) && is_amp_endpoint())): ?>
  <?php if (is_gtm_enabled()): ?>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo get_gtm_code() ?>"
                      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
  <?php endif ?>
<?php else: ?>
    <?php // AMP: Conditional HTML comments are not allowed in AMP so this will only work on non-AMP pages ?>
    <!--[if IE]>
    <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
    </div>
    <![endif]-->
<?php endif; ?>

<?php
do_action('get_header');
get_template_part('templates/header');
?>
<?php if (function_exists( 'is_amp_endpoint' ) && is_amp_endpoint()): ?>
  <amp-analytics type="newrelic" id="newrelic">
  <script type="application/json">
    {
      "vars": {
        "appId": "<?php echo get_field('new_relic_app_id', 'option'); ?>",
        "licenseKey": "<?php echo get_field('new_relic_license_key', 'option'); ?>"
      }
    }
  </script>
  </amp-analytics>
<?php endif; ?>
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
</body>
</html>