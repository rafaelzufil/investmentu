<?php
/*
Plugin name: IU Syndication Aggregator
Plugin URI: https://investmentu.com/
Description: Aggregate articles from syndication publishers 
Author: George Zhao
Author URI: https://oxfordclub.com/
Version: 0.1
*/

// no direcct access
if (!defined('ABSPATH')) {
	exit;
}


// requres
require('iu-syndication-configs.php');


// set up
add_action('rest_api_init', function(){
	register_rest_route(
		'iu-syndication/v1', 
		'/post', 
		array(
			'methods' => 'POST',
			'callback' => 'iu_syndication_handler',
		)
	);
});


/**
 * handler
 *
 * @param WP_REST_Request $request
 * @return void
 */
function iu_syndication_handler(WP_REST_Request $request) {
	if (!defined('IU_SYNDICATION_API_KEY') || IU_SYNDICATION_API_KEY == '') return;

	$post_body = $request->get_body_params();

	if ($post_body['key'] != IU_SYNDICATION_API_KEY) return;

	$post = json_decode($post_body['post']);

	$fields = array(
		'post_date',
		'post_date_gmt',
		'post_content',
		'post_title',
		'post_excerpt',
		'post_status',
		'post_type',
		'post_name',
	);

	$params = array();

	if (isset($post_body['iu_post_id'])) {
		$params['ID'] = $post_body['iu_post_id'];
	}

	foreach ($fields as $field) {
		$params[$field] = $post->$field;
	}

	$params['post_category'] = array($post_body['category_id']);

	// look up author
	$author = new WP_User_Query(array(
		'search' => $post_body['post_author_display_name'],
		'search_fields' => array('user_login','user_nicename','display_name')
	));

	if (isset($author->results[0]) && $author->results[0]->ID){
		$params['post_author'] = $author->results[0]->ID;
	}

	$post_id = wp_insert_post($params);

	iu_syndication_update_meta($post_id, '_yoast_wpseo_canonical', $post_body['post_permalink']);
	iu_syndication_update_meta($post_id, 'publication-source', $post_body['publisher_name']);

	if ($post_body['post_thumbnail_url'] != '') {
		iu_syndication_insert_attachment_from_url($post_id, $post_body['post_thumbnail_url']);
	}

	echo $post_id;
}


/**
 * update post meta values
 *
 * @param int $post_id
 * @param string $meta_key
 * @param string $new_meta_value
 * @return void
 */
function iu_syndication_update_meta($post_id, $meta_key, $new_meta_value) {
	/* Get the meta value of the custom field key. */
	$meta_value = get_post_meta($post_id, $meta_key, true);

	if ( $new_meta_value && $meta_value == '') {
		/* If a new meta value was added and there was no previous value, add it. */
		add_post_meta($post_id, $meta_key, $new_meta_value, true);  	
	} elseif ($new_meta_value && $new_meta_value != $meta_value) {
		/* If the new meta value does not match the old value, update it. */
		update_post_meta($post_id, $meta_key, $new_meta_value);
	}
}

/**
 * Insert an attachment from URL
 *
 * @param string $url
 * @param int $parent_post_id
 * @return int Attachment ID
 */
function iu_syndication_insert_attachment_from_url($parent_post_id, $url) {
	require_once(ABSPATH . 'wp-admin/includes/image.php');

	if (!class_exists('WP_Http')) {
		include_once( ABSPATH . WPINC . '/class-http.php' );
	}

	$http = new WP_Http();
	$response = $http->request($url);

	if ($response['response']['code'] != 200) {
		return false;
	}

	$upload = wp_upload_bits(basename($url), null, $response['body']);

	if (!empty($upload['error'])){
		return false;
	}

	$file_path = $upload['file'];
	$file_name = basename($file_path);
	$file_type = wp_check_filetype($file_name, null);
	$attachment_title = sanitize_file_name(pathinfo( $file_name, PATHINFO_FILENAME));
	$wp_upload_dir = wp_upload_dir();

	$post_info = array(
		'guid'           => $wp_upload_dir['url'] . '/' . $file_name,
		'post_mime_type' => $file_type['type'],
		'post_title'     => $attachment_title,
		'post_content'   => '',
		'post_status'    => 'inherit',
	);

	// Create the attachment
	$attachment_id = wp_insert_attachment($post_info, $file_path, $parent_post_id);

	// Define attachment metadata
	$attachment_data = wp_generate_attachment_metadata($attachment_id, $file_path);

	// Assign metadata to attachment
	wp_update_attachment_metadata($attachment_id, $attachment_data);

	set_post_thumbnail($parent_post_id, $attachment_id);

	return $attachment_id;
}
?>