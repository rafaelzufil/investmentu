<?php
/*
Plugin Name: Maxgalleria Slick Carousel for WordPress
Plugin URI: http://maxgalleria.com
Description: Slick Carousel template and skins for the MaxGalleria gallery platform.
Version: 1.8.9
Author: Max Foundry
Author URI: http://maxfoundry.com

Copyright 2014 Max Foundry, LLC (http://maxfoundry.com)

Slick.js http://kenwheeler.github.io/slick/ by Ken Wheeler, http://kenwheeler.github.io 
*/

if( !class_exists( 'EDD_SL_Plugin_Updater' ) ) {	
	include( dirname( __FILE__ ) . '/EDD_SL_Plugin_Updater.php' );
}

class MaxGalleriaSlickCarousel {
  
  public $license_valid;
    
	public function __construct() {
		$this->set_global_constants();
		//$this->check_for_update();
		$this->set_activation_hooks();
		$this->initialize_properties();
		$this->setup_hooks();
	}
	
	public function activate() {
		update_option(MAXGALLERIA_SLICK_CAROUSEL_VERSION_KEY, MAXGALLERIA_SLICK_CAROUSEL_VERSION_NUM);
	}
	
	public function call_function_for_each_site($function) {
		global $wpdb;
		
		// Hold this so we can switch back to it
		$current_blog = $wpdb->blogid;
		
		// Get all the blogs/sites in the network and invoke the function for each one
		$blog_ids = $wpdb->get_col($wpdb->prepare("SELECT blog_id FROM $wpdb->blogs"));
		foreach ($blog_ids as $blog_id) {
			switch_to_blog($blog_id);
			call_user_func($function);
		}
		
		// Now switch back to the root blog
		switch_to_blog($current_blog);
	}
	
//	public function check_for_update() {
//		require_once 'maxgalleria-slick-carousel-wp-updates.php';
//		new WPUpdatesPluginUpdater_794('http://wp-updates.com/api/2/plugin', plugin_basename(__FILE__));
//	}
	
	public function create_plugin_action_links($links, $file) {
		static $this_plugin;
		
		if (!$this_plugin) {
			$this_plugin = plugin_basename(__FILE__);
		}
		
		if ($file == $this_plugin) {
			$settings_link = '<a href="' . admin_url() . 'edit.php?post_type=maxgallery&page=maxgalleria-settings&addon=slick-slider">' . __('Settings', 'maxgalleria-slick-slider') . '</a>';
			array_unshift($links, $settings_link);
		}

		return $links;
	}
	
	public function deactivate() {
		delete_option(MAXGALLERIA_SLICK_CAROUSEL_VERSION_KEY);
	}
	
	public function do_activation($network_wide) {
		if ($network_wide) {
			$this->call_function_for_each_site(array($this, 'activate'));
		}
		else {
			$this->activate();
		}
	}
	
	public function do_deactivation($network_wide) {	
		if ($network_wide) {
			$this->call_function_for_each_site(array($this, 'deactivate'));
		}
		else {
			$this->deactivate();
		}
	}
	
	public function get_output($gallery, $attachments) {
		$output = '';
		$options = new MaxGalleriaSlickSliderOptions($gallery->ID);
		
		if ($options->is_image_gallery()) {
			if ($options->get_template() == MAXGALLERIA_SLICK_CAROUSEL_KEY) {
				require_once 'maxgalleria-slick-carousel-template.php';
				$template = new MaxGalleriaSlickSliderTemplate();
				$output = $template->get_output($gallery, $attachments);
			}
		}
		
		return $output;
	}
	
	public function initialize_properties() {
		  require_once 'maxgalleria-slick-carousel-options.php';
	}
	
	public function load_textdomain() {
		load_plugin_textdomain('maxgalleria-slick-slider', false, dirname(plugin_basename(__FILE__)) . '/languages/');
	}
	
	public function notice_ignore() {
		if (current_user_can('install_plugins')) {
			global $current_user;
			
			if (isset($_GET['maxgalleria-slick-slider-ignore-notice']) && $_GET['maxgalleria-slick-slider-ignore-notice'] == 1) {
				add_user_meta($current_user->ID, MAXGALLERIA_SLICK_CAROUSEL_IGNORE_NOTICE, true, true);
			}
		}
	}
	
	public function notice_show() {
		if (!class_exists('MaxGalleria')) {
			if (current_user_can('install_plugins')) {
				global $current_user;
				
				if (!get_user_meta($current_user->ID, MAXGALLERIA_SLICK_CAROUSEL_IGNORE_NOTICE)) {
					echo '<div class="error">';
					echo '	<p>';
					printf(__('MaxGalleria is not installed/activated; therefore, the MaxGalleria Slick Slider addon will not function properly until it is. | <a href="%1$s">Hide Notice</a>', 'maxgalleria-slick-slider'), '?maxgalleria-slick-slider-ignore-notice=1');
					echo '	</p>';
					echo '</div>';
				}
			}
		}
	}
	
