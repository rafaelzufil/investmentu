<?php
/*
Plugin Name: CF Get2Cookie 
Plugin URI: http://crowdfavorite.com 
Description: Gives admin users the ability to set URL query strings for creating and deleting cookies. 
Version: 1.2
Author: Crowd Favorite
Author URI: http://crowdfavorite.com
*/

// ini_set('display_errors', '1'); ini_set('error_reporting', E_ALL);

if (!defined('PLUGINDIR')) {
	define('PLUGINDIR','wp-content/plugins');
}

load_plugin_textdomain('cf-get2cookie');


// README HANDLING
add_action('admin_init','cfg2g_add_readme');

/**
 * Enqueue the readme function
 */
function cfg2g_add_readme() {
	if(function_exists('cfreadme_enqueue')) {
		cfreadme_enqueue('cf-get2cookie','cfg2g_readme');
	}
}

/**
 * return the contents of the links readme file
 * replace the image urls with full paths to this plugin install
 *
 * @return string
 */
function cfg2g_readme() {
	$file = realpath(dirname(__FILE__)).'/readme/readme.txt';
	if(is_file($file) && is_readable($file)) {
		$markdown = file_get_contents($file);
		$markdown = preg_replace('|!\[(.*?)\]\((.*?)\)|','![$1]('.WP_PLUGIN_URL.'/cf-get2cookie/readme/$2)',$markdown);
		return $markdown;
	}
	return null;
}



/**
 * cfg2g_init - This function takes the query strings in the database, and searches through the browsers
 * query_string to find matches.  When it does it sets a cookie that will last for 1 year.
 *
 * @return void
 */
function cfg2g_init() {
	$settings = get_option('cfg2g_settings');	
	if (!is_array($settings) || empty($settings)) { return; }
	
	if (is_array($_GET) && !empty($_GET)) {
		parse_str($_SERVER['QUERY_STRING'], $output);
		$result = false;
		foreach ($settings as $key => $setting) {
			if (isset($_GET[$setting['url_key']]) && $_GET[$setting['url_key']] == $setting['url_value']) {
				if ($setting['action'] == 'add') {
					$result = setcookie($setting['cookie_name'], $setting['cookie_value'], time()+60*60*24*365, '/');
				}
				else {
					$result = setcookie($setting['cookie_name'], $setting['cookie_value'], time()-60*60*24*365, '/');
				}
				
				if ($result) {
					unset($output[$setting['url_key']]);
				}
			}
		}
		if ($result) {
			wp_redirect(trim(get_bloginfo('url').substr_replace($_SERVER['REQUEST_URI'], http_build_query($output), strpos($_SERVER['REQUEST_URI'], '?')+1), '?'));
			exit();
		}
	}
}
add_action('init', 'cfg2g_init', 0);

/**
 * cfg2g_request_handler - Function for processing admin submits and getting of JS and CSS
 *
 * @return void
 */
function cfg2g_request_handler() {
	if (!empty($_GET['cf_action'])) {
		switch ($_GET['cf_action']) {
			case 'cfg2g_admin_js':
				cfg2g_admin_js();
				break;
			case 'cfg2g_admin_css':
				cfg2g_admin_css();
				die();
				break;
		}
	}
	if (!empty($_POST['cf_action'])) {
		switch ($_POST['cf_action']) {
			case 'cfg2g_update_settings':
				if ($_POST['cfg2g']['base'] == 0) {
					cfg2g_save_settings($_POST['cfg2g']);
				}
				wp_redirect(trailingslashit(get_bloginfo('wpurl')).'wp-admin/options-general.php?page='.basename(__FILE__).'&updated=true');
				die();
				break;
		}
	}
}
add_action('init', 'cfg2g_request_handler');

/**
 * cfg2g_save_settings - This function takes the settings submitted, processes them so they don't have any
 * dangerous characters in them, then passes that off to the database.  If either "add" or "remove" are not
 * present, it will automatically add an empty array in their place for easier processing.
 *
 * @param string $settings 
 * @return void
 */
