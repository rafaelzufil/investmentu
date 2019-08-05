<?php
global $maxgalleria_slick_carousel;
$options = new MaxGalleriaSlickSliderOptions();
?>

<script type="text/javascript">		
	jQuery(document).ready(function() {
		jQuery("#save-slick-slider-settings").click(function() {
			jQuery("#save-slick-slider-settings-success").hide();
      			
			var form_data = jQuery("#form-slick-slider-settings").serialize();

			// If slider caption enabled is not checked, we have to add it to form data with an empty value
			if (jQuery("#<?php echo $options->slider_caption_enabled_default_key ?>").is(":not(:checked)")) {
				form_data += "&<?php echo $options->slider_caption_enabled_default_key ?>=";
			}
      
			if (jQuery("#<?php echo $options->slider_adaptive_height_enabled_default_key ?>").is(":not(:checked)")) {
				form_data += "&<?php echo $options->slider_adaptive_height_enabled_default_key ?>=";
			}
      			
			// If slider image click enabled is not checked, we have to add it to form data with an empty value
			if (jQuery("#<?php echo $options->slider_image_click_enabled_default_key ?>").is(":not(:checked)")) {
				form_data += "&<?php echo $options->slider_image_click_enabled_default_key ?>=";
			}
      
			if (jQuery("#<?php echo $options->slider_auto_play_enabled_default_key ?>").is(":checked")) {
				form_data += "&<?php echo $options->slider_auto_play_enabled_default_key ?>=";
			}
      
			if (jQuery("#<?php echo $options->slider_arrows_enabled_default_key ?>").is(":not(:checked)")) {
				form_data += "&<?php echo $options->slider_arrows_enabled_default_key ?>=";
			}
      
			if (jQuery("#<?php echo $options->slider_drag_enabled_default_key ?>").is(":not(:checked)")) {
				form_data += "&<?php echo $options->slider_drag_enabled_default_key ?>=";
			}
      
			if (jQuery("#<?php echo $options->slider_dots_enabled_default_key ?>").is(":not(:checked)")) {
				form_data += "&<?php echo $options->slider_dots_enabled_default_key ?>=";
			}
      
			if (jQuery("#<?php echo $options->slider_fade_enabled_default_key ?>").is(":not(:checked)")) {
				form_data += "&<?php echo $options->slider_fade_enabled_default_key ?>=";
			}
      
			if (jQuery("#<?php echo $options->slider_rtl_enabled_default_key ?>").is(":not(:checked)")) {
				form_data += "&<?php echo $options->slider_rtl_enabled_default_key ?>=";
			}

			if (jQuery("#<?php echo $options->slider_hover_pause_enabled_default_key ?>").is(":not(:checked)")) {
				form_data += "&<?php echo $options->slider_hover_pause_enabled_default_key ?>=";
			}
      
			if (jQuery("#<?php echo $options->slider_pause_on_dots_hover_default_key ?>").is(":not(:checked)")) {
				form_data += "&<?php echo $options->slider_pause_on_dots_hover_default_key ?>=";
			}
      

			if (jQuery("#<?php echo $options->slider_infinite_enabled_default_key ?>").is(":not(:checked)")) {
				form_data += "&<?php echo $options->slider_infinite_enabled_default_key ?>=";
			}

			if (jQuery("#<?php echo $options->slider_lazyload_enabled_default_key ?>").is(":not(:checked)")) {
				form_data += "&<?php echo $options->slider_lazyload_enabled_default_key ?>=";
			}
      
			if (jQuery("#<?php echo $options->slider_touch_move_enabled_default_key ?>").is(":not(:checked)")) {
				form_data += "&<?php echo $options->slider_touch_move_enabled_default_key ?>=";
			}      
      
			if (jQuery("#<?php echo $options->slider_mobile_first_enabled_default_key ?>").is(":not(:checked)")) {
				form_data += "&<?php echo $options->slider_mobile_first_enabled_default_key ?>=";
			}      
      
			if (jQuery("#<?php echo $options->slider_swipe_default_key ?>").is(":not(:checked)")) {
				form_data += "&<?php echo $options->slider_swipe_default_key ?>=";
			}      
      
			if (jQuery("#<?php echo $options->slider_use_css_default_key ?>").is(":not(:checked)")) {
				form_data += "&<?php echo $options->slider_use_css_default_key ?>=";
			}      
      
			if (jQuery("#<?php echo $options->slider_slides_center_mode_default_key ?>").is(":not(:checked)")) {
				form_data += "&<?php echo $options->slider_slides_center_mode_default_key ?>=";
			}      
			
			if (jQuery("#<?php echo $options->ns_show_border_default_key ?>").is(":not(:checked)")) {
				form_data += "&<?php echo $options->ns_show_border_default_key ?>=";
			}			
			
			if (jQuery("#<?php echo $options->hero_mode_default_key ?>").is(":not(:checked)")) {
				form_data += "&<?php echo $options->hero_mode_default_key ?>=";
			}			
			
			if (jQuery("#<?php echo $options->slider_thumbnail_dots_default_key ?>").is(":not(:checked)")) {
				form_data += "&<?php echo $options->slider_thumbnail_dots_default_key ?>=";
			}			
			
			if (jQuery("#<?php echo $options->slider_wait_for_animate_default_key ?>").is(":not(:checked)")) {
				form_data += "&<?php echo $options->slider_wait_for_animate_default_key ?>=";
			}			
			
			if (jQuery("#<?php echo $options->slider_use_css_transform_default_key ?>").is(":not(:checked)")) {
				form_data += "&<?php echo $options->slider_use_css_transform_default_key ?>=";
			}			
			
			if (jQuery("#<?php echo $options->slider_swipe_to_slide_default_key ?>").is(":not(:checked)")) {
				form_data += "&<?php echo $options->slider_swipe_to_slide_default_key ?>=";
			}			
			
			if (jQuery("#<?php echo $options->slider_pause_on_focus_default_key ?>").is(":not(:checked)")) {
				form_data += "&<?php echo $options->slider_pause_on_focus_default_key ?>=";
			}			
			
			if (jQuery("#<?php echo $options->slider_focusOnChange_default_key ?>").is(":not(:checked)")) {
				form_data += "&<?php echo $options->slider_focusOnChange_default_key ?>=";
			}			
						
			if (jQuery("#<?php echo $options->slider_focusOnSelect_default_key ?>").is(":not(:checked)")) {
				form_data += "&<?php echo $options->slider_focusOnSelect_default_key ?>=";
			}			
			
			if (jQuery("#<?php echo $options->slider_accessibility_default_key ?>").is(":not(:checked)")) {
				form_data += "&<?php echo $options->slider_accessibility_default_key ?>=";
			}	
			
			if (jQuery("#<?php echo $options->slider_open_new_tab_default_key ?>").is(":not(:checked)")) {
				form_data += "&<?php echo $options->slider_open_new_tab_default_key ?>=";
			}	
												      
			// Add the action to the form data
			form_data += "&action=save_slick_slider_defaults";
			
			jQuery.ajax({
				type: "POST",
				url: "<?php echo admin_url('admin-ajax.php') ?>",
				data: form_data,
				success: function(message) {
					if (message == "success") {
						jQuery("#save-slick-slider-settings-success").show();
					}
				}
			});
			
			return false;
		});
		
		jQuery("#revert-slick-slider-defaults").click(function() {
			jQuery.each(jQuery("input, select", "#form-slick-slider-settings"), function() {
				var type = jQuery(this)[0].type;
				var default_value = jQuery(this).attr("data-default");
				
				if (type != "hidden") {
					if (type == "checkbox") {
						if (default_value == "on") {
							jQuery(this).attr("checked", "checked");
						}
						else {
							jQuery(this).removeAttr("checked");
						}
					}
					else {
						jQuery(this).val(default_value);
					}
				}
			});
			
			jQuery("#thickness_default").prop('checked', true);
			jQuery("#shadow-default").prop('checked', true);						
			jQuery("#blur-default").prop('checked', true);						
			jQuery("#spread-default").prop('checked', true);						
			jQuery("#default-cssease-type").prop('checked', true);						
			
			return false;
		});
		
		jQuery('#<?php echo $options->ns_border_color_default_key ?>').colpick({
				layout:'hex',
				submit:0,
				colorScheme:'dark',
				onChange:function(hsb,hex,rgb,el,bySetColor) {
					jQuery(el).css('border-color','#'+hex);
					// Fill the text box just if the color was set using the picker, and not the colpickSetColor function.
					if(!bySetColor) jQuery(el).val('#'+hex);
		    }
		}).keyup(function(){
				jQuery(this).colpickSetColor(this.value);
		});		
		
		jQuery('#<?php echo $options->ns_shadow_color_default_key ?>').colpick({
				layout:'hex',
				submit:0,
				colorScheme:'dark',
				onChange:function(hsb,hex,rgb,el,bySetColor) {
					jQuery(el).css('border-color','#'+hex);
					// Fill the text box just if the color was set using the picker, and not the colpickSetColor function.
					if(!bySetColor) jQuery(el).val('#'+hex);
		    }
		}).keyup(function(){
				jQuery(this).colpickSetColor(this.value);
		});		
		
		
		jQuery('#<?php echo $options->ns_border_color_default_key ?>').css('border-color','<?php echo $options->get_border_color(); ?>');
		jQuery('#<?php echo $options->ns_shadow_color_default_key ?>').css('border-color','<?php echo $options->get_shadow_color(); ?>');
		
	});