	public function register_addon() {
		if (class_exists('MaxGalleria')) {
			$addon = array(
				'key' => MAXGALLERIA_SLICK_CAROUSEL_KEY,
				'name' => MAXGALLERIA_SLICK_CAROUSEL_NAME,
				'type' => 'template',
				'subtype' => 'image',
				'settings' => MAXGALLERIA_SLICK_CAROUSEL_SETTINGS,
				'image' => MAXGALLERIA_SLICK_CAROUSEL_IMAGE,
				'output' => array($this, 'get_output')
			);

			global $maxgalleria;
			$maxgalleria->register_addon($addon);
      $this->license_valid = $maxgalleria->is_valid_license(MAXGALLERIA_SLICK_CAROUSEL_EXPIRES, 'mg_edd_slick_license_status');
      //$this->license_status = get_option($license_status_option, 'inactive');

		}
	}
	
	public function save_slick_slider_defaults() {
		$options = new MaxGalleriaSlickSliderOptions();
    		
		if (isset($_POST) && check_admin_referer($options->nonce_save_slick_slider_defaults['action'], $options->nonce_save_slick_slider_defaults['name'])) {
			global $maxgalleria;
			$message = '';
			
			foreach ($_POST as $key => $value) {
				if ($maxgalleria->common->string_starts_with($key, 'maxgallery_')) {
					update_option($key, $value);
				}
			}
			
			$message = 'success';
			
			echo $message;
			die();
		}
	}
	