function cfg2g_save_settings($settings) {
	if (!current_user_can('manage_options') || !is_array($settings) || empty($settings)) { return; }
	$update = array();
	
	// Process the Add Rows
	if (is_array($settings['add']) && !empty($settings['add'])) {
		foreach ($settings['add'] as $key => $setting) {
			if (!empty($setting['url_key']) && !empty($setting['cookie_name']) && !empty($setting['cookie_value'])) {
				$update[$key] = array(
					'url_key' 		=>	stripslashes($setting['url_key']),
					'url_value'		=>	stripslashes($setting['url_value']),
					'cookie_name' 	=>	stripslashes($setting['cookie_name']),
					'cookie_value' 	=>	stripslashes($setting['cookie_value']),
					'description' 	=>	stripslashes($setting['description']),
					'action' 		=>	'add'
				);
			}
		}
	}
	// Process the Remove Rows
	if (is_array($settings['remove']) && !empty($settings['remove'])) {
		foreach ($settings['remove'] as $key => $setting) {
			if (!empty($setting['url_key']) && !empty($setting['cookie_name']) && !empty($setting['cookie_value'])) {
				$update[$key] = array(
					'url_key' 		=>	stripslashes($setting['url_key']),
					'url_value'		=>	stripslashes($setting['url_value']),
					'cookie_name' 	=>	stripslashes($setting['cookie_name']),
					'cookie_value' 	=>	stripslashes($setting['cookie_value']),
					'description' 	=>	stripslashes($setting['description']),
					'action' 		=>	'remove'
				);
			}
		}
	}
	update_option('cfg2g_settings', $update);
	return;
}

if (is_admin() && !empty($_GET['page']) && $_GET['page'] == basename(__FILE__)) {
	wp_enqueue_script('jquery');
	wp_enqueue_script('cfg2g_admin_js', trailingslashit(get_bloginfo('url')).'?cf_action=cfg2g_admin_js', array('jquery'));
}

