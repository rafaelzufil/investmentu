<?php

/*
  Plugin Name: Referral Source Plugin
  Description: Check referer path and set the approriate cookie
  Plugin URI: //oxfordclub.com
  Author: Joseph Hill
  Author URI: //oxfordclub.com
  Version: 2.0
 */

function get_traffic_source() {

  $referer = $_SERVER['HTTP_REFERER'];
  $engines = ['google','yahoo','aol','msn','ask','altavista','snap','alltheweb','gigablast','hotbot','netscape','live','exalead','bing','cnn','msnbc','lycos','duckduckgo'];
  $social = ['facebook','twitter','plus.google.com','linkedin','youtube','instagram','pinterest'];


  if (!isset($_COOKIE['source'])) {

    if (isset($referer)) {

      if (str_replace($engines, '', $referer) !== $referer) {

        setcookie('source', 'organic', time() + (86400 * 30), "/");

      } elseif (str_replace($social, '', $referer) !== $referer) {

        setcookie('source', 'social', time() + (86400 * 30), "/");

      }

      else {

        setcookie('source', 'referral', time() + (86400 * 30), "/");

      }

    } elseif (isset($_GET['src']) && $_GET['src'] === 'email') {

      setcookie('source', 'email', time() + (86400 * 30), "/");

    } else {

      setcookie('source', 'direct', time() + (86400 * 30), "/");

    }
  }

}

add_action('wp_head', 'get_traffic_source');