	public function save_gallery_options() {
		global $post;

		if (isset($post)) {
			if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
				return $post->ID;
			}

			if (!current_user_can('edit_post', $post->ID)) {
				return $post->ID;
			}
			
			$options = new MaxGalleriaSlickSliderOptions($post->ID);
			$options->save_options();
		}
	}
	
	public function set_activation_hooks() {
		register_activation_hook(__FILE__, array($this, 'do_activation'));
		register_deactivation_hook(__FILE__, array($this, 'do_deactivation'));
	}
	
	public function set_global_constants() {
		define('MAXGALLERIA_SLICK_CAROUSEL_KEY', 'slick-slider');
		define('MAXGALLERIA_SLICK_CAROUSEL_NAME', __('Slick Slider', 'maxgalleria-slick-slider'));
		define('MAXGALLERIA_SLICK_CAROUSEL_VERSION_KEY', 'maxgalleria_slick_carousel_version');
		define('MAXGALLERIA_SLICK_CAROUSEL_VERSION_NUM', '1.8.9');
		define('MAXGALLERIA_SLICK_CAROUSEL_IGNORE_NOTICE', 'maxgalleria_slick_carousel_ignore_notice');
		define('MAXGALLERIA_SLICK_CAROUSEL_PLUGIN_NAME', trim(dirname(plugin_basename(__FILE__)), '/'));
		define('MAXGALLERIA_SLICK_CAROUSEL_PLUGIN_DIR', WP_PLUGIN_DIR . '/' . MAXGALLERIA_SLICK_CAROUSEL_PLUGIN_NAME);
		define('MAXGALLERIA_SLICK_CAROUSEL_PLUGIN_URL', plugin_dir_url('')  . MAXGALLERIA_SLICK_CAROUSEL_PLUGIN_NAME);
		define('MAXGALLERIA_SLICK_CAROUSEL_SETTINGS', MAXGALLERIA_SLICK_CAROUSEL_PLUGIN_DIR . '/maxgalleria-slick-carousel-settings.php');
		define('MAXGALLERIA_SLICK_CAROUSEL_IMAGE', MAXGALLERIA_SLICK_CAROUSEL_PLUGIN_URL . '/images/slick-carousel.png');
	  define('EDD_SLICK_NAME', 'slick-slider-wordpress' ); 
	  define('EDD_SLICK_ID', '5846' ); 
    define("MGSLICK_NEW_LICENSE","mgslick-new-license");
		define("MAXGALLERIA_SLICK_CAROUSEL_EXPIRES", "maxgalleria_slick_expires_date");
				
		// Bring in all the actions and filters
		require_once 'maxgalleria-slick-carousel-hooks.php';
	}
	
	public function setup_hooks() {
		add_action('init', array($this, 'load_textdomain'));
		add_action('admin_init', array($this, 'notice_ignore'));
		add_action('admin_notices', array($this, 'notice_show'));
		add_filter('plugin_action_links', array($this, 'create_plugin_action_links'), 10, 2);
		add_action('plugins_loaded', array($this, 'register_addon'));
		add_action('save_post', array($this, 'save_gallery_options'));
		add_action('maxgalleria_template_options', array($this, 'show_template_options'));
		
		// Ajax call for saving default settings
		add_action('wp_ajax_save_slick_slider_defaults', array($this, 'save_slick_slider_defaults'));
		add_action('wp_ajax_nopriv_save_slick_slider_defaults', array($this, 'save_slick_slider_defaults'));
		
		add_action('admin_init', array($this, 'edd_slick_plugin_updater'), 0 );
		
    add_action('admin_init', array($this, 'edd_slick_activate_license'));
		
    add_action('admin_init', array($this, 'edd_slick_deactivate_license'));
		
	  add_action('admin_init', array($this, 'edd_slick_register_option'));		
		
		add_action('admin_enqueue_scripts', array($this, 'load_slick_admin_scripts'));
					
	}
	
	public function load_slick_admin_scripts() {
		wp_enqueue_style('codemirror-css', MAXGALLERIA_SLICK_CAROUSEL_PLUGIN_URL . '/libs/codemirror.css' );
		wp_enqueue_script('codemirror-js', MAXGALLERIA_SLICK_CAROUSEL_PLUGIN_URL . '/libs/codemirror.js', array( 'jquery' ));		
	}
					
	function edd_slick_plugin_updater() {

		// retrieve our license key from the DB
		$license_key = trim( get_option( 'mg_edd_slick_license_key' ) );

		// setup the updater
		$edd_updater = new EDD_SL_Plugin_Updater( MG_EDD_SHOP_URL, __FILE__, array(
				'version' 	=> MAXGALLERIA_SLICK_CAROUSEL_VERSION_NUM, 				// current version number
				'license' 	=> $license_key, 		// license key (used get_option above to retrieve from DB)
				'item_name' => EDD_SLICK_NAME, 	// name of this plugin
				'item_id' => EDD_SLICK_ID,
				'author' 	=> 'MaxFoundry INC'  // author of this plugin
			)
		);
	}
		
	public function edd_slick_activate_license() {

		// listen for our activate button to be clicked
		if( isset( $_POST['edd_slick_license_activate'] ) ) {
			
			// run a quick security check
			if( ! check_admin_referer( 'edd_slick_nonce', 'edd_slick_nonce' ) )
				return; // get out if we didn't click the Activate button

			// retrieve the license from the database
			$license = trim( get_option( 'mg_edd_slick_license_key' ) );

			// data to send in our API request
			$api_params = array(
				'edd_action'=> 'activate_license',
				'license' 	=> $license,
				'item_name' => urlencode( EDD_SLICK_NAME ), // the name of our product in EDD
				'item_id' => EDD_SLICK_ID,
				'url'       => home_url()
			);
			
			// Call the custom API.
			$response = wp_remote_post( MG_EDD_SHOP_URL, array( 'timeout' => 15, 'sslverify' => false, 'body' => $api_params ) );
			
			// make sure the response came back okay
			if ( is_wp_error( $response ) )
				return false;

			// decode the license data
			$license_data = json_decode( wp_remote_retrieve_body( $response ) );

			// $license_data->license will be either "valid" or "invalid"

			update_option( 'mg_edd_slick_license_status', $license_data->license );
			
		}
	}
	
	public function edd_slick_deactivate_license() {

		// listen for our activate button to be clicked
  if( isset($_POST['edd_slick_license_deactivate']) || isset($_POST['edd_slick_license_deactivate2']) ) {
    
      if(isset($_POST['edd_slick_license_deactivate2']))
        update_option(MGSLICK_NEW_LICENSE, 'on');
    
			// run a quick security check
			if( ! check_admin_referer( 'edd_slick_nonce', 'edd_slick_nonce' ) )
				return; // get out if we didn't click the Activate button

			// retrieve the license from the database
			$license = trim( get_option( 'mg_edd_slick_license_key' ) );


			// data to send in our API request
			$api_params = array(
				'edd_action'=> 'deactivate_license',
				'license' 	=> $license,
				'item_name' => urlencode( EDD_SLICK_NAME ), // the name of our product in EDD
				'item_id' => EDD_SLICK_ID,
				'url'       => home_url()
			);

			// Call the custom API.
			$response = wp_remote_post( MG_EDD_SHOP_URL, array( 'timeout' => 15, 'sslverify' => false, 'body' => $api_params ) );

			// make sure the response came back okay
			if ( is_wp_error( $response ) )
				return false;

			// decode the license data
			$license_data = json_decode( wp_remote_retrieve_body( $response ) );

			// $license_data->license will be either "deactivated" or "failed"
			//if( $license_data->license == 'deactivated' )
			if($response['response']['code'] == 200 && $response['response']['message'] = 'OK')
				delete_option( 'mg_edd_slick_license_status' );
						
		}
	}
	
	public function edd_slick_register_option() {
		// creates our settings in the options table
		register_setting('edd_slick_license', 'mg_edd_slick_license_key', array($this, 'edd_sanitize_slick_license' ));
	}
	
	public function edd_sanitize_slick_license( $new ) {
		$old = get_option( 'mg_edd_slick_license_key' );
		if( $old && $old != $new ) {
			delete_option( 'mg_edd_slick_license_status' ); // new license has been entered, so must reactivate
		}
		return $new;
	}
			
	public function show_template_options() {
		global $post;
		$options = new MaxGalleriaSlickSliderOptions($post->ID);
		
		if ($options->get_template() == MAXGALLERIA_SLICK_CAROUSEL_KEY) {
      //if($this->license_valid)
			  require_once 'maxgalleria-slick-carousel-meta.php';
		}
	}
}

// Let's get this party started
$maxgalleria_slick_carousel = new MaxGalleriaSlickCarousel();
?>