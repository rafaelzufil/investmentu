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
  if (get_the_category()  !== null) {
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
  if (get_the_tags()  !== null) {
    $all_tags = '';
    $categories = json_decode(json_encode(get_the_tags()), true);
    $i = 0;
    foreach ($categories as $item) {
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
    data-revive-signup=\"$signup\"
    data-revive-referral_source=\"$source\"
  ></ins>
  <script async src=\"https://ads.web.oxfordclub.com/www/delivery/asyncjs.php\"></script>";


}
