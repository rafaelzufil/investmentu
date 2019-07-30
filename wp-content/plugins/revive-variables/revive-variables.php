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
   wp_enqueue_script( 'revive-js', plugins_url() . '/' . basename(__DIR__)  . '/js/revive.js', array( 'jquery' ), $current_datetime, false );
 }
 add_action('wp_enqueue_scripts', 'enqueue_js');