function cfg2g_admin_js() {
	header('Content-type: text/javascript');
	?>
	jQuery(document).ready(function() {
		jQuery('#cfg2g_add_new').click(function() {
			var id = new Date().valueOf();
			var section = id.toString();
			
			var html = jQuery('#cfg2g_add_setting').html().replace("<tbody>",'').replace("</tbody>",'').replace(/###SETTING###/g, section).replace(/###TYPE###/g, 'add');
			jQuery('#cfg2g_settings_table tbody').append(html);
			cfg2g_delete();
		});
		jQuery('#cfg2g_add_new_remove').click(function() {
			var id = new Date().valueOf();
			var section = id.toString();
			
			var html = jQuery('#cfg2g_add_setting').html().replace("<tbody>",'').replace("</tbody>",'').replace(/###SETTING###/g, section).replace(/###TYPE###/g, 'remove');
			jQuery('#cfg2g_remove_settings_table tbody').append(html);
			cfg2g_delete();
		});
		cfg2g_delete();
	});
	cfg2g_delete = function() {
		jQuery('.cfg2g_delete').click(function() {
			if (confirm('Are you sure you want to delete this?')) {
				_this = jQuery(this);
				var id = _this.attr('id').replace('_delete','');
				jQuery('#'+id).remove();
			}
		});
	};
	<?php
	die();
}

function cfg2g_admin_css() {
	header('Content-type: text/css');
	die();
}

function cfg2g_admin_head() {
	echo '<link rel="stylesheet" type="text/css" href="'.trailingslashit(get_bloginfo('url')).'?cf_action=cfg2g_admin_css" />';
}
add_action('admin_head', 'cfg2g_admin_head');

function cfg2g_admin_menu() {
	if (current_user_can('manage_options')) {
		add_options_page(
			__('CF Get2Cookie', 'cf-get2cookie')
			, __('CF Get2Cookie', 'cf-get2cookie')
			, 10
			, basename(__FILE__)
			, 'cfg2g_settings_form'
		);
	}
}
add_action('admin_menu', 'cfg2g_admin_menu');

/**
 * cfg2g_plugin_action_links - This function adds the "Settings" link to the plugin activation page
 *
 * @param string $links 
 * @param string $file 
 * @return void
 */
function cfg2g_plugin_action_links($links, $file) {
	$plugin_file = basename(__FILE__);
	if (basename($file) == $plugin_file) {
		$settings_link = '<a href="options-general.php?page='.$plugin_file.'">'.__('Settings', 'cf-get2cookie').'</a>';
		array_unshift($links, $settings_link);
	}
	return $links;
}
add_filter('plugin_action_links', 'cfg2g_plugin_action_links', 10, 2);

/**
 * cfg2g_settings_form - This function is the settings display page.
 *
 * @return void
 */
function cfg2g_settings_form() {
	$settings = get_option('cfg2g_settings');

	// Separate the two types of cookie items
	$add = array();
	$remove = array();
	
	if(is_array($settings)) {
		foreach ($settings as $key => $value) {
			if ($value['action'] == 'add') {
				$add[$key] = $value;
			}
			else {
				$remove[$key] = $value;
			}
		}
	}
?>
<div class="wrap">
	<?php print('<h2>'.screen_icon().__('CF Get2Cookie', 'cf-get2cookie').'</h2>'); ?>
	<form id="cfg2g_settings_form" name="cfg2g_settings_form" action="<?php bloginfo('wpurl'); ?>/wp-admin/options-general.php" method="post">
		<input type="hidden" name="cf_action" value="cfg2g_update_settings" />
		<input type="hidden" name="cfg2g[base]" value="0" />
		<h3>Add New Cookies</h3>
		<table id="cfg2g_settings_table" class="widefat" cellspacing="0">
			<thead>
				<tr>
					<th class="manage-column" style="width:25%;" scope="col"><?php _e('GET','cf-get2cookie'); ?></th>
					<th class="manage-column" style="width:25%;" scope="col"><?php _e('COOKIE','cf-get2cookie'); ?></th>
					<th class="manage-column" style="" scope="col"><?php _e('Description','cf-get2cookie'); ?></th>
					<th class="manage-column" style="width:65px; text-align:center;" scope="col"><?php _e('&nbsp;','cf-get2cookie'); ?></th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<td class="manage-column" colspan="4">
						<input type="button" name="add_new" id="cfg2g_add_new" value="<?php _e('Add New Row', 'cf-get2cookie'); ?>" class="button" /> (* Required)
					</td>
				</tr>
			</tfoot>
			<tbody>
				<?php
				if (is_array($add) && !empty($add)) {
					foreach ($add as $key => $setting) {
						echo cfg2g_table_item($key, 'add', $setting);
					}
				}
				?>
			</tbody>
		</table>
		<h3>Remove Cookies</h3>
		<table id="cfg2g_remove_settings_table" class="widefat" cellspacing="0">
			<thead>
				<tr>
					<th class="manage-column" style="width:25%;" scope="col"><?php _e('GET','cf-get2cookie'); ?></th>
					<th class="manage-column" style="width:25%;" scope="col"><?php _e('COOKIE','cf-get2cookie'); ?></th>
					<th class="manage-column" style="" scope="col"><?php _e('Description','cf-get2cookie'); ?></th>
					<th class="manage-column" style="width:65px; text-align:center;" scope="col"><?php _e('&nbsp;','cf-get2cookie'); ?></th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<td colspan="4">
						<input type="button" name="add_new_remove" id="cfg2g_add_new_remove" value="<?php _e('Add New Row', 'cf-get2cookie'); ?>" class="button-secondary action" /> (* Required)
					</td>
				</tr>
			</tfoot>
			<tbody>
				<?php
				if (is_array($remove) && !empty($remove)) {
					foreach ($remove as $key => $setting) {
						echo cfg2g_table_item($key, 'remove', $setting);
					}
				}
				?>
			</tbody>
		</table>		
		<p class="submit">
			<input type="submit" name="submit" value="<?php _e('Save Settings', 'cf-get2cookie'); ?>" class="button-primary" />
		</p>
	</form>
	<table id="cfg2g_add_setting" style="display:none;">
		<?php echo cfg2g_table_item('###SETTING###', '###TYPE###'); ?>
	</table>
</div>
<?php
}

/**
 * cfg2g_table_item - This functions builds the TR for displaying the settings
 *
 * @param string $key - Unique identifier for the TR
 * @param string $type - Type of cookie
 * @param array $args - Array of settings for the cookie
 * @return string $html - TR built with the arguments
 */
function cfg2g_table_item($key, $type, $args = array()) {
	if (!isset($key) || !isset($type)) { return ''; }
	$defaults = array(
		'url_key' => '',
		'url_value' => '',
		'cookie_name' => '',
		'cookie_value' => '',
		'description' => ''
	);
	extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
	$html = '
	<tr id="cfg2g_'.$key.'">
		<td>
			'.__('Key*: ', 'cf-get2cookie').'<input type="text" name="cfg2g['.$type.']['.$key.'][url_key]" id="cfg2g_'.$key.'_url_key" value="'.attribute_escape($url_key).'" class="widefat" />
			<br />
			'.__('Value: ', 'cf-get2cookie').'<input type="text" name="cfg2g['.$type.']['.$key.'][url_value]" id="cfg2g_'.$key.'_url_value" value="'.attribute_escape($url_value).'" class="widefat" />
		</td>
		<td>
			'.__('Key*: ', 'cf-get2cookie').'<input type="text" name="cfg2g['.$type.']['.$key.'][cookie_name]" id="cfg2g_'.$key.'_cookie_name" value="'.attribute_escape($cookie_name).'" class="widefat" />
			<br />
			'.__('Value*: ', 'cf-get2cookie').'<input type="text" name="cfg2g['.$type.']['.$key.'][cookie_value]" id="cfg2g_'.$key.'_cookie_value" value="'.attribute_escape($cookie_value).'" class="widefat" />
		</td>
		<td style="vertical-align:middle;">
			<textarea name="cfg2g['.$type.']['.$key.'][description]" id="cfg2g_'.$key.'_description" class="widefat">'.$description.'</textarea>
		</td>
		<td class="link-delete" style="text-align:center; vertical-align:middle;">
			<input type="button" class="button cfg2g_delete" id="cfg2g_delete_'.$key.'" value="'.__('Delete', 'cf-get2cookie').'" />
		</td>
	</tr>
	';
	return $html;
}

// CF Context Integration
if (function_exists('cfcn_get_context')) {
	/**
	 * This function adds the COOKIE context to the CF Context plugin if it exists.  This function
	 * will only add the COOKIE's for items added by this plugin
	 *
	 * @param array $context - Current context items
	 * @return array - Modified context items
	 */
	function cfg2g_context($context) {
		$settings = get_option('cfg2g_settings');
		if (is_array($_COOKIE) && !empty($_COOKIE) && is_array($settings) && !empty($settings)) {
			$available_cookies = array();
			foreach ($settings as $setting) {
				if ($setting['action'] == 'add') {
					$available_cookies[] = $setting['cookie_name'];
				}
			}
			
			if (is_array($available_cookies) && !empty($available_cookies)) {
				foreach ($_COOKIE as $cookie_key => $cookie_value) {
					if (in_array($cookie_key, $available_cookies)) {
						$context[$cookie_key] = $cookie_value;
					}
				}
			}
		}
		return $context;
	}
	add_filter('cfcn_context', 'cfg2g_context');
}

// WP Super Cache Integration

if (function_exists('add_cacheaction')) {
	function cfcn_cache_key($cache_key) {
		$settings = get_option('cfg2g_settings');
		if (is_array($_COOKIE) && !empty($_COOKIE) && is_array($settings) && !empty($settings)) {
			$available_cookies = array();
			foreach ($settings as $setting) {
				if ($setting['action'] == 'add') {
					$available_cookies[] = $setting['cookie_name'];
				}
			}
			
			if (is_array($available_cookies) && !empty($available_cookies)) {
				foreach ($_COOKIE as $cookie_key => $cookie_value) {
					if (in_array($cookie_key, $available_cookies)) {
						$cache_key .= '-'.$cookie_key.$cookie_value;
					}
				}
			}
		}
		return $cache_key;
	}
	
	function cfcn_add_cacheaction() {
		add_cacheaction('wp_cache_get_cookies_values', 'cfcn_cache_key');
	}
	add_action('init', 'cfcn_add_cacheaction');
}

?>