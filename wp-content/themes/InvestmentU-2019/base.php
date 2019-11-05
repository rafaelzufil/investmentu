<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>
<?php if (is_gtm_enabled()): ?>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo get_gtm_code() ?>"
                      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
<?php endif ?>

<?php // AMP: OPENING <amp-script> ?>
<?php // TODO: AMP: Quick & Temporary Solution!!! ?>
<?php // TODO: AMP: needs to be revised (possibly removing Bootsrap and jQuery dependencies (plus implementing same functionality with Vanilla JS) ?>
<?php // TODO: AMP: Minified & combined JS for AMP-based pages containing the following: ?>
<?php // TODO: AMP: jquery / Bootstrap JS / Bootstrap plugins(utils.js, carousel.js, modal.js) + email-validation.js + custom javascript ?>
<?php if (function_exists( 'is_amp_endpoint' ) && is_amp_endpoint()): ?>
<amp-script layout="container" src="<?php echo iu_site_url();?>/wp-content/themes/InvestmentU-2019/assets/scripts/iu-amp.js">
    <?php endif; ?>

    <?php if (!(function_exists( 'is_amp_endpoint' ) && is_amp_endpoint())): ?>
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

    <?php // AMP: CLOSING <amp-script> ?>
    <?php if (function_exists( 'is_amp_endpoint' ) && is_amp_endpoint()): ?>
</amp-script>
<?php endif; ?>
</body>
</html>
