<?php

/*
  Plugin Name: Revive Variable Plugin
  Description: Pass Data back to Revive for ad serving.
  Plugin URI: //github.com/PaidSites.com
  Author: Joseph Hill
  Author URI: //github.com/PaidSites.com
  Version: 1.0
 */

 function enqueue_js() {
   wp_enqueue_script( 'revive-js', plugins_url() . '/' . basename(__DIR__)  . '/js/revive.js', array( 'jquery' ), null, false );
 }
 add_action('wp_enqueue_scripts', 'enqueue_js');

function revive_display( $zone ) {

  $post_id = get_the_ID();
  $author_id = get_post_field( 'post_author', $post_id );
  $post_author = get_the_author_meta( 'display_name', $author_id );
  $source = isset($_COOKIE['referral_source']) ? $_COOKIE['referral_source'] : null;
  if (get_the_category()  !== false) {
    $all_categories = '';
    $categories = json_decode(json_encode(get_the_category()), true);
    $i = 0;
    foreach ($categories as $item) {
      if ($i > 0) {
        $all_categories .= ',';
      }
      $all_categories .= $item['slug'];
      $i++;
    }
  } else {
    $all_categories = null;
  }
  if (get_the_tags()  !== false) {
    $all_tags = '';
    $tags= json_decode(json_encode(get_the_tags()), true);
    $i = 0;
    foreach ($tags as $item) {
      if ($i > 0) {
        $all_tags .= ',';
      }
      $all_tags .= $item['slug'];
      $i++;
    }
  } else {
    $all_tags = null;
  }
  $signup = isset($_COOKIE['signup']) ? $_COOKIE['signup'] : null;
  $cookies = '';
  foreach ($_COOKIE as $key=>$val)
  {
    $cookies .= $key.',';
  }
  $lytics = $_COOKIE['ly_segs'];
  if (function_exists( 'is_amp_endpoint' ) && is_amp_endpoint()) {
    echo "
    <!-- AMP sign up form -->
    <div id=\"sidebar-lead-gen-ad\" class=\"col-12 py-3 mb-4\">
      <h6>Sign up for <em>Investment U</em>!</h6>
      <p>Get <em>Investment U</em> in your inbox today! No matter your skill level, we’ll show you how to grab control of your financial future and build a bank account that will let you live life on your terms!</p>
      <form action=\"" . get_template_directory_uri() . '/amp-form-post.php' . "\" method=\"post\" name=\"SimpleSignUp\" role=\"form\" target=\"_top\">
        <div class=\"form-group mb-0\">
          <input class=\"form-control mb-2\" type=\"email\" placeholder=\"Email\" name=\"signup_emailAddress\" id=\"inlineFormInputName\" required>
          <button class=\"btn btn-block btn-primary form-control\" type=\"submit\">Subscribe Now</button>
          <input name=\"signup_sourceId\" type=\"hidden\" value=\"X300V781\">
          <input name=\"signup_listCode\" type=\"hidden\" value=\"INVESTME\">
          <input name=\"signup_redirectUrl\" id=\"customRedirectUrl\" type=\"hidden\" value=\"" . get_site_url() . "\">
          <input name=\"signup_welcomeEmailTemplateName\" type=\"hidden\" value=\"_pge_iu_welcome_2019\">
          <input name=\"coRegSignups[0].checked\" type=\"hidden\" value=\"true\">
          <input name=\"coRegSignups[0].listCode\" type=\"hidden\" value=\"IUDED\">
          <input name=\"coRegSignups[0].sourceId\" type=\"hidden\" value=\"X300V781\">
        </div>
      </form>
    </div>";
  }
  else {
    echo "
    <!-- Revive Adserver Asynchronous JS Tag - Generated with Revive Adserver v4.2.1 -->
    <ins
      data-revive-zoneid=\"$zone\"
      data-revive-block=\"0\"
      data-revive-blockcampaign=\"0\"
      data-revive-id=\"e381927fbe56d09bfb1b715794e5c109\"
      data-revive-category=\"$all_categories\"
      data-revive-tags=\"$all_tags\"
      data-revive-author=\"$post_author\"
      data-revive-cookies=\"$cookies\"
      data-revive-referral-source=\"$source\"
      data-revive-lytics=\"$lytics\"
    ></ins>
    <script async src=\"https://ads.web.oxfordclub.com/www/delivery/asyncjs.php\"></script>";
  }


}
