<?php

/*
  Plugin Name: Referral referral_source Plugin
  Description: Check referer path and set the approriate cookie
  Plugin URI: //oxfordclub.com
  Author: Joseph Hill
  Author URI: //oxfordclub.com
  Version: 2.0
 */

function set_referral_cookie() {

  if (!isset($_COOKIE['referral_source'])) {

    $referer = $_SERVER['HTTP_REFERER'];
    $engines = ['google','yahoo','aol','msn','ask','altavista','snap','alltheweb','gigablast','hotbot','netscape','live','exalead','bing','cnn','msnbc','lycos','duckduckgo'];
    $social = ['facebook','twitter','plus.google.com','linkedin','youtube','instagram','pinterest'];
    $paid = '';

    if (isset($referer)) {

      if (str_replace($engines, '', $referer) !== $referer) {

        setcookie('referral_source', 'organic', time() + (86400 * 30), "/");

      } elseif (str_replace($social, '', $referer) !== $referer) {

        setcookie('referral_source', 'social', time() + (86400 * 30), "/");

      }

      else {

        setcookie('referral_source', 'referral', time() + (86400 * 30), "/");

      }

    } elseif (isset($_GET['src']) && $_GET['src'] === 'email') {

      setcookie('referral_source', 'email', time() + (86400 * 30), "/");

    } else {

      setcookie('referral_source', 'direct', time() + (86400 * 30), "/");

    }

    echo "<script> var referral_source = '".$referral_source."';</script>";

  }

}

add_action('init', 'set_referral_cookie');
