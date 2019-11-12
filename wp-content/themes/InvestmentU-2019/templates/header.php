

<!-- main nav -->
<?php // TODO: AMP: using <amp-script> to implement search form toggling behavior on AMP based pages ?>
<?php if (function_exists( 'is_amp_endpoint' ) && is_amp_endpoint()): ?>
<amp-script layout="container" src="<?php echo iu_site_url();?>/wp-content/themes/InvestmentU-2019/assets/scripts-amp/amp-search-form-v5.js">
<?php endif; ?>
<nav class="navbar navbar-expand-lg navbar-light nav-fill">
    <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>">
      <img src="<?php bloginfo('template_directory');?>/assets/images/logo.png" alt="Investment U" class="mx-auto my-3 img-fluid" id="logo">
    </a>
    <div class="d-lg-none nav-search nav-item" style="text-align: right; margin-right: 1rem; font-size: 1.55rem; ">

          <div class="navbar-form navbar-right">
              <a href="#search" class="search-form-trigger nav-link"  data-toggle="search-form" aria-label="Toggle search form">
                  <img src="/wp-content/themes/InvestmentU-2019/assets/images/icon-search.svg" class="search-icon" alt="Search" aria-hidden="true" style="max-width: 25px;">
              </a>
          </div>

    </div>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapse-nav"
      aria-controls="collapse-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="collapse-nav">

      <?php
        wp_nav_menu(array(
          'theme_location' => 'primary_navigation',
          'depth' => 2,
          'container' => 'false',
          'menu_class' => 'nav nav-links',
          'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
          'walker' => new wp_bootstrap_navwalker())
        );
      ?>
      <ul class="nav nav-social d-sm-none d-lg-flex">
        <li class="nav-item">
          <a class="nav-link" href="https://www.facebook.com/investmentu/" aria-label="Facebook">
              <img src="/wp-content/themes/InvestmentU-2019/assets/images/icon-facebook.svg" class="facebook-icon" alt="Facebook" style="max-width: 25px;">
          </a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#" aria-label="Twitter">
            <img src="/wp-content/themes/InvestmentU-2019/assets/images/icon-twitter.svg" class="twitter-icon" alt="Twitter" style="max-width: 25px;">
          </a>
        </li> -->
        <li class="nav-item d-none d-lg-inline-block">
          <div id="navbar" class="navbar-collapse collapse">
            <div class="hidden-xs navbar-form navbar-right">
                <a href="#search" class="search-form-trigger nav-link"  data-toggle="search-form" aria-label="Toggle search form">
                    <img src="/wp-content/themes/InvestmentU-2019/assets/images/icon-search.svg" class="search-icon" alt="Search"  style="max-width: 25px;">
                </a>
            </div>
          </div>
        </li>
      </ul>
    </div>

    <div class="search-form-wrapper col-lg-12">
      <?php get_search_form(); ?>
    </div>
  </nav>
<?php if (function_exists( 'is_amp_endpoint' ) && is_amp_endpoint()): ?>
</amp-script>
<?php endif; ?>

<?php

$terms = json_decode(json_encode(get_the_tags()), true);
$i = 0;

if ($terms && !is_front_page()) {

  foreach ($terms as $item) {

    if (strpos($item['slug'], 'zone') !== false) {
      $is_syndicated = 'true';
      break;
    }
  }
}

if ($is_syndicated !== 'true' && !isset($_COOKIE['INVESTME'])):

?>
  <!-- sticky signup form -->
  <div class="sticky-top container-fluid py-2" id="small-signup-form">
  <span id='close' class="d-block d-lg-none d-xl-none " style="float: right; cursor: pointer; color:#fff;" onclick='this.parentNode.parentNode.removeChild(this.parentNode); return false;'>x</span>
    <div class="row">
      <div class="container">
        <?php iu_revive_display( 1 ); ?>
      </div>
    </div>
  </div>

<?php else: ?>
  <hr style="color:#bdbdbd" class="my-0"/>
<?php endif; ?>