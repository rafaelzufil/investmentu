<?php
/**
 * Plugin Name: AMP Google Tag Manager
 *
 * @package   AMP_Google_Tag_Manager
 * @author    Weston Ruter, Google
 * @license   GPL-2.0-or-later
 * @copyright 2019 Google Inc.
 *
 * @wordpress-plugin
 * Plugin Name: AMP Google Tag Manager
 * Description: Demonstration for how to add Google Tag Manager (GTM) to an AMP page in WordPress.
 * Plugin URI:  https://gist.github.com/westonruter/2ea25735be279b88c6f0946629d0240c
 * Version:     0.1.0
 * Author:      Weston Ruter, Google
 * Author URI:  https://weston.ruter.net/
 * License:     GNU General Public License v2 (or later)
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */
namespace AMP_Google_Tag_Manager;
/**
 * Print amp-analytics.
 */
function print_component() {
    $GTM_CONTAINER_ID = get_gtm_code();
	printf(
		'<amp-analytics config="https://www.googletagmanager.com/amp.json?id=%s" data-credentials="include"></amp-analytics>',
		esc_attr( $GTM_CONTAINER_ID )
	);
}
if (is_gtm_enabled()) {
    add_action(
        'wp_footer',
        function () {
            if ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() ) {
                print_component();
            }
        }
    );
    // Classic mode.
    add_filter(
        'amp_post_template_data',
        function( $data ) {
            $data['amp_component_scripts'] = array_merge(
                $data['amp_component_scripts'],
                array(
                    'amp-analytics' => true,
                )
            );
            return $data;
        }
    );
    add_action( 'amp_post_template_footer', __NAMESPACE__ . '\print_component' );
}