</script>

		<?php 
			$license 	= get_option( 'mg_edd_slick_license_key' );
			$status 	= get_option( 'mg_edd_slick_license_status' );
      $new_license = get_option(MGSLICK_NEW_LICENSE, 'off');
      
      $options->check_license();
      $class = "";
      $disabled = "";
      $expired = false;
      $today = strtotime(date("Y-m-d"));
      $expiration_date = strtotime($options->license_expiration);
      
      if($expiration_date <= $today) {
        $class = 'red';
        $expired = true;
        $disabled = 'disabled';
      }
      
      if($new_license == 'on') {
        $disabled = "";
        $license = "";
        update_option(MGSLICK_NEW_LICENSE, 'off');
      }
      
		?>	
		
		<div styel="clear:both"></div>
		<h3><?php _e('Plugin License Options', 'maxgalleria-slick-carousel'); ?></h3>
		<form id="edd" method="post" action="options.php">

			<?php settings_fields('edd_slick_license'); ?>

			<table>
				<tbody>
					<tr valign="top">
						<th scope="row" valign="top">
							<?php _e('License Key', 'maxgalleria-slick-carousel'); ?>
						</th>
						<td>
							<input id="edd_slick_license_key" name="mg_edd_slick_license_key" type="text" value="<?php esc_attr_e( $license ); ?>" />
							<label class="description" for="mg_edd_slick_license_key"><?php _e('Enter your license key, click the Save Changes button and then click Activate License.', 'maxgalleria-slick-carousel'); ?></label>
						</td>
					</tr>
					<?php if( false !== $license ) { ?>
						<tr valign="top">
							<th scope="row" valign="top">
								<?php // _e('Activate License', 'maxgalleria-slick-carousel'); ?>
							</th>
							<td>
								<?php if( $status !== false && $status == 'valid' ) { ?>
									<span style="color:green;"><?php _e('active'); ?></span>
									<?php wp_nonce_field( 'edd_slick_nonce', 'edd_slick_nonce' ); ?>
									<input type="submit" class="button button-primary" <?php echo $disabled; ?> name="edd_slick_license_deactivate" value="<?php _e('Deactivate License', 'maxgalleria-slick-carousel'); ?>"/>
								<?php } else {
									wp_nonce_field( 'edd_slick_nonce', 'edd_slick_nonce' ); ?>
									<input type="submit" class="button button-primary" <?php echo $disabled; ?> name="edd_slick_license_activate" value="<?php _e('Activate License', 'maxgalleria-slick-carousel'); ?>"/>
								<?php } ?>
                <?php
                if($expired) {
                  $link = "https://maxgalleria.com/checkout/?edd_license_key=$license";
									echo '<a href="' . $link . '" class="button-secondary" id="license_renew" >' . __('Renew License', 'maxgalleria-media-library') . '</a>' . PHP_EOL;                  
									echo '<input type="submit" class="button-secondary" name="edd_slick_license_deactivate2" value="' . __('Enter New License Key', 'maxgalleria-media-library') , '"/>' . PHP_EOL;
                }
                ?>
							</td>
						</tr>
            <?php if($license != "") { ?>
            <tr>
              <th></th>
              <td><?php _e('Expiration Date: ', 'maxgalleria-slick-carousel');
              echo "<span class='$class'>" . date("F d, Y", $expiration_date) . "</span>"; 
              ?></td>
            </tr>            
  					<?php } ?>
					<?php } ?>
				</tbody>
			</table>
			<?php submit_button(); ?>

		</form>
    
