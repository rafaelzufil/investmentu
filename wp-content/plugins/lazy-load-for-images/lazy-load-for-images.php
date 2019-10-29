<?php

/**
 * Plugin Name: Lazy Load for Images
 * Plugin URI:  http://bit.ly/2FmNw2v
 * Description: Lazy Load WordPress images. Load images only after scrolling down and when viewport.
 * Author:      Jumedeen khan
 * Author URI:  https://www.supportmeindia.com/
 * Text Domain: lazy-load-for-images
 * License:     GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.txt
 * Version:     1.3.1
 *
 */

//* Quit files
defined( 'ABSPATH' ) || exit;

//* Lazy Load Images plugin class
add_action( 'wp', array( 'Lazy_Load_Images', 'instance' ) );

final class Lazy_Load_Images {

	//* Class for instance
	public static function instance() {
		new self();
	}

	//* Class for constructor
	public function __construct() {
		//* Don't Lazy Load
		if ( is_admin() || is_preview() || is_feed() || ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || ( defined( 'DOING_CRON' ) && DOING_CRON ) || ( defined( 'DOING_AJAX' ) && DOING_AJAX ) || ( defined( 'XMLRPC_REQUEST' ) && XMLRPC_REQUEST ) ) {
			return;
		}

		//* LLI Hooks
		add_filter( 'the_content', array( __CLASS__, 'lli_images' ), 12 );
		add_filter( 'post_thumbnail_html', array( __CLASS__, 'lli_images' ) );
		add_filter( 'genesis_get_image', array( __CLASS__, 'lli_images' ) );
		add_filter( 'widget_text', array( __CLASS__, 'lli_images' ) );
		
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'lli_effects' ) );
		add_action( 'wp_footer', array( __CLASS__, 'lli_scripts' ) );
	}

	//* LLI content images for Lazy Loaded
	public static function lli_images( $content ) {

		//* Don't lazy-load if content already loaded
		if ( false !== strpos( $content, 'data-src' ) ) {
			return $content;
		}
		
		//* No lazy images
		if ( strpos( $content, '-image' ) === false ) {
			return $content;
		}
	
	    //* Replace images src to data-src
		return preg_replace_callback( '/(?P<all> (?# ) <img(?P<before>[^>]*) (?# ) ( (?# ) class=["\'](?P<class1>.*?(?:wp-image-|wp-post-image|entry-image|featured-image|l-image)[^>"\']*)["\'] (?P<between1>[^>]*) src=["\'](?P<src1>[^>"\']*)["\'] | (?# ) src=["\'](?P<src2>[^>"\']*)["\'] (?P<between2>[^>]*) class=["\'](?P<class2>.*?(?:wp-image-|wp-post-image|entry-image|featured-image|l-image)[^>"\']*)["\'] ) (?P<after>[^>]*) (?# ) (?P<closing>\/?)> (?# ) )/x', array( 'Lazy_Load_Images', 'replace_images' ), $content );
	}

	//* Add lazy class for data-src attribute images
	public static function replace_images( $matches ) {
		
		//* Image Placeholder
		$placeholder_image = 'data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=';
		
		//* Disable lazy load for specific images
		if ( false !== strpos( $matches['all'], 'data-lazy="1"' ) || false !== strpos( $matches['class1'] . $matches['class2'], 'lazy' ) ) {
			return $matches['all'];
		} else {
            return '<img ' . $matches['before']
                   . ' class="lazy ' . $matches['class1'] . $matches['class2'] . '" src="' . $placeholder_image . '" '
                   . $matches['between1'] . $matches['between2']
                   . ' data-src="' . $matches['src1'] . $matches['src2'] . '" '
                   . $matches['after']
                   . $matches['closing'] . '><noscript>' . $matches['all'] . '</noscript>';
		}
	}

	//* Image load effect style.css
	public static function lli_effects() {?>
		<style>img.lazy[data-src]{opacity:0;width:1px;height:1px;position:absolute}</style>
     <?php
	}

	//* Add lazyload script in footer
	public static function lli_scripts() {?>
<script>!function(){function i(){var t=document.querySelectorAll("img.lazy"),e=t.length;for(!e&&window.removeEventListener("scroll",i);e--;){var r=window.innerHeight;if(t[e].getBoundingClientRect().top-r<=100){if(t[e].getAttribute("data-src")&&(t[e].src=t[e].getAttribute("data-src")),"PICTURE"===t[e].parentElement.tagName)for(var n=t[e].parentElement.querySelectorAll("source"),a=n.length;a--;);t[e].addEventListener("load",function(){this.classList.remove("lazy")})}}}i(),window.addEventListener("scroll",i)}();</script>
<?php }
}