<?php     
error_log("valid " . $maxgalleria_slick_carousel->license_valid);
if($maxgalleria_slick_carousel->license_valid == 'valid') {
  
?>    

<div id="save-slick-slider-settings-success" class="alert alert-success" style="display: none;">
	<?php _e('Settings saved.', 'maxgalleria-slick-carousel') ?>
</div>

<div class="settings-title">
	<?php _e('Slick Slider Defaults', 'maxgalleria-slick-carousel') ?>
</div>

<div class="settings-options">  
  <?php $credit = __('Made with love with the ', 'maxgalleria-slick-carousel') . '<a href="http://kenwheeler.github.io/slick/" target="_blank">Slick Javascript Library</a>' . __(' by', 'maxgalleria-slick-carousel') . ' <a href="http://kenwheeler.github.io/" target="_blank">Ken Wheeler</a>'; ?>
  <p class="note"><?php echo $credit; ?></p>
	<p class="note"><?php _e('These are the default settings that will be used every time you create a gallery with the Image Slider template. Each of these settings can be changed per gallery.', 'maxgalleria-slick-carousel') ?></p>
	
	<form id="form-slick-slider-settings">
    
		<table cellpadding="0" cellspacing="0">
			<tr>
				<td colspan="2" class="options-heading"><span class="mg-heading"><?php _e('IMAGE OPTIONS', 'maxgalleria-slick-carousel') ?></span></td>
			</tr>
			<tr>
				<td class="padding-top"><?php _e('Preset Layouts:', 'maxgalleria-slick-carousel') ?></td>
				<td class="padding-top">
					<?php if($options->hide_presets === 'off') 
						$skins = array_merge($options->new_skins, $options->skins );
							else
						$skins = $options->new_skins;
					 ?>				
					<select data-default="<?php echo $options->skin_default ?>" id="<?php echo $options->skin_default_key ?>" name="<?php echo $options->skin_default_key ?>">
					<?php foreach ($skins as $key => $name) { ?>
						<?php $selected = ($options->get_skin_default() == $key) ? 'selected="selected"' : ''; ?>
						<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $name ?></option>
					<?php } ?>
					</select>
				</td>
			</tr>   
			<tr>
				<td><?php _e('Display Border:', 'maxgalleria-slick-carousel') ?></td>
				<td>
					<input data-default="<?php echo $options->ns_show_border_default ?>" type="checkbox" id="<?php echo $options->ns_show_border_default_key ?>" name="<?php echo $options->ns_show_border_default_key ?>" <?php echo (($options->get_show_border_default() == 'on') ? 'checked' : '') ?> />
				</td>
			</tr>
			<tr>
				<td><?php _e('Border Thickness:', 'maxgalleria-slick-carousel') ?></td>
				<td>
				  <table class="mg-settings">
						<tr>
							<td class="mg-radio">
								<input data-default="<?php echo $options->ns_border_thickness_default ?>"  id="thickness_default" type="radio" name="<?php echo $options->ns_border_thickness_default_key ?>" value="1" class="border-thickness" <?php echo ($options->get_border_thickness_default() === '1') ? 'checked' : ''; ?>>
							</td>
							<td class="mg-radio">
								<input type="radio" name="<?php echo $options->ns_border_thickness_default_key ?>" value="3" class="border-thickness" <?php echo ($options->get_border_thickness_default() === '3') ? 'checked' : ''; ?>>
							</td>
							<td class="mg-radio">
								<input type="radio" name="<?php echo $options->ns_border_thickness_default_key ?>" value="5" class="border-thickness" <?php echo ($options->get_border_thickness_default() === '5') ? 'checked' : ''; ?>>
							</td>
							<td class="mg-radio">
								<input type="radio" name="<?php echo $options->ns_border_thickness_default_key ?>" value="7" class="border-thickness" <?php echo ($options->get_border_thickness_default() === '7') ? 'checked' : ''; ?>>
							</td>
							<td class="mg-radio">
								<input type="radio" name="<?php echo $options->ns_border_thickness_default_key ?>" value="9" class="border-thickness" <?php echo ($options->get_border_thickness_default() === '9') ? 'checked' : ''; ?>>
							</td>
							<td class="mg-radio">
								<input type="radio" name="<?php echo $options->ns_border_thickness_default_key ?>" value="15" class="border-thickness" <?php echo ($options->get_border_thickness_default() === '15') ? 'checked' : ''; ?>>
							</td>
						</tr>	
						<tr>
							<td>
								<img title="<?php _e('1 pixel', 'maxgalleria-slick-carousel') ?>" alt="<?php _e('border thickness 1 pixel', 'maxgalleria-slick-carousel') ?>" src="<?php echo MAXGALLERIA_SLICK_CAROUSEL_PLUGIN_URL ?>/images/options-icons/border-01.png" >
							</td>
							<td>
								<img title="<?php _e('3 pixels', 'maxgalleria-slick-carousel') ?>" alt="<?php _e('border thickness 3 pixels', 'maxgalleria-slick-carousel') ?>" src="<?php echo MAXGALLERIA_SLICK_CAROUSEL_PLUGIN_URL ?>/images/options-icons/border-03.png" >
							</td>
							<td>
								<img title="<?php _e('5 pixels', 'maxgalleria-slick-carousel') ?>" alt="<?php _e('border thickness 5 pixels', 'maxgalleria-slick-carousel') ?>" src="<?php echo MAXGALLERIA_SLICK_CAROUSEL_PLUGIN_URL ?>/images/options-icons/border-05.png" >
							</td>
							<td>
								<img title="<?php _e('7 pixels', 'maxgalleria-slick-carousel') ?>" alt="<?php _e('border thickness 7 pixels', 'maxgalleria-slick-carousel') ?>" src="<?php echo MAXGALLERIA_SLICK_CAROUSEL_PLUGIN_URL ?>/images/options-icons/border-07.png" >
							</td>
							<td>
								<img title="<?php _e('9 pixels', 'maxgalleria-slick-carousel') ?>" alt="<?php _e('border thickness 9 pixels', 'maxgalleria-slick-carousel') ?>" src="<?php echo MAXGALLERIA_SLICK_CAROUSEL_PLUGIN_URL ?>/images/options-icons/border-09.png" >
							</td>
							<td>
								<img title="<?php _e('15 pixel', 'maxgalleria-slick-carousel') ?>" alt="<?php _e('border thickness 15 pixels', 'maxgalleria-slick-carousel') ?>" src="<?php echo MAXGALLERIA_SLICK_CAROUSEL_PLUGIN_URL ?>/images/options-icons/border-15.png" >
							</td>
						</tr>
					</table>
				</td>								
			</tr>
			<tr>
				<td><?php _e('Border Color:', 'maxgalleria-slick-carousel') ?></td>
				<td>
					<img id="<?php echo $options->ns_border_color_default_key . '2' ?>" class="left" alt="border color button" src="<?php echo MAXGALLERIA_PLUGIN_URL ?>/images/options-icons/color.png">
					<input class="color-input" data-default="<?php echo $options->ns_border_color_default ?>" type="text" id="<?php echo $options->ns_border_color_default_key ?>" name="<?php echo $options->ns_border_color_default_key ?>" value="<?php echo $options->get_border_color_default() ?>" />
				</td>
			</tr>			
			<tr>
				<td><?php _e('Shadow Type:', 'maxgalleria-slick-carousel') ?></td>
				<td>
				  <table class="mg-settings">
						<tr>
							<td class="mg-radio">
								<input data-default="<?php echo $options->ns_shadow_default ?>" id="shadow-default" type="radio" name="<?php echo $options->ns_shadow_default_key ?>" value="none" class="ns-shadow-type" <?php echo ($options->get_shadow_default() === 'none') ? 'checked' : ''; ?>>
							</td>
							<td class="mg-radio">
								<input type="radio" name="<?php echo $options->ns_shadow_default_key ?>" value="inside" class="ns-shadow-type" <?php echo ($options->get_shadow_default() === 'inside') ? 'checked' : ''; ?>>
							</td>
							<td class="mg-radio">
								<input type="radio" name="<?php echo $options->ns_shadow_default_key ?>" value="behind" class="ns-shadow-type" <?php echo ($options->get_shadow_default() === 'behind') ? 'checked' : ''; ?>>
							</td>
							<td class="mg-radio">
								<input type="radio" id="shadow-color-option" name="<?php echo $options->ns_shadow_default_key ?>" value="color" class="ns-shadow-type" <?php echo ($options->get_shadow_default() === 'color') ? 'checked' : ''; ?>>
							</td>
						</tr>
						<tr>
							<td>
								<img title="<?php _e('No shadow', 'maxgalleria-slick-carousel') ?>" alt="<?php _e('no shadow style', 'maxgalleria-slick-carousel') ?>" src="<?php echo MAXGALLERIA_PLUGIN_URL ?>/images/options-icons/shadow-none.png">
							</td>
							<td>
								<img title="<?php _e('Inside shadow', 'maxgalleria-slick-carousel') ?>" alt="<?php _e('inside shadow style', 'maxgalleria-slick-carousel') ?>" src="<?php echo MAXGALLERIA_PLUGIN_URL ?>/images/options-icons/shadow-inside.png" >
							</td>
							<td>
								<img title="<?php _e('Behind shadow', 'maxgalleria-slick-carousel') ?>" alt="<?php _e('behind shadow style', 'maxgalleria-slick-carousel') ?>" src="<?php echo MAXGALLERIA_PLUGIN_URL ?>/images/options-icons/shadow-behind.png" >
							</td>
							<td>
								<img title="<?php _e('Color shadow', 'maxgalleria-slick-carousel') ?>" alt="<?php _e('color shadow style', 'maxgalleria-slick-carousel') ?>" src="<?php echo MAXGALLERIA_PLUGIN_URL ?>/images/options-icons/shadow-color.png" >
							</td>
						</tr>
					</table>
				</td>								
			</tr>
			<tr>
				<td><?php _e('Shadow Color:', 'maxgalleria-slick-carousel') ?></td>
				<td>
					<img id="<?php echo $options->ns_shadow_color_default_key . '2' ?>" class="left" alt="border color button" src="<?php echo MAXGALLERIA_PLUGIN_URL ?>/images/options-icons/color.png">
					<input class="color-input" data-default="<?php echo $options->ns_shadow_color_default ?>" type="text" id="<?php echo $options->ns_shadow_color_default_key ?>" name="<?php echo $options->ns_shadow_color_default_key ?>" value="<?php echo $options->get_shadow_color_default() ?>" />
				</td>
			</tr>												
			<tr>
				<td><?php _e('Shadow Blur:', 'maxgalleria-slick-carousel') ?></td>
				<td>
				  <table class="mg-settings">
						<tr>
							<td class="mg-radio">
								<input data-default="<?php echo $options->ns_shadow_blur_default ?>"  id="blur-default" type="radio" name="<?php echo $options->ns_shadow_blur_default_key ?>" value="5" class="ns-blur-type" <?php echo ($options->get_shadow_blur_default() === '5') ? 'checked' : ''; ?>>
							</td>
							<td class="mg-radio">
								<input type="radio" name="<?php echo $options->ns_shadow_blur_default_key ?>" value="10" class="ns-blur-type" <?php echo ($options->get_shadow_blur_default() === '10') ? 'checked' : ''; ?>>
							</td>
							<td class="mg-radio">
								<input type="radio" name="<?php echo $options->ns_shadow_blur_default_key ?>" value="15" class="ns-blur-type" <?php echo ($options->get_shadow_blur_default() === '15') ? 'checked' : ''; ?>>
							</td>
							<td class="mg-radio">
								<input type="radio" name="<?php echo $options->ns_shadow_blur_default_key ?>" value="20" class="ns-blur-type" <?php echo ($options->get_shadow_blur_default() === '20') ? 'checked' : ''; ?>>
							</td>
						</tr>
						<tr>
							<td>
								<img title="<?php _e('5 pixels', 'maxgalleria-slick-carousel') ?>" alt="<?php _e('5 pixel blur', 'maxgalleria-slick-carousel') ?>" src="<?php echo MAXGALLERIA_PLUGIN_URL ?>/images/options-icons/shadow-blur-5.png">
							</td>
							<td>
								<img title="<?php _e('10 pixels', 'maxgalleria-slick-carousel') ?>" alt="<?php _e('10 pixel blur', 'maxgalleria-slick-carousel') ?>" src="<?php echo MAXGALLERIA_PLUGIN_URL ?>/images/options-icons/shadow-blur-10.png">
							</td>
							<td>
								<img title="<?php _e('15 pixels', 'maxgalleria-slick-carousel') ?>" alt="<?php _e('15 pixel blur', 'maxgalleria-slick-carousel') ?>" src="<?php echo MAXGALLERIA_PLUGIN_URL ?>/images/options-icons/shadow-blur-15.png">
							</td>
							<td>
								<img title="<?php _e('20 pixels', 'maxgalleria-slick-carousel') ?>" alt="<?php _e('20 pixel blur', 'maxgalleria-slick-carousel') ?>" src="<?php echo MAXGALLERIA_PLUGIN_URL ?>/images/options-icons/shadow-blur-20.png">
							</td>
						</tr>
					</table>
				</td>												
			</tr>			
			<tr>
				<td><?php _e('Shadow Spread:', 'maxgalleria-slick-carousel') ?></td>
				<td>
				  <table class="mg-settings">
						<tr>
							<td class="mg-radio">
								<input data-default="<?php echo $options->ns_shadow_spread_default ?>"  id="spread-default" type="radio" name="<?php echo $options->ns_shadow_spread_default_key ?>" value="0" class="ns-spread-type" <?php echo ($options->get_shadow_spread_default() === '0') ? 'checked' : ''; ?>>
							</td>
							<td class="mg-radio">
								<input type="radio" name="<?php echo $options->ns_shadow_spread_default_key ?>" value="1" class="ns-spread-type" <?php echo ($options->get_shadow_spread_default() === '1') ? 'checked' : ''; ?>>
							</td>
							<td class="mg-radio">
								<input type="radio" name="<?php echo $options->ns_shadow_spread_default_key ?>" value="2" class="ns-spread-type" <?php echo ($options->get_shadow_spread_default() === '2') ? 'checked' : ''; ?>>
							</td>
							<td class="mg-radio">
								<input type="radio" name="<?php echo $options->ns_shadow_spread_default_key ?>" value="3" class="ns-spread-type" <?php echo ($options->get_shadow_spread_default() === '3') ? 'checked' : ''; ?>>
							</td>
						</tr>
						<tr>
							<td>
								<img title="<?php _e('0 pixel spread', 'maxgalleria-slick-carousel') ?>" alt="<?php _e('0 pixel spread', 'maxgalleria-slick-carousel') ?>" src="<?php echo MAXGALLERIA_PLUGIN_URL ?>/images/options-icons/shadow-spread-0.png">
							</td>
							<td>
								<img title="<?php _e('1 pixel spread', 'maxgalleria-slick-carousel') ?>" alt="<?php _e('1 pixel spread', 'maxgalleria-slick-carousel') ?>" src="<?php echo MAXGALLERIA_PLUGIN_URL ?>/images/options-icons/shadow-spread-1.png">
							</td>
							<td>
								<img title="<?php _e('2 pixels spread', 'maxgalleria-slick-carousel') ?>" alt="<?php _e('2 pixels spread', 'maxgalleria-slick-carousel') ?>" src="<?php echo MAXGALLERIA_PLUGIN_URL ?>/images/options-icons/shadow-spread-2.png">
							</td>
							<td>
								<img title="<?php _e('3 pixels spread', 'maxgalleria-slick-carousel') ?>" alt="<?php _e('3 pixels spread', 'maxgalleria-slick-carousel') ?>" src="<?php echo MAXGALLERIA_PLUGIN_URL ?>/images/options-icons/shadow-spread-3.png">
							</td>
						</tr>
					</table>
				</td>												
			</tr>									
			<tr>
				<td colspan="2" class="options-heading"><span class="mg-heading"><?php _e('SLICK SLIDER OPTIONS', 'maxgalleria-slick-carousel') ?></span></td>
			</tr>
						
			<tr>
				<td class="padding-top"><?php _e('Arrow Styles:', 'maxgalleria-slick-carousel'); ?></td>
				<td class="padding-top">
					<table id="arrow-table">
						<tr>
							<td class="mg-radio">
								<input id="default-arrow-type" data-default="<?php echo $options->ns_arrow_default ?>" type="radio" name="<?php echo $options->ns_arrow_default_key ?>" value="0" class="close-button default-arrows" <?php echo ($options->get_arrow_default() === '0') ? 'checked' : ''; ?>>
							</td>
							<td class="mg-radio">
								<input type="radio" name="<?php echo $options->ns_arrow_default_key ?>" value="1" class="close-button default-arrows" <?php echo ($options->get_arrow_default() === '1') ? 'checked' : ''; ?>>
							</td>
							<td class="mg-radio">
								<input type="radio" name="<?php echo $options->ns_arrow_default_key ?>" value="2" class="close-button default-arrows" <?php echo ($options->get_arrow_default() === '2') ? 'checked' : ''; ?>>
							</td>
							<td class="mg-radio">
								<input type="radio" name="<?php echo $options->ns_arrow_default_key ?>" value="3" class="close-button default-arrows" <?php echo ($options->get_arrow_default() === '3') ? 'checked' : ''; ?>>
							</td>
							<td class="mg-radio">
								<input type="radio" name="<?php echo $options->ns_arrow_default_key ?>" value="4" class="close-button default-arrows" <?php echo ($options->get_arrow_default() === '4') ? 'checked' : ''; ?>>
							</td>
							<td class="mg-radio">
								<input type="radio" name="<?php echo $options->ns_arrow_default_key ?>" value="5" class="close-button default-arrows" <?php echo ($options->get_arrow_default() === '5') ? 'checked' : ''; ?>>
							</td>
							<td class="mg-radio">
								<input type="radio" name="<?php echo $options->ns_arrow_default_key ?>" value="6" class="close-button default-arrows" <?php echo ($options->get_arrow_default() === '6') ? 'checked' : ''; ?>>
							</td>
							<td class="mg-radio">
								<input type="radio" name="<?php echo $options->ns_arrow_default_key ?>" value="7" class="close-button default-arrows" <?php echo ($options->get_arrow_default() === '7') ? 'checked' : ''; ?>>
							</td>
						</tr>	
						<tr style="background-color:#3C3C3C">
							<td>
								<img class="mg-float" alt="arrow style 0" src="<?php echo MAXGALLERIA_SLICK_CAROUSEL_PLUGIN_URL ?>/images/icons/arrow-style-0l-wt.png" >
								<img class="mg-float" alt="arrow style 0" src="<?php echo MAXGALLERIA_SLICK_CAROUSEL_PLUGIN_URL ?>/images/icons/arrow-style-0r-wt.png" >
							</td>
							<td>
								<img class="mg-float" alt="arrow style 1" src="<?php echo MAXGALLERIA_SLICK_CAROUSEL_PLUGIN_URL ?>/images/icons/arrow-style-1l-wt.png" >
								<img class="mg-float" alt="arrow style 1" src="<?php echo MAXGALLERIA_SLICK_CAROUSEL_PLUGIN_URL ?>/images/icons/arrow-style-1r-wt.png" >
							</td>
							<td>
								<img class="mg-float" alt="arrow style 2" src="<?php echo MAXGALLERIA_SLICK_CAROUSEL_PLUGIN_URL ?>/images/icons/arrow-style-2l-wt.png" >
								<img class="mg-float" alt="arrow style 2" src="<?php echo MAXGALLERIA_SLICK_CAROUSEL_PLUGIN_URL ?>/images/icons/arrow-style-2r-wt.png" >
							</td>
							<td>
								<img class="mg-float" alt="arrow style 3" src="<?php echo MAXGALLERIA_SLICK_CAROUSEL_PLUGIN_URL ?>/images/icons/arrow-style-3l-wt.png" >
								<img class="mg-float" alt="arrow style 3" src="<?php echo MAXGALLERIA_SLICK_CAROUSEL_PLUGIN_URL ?>/images/icons/arrow-style-3r-wt.png" >
							</td>
							<td>
								<img class="mg-float" alt="arrow style 4" src="<?php echo MAXGALLERIA_SLICK_CAROUSEL_PLUGIN_URL ?>/images/icons/arrow-style-4l-wt.png" >
								<img class="mg-float" alt="arrow style 4" src="<?php echo MAXGALLERIA_SLICK_CAROUSEL_PLUGIN_URL ?>/images/icons/arrow-style-4r-wt.png" >
							</td>
							<td>
								<img class="mg-float" alt="arrow style 5" src="<?php echo MAXGALLERIA_SLICK_CAROUSEL_PLUGIN_URL ?>/images/icons/arrow-style-5l-wt.png" >
								<img class="mg-float" alt="arrow style 5" src="<?php echo MAXGALLERIA_SLICK_CAROUSEL_PLUGIN_URL ?>/images/icons/arrow-style-5r-wt.png" >
							</td>
							<td>
								<img class="mg-float" alt="arrow style 6" src="<?php echo MAXGALLERIA_SLICK_CAROUSEL_PLUGIN_URL ?>/images/icons/arrow-style-6l-wt.png" >
								<img class="mg-float" alt="arrow style 6" src="<?php echo MAXGALLERIA_SLICK_CAROUSEL_PLUGIN_URL ?>/images/icons/arrow-style-6r-wt.png" >
							</td>
							<td>
								<img class="mg-float" alt="arrow style 7" src="<?php echo MAXGALLERIA_SLICK_CAROUSEL_PLUGIN_URL ?>/images/icons/arrow-style-7l-wt.png" >
								<img class="mg-float" alt="arrow style 7" src="<?php echo MAXGALLERIA_SLICK_CAROUSEL_PLUGIN_URL ?>/images/icons/arrow-style-7r-wt.png" >
							</td>
						</tr>
					</table>
				</td>
			</tr>
			
			<tr>
				<td><?php _e('Use Custom Arrows (requires hero mode to be checked):', 'maxgalleria-slick-carousel') ?></td>
				<td>
					<input data-default="<?php echo $options->hero_custom_arrow_default ?>" type="checkbox" id="<?php echo $options->hero_custom_arrow_default_key ?>" name="<?php echo $options->hero_custom_arrow_default_key ?>" <?php echo (($options->get_hero_custom_arrow_default() == 'on') ? 'checked' : '') ?> />
				</td>
			</tr>														
			<tr>                
				<td>
					<?php _e('Custom Left Arrow:', 'maxgalleria-slick-carousel') ?>
	      </td>
				<td>          
					<input data-default="<?php echo $options->hero_left_arrow_default; ?>" type="text" class="wide arrow-options" id="<?php echo $options->hero_left_arrow_default_key ?>" name="<?php echo $options->hero_left_arrow_default_key ?>" value="<?php echo $options->get_hero_left_arrow_default() ?>" />
					<input class="button arrow-options" id="upload_left_arrow" type="button" value="Upload Left Arrow" />
				</td>
			</tr>
			<tr>                
				<td>
					<?php _e('Custom Right Arrow:', 'maxgalleria-slick-carousel') ?>
	      </td>
				<td>          
					<input data-default="<?php echo $options->hero_right_arrow_default; ?>" type="text" class="wide arrow-options" id="<?php echo $options->hero_right_arrow_default_key ?>" name="<?php echo $options->hero_left_arrow_default_key ?>" value="<?php echo $options->get_hero_left_arrow_default() ?>" />
					<input class="button arrow-options" id="upload_right_arrow" type="button" value="Upload Right Arrow" />
				</td>
			</tr>			
			<tr>
				<td><?php _e('Custom Arrow Width', 'maxgalleria-slick-carousel') ?></td>
				<td>
					<input data-default="<?php echo $options->hero_arrow_width_default; ?>" type="text" class="small arrow-options" id="<?php echo $options->hero_arrow_width_default_key ?>" name="<?php echo $options->hero_arrow_width_default_key ?>" value="<?php echo $options->get_hero_arrow_width_default() ?>" /> pixels
				</td>
			</tr>
			<tr>
				<td><?php _e('Custom Arrow Height', 'maxgalleria-slick-carousel') ?></td>
				<td>
					<input data-default="<?php echo $options->hero_arrow_height_default; ?>" type="text" class="small arrow-options" id="<?php echo $options->hero_arrow_height_default_key ?>" name="<?php echo $options->hero_arrow_height_default_key ?>" value="<?php echo $options->get_hero_arrow_height_default() ?>" /> pixels
				</td>
			</tr>						
			
			<tr>
				<td><?php _e('Hide Arrows:', 'maxgalleria-slick-carousel') ?></td>
				<td>
					<input data-default="<?php echo $options->slider_arrows_enabled_default ?>" type="checkbox" id="<?php echo $options->slider_arrows_enabled_default_key ?>" name="<?php echo $options->slider_arrows_enabled_default_key ?>" <?php echo (($options->get_slider_arrows_enabled_default() == 'on') ? 'checked' : '') ?> />
				</td>
			</tr>			
			
			<tr>
				<td><?php _e('Accessibility:', 'maxgalleria-slick-carousel') ?></td>
				<td>
					<input data-default="<?php echo $options->slider_accessibility_default ?>" type="checkbox" id="<?php echo $options->slider_accessibility_default_key ?>" name="<?php echo $options->slider_accessibility_default_key ?>" <?php echo (($options->get_accessibility_default() == 'on') ? 'checked' : '') ?> />
				</td>
			</tr>						
			<tr>
				<td class="mg-italic" colspan = "2">
					<?php _e('Enables tabbing and arrow key navigation.', 'maxgalleria-slick-carousel') ?>
				</td>
			</tr>			
			
			<tr>
				<td><?php _e('Number of Slides to Scroll:', 'maxgalleria-image-slider') ?></td>
				<td>
					<select data-default="<?php echo $options->slider_slides_to_scroll_default ?>" id="<?php echo $options->slider_slides_to_scroll_default_key ?>" name="<?php echo $options->slider_slides_to_scroll_default_key ?>">
					<?php foreach ($options->slider_number_of_slides as $key => $name) { ?>
						<?php $selected = ($options->get_slider_slides_to_scroll_default() == $key) ? 'selected="selected"' : ''; ?>
						<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $name ?></option>
					<?php } ?>
					</select>
				</td>
			</tr>
			
			<tr>
				<td><?php _e('Number of Slides to Show:', 'maxgalleria-image-slider') ?></td>
				<td>
					<select data-default="<?php echo $options->slider_slides_to_show_default ?>" id="<?php echo $options->slider_slides_to_show_default_key ?>" name="<?php echo $options->slider_slides_to_show_default_key ?>">
					<?php foreach ($options->slider_number_of_slides as $key => $name) { ?>
						<?php $selected = ($options->get_slider_slides_to_show_default() == $key) ? 'selected="selected"' : ''; ?>
						<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $name ?></option>
					<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td class="mg-italic" colspan = "2"><?php _e('This is how many slides you want to show at one time.', 'maxgalleria-slick-carousel') ?></td>
			</tr>	
			
			<tr>
				<td><?php _e('Number of Rows:', 'maxgalleria-image-slider') ?></td>
				<td>
					<select data-default="<?php echo $options->slider_rows_default ?>" id="<?php echo $options->slider_rows_default_key ?>" name="<?php echo $options->slider_rows_default_key ?>">
					<?php foreach ($options->slider_number_of_rows as $key => $name) { ?>
						<?php $selected = ($options->get_rows_default() == $key) ? 'selected="selected"' : ''; ?>
						<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $name ?></option>
					<?php } ?>
					</select>
				</td>
			</tr>
			
			<tr>
				<td><?php _e('Number of Sliders per Row', 'maxgalleria-slick-carousel') ?></td>
				<td>
					<input data-default="<?php echo $options->slider_slides_per_row_default; ?>" type="text" class="small" id="<?php echo $options->slider_slides_per_row_default_key ?>" name="<?php echo $options->slider_slides_per_row_default_key ?>" value="<?php echo $options->get_slides_per_row_default() ?>" />
				</td>
			</tr>
			
			
			<tr>
				<td><?php _e('Initial Slide:', 'maxgalleria-slick-carousel') ?></td>
				<td>
					<input data-default="<?php echo $options->slider_initial_slide_enabled_default; ?>" type="text" class="small" id="<?php echo $options->slider_initial_slide_enabled_default_key ?>" name="<?php echo $options->slider_initial_slide_enabled_default_key ?>" value="<?php echo $options->get_slider_initial_slide_enabled_default() ?>" />
				</td>
			</tr>
			<tr>
				<td class="mg-italic" colspan = "2"><?php _e('Go to the Images tab and count down from the top until you reach the slide you want to start with.  Start your count with 0.', 'maxgalleria-slick-carousel') ?></td>
			</tr>	
      			
			<tr>
				<td><?php _e('Adaptive Height Enabled:', 'maxgalleria-slick-carousel') ?></td>
				<td>
					<input data-default="<?php echo $options->slider_adaptive_height_enabled_default ?>" type="checkbox" id="<?php echo $options->slider_adaptive_height_enabled_default_key ?>" name="<?php echo $options->slider_adaptive_height_enabled_default_key ?>" <?php echo (($options->get_slider_adaptive_height_enabled_default() == 'on') ? 'checked' : '') ?> />
				</td>
			</tr>
			<tr>
				<td><?php _e('Slider Captions Enabled:', 'maxgalleria-slick-carousel') ?></td>
				<td>
					<input data-default="<?php echo $options->slider_caption_enabled_default ?>" type="checkbox" id="<?php echo $options->slider_caption_enabled_default_key ?>" name="<?php echo $options->slider_caption_enabled_default_key ?>" <?php echo (($options->get_slider_caption_enabled_default() == 'on') ? 'checked' : '') ?> />
				</td>
			</tr>
			<tr>
				<td><?php _e('Slider Image Click Enabled:', 'maxgalleria-slick-carousel') ?></td>
				<td>
					<input data-default="<?php echo $options->slider_image_click_enabled_default ?>" type="checkbox" id="<?php echo $options->slider_image_click_enabled_default_key ?>" name="<?php echo $options->slider_image_click_enabled_default_key ?>" <?php echo (($options->get_slider_image_click_enabled_default() == 'on') ? 'checked' : '') ?> />
				</td>
			</tr>
			<tr>
				<td><?php _e('Slider Image Click Should Open:', 'maxgalleria-slick-carousel') ?></td>
				<td>
					<select data-default="<?php echo $options->slider_image_click_open_default ?>" id="<?php echo $options->slider_image_click_open_default_key ?>" name="<?php echo $options->slider_image_click_open_default_key ?>">
					<?php foreach ($options->slider_image_clicks as $key => $name) { ?>
						<?php $selected = ($options->get_slider_image_click_open_default() == $key) ? 'selected="selected"' : ''; ?>
						<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $name ?></option>
					<?php } ?>
					</select>
				</td>
			</tr>
			
			<tr>
				<td><?php _e('Open Image Link in a New Tab:', 'maxgalleria-slick-carousel') ?></td>
				<td>
					<input data-default="<?php echo $options->slider_open_new_tab_default ?>" type="checkbox" id="<?php echo $options->slider_open_new_tab_default_key ?>" name="<?php echo $options->slider_open_new_tab_default_key ?>" <?php echo (($options->get_open_new_tab_default() == 'on') ? 'checked' : '') ?> />
				</td>
			</tr>
			
			<tr>
				<td><?php _e('Disable Auto Play:', 'maxgalleria-slick-carousel') ?></td>
				<td>
					<input data-default="<?php echo $options->slider_auto_play_enabled_default ?>" type="checkbox" id="<?php echo $options->slider_auto_play_enabled_default_key ?>" name="<?php echo $options->slider_auto_play_enabled_default_key ?>" <?php echo (($options->get_slider_auto_play_enabled_default() == 'on') ? 'checked' : '') ?> />
				</td>
			</tr>
			<tr>
				<td><?php _e('Auto Play Speed:', 'maxgalleria-slick-carousel') ?></td>
				<td>
					<select data-default="<?php echo $options->slider_slideshow_speed_default ?>" id="<?php echo $options->slider_slideshow_speed_default_key ?>" name="<?php echo $options->slider_slideshow_speed_default_key ?>">
					<?php foreach ($options->slider_slideshow_speeds as $key => $name) { ?>
						<?php $selected = ($options->get_slider_slideshow_speed_default() == $key) ? 'selected="selected"' : ''; ?>
						<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $name ?></option>
					<?php } ?>
					</select>
					(<?php _e('in seconds', 'maxgalleria-slick-carousel') ?>)
				</td>
			</tr>
			<tr>
				<td><?php _e('Container Width: (in pixels with "px" or as percent with "%")', 'maxgalleria-slick-carousel') ?></td>
				<td>
					<input data-default="<?php echo $options->slider_slides_container_width_default; ?>" type="text" class="small" id="<?php echo $options->slider_slides_container_width_default_key ?>" name="<?php echo $options->slider_slides_container_width_default_key ?>" value="<?php echo $options->get_slider_slides_container_width_default() ?>" />
				</td>
			</tr>
			<tr>
				<td><?php _e('Center Mode Enabled:', 'maxgalleria-slick-carousel') ?></td>
				<td>
					<input data-default="<?php echo $options->slider_slides_center_mode_default ?>" type="checkbox" id="<?php echo $options->slider_slides_center_mode_default_key ?>" name="<?php echo $options->slider_slides_center_mode_default_key ?>" <?php echo (($options->get_slider_center_mode_default() == 'on') ? 'checked' : '') ?> />
				</td>
			</tr>
			
<!--			<tr>
				<td><?php _e('Center Padding: (in pixels with "px" or as percent with "%")', 'maxgalleria-slick-carousel') ?></td>
				<td>
					<input data-default="<?php echo $options->slider_slides_center_padding_default; ?>" type="text" class="small" id="<?php echo $options->slider_slides_center_padding_default_key ?>" name="<?php echo $options->slider_slides_center_padding_default_key ?>" value="<?php echo $options->get_slider_center_padding_default() ?>" />
				</td>
			</tr>-->
			
			<tr>
				<td><?php _e('Display Dots:', 'maxgalleria-slick-carousel') ?></td>
				<td>
					<input data-default="<?php echo $options->slider_dots_enabled_default ?>" type="checkbox" id="<?php echo $options->slider_dots_enabled_default_key ?>" name="<?php echo $options->slider_dots_enabled_default_key ?>" <?php echo (($options->get_slider_dots_enabled_default() == 'on') ? 'checked' : '') ?> />
				</td>
			</tr>
			
			<tr>
				<td><?php _e('Use Thumbnails as Dots:', 'maxgalleria-slick-carousel') ?></td>
				<td>
					<input data-default="<?php echo $options->slider_thumbnail_dots_default ?>" type="checkbox" id="<?php echo $options->slider_thumbnail_dots_default_key ?>" name="<?php echo $options->slider_thumbnail_dots_default_key ?>" <?php echo (($options->get_thumbnail_dots_default() == 'on') ? 'checked' : '') ?> />
				</td>
			</tr>      
					
			<tr>
				<td><?php _e('Use Custom Dot:', 'maxgalleria-slick-carousel') ?></td>
				<td>
					<input data-default="<?php echo $options->hero_custom_dot_default ?>" type="checkbox" id="<?php echo $options->hero_custom_dot_default_key ?>" name="<?php echo $options->hero_custom_dot_default_key ?>" <?php echo (($options->get_hero_custom_dot_default() == 'on') ? 'checked' : '') ?> />
				</td>
			</tr>									
			<tr>                
				<td>
					<?php _e('Custom Dot:', 'maxgalleria-slick-carousel') ?>
	      </td>
				<td>          
					<input data-default="<?php echo $options->hero_dot_default; ?>" type="text" class="wide dot-options" id="<?php echo $options->hero_dot_default_key ?>" name="<?php echo $options->hero_dot_default_key ?>" value="<?php echo $options->get_hero_dot_default() ?>" />
					<input class="button dot-options" id="upload_custom_dot" type="button" value="Upload Custom Dot" />
				</td>
			</tr>			
			<tr>
				<td><?php _e('Custom Dot Width', 'maxgalleria-slick-carousel') ?></td>
				<td>
					<input data-default="<?php echo $options->hero_dot_width_default; ?>" type="text" class="small dot-options" id="<?php echo $options->hero_dot_width_default_key ?>" name="<?php echo $options->hero_dot_width_default_key ?>" value="<?php echo $options->get_hero_dot_width_default() ?>" /> pixels
				</td>
			</tr>
			<tr>
				<td><?php _e('Custom Dot Height', 'maxgalleria-slick-carousel') ?></td>
				<td>
					<input data-default="<?php echo $options->hero_dot_height_default; ?>" type="text" class="small dot-options" id="<?php echo $options->hero_dot_height_default_key ?>" name="<?php echo $options->hero_dot_height_default_key ?>" value="<?php echo $options->get_hero_dot_height_default() ?>" /> pixels
				</td>
			</tr>
			
			<tr>
				<td><?php _e('Dots Vertical Position', 'maxgalleria-slick-carousel') ?></td>
				<td>
					<input data-default="<?php echo $options->slider_dots_vertical_position_default; ?>" type="text" class="small" id="<?php echo $options->slider_dots_vertical_position_default_key ?>" name="<?php echo $options->slider_dots_vertical_position_default_key ?>" value="<?php echo $options->get_dots_vertical_position_default() ?>" /> pixels
				</td>
			</tr>
			
						
			<tr>
				<td><?php _e('Enable Mouse Drag:', 'maxgalleria-slick-carousel') ?></td>
				<td>
					<input data-default="<?php echo $options->slider_drag_enabled_default ?>" type="checkbox" id="<?php echo $options->slider_drag_enabled_default_key ?>" name="<?php echo $options->slider_drag_enabled_default_key ?>" <?php echo (($options->get_slider_drag_enabled_default() == 'on') ? 'checked' : '') ?> />
				</td>
			</tr>
			<tr>
				<td><?php _e('Fade:', 'maxgalleria-slick-carousel') ?></td>
				<td>
					<input data-default="<?php echo $options->slider_fade_enabled_default ?>" type="checkbox" id="<?php echo $options->slider_fade_enabled_default_key ?>" name="<?php echo $options->slider_fade_enabled_default_key ?>" <?php echo (($options->get_slider_fade_enabled_default() == 'on') ? 'checked' : '') ?> />
				</td>
			</tr>
      			
			<tr>
				<td><?php _e('Right to Left:', 'maxgalleria-slick-carousel') ?></td>
				<td>
					<input data-default="<?php echo $options->slider_rtl_enabled_default ?>" type="checkbox" id="<?php echo $options->slider_rtl_enabled_default_key ?>" name="<?php echo $options->slider_rtl_enabled_default_key ?>" <?php echo (($options->get_slider_rtl_enabled_default() == 'on') ? 'checked' : '') ?> />
				</td>
			</tr>
			
			<tr>
				<td><?php _e('Infinite Scrolling:', 'maxgalleria-slick-carousel') ?></td>
				<td>
					<input data-default="<?php echo $options->slider_infinite_enabled_default ?>" type="checkbox" id="<?php echo $options->slider_infinite_enabled_default_key ?>" name="<?php echo $options->slider_infinite_enabled_default_key ?>" <?php echo (($options->get_slider_infinite_enabled_default() == 'on') ? 'checked' : '') ?> />
				</td>
			</tr>
			
<!--			<tr>
				<td><?php //_e('Lazy Load:', 'maxgalleria-slick-carousel') ?></td>
				<td>
					<input data-default="<?php //echo $options->slider_lazyload_enabled_default ?>" type="checkbox" id="<?php echo $options->slider_lazyload_enabled_default_key ?>" name="<?php echo $options->slider_lazyload_enabled_default_key ?>" <?php //echo (($options->get_slider_lazyload_enabled_default() == 'on') ? 'checked' : '') ?> />
				</td>
			</tr>-->
			
			<tr>
				<td><?php _e('Pause on Focus:', 'maxgalleria-slick-carousel') ?></td>
				<td>
					<input data-default="<?php echo $options->slider_pause_on_focus_default ?>" type="checkbox" id="<?php echo $options->slider_pause_on_focus_default_key ?>" name="<?php echo $options->slider_pause_on_focus_default_key ?>" <?php echo (($options->get_pause_on_focus_default() == 'on') ? 'checked' : '') ?> />
				</td>
			</tr>						
			
			<tr>
				<td><?php _e('Pause on Hover:', 'maxgalleria-slick-carousel') ?></td>
				<td>
					<input data-default="<?php echo $options->slider_hover_pause_enabled_default ?>" type="checkbox" id="<?php echo $options->slider_hover_pause_enabled_default_key ?>" name="<?php echo $options->slider_hover_pause_enabled_default_key ?>" <?php echo (($options->get_slider_hover_pause_enabled_default() == 'on') ? 'checked' : '') ?> />
				</td>
			</tr>
			<tr>
				<td class="mg-italic" colspan = "2"><?php _e('If someone scrolls over the slider it will pause.', 'maxgalleria-slick-carousel') ?></td>
			</tr>	
			
			<tr>
				<td><?php _e('Pause on Dots Hover:', 'maxgalleria-slick-carousel') ?></td>
				<td>
					<input data-default="<?php echo $options->slider_pause_on_dots_hover_default ?>" type="checkbox" id="<?php echo $options->slider_pause_on_dots_hover_default_key ?>" name="<?php echo $options->slider_pause_on_dots_hover_default_key ?>" <?php echo (($options->get_slider_pause_on_dots_hover_default() == 'on') ? 'checked' : '') ?> />
				</td>
			</tr>      
			<tr>
				<td class="mg-italic" colspan = "2"><?php _e('If someone scrolls over the dots, the slider will wait.', 'maxgalleria-slick-carousel') ?></td>
			</tr>	
						      			
			<tr>
				<td colspan="2" class="options-heading"><span class="mg-heading"><?php _e('ADVANCED OPTIONS', 'maxgalleria-slick-carousel') ?></span></td>
			</tr>
			
			<tr>
				<td><?php _e('Edge Friction', 'maxgalleria-slick-carousel') ?></td>
				<td>
					<input data-default="<?php echo $options->slider_edgeFriction_default; ?>" type="text" class="small" id="<?php echo $options->slider_edgeFriction_default_key ?>" name="<?php echo $options->slider_edgeFriction_default_key ?>" value="<?php echo $options->get_edgeFriction_default() ?>" />
				</td>
			</tr>
			<tr>
				<td class="mg-italic" colspan = "2">
					<?php _e('Resistance when swiping edges of non-infinite carousels', 'maxgalleria-slick-carousel') ?>
				</td>
			</tr>			
						
			<tr>
				<td class="padding-top"><?php _e('Focus On Select', 'maxgalleria-slick-carousel') ?></td>
				<td class="padding-top">
					<input data-default="<?php echo $options->slider_focusOnSelect_default ?>" type="checkbox" id="<?php echo $options->slider_focusOnSelect_default_key ?>" name="<?php echo $options->slider_focusOnSelect_default_key ?>" <?php echo (($options->get_focusOnSelect_default() == 'on') ? 'checked' : '') ?> />
				</td>
			</tr>      			
			<tr>
				<td class="mg-italic" colspan = "2">
					<?php _e('Enable focus on selected (clicked) element.', 'maxgalleria-slick-carousel') ?>
				</td>
			</tr>			
			
						
			<tr>
				<td class="padding-top"><?php _e('Focus On Change', 'maxgalleria-slick-carousel') ?></td>
				<td class="padding-top">
					<input data-default="<?php echo $options->slider_focusOnChange_default ?>" type="checkbox" id="<?php echo $options->slider_focusOnChange_default_key ?>" name="<?php echo $options->slider_focusOnChange_default_key ?>" <?php echo (($options->get_focusOnChange_default() == 'on') ? 'checked' : '') ?> />
				</td>
			</tr>      			
			<tr>
				<td class="mg-italic" colspan = "2">
					<?php _e('Puts focus on slide after change.', 'maxgalleria-slick-carousel') ?>
				</td>
			</tr>			
			<tr>
				<td class="padding-top"><?php _e('Swipe To Slide:', 'maxgalleria-slick-carousel') ?></td>
				<td class="padding-top">
					<input data-default="<?php echo $options->slider_swipe_to_slide_default ?>" type="checkbox" id="<?php echo $options->slider_swipe_to_slide_default_key ?>" name="<?php echo $options->slider_swipe_to_slide_default_key ?>" <?php echo (($options->get_swipe_to_slide_default() == 'on') ? 'checked' : '') ?> />
				</td>
			</tr>      
			<tr>
				<td class="mg-italic" colspan = "2">
					<?php _e('Swipe to slide irrespective of slidesToScroll.', 'maxgalleria-slick-carousel') ?>
				</td>
			</tr>			
			
			<tr>
				<td class="padding-top"><?php _e('Move Slide with Touch:', 'maxgalleria-slick-carousel') ?></td>
				<td class="padding-top">
					<input data-default="<?php echo $options->slider_touch_move_enabled_default ?>" type="checkbox" id="<?php echo $options->slider_touch_move_enabled_default_key ?>" name="<?php echo $options->slider_touch_move_enabled_default_key ?>" <?php echo (($options->get_slider_touch_move_enabled_default() == 'on') ? 'checked' : '') ?> />
				</td>
			</tr>      
									
			<tr>
				<td><?php _e('Transition Speed:', 'maxgalleria-image-slider') ?></td>
				<td>
					<select data-default="<?php echo $options->slider_animation_speed_default ?>" id="<?php echo $options->slider_animation_speed_default_key ?>" name="<?php echo $options->slider_animation_speed_default_key ?>">
					<?php foreach ($options->slider_animation_speeds as $key => $name) { ?>
						<?php $selected = ($options->get_slider_animation_speed_default() == $key) ? 'selected="selected"' : ''; ?>
						<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $name ?></option>
					<?php } ?>
					</select>
					(<?php _e('in seconds', 'maxgalleria-image-slider') ?>)
				</td>
			</tr>
			
			<tr>
				<td><?php _e('Lazyload Technique:', 'maxgalleria-image-slider') ?></td>
				<td>
					<select data-default="<?php echo $options->slider_lazyLoad_default ?>" id="<?php echo $options->slider_lazyLoad_default_key ?>" name="<?php echo $options->slider_lazyLoad_default_key ?>">
					<?php foreach ($options->lazyload_types as $key => $name) { ?>
						<?php $selected = ($options->get_lazyLoad_default() == $key) ? 'selected="selected"' : ''; ?>
						<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $name ?></option>
					<?php } ?>
					</select>
				</td>
			</tr>			
			<tr>
				<td class="mg-italic" colspan = "2">
					<?php _e("'ondemand' will load the image as soon as you slide to it, 'progressive' loads one image after the other when the page loads.", 'maxgalleria-slick-carousel') ?>
				</td>
			</tr>			
      
			<tr>
				<td><?php _e('Mobile First:', 'maxgalleria-slick-carousel') ?></td>
				<td>
					<input data-default="<?php echo $options->slider_mobile_first_enabled_default ?>" type="checkbox" id="<?php echo $options->slider_mobile_first_enabled_default_key ?>" name="<?php echo $options->slider_mobile_first_enabled_default_key ?>" <?php echo (($options->get_slider_mobile_first_enabled_default() == 'on') ? 'checked' : '') ?> />
				</td>
			</tr>
			<tr>
				<td class="mg-italic" colspan = "2"><?php _e('Uses mobile first calculation for responsive settings.', 'maxgalleria-slick-carousel') ?></td>
			</tr>	
      
			<tr>
				<td><?php _e('Swipe:', 'maxgalleria-slick-carousel') ?></td>
				<td>
					<input data-default="<?php echo $options->slider_swipe_default ?>" type="checkbox" id="<?php echo $options->slider_swipe_default_key ?>" name="<?php echo $options->slider_swipe_default_key ?>" <?php echo (($options->get_slider_swipe_default() == 'on') ? 'checked' : '') ?> />
				</td>
			</tr>
			<tr>
				<td class="mg-italic" colspan = "2"><?php _e('If someone is using this on a touch sensitive screen and you want them to move the images with their fingers.', 'maxgalleria-slick-carousel') ?></td>
			</tr>	
      
			<tr>
				<td><?php _e('Use CSS Transitions:', 'maxgalleria-slick-carousel') ?></td>
				<td>
					<input data-default="<?php echo $options->slider_use_css_default ?>" type="checkbox" id="<?php echo $options->slider_use_css_default_key ?>" name="<?php echo $options->slider_use_css_default_key ?>" <?php echo (($options->get_slider_use_css_default() == 'on') ? 'checked' : '') ?> />
				</td>
			</tr>
			
			<tr>
				<td><?php _e('Use CSS Transforms:', 'maxgalleria-slick-carousel') ?></td>
				<td>
					<input data-default="<?php echo $options->slider_use_css_transform_default ?>" type="checkbox" id="<?php echo $options->slider_use_css_transform_default_key ?>" name="<?php echo $options->slider_use_css_transform_default_key ?>" <?php echo (($options->get_css_transform_default() == 'on') ? 'checked' : '') ?> />
				</td>
			</tr>
			      
			<tr>
				<td><?php _e('Allow Variable Width:', 'maxgalleria-slick-carousel') ?></td>
				<td>
					<input data-default="<?php echo $options->slider_variable_width_default ?>" type="checkbox" id="<?php echo $options->slider_variable_width_default_key ?>" name="<?php echo $options->slider_variable_width_default_key ?>" <?php echo (($options->get_slider_variable_width_default() == 'on') ? 'checked' : '') ?> />
				</td>
			</tr>
      
			<tr>
				<td><?php _e('Vertical Slide:', 'maxgalleria-slick-carousel') ?></td>
				<td>
					<input data-default="<?php echo $options->slider_vertical_default ?>" type="checkbox" id="<?php echo $options->slider_vertical_default_key ?>" name="<?php echo $options->slider_vertical_default_key ?>" <?php echo (($options->get_slider_vertical_default() == 'on') ? 'checked' : '') ?> />
				</td>
			</tr>
      
			<tr>
				<td><?php _e('Vertical Swipe:', 'maxgalleria-slick-carousel') ?></td>
				<td>
					<input data-default="<?php echo $options->slider_vertical_swiping_default ?>" type="checkbox" id="<?php echo $options->slider_vertical_swiping_default_key ?>" name="<?php echo $options->slider_vertical_swiping_default_key ?>" <?php echo (($options->get_slider_vertical_swiping_default() == 'on') ? 'checked' : '') ?> />
				</td>
			</tr>
      
			<tr>
				<td><?php _e('Padding Between Slides: (in pixels with "px" or as percent with "%")', 'maxgalleria-slick-carousel') ?></td>
				<td>
					<input data-default="<?php echo $options->slider_slides_padding_default; ?>" type="text" class="small" id="<?php echo $options->slider_slides_padding_default_key ?>" name="<?php echo $options->slider_slides_padding_default_key ?>" value="<?php echo $options->get_slider_padding_default() ?>" />
				</td>
			</tr>
			
			<tr>
				<td><?php _e('CSS3 Animations Type:', 'maxgalleria-slick-carousel') . "value: " . $options->get_cssease_default(); ?></td>
				<td>
					<table id="arrow-table">
						<tr>
							<td class="mg-radio">
								<input id="default-cssease-type" data-default="<?php echo $options->slider_cssease_default ?>" type="radio" name="<?php echo $options->slider_cssease_default_key ?>" value="ease" class="close-button" <?php echo ($options->get_cssease_default() === 'ease') ? 'checked' : ''; ?>>
							</td>							
							<td class="mg-radio">
								<input type="radio" name="<?php echo $options->slider_cssease_default_key ?>" value="linear" class="close-button" <?php echo ($options->get_cssease_default() === 'linear') ? 'checked' : ''; ?>>
							</td>
							<td class="mg-radio">
								<input type="radio" name="<?php echo $options->slider_cssease_default_key ?>" value="ease-in" class="close-button" <?php echo ($options->get_cssease_default() === 'ease-in') ? 'checked' : ''; ?>>
							</td>
							<td class="mg-radio">
								<input type="radio" name="<?php echo $options->slider_cssease_default_key ?>" value="ease-out" class="close-button" <?php echo ($options->get_cssease_default() === 'ease-out') ? 'checked' : ''; ?>>
							</td>
							<td class="mg-radio">
								<input type="radio" name="<?php echo $options->slider_cssease_default_key ?>" value="ease-in-out" class="close-button" <?php echo ($options->get_cssease_default() === 'ease-in-out') ? 'checked' : ''; ?>>
							</td>							
						</tr>
						<tr>
							<td class="radio-text">ease</td>							
							<td class="radio-text">linear</td>							
							<td class="radio-text">ease-in</td>							
							<td class="radio-text">ease-out</td>							
							<td class="radio-text">ease-in-out</td>							
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td class="mg-italic" colspan = "2"><?php _e('Sets the speed of CSS3 animations.', 'maxgalleria-slick-carousel') ?></td>
			</tr>	
			
			<tr>
				<td class="padding-top"><?php _e('Wait for Animate:', 'maxgalleria-slick-carousel') ?></td>
				<td class="padding-top">
					<input data-default="<?php echo $options->slider_wait_for_animate_default ?>" type="checkbox" id="<?php echo $options->slider_wait_for_animate_default_key ?>" name="<?php echo $options->slider_wait_for_animate_default_key ?>" <?php echo (($options->get_wait_for_animate_default() == 'on') ? 'checked' : '') ?> />
				</td>
			</tr>
			<tr>			
			<tr>
				<td class="mg-italic" colspan = "2">
					<?php _e("Ignores requests to advance the slide while animating.", 'maxgalleria-slick-carousel') ?>
				</td>
			</tr>			
				
			<tr>
				<td><?php _e('Touch Threshold', 'maxgalleria-slick-carousel') ?></td>
				<td>
					<input data-default="<?php echo $options->slider_touch_threshold_default; ?>" type="text" class="small" id="<?php echo $options->slider_touch_threshold_default_key ?>" name="<?php echo $options->slider_touch_threshold_default_key ?>" value="<?php echo $options->get_touch_threshold_default() ?>" />
				</td>
			</tr>
			<tr>
				<td class="mg-italic" colspan = "2">
					<?php _e("To advance slides, the user must swipe a length of (1/touchThreshold) * the width of the slider.", 'maxgalleria-slick-carousel') ?>
				</td>
			</tr>			
							
			<tr>
				<td><?php _e('ZIndex', 'maxgalleria-slick-carousel') ?></td>
				<td>
					<input data-default="<?php echo $options->slider_zindex_default; ?>" type="text" class="small" id="<?php echo $options->slider_zindex_default_key ?>" name="<?php echo $options->slider_zindex_default_key ?>" value="<?php echo $options->get_zindex_default() ?>" />
				</td>
			</tr>
			<tr>
				<td class="mg-italic" colspan = "2">
					<?php _e("Set the zIndex values for slides.", 'maxgalleria-slick-carousel') ?>
				</td>
			</tr>			
						
			<tr>
				<td colspan="2" class="options-heading"><span class="mg-heading"><?php _e('Hero Slider Options', 'maxgalleria-slick-carousel') ?></span></td>
			</tr>
			
			<tr>
				<td class="padding-top"><?php _e('Hero Slider Mode:', 'maxgalleria-slick-carousel') ?></td>
				<td class="padding-top">
					<input data-default="<?php echo $options->hero_mode_default ?>" type="checkbox" id="<?php echo $options->hero_mode_default_key ?>" name="<?php echo $options->hero_mode_default_key ?>" <?php echo (($options->get_hero_mode_default() == 'on') ? 'checked' : '') ?> />
				</td>
			</tr>
			<tr>
				<td class="mg-italic" colspan = "2">
					<?php _e('For a full width Hero slider, check Hero Mode and enter the size of your full screen images, such as 2120 x 1120.', 'maxgalleria-slick-carousel') ?>
				</td>
			</tr>			
			<tr>
				<td><?php _e('Hero Slider Width:', 'maxgalleria-slick-carousel') ?></td>
				<td>
					<input data-default="<?php echo $options->hero_width_default; ?>" type="text" class="small hero-options" id="<?php echo $options->hero_width_default_key ?>" name="<?php echo $options->hero_width_default_key ?>" value="<?php echo $options->get_hero_width_default() ?>" /> pixels
				</td>
			</tr>
			<tr>
				<td><?php _e('Hero Slider Height:', 'maxgalleria-slick-carousel') ?></td>
				<td>
					<input data-default="<?php echo $options->hero_height_default; ?>" type="text" class="small hero-options" id="<?php echo $options->hero_height_default_key ?>" name="<?php echo $options->hero_height_default_key ?>" value="<?php echo $options->get_hero_height_default() ?>" /> pixels
				</td>
			</tr>			
			<tr>
				<td colspan="2" class="options-heading"><span class="mg-heading"><?php _e('Slider Custom CSS:', 'maxgalleria-slick-carousel') ?></span></td>
			</tr>
			<tr>
				<td colspan = "2" class="padding-top">
					<textarea cols="70" rows="25" name="<?php echo $options->hero_custom_css_default_key ?>" id="<?php echo $options->hero_custom_css_default_key ?>"><?php echo $options->get_hero_custom_css_default() ?></textarea>
				</td>
			</tr>
			<tr>
				<td colspan = "2">
					<p>CSS Examples; reposition arrows and dots<br>					
					.slick-dots {<br>
					&nbsp;&nbsp;&nbsp;&nbsp;position: relative;<br>
					&nbsp;&nbsp;&nbsp;&nbsp;top: -138px;<br>
					&nbsp;&nbsp;&nbsp;&nbsp;z-index: 100;<br>
					}<br>					
					.slick-slider button.slick-next {<br>
					&nbsp;&nbsp;&nbsp;&nbsp;right: 25px;<br>
					}<br>
					.slick-slider button.slick-prev {<br>
					&nbsp;&nbsp;&nbsp;&nbsp;left: 25px;<br>
					}</p>						
				</td>
			</tr>
			
			
		</table>
		
		<?php wp_nonce_field($options->nonce_save_slick_slider_defaults['action'], $options->nonce_save_slick_slider_defaults['name']) ?>
	</form>
</div>

<a id="save-slick-slider-settings" href="#" class="button button-primary"><?php _e('Save Settings', 'maxgalleria-slick-carousel') ?></a>
<a id="revert-slick-slider-defaults" href="#" class="button" style="margin-left: 10px;"><?php _e('Revert Defaults', 'maxgalleria-slick-carousel') ?></a>

<script>
  jQuery(document).ready(function() {
		var ww = jQuery('#post_id_reference').text();
		window.original_send_to_editor = window.send_to_editor;
		
		jQuery(".ns-shadow-type").change(function() {
			var shadow_type = this.value
			if(shadow_type === 'color') {
				jQuery("#<?php echo $options->ns_shadow_color_default_key ?>").prop('disabled', false);
			  jQuery("#<?php echo $options->ns_shadow_color_default_key . '2' ?>").prop('disabled', false);
			} else {
				jQuery("#<?php echo $options->ns_shadow_color_default_key ?>").prop('disabled', 'disabled');
			  jQuery("#<?php echo $options->ns_shadow_color_default_key . '2' ?>").prop('disabled', 'disabled');
			}	
			if(shadow_type === 'none') {
				jQuery(".ns-blur-type").prop('disabled', 'disabled');
				jQuery(".ns-spread-type").prop('disabled', 'disabled');
				jQuery("#<?php echo $options->ns_shadow_color_default_key ?>").prop('disabled', 'disabled');
			  jQuery("#<?php echo $options->ns_shadow_color_default_key . '2' ?>").prop('disabled', 'disabled');
			} else {
				jQuery(".ns-blur-type").prop('disabled', false);
				jQuery(".ns-spread-type").prop('disabled', false);
			}	
			
    });   
		
		if(jQuery('#shadow-default').is(':checked')) {
			jQuery(".ns-blur-type").prop('disabled', 'disabled');
			jQuery(".ns-spread-type").prop('disabled', 'disabled');
		} else {
			jQuery(".ns-blur-type").prop('disabled', false);
			jQuery(".ns-spread-type").prop('disabled', false);		
		}
		
				
		jQuery("#<?php echo $options->ns_border_color_default_key . '2' ?>").click(function() {
			if(!jQuery("#<?php echo $options->ns_border_color_default_key ?>").prop('disabled')) {				
		    jQuery("#<?php echo $options->ns_border_color_default_key ?>").click();
			}	
	  });  
		
		jQuery("#<?php echo $options->ns_shadow_color_default_key . '2' ?>").click(function() {
			if(!jQuery("#<?php echo $options->ns_shadow_color_default_key ?>").prop('disabled')) {				
		    jQuery("#<?php echo $options->ns_shadow_color_default_key ?>").click();
		  }
	  });  
		
		if(jQuery('#shadow-color-option').is(':checked')) {
			jQuery("#<?php echo $options->ns_shadow_color_default_key ?>").prop('disabled', false);
		} else {
			jQuery("#<?php echo $options->ns_shadow_color_default_key ?>").prop('disabled', 'disabled');
		}	
		
		jQuery('#<?php echo $options->ns_show_border_default_key ?>').click(function(){
			if(this.checked) {
			  jQuery("#<?php echo $options->ns_border_color_default_key ?>").prop('disabled', false);
			  jQuery(".border-thickness").prop('disabled', false);
			} else {
			  jQuery("#<?php echo $options->ns_border_color_default_key ?>").prop('disabled', 'disabled');
			  jQuery(".border-thickness").prop('disabled', 'disabled');
			}	
		});		
		
		if(jQuery('#<?php echo $options->ns_show_border_default_key ?>').is(':checked')) {
			jQuery("#<?php echo $options->ns_border_color_default_key ?>").prop('disabled', false);
			jQuery(".border-thickness").prop('disabled', false);
		} else {
			jQuery("#<?php echo $options->ns_border_color_default_key ?>").prop('disabled', 'disabled');
			jQuery(".border-thickness").prop('disabled', 'disabled');
		}
		
		jQuery('#<?php echo $options->hero_custom_arrow_default_key ?>').click(function(){
			if(this.checked) {
			  jQuery(".arrow-options").prop('disabled', false);				
			  jQuery(".default-arrows").prop('disabled', 'disabled');								 
			} else {
			  jQuery(".arrow-options").prop('disabled', 'disabled');				
			  jQuery(".default-arrows").prop('disabled', false);				
			}	
		});				
		
		if(jQuery('#<?php echo $options->hero_custom_arrow_default_key; ?>').is(':checked')) {
			jQuery(".arrow-options").prop('disabled', false);
			jQuery(".default-arrows").prop('disabled', 'disabled');								 
		} else {
			jQuery(".arrow-options").prop('disabled', 'disabled');
			jQuery(".default-arrows").prop('disabled', false);				
		}
		
		jQuery('#<?php echo $options->hero_custom_dot_default_key ?>').click(function(){
			if(this.checked) {
			  jQuery(".dot-options").prop('disabled', false);				
			} else {
			  jQuery(".dot-options").prop('disabled', 'disabled');				
			}	
		});				
		

		
		if(jQuery('#<?php echo $options->hero_custom_dot_default_key; ?>').is(':checked') ||
			jQuery('#<?php echo $options->slider_thumbnail_dots_default_key; ?>').is(':checked')) {
			jQuery(".dot-options").prop('disabled', false);
		} else {
			jQuery(".dot-options").prop('disabled', 'disabled');
		}
		
		
		jQuery('#<?php echo $options->hero_mode_default_key ?>').click(function(){
			if(this.checked) {
			  jQuery(".hero-options").prop('disabled', false);				
			} else {
			  jQuery(".hero-options").prop('disabled', 'disabled');				
			}	
		});				
		
//		if(jQuery('#<?php echo $options->hero_mode_default_key; ?>').is(':checked')) {
//			jQuery(".hero-options").prop('disabled', false);
//		} else {
//			jQuery(".hero-options").prop('disabled', 'disabled');
//		}
				
		window.send_to_editor_left_arrow = function(html){
			url = jQuery(html).attr('href');
			jQuery('#<?php echo $options->hero_left_arrow_default_key ?>').val(url);
			tb_remove();
		}
		
		jQuery('#upload_left_arrow').click(function() {
			window.send_to_editor=window.send_to_editor_left_arrow;
			formfield = jQuery('#<?php echo $options->hero_left_arrow_default_key ?>').attr('name');
			tb_show('', 'media-upload.php?post_id=' + ww + '&type=image&TB_iframe=true');
		return false;
		});
		
		window.send_to_editor_right_arrow = function(html){
			url = jQuery(html).attr('href');
			jQuery('#<?php echo $options->hero_right_arrow_default_key ?>').val(url);
			tb_remove();
		}
		
		jQuery('#upload_right_arrow').click(function() {
			window.send_to_editor=window.send_to_editor_right_arrow;
			formfield = jQuery('#<?php echo $options->hero_right_arrow_default_key ?>').attr('name');
			tb_show('', 'media-upload.php?post_id=' + ww + '&type=image&TB_iframe=true');
		return false;
		});
		
		jQuery('#<?php echo $options->hero_custom_dot_default_key ?>').click(function(){
			jQuery('#<?php echo $options->slider_thumbnail_dots_default_key ?>').prop('checked', false);				
			jQuery(".dot-options").prop('disabled', false);				
		});
		
		jQuery('#<?php echo $options->slider_thumbnail_dots_default_key ?>').click(function(){
			jQuery('#<?php echo $options->hero_custom_dot_default_key ?>').prop('checked', false);				
			jQuery(".dot-options").prop('disabled', false);				
		});
						
		window.send_to_editor_custom_dot = function(html){
			url = jQuery(html).attr('href');
			jQuery('#<?php echo $options->hero_dot_default_key ?>').val(url);
			tb_remove();
		}
		
		jQuery('#upload_custom_dot').click(function() {
			window.send_to_editor=window.send_to_editor_custom_dot;
			formfield = jQuery('#<?php echo $options->hero_dot_default_key ?>').attr('name');
			tb_show('', 'media-upload.php?post_id=' + ww + '&type=image&TB_iframe=true');
		return false;
		});
		
		var editor = CodeMirror.fromTextArea( document.getElementById( '<?php echo $options->hero_custom_css_default_key ?>' ), {
			mode: "css",
			theme: "default",
			styleActiveLine: true,
			matchBrackets: true,
			lineNumbers: true,	
		});	
		
		function updateTextArea() {
				editor.save();
		}
		editor.on('change', updateTextArea);		
				
	});  
</script> 
<?php } else if($maxgalleria_slick_carousel->license_valid == 'inactive') { ?>
  <p><?php _e('Please activate your license key to view the Slick Slider settings.','maxgalleria-slick-carousel'); ?></p>
  <?php
} else if($maxgalleria_slick_carousel->license_valid == 'expired') {      
  ?>
  
  <div class='license_warning expired'>
    <h3><?php _e('License Expired', 'maxgalleria-slick-carousel'); ?> </h3>

    <p><?php printf(__('Your license expired on %s. Renew your license to save or edit galleries, get updates and new features plus support!.','maxgalleria-slick-carousel'), date("F d, Y", $expiration_date)); ?></p>

    <p><?php printf(__('Renew your license for a discount via  %s Your Account %s on our Website.</p>', 'maxgalleria-slick-carousel'), "<a href='https://maxgalleria.com/my-account' target='_blank'>", "</a>" ); ?></p>
  </div>
    
  <?php
  
}