<?php
global $post, $maxgalleria_slick_carousel;
$options = new MaxGalleriaSlickSliderOptions($post->ID);

if($maxgalleria_slick_carousel->license_valid == 'valid') {
?>

<script type="text/javascript">		
	jQuery(document).ready(function() {
		enableDisableImageClickOptions();
		enableDisableAutoPlayOptions();
		console.log("slider meta");
		
		jQuery('#<?php echo $options->ns_border_color_key ?>').colpick({
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
		        
		jQuery('#<?php echo $options->ns_shadow_color_key ?>').colpick({
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
				
		jQuery("#<?php echo $options->slider_image_click_enabled_key ?>").change(function() {
			enableDisableImageClickOptions();
		});
    
		jQuery("#<?php echo $options->slider_auto_play_enabled_key ?>").change(function() {
			enableDisableAutoPlayOptions();
		});
		
		jQuery('#<?php echo $options->ns_border_color_key ?>').css('border-color','<?php echo $options->get_border_color(); ?>');
		jQuery('#<?php echo $options->ns_shadow_color_key ?>').css('border-color','<?php echo $options->get_shadow_color(); ?>');
		
		jQuery("#<?php echo $options->ns_shadow_key ?>").change(function() {
			var shadow_type = jQuery("#<?php echo $options->ns_shadow_key ?>").val();
			//console.log("shadow type " + shadow_type);
			if(shadow_type === 'color') {
				jQuery("#<?php echo $options->ns_shadow_color_key ?>").prop('disabled', false);
			} else {
				jQuery("#<?php echo $options->ns_shadow_color_key ?>").prop('disabled', 'disabled');
			}	
    });   
		
		var shadow_type = jQuery("#<?php echo $options->ns_shadow_key ?>").val();
		if(shadow_type === 'color') {
			jQuery("#<?php echo $options->ns_shadow_color_key ?>").prop('disabled', false);
		} else {
			jQuery("#<?php echo $options->ns_shadow_color_key ?>").prop('disabled', 'disabled');
		}	
		
		jQuery('#<?php echo $options->ns_show_border_key ?>').click(function(){
			if(this.checked) {
			  jQuery("#<?php echo $options->ns_border_color_key ?>").prop('disabled', false);
			  jQuery(".border-thickness").prop('disabled', false);
			  jQuery(".border-radius").prop('disabled', false);				
				jQuery("#border-thickness-default").prop("checked", true)
				jQuery("#border-radius-default").prop("checked", true)
				
			} else {
			  jQuery("#<?php echo $options->ns_border_color_key ?>").prop('disabled', 'disabled');
			  jQuery(".border-thickness").prop('disabled', 'disabled');
			  jQuery(".border-radius").prop('disabled', 'disabled');
			}	
		});		
		
		if(jQuery('#<?php echo $options->ns_show_border_key ?>').is(':checked')) {
			jQuery("#<?php echo $options->ns_border_color_key ?>").prop('disabled', false);
			jQuery(".border-thickness").prop('disabled', false);
			jQuery(".border-radius").prop('disabled', false);				
		} else {
			jQuery("#<?php echo $options->ns_border_color_key ?>").prop('disabled', 'disabled');
			jQuery(".border-thickness").prop('disabled', 'disabled');
			jQuery(".border-radius").prop('disabled', 'disabled');
			
		}

		jQuery("#<?php echo $options->ns_border_color_key . '2' ?>").click(function() {
			if(!jQuery("#<?php echo $options->ns_border_color_key ?>").prop('disabled')) {				
		    jQuery("#<?php echo $options->ns_border_color_key ?>").click();
			}	
	  });  

		jQuery(".ns-shadow-type").change(function() {
			var shadow_type = this.value
			console.log("shadow type 2 " + shadow_type);
			if(shadow_type === 'color') {
				jQuery("#<?php echo $options->ns_shadow_color_key ?>").prop('disabled', false);
			jQuery("#<?php echo $options->ns_shadow_color_key . '2' ?>").prop('disabled', false);
			} else {
				jQuery("#<?php echo $options->ns_shadow_color_key ?>").prop('disabled', 'disabled');
			jQuery("#<?php echo $options->ns_shadow_color_key . '2' ?>").prop('disabled', 'disabled');
			}	
			if(shadow_type === 'none') {
				jQuery(".ns-blur-type").prop('disabled', 'disabled');
				jQuery(".ns-spread-type").prop('disabled', 'disabled');
				jQuery("#<?php echo $options->ns_shadow_color_key ?>").prop('disabled', 'disabled');
			  jQuery("#<?php echo $options->ns_shadow_color_key . '2' ?>").prop('disabled', 'disabled');
			} else {
				jQuery(".ns-blur-type").prop('disabled', false);
				jQuery(".ns-spread-type").prop('disabled', false);
			}				
			
    });   
		
		jQuery("#<?php echo $options->ns_shadow_color_key . '2' ?>").click(function() {
			if(!jQuery("#<?php echo $options->ns_shadow_color_key ?>").prop('disabled')) {				
		    jQuery("#<?php echo $options->ns_shadow_color_key ?>").click();
		  }
	  });  
		    
	});
	
	function enableDisableImageClickOptions() {
		if (jQuery("#<?php echo $options->slider_image_click_enabled_key ?>").attr("checked") == "checked") {
			jQuery("#<?php echo $options->slider_image_click_open_key ?>").removeAttr("disabled");
			jQuery("#<?php echo $options->slider_image_click_new_window_key ?>").removeAttr("disabled");
		}
		else {
			jQuery("#<?php echo $options->slider_image_click_open_key ?>").attr("disabled", "disabled");
			jQuery("#<?php echo $options->slider_image_click_new_window_key ?>").attr("disabled", "disabled");
			jQuery("#<?php echo $options->slider_image_click_new_window_key ?>").removeAttr("checked");
		}
	}
  
	function enableDisableAutoPlayOptions() {
		if (jQuery("#<?php echo $options->slider_auto_play_enabled_key ?>").attr("checked") == "checked") {
			jQuery("#<?php echo $options->slider_slideshow_speed_key ?>").attr("disabled", "disabled");
		}
		else {
			//jQuery("#<?php echo $options->slider_auto_play_enabled_key ?>").attr("disabled", "disabled");
			jQuery("#<?php echo $options->slider_slideshow_speed_key ?>").removeAttr("disabled");
		}
	}
  
</script>

<div class="meta-options">
  <table>
		<tr style="display:none;">
			<td>&nbsp;</td><td style="width:450px">&nbsp;</td>			
		</tr>
		<tr>
			<td colspan="2" class="options-heading"><span class="mg-heading"><?php _e('IMAGE OPTIONS', 'maxgalleria-slick-carousel') ?></span></td>
		</tr>
		<tr>
			<td class="padding-top">
				<?php _e('Preset Layouts:', 'maxgalleria-slick-carousel') ?>
			</td>
			<td class="padding-top">
		    <?php if($options->hide_presets === 'off') 
				  $skins = array_merge($options->new_skins, $options->skins );
					  else
					$skins = $options->new_skins;
		     ?>				
				<select id="<?php echo $options->skin_key ?>" name="<?php echo $options->skin_key ?>">
				<?php foreach ($skins as $key => $name) { ?>
					<?php $selected = ($options->get_skin() == $key) ? 'selected="selected"' : ''; ?>
					<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $name ?></option>
				<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				<label for="<?php echo $options->ns_show_border_key ?>"><?php _e('Display Border:', 'maxgalleria-slick-carousel') ?></label>
			</td>
			<td>
				<input type="checkbox" id="<?php echo $options->ns_show_border_key ?>" name="<?php echo $options->ns_show_border_key ?>" <?php echo (($options->get_show_border() == 'on') ? 'checked' : '') ?> />
			</td>
		</tr>
		<tr>
			<td>
				<?php _e('Border Thickness:', 'maxgalleria-slick-carousel') ?>
			</td>
			<td>
				<table class="mg-settings">
					<tr>
						<td class="mg-radio">
							<input id="border-thickness-default" type="radio" name="<?php echo $options->ns_border_thickness_key ?>" value="1" class="border-thickness" <?php echo ($options->get_border_thickness() === '1') ? 'checked' : ''; ?>>
						</td>
						<td class="mg-radio">
							<input type="radio" name="<?php echo $options->ns_border_thickness_key ?>" value="3" class="border-thickness" <?php echo ($options->get_border_thickness() === '3') ? 'checked' : ''; ?>>
						</td>
						<td class="mg-radio">
							<input type="radio" name="<?php echo $options->ns_border_thickness_key ?>" value="5" class="border-thickness" <?php echo ($options->get_border_thickness() === '5') ? 'checked' : ''; ?>>
						</td>
						<td class="mg-radio">
							<input type="radio" name="<?php echo $options->ns_border_thickness_key ?>" value="7" class="border-thickness" <?php echo ($options->get_border_thickness() === '7') ? 'checked' : ''; ?>>
						</td>
						<td class="mg-radio">
							<input type="radio" name="<?php echo $options->ns_border_thickness_key ?>" value="9" class="border-thickness" <?php echo ($options->get_border_thickness() === '9') ? 'checked' : ''; ?>>
						</td>
						<td class="mg-radio">
							<input type="radio" name="<?php echo $options->ns_border_thickness_key ?>" value="15" class="border-thickness" <?php echo ($options->get_border_thickness() === '15') ? 'checked' : ''; ?>>
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
			<td>
				<?php _e('Border Color:', 'maxgalleria-slick-carousel') ?>
			</td>
			<td>
				<img id="<?php echo $options->ns_border_color_key . '2' ?>" class="left" alt="border color button" src="<?php echo MAXGALLERIA_SLICK_CAROUSEL_PLUGIN_URL ?>/images/options-icons/color.png">
				<input class="color-input" type="text" id="<?php echo $options->ns_border_color_key ?>" name="<?php echo $options->ns_border_color_key ?>" value="<?php echo $options->get_border_color() ?>" />
			</td>
		</tr>		
		<tr>
			<td>
				<?php _e('Shadow Type:', 'maxgalleria-slick-carousel') ?>
			</td>
			<td>
				<table class="mg-settings">
					<tr>
						<td class="mg-radio">
							<input type="radio" name="<?php echo $options->ns_shadow_key ?>" value="none" class="ns-shadow-type" <?php echo ($options->get_shadow() === 'none') ? 'checked' : ''; ?>>
						</td>
						<td class="mg-radio">
							<input type="radio" name="<?php echo $options->ns_shadow_key ?>" value="inside" class="ns-shadow-type" <?php echo ($options->get_shadow() === 'inside') ? 'checked' : ''; ?>>
						</td>
						<td class="mg-radio">
							<input type="radio" name="<?php echo $options->ns_shadow_key ?>" value="behind" class="ns-shadow-type" <?php echo ($options->get_shadow() === 'behind') ? 'checked' : ''; ?>>
						</td>
						<td class="mg-radio">
							<input type="radio" id="shadow-color-option" name="<?php echo $options->ns_shadow_key ?>" value="color" class="ns-shadow-type" <?php echo ($options->get_shadow() === 'color') ? 'checked' : ''; ?>>
						</td>
					</tr>
					<tr>
						<td>
							<img title="<?php _e('No shadow', 'maxgalleria-slick-carousel') ?>" alt="<?php _e('no shadow style', 'maxgalleria-slick-carousel') ?>" src="<?php echo MAXGALLERIA_SLICK_CAROUSEL_PLUGIN_URL ?>/images/options-icons/shadow-none.png">
						</td>
						<td>
							<img title="<?php _e('Inside shadow', 'maxgalleria-slick-carousel') ?>" alt="<?php _e('inside shadow style', 'maxgalleria-slick-carousel') ?>" src="<?php echo MAXGALLERIA_SLICK_CAROUSEL_PLUGIN_URL ?>/images/options-icons/shadow-inside.png" >
						</td>
						<td>
							<img title="<?php _e('Behind shadow', 'maxgalleria-slick-carousel') ?>" alt="<?php _e('behind shadow style', 'maxgalleria-slick-carousel') ?>" src="<?php echo MAXGALLERIA_SLICK_CAROUSEL_PLUGIN_URL ?>/images/options-icons/shadow-behind.png" >
						</td>
						<td>
							<img title="<?php _e('Color shadow', 'maxgalleria-slick-carousel') ?>" alt="<?php _e('color shadow style', 'maxgalleria-slick-carousel') ?>" src="<?php echo MAXGALLERIA_SLICK_CAROUSEL_PLUGIN_URL ?>/images/options-icons/shadow-color.png" >
						</td>
					</tr>
				</table>
			</td>								
		</tr>		
		<tr>
			<td>
				<?php _e('Shadow Color:', 'maxgalleria-slick-carousel') ?>
			</td>
			<td>
				<img id="<?php echo $options->ns_shadow_color_key . '2' ?>" class="left" alt="border color button" src="<?php echo MAXGALLERIA_SLICK_CAROUSEL_PLUGIN_URL ?>/images/options-icons/color.png">
				<input class="color-input" type="text" id="<?php echo $options->ns_shadow_color_key ?>" name="<?php echo $options->ns_shadow_color_key ?>" value="<?php echo $options->get_shadow_color() ?>" />
			</td>
		</tr>
		<tr>
			<td>
				<?php _e('Shadow Blur:', 'maxgalleria-slick-carousel') ?>
			</td>
			<td>
				<table class="mg-settings">
					<tr>
						<td class="mg-radio">
							<input type="radio" name="<?php echo $options->ns_shadow_blur_key ?>" value="5" class="ns-blur-type" <?php echo ($options->get_shadow_blur() === '5') ? 'checked' : ''; ?>>
						</td>
						<td class="mg-radio">
							<input type="radio" name="<?php echo $options->ns_shadow_blur_key ?>" value="10" class="ns-blur-type" <?php echo ($options->get_shadow_blur() === '10') ? 'checked' : ''; ?>>
						</td>
						<td class="mg-radio">
							<input type="radio" name="<?php echo $options->ns_shadow_blur_key ?>" value="15" class="ns-blur-type" <?php echo ($options->get_shadow_blur() === '15') ? 'checked' : ''; ?>>
						</td>
						<td class="mg-radio">
							<input type="radio" name="<?php echo $options->ns_shadow_blur_key ?>" value="20" class="ns-blur-type" <?php echo ($options->get_shadow_blur() === '20') ? 'checked' : ''; ?>>
						</td>
					</tr>
					<tr>
						<td>
							<img title="<?php _e('5 pixels', 'maxgalleria-slick-carousel') ?>" alt="<?php _e('5 pixel blur', 'maxgalleria-slick-carousel') ?>" src="<?php echo MAXGALLERIA_SLICK_CAROUSEL_PLUGIN_URL ?>/images/options-icons/shadow-blur-5.png">
						</td>
						<td>
							<img title="<?php _e('10 pixels', 'maxgalleria-slick-carousel') ?>" alt="<?php _e('10 pixel blur', 'maxgalleria-slick-carousel') ?>" src="<?php echo MAXGALLERIA_SLICK_CAROUSEL_PLUGIN_URL ?>/images/options-icons/shadow-blur-10.png">
						</td>
						<td>
							<img title="<?php _e('15 pixels', 'maxgalleria-slick-carousel') ?>" alt="<?php _e('15 pixel blur', 'maxgalleria-slick-carousel') ?>" src="<?php echo MAXGALLERIA_SLICK_CAROUSEL_PLUGIN_URL ?>/images/options-icons/shadow-blur-15.png">
						</td>
						<td>
							<img title="<?php _e('20 pixels', 'maxgalleria-slick-carousel') ?>" alt="<?php _e('20 pixel blur', 'maxgalleria-slick-carousel') ?>" src="<?php echo MAXGALLERIA_SLICK_CAROUSEL_PLUGIN_URL ?>/images/options-icons/shadow-blur-20.png">
						</td>
					</tr>
				</table>
			</td>															
		</tr>				
		<tr>
			<td>
				<?php _e('Shadow Spread:', 'maxgalleria-slick-carousel') ?>
			</td>
			<td>
				<table class="mg-settings">
					<tr>
						<td class="mg-radio">
							<input type="radio" name="<?php echo $options->ns_shadow_spread_key ?>" value="0" class="ns-spread-type" <?php echo ($options->get_shadow_spread() === '0') ? 'checked' : ''; ?>>
						</td>
						<td class="mg-radio">
							<input type="radio" name="<?php echo $options->ns_shadow_spread_key ?>" value="1" class="ns-spread-type" <?php echo ($options->get_shadow_spread() === '1') ? 'checked' : ''; ?>>
						</td>
						<td class="mg-radio">
							<input type="radio" name="<?php echo $options->ns_shadow_spread_key ?>" value="2" class="ns-spread-type" <?php echo ($options->get_shadow_spread() === '2') ? 'checked' : ''; ?>>
						</td>
						<td class="mg-radio">
							<input type="radio" name="<?php echo $options->ns_shadow_spread_key ?>" value="3" class="ns-spread-type" <?php echo ($options->get_shadow_spread() === '3') ? 'checked' : ''; ?>>
						</td>
					</tr>
					<tr>
						<td>
							<img title="<?php _e('0 pixel spread', 'maxgalleria-slick-carousel') ?>" alt="<?php _e('0 pixel spread', 'maxgalleria-slick-carousel') ?>" src="<?php echo MAXGALLERIA_SLICK_CAROUSEL_PLUGIN_URL ?>/images/options-icons/shadow-spread-0.png">
						</td>
						<td>
							<img title="<?php _e('1 pixel spread', 'maxgalleria-slick-carousel') ?>" alt="<?php _e('1 pixel spread', 'maxgalleria-slick-carousel') ?>" src="<?php echo MAXGALLERIA_SLICK_CAROUSEL_PLUGIN_URL ?>/images/options-icons/shadow-spread-1.png">
						</td>
						<td>
							<img title="<?php _e('2 pixels spread', 'maxgalleria-slick-carousel') ?>" alt="<?php _e('2 pixels spread', 'maxgalleria-slick-carousel') ?>" src="<?php echo MAXGALLERIA_SLICK_CAROUSEL_PLUGIN_URL ?>/images/options-icons/shadow-spread-2.png">
						</td>
						<td>
							<img title="<?php _e('3 pixels spread', 'maxgalleria-slick-carousel') ?>" alt="<?php _e('3 pixels spread', 'maxgalleria-slick-carousel') ?>" src="<?php echo MAXGALLERIA_SLICK_CAROUSEL_PLUGIN_URL ?>/images/options-icons/shadow-spread-3.png">
						</td>
					</tr>
				</table>
			</td>															
		</tr>		
		<tr>
		  <td colspan="2" class="options-heading"><span class="mg-heading"><?php _e('SLICK SLIDER OPTIONS', 'maxgalleria-slick-carousel') ?></span></td>
		</tr>
    
		<tr>
			<td class="mg-align-top"><?php _e('Slider Arrows:', 'maxgalleria-slick-carousel'); ?></td>
			<td>
				<table id="arrow-table">
					<tr>
						<td class="mg-radio">
							<input class="default-arrows" type="radio" name="<?php echo $options->ns_arrow_key ?>" value="0" <?php echo ($options->get_arrow() === '0') ? 'checked' : ''; ?>>
						</td>
						<td class="mg-radio">
							<input class="default-arrows" type="radio" name="<?php echo $options->ns_arrow_key ?>" value="1" <?php echo ($options->get_arrow() === '1') ? 'checked' : ''; ?>>
						</td>
						<td class="mg-radio">
							<input class="default-arrows" type="radio" name="<?php echo $options->ns_arrow_key ?>" value="2" <?php echo ($options->get_arrow() === '2') ? 'checked' : ''; ?>>
						</td>
						<td class="mg-radio">
							<input class="default-arrows" type="radio" name="<?php echo $options->ns_arrow_key ?>" value="3" <?php echo ($options->get_arrow() === '3') ? 'checked' : ''; ?>>
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
					</tr>
					
					<tr>
						<td class="mg-radio">
							<input class="default-arrows" type="radio" name="<?php echo $options->ns_arrow_key ?>" value="4" <?php echo ($options->get_arrow() === '4') ? 'checked' : ''; ?>>
						</td>
						<td class="mg-radio">
							<input class="default-arrows" type="radio" name="<?php echo $options->ns_arrow_key ?>" value="5" <?php echo ($options->get_arrow() === '5') ? 'checked' : ''; ?>>
						</td>
						<td class="mg-radio">
							<input class="default-arrows" type="radio" name="<?php echo $options->ns_arrow_key ?>" value="6" <?php echo ($options->get_arrow() === '6') ? 'checked' : ''; ?>>
						</td>
							<td class="mg-radio">
							<input class="default-arrows" type="radio" name="<?php echo $options->ns_arrow_key ?>" value="7" <?php echo ($options->get_arrow() === '7') ? 'checked' : ''; ?>>
						</td>
					</tr>	
					<tr style="background-color:#3C3C3C">
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
			<td>
				<label for="<?php echo $options->hero_custom_arrow_key ?>"><?php _e('Use Custom Arrows (requires hero mode to be checked):', 'maxgalleria-slick-carousel') ?></label>
			</td>
			<td>
				<input type="checkbox" id="<?php echo $options->hero_custom_arrow_key ?>" name="<?php echo $options->hero_custom_arrow_key ?>" <?php echo (($options->get_hero_custom_arrow() == 'on') ? 'checked' : '') ?> />
			</td>
		</tr>						
		<tr>                
			<td>
				<?php _e('Custom Left Arrow:', 'maxgalleria-slick-carousel') ?>
			</td>
			<td>          
				<input type="text" class="wide arrow-options" id="<?php echo $options->hero_left_arrow_key ?>" name="<?php echo $options->hero_left_arrow_key ?>" value="<?php echo $options->get_hero_left_arrow() ?>" />
				<input class="button arrow-options" id="upload_left_arrow" type="button" value="Upload Left Arrow" />
			</td>
		</tr>
    <tr>                
			<td>
				<?php _e('Custom Right Arrow:', 'maxgalleria-slick-carousel') ?>
			</td>
			<td>          
				<input type="text" class="wide arrow-options" id="<?php echo $options->hero_right_arrow_key ?>" name="<?php echo $options->hero_right_arrow_key ?>" value="<?php echo $options->get_hero_right_arrow() ?>" />
				<input class="button arrow-options" id="upload_right_arrow" type="button" value="Upload Right Arrow" />
			</td>
		</tr>
		
		<tr>
			<td><?php _e('Arrow Width', 'maxgalleria-slick-carousel') ?></td>
			<td>
				<input type="text" class="small arrow-options" id="<?php echo $options->hero_arrow_width_key ?>" name="<?php echo $options->hero_arrow_width_key ?>" value="<?php echo $options->get_hero_arrow_width() ?>" /> pixels
			</td>
		</tr>
		<tr>
			<td><?php _e('Arrow Height', 'maxgalleria-slick-carousel') ?></td>
			<td>
				<input type="text" class="small arrow-options" id="<?php echo $options->hero_arrow_height_key ?>" name="<?php echo $options->hero_arrow_height_key ?>" value="<?php echo $options->get_hero_arrow_height() ?>" /> pixels
			</td>
		</tr>	
				
    <tr>
			<td>
				<label for="<?php echo $options->slider_arrows_enabled_key ?>"><?php _e('Hide Arrows:', 'maxgalleria-slick-carousel') ?></label>
			</td>
			<td>
				<input type="checkbox" id="<?php echo $options->slider_arrows_enabled_key ?>" name="<?php echo $options->slider_arrows_enabled_key ?>" <?php echo (($options->get_slider_arrows_enabled() == 'on') ? 'checked' : '') ?> />
			</td>
		</tr>
		
    <tr>
			<td>
				<label for="<?php echo $options->slider_accessibility_key ?>"><?php _e('Accessibility:', 'maxgalleria-slick-carousel') ?></label>
			</td>
			<td>
				<input type="checkbox" id="<?php echo $options->slider_accessibility_key ?>" name="<?php echo $options->slider_accessibility_key ?>" <?php echo (($options->get_accessibility() == 'on') ? 'checked' : '') ?> />
			</td>
		</tr>
		<tr>
			<td class="mg-italic" colspan = "2">
				<?php _e('Enables tabbing and arrow key navigation.', 'maxgalleria-slick-carousel') ?>
			</td>
		</tr>			
						
		<tr>
			<td>
				<?php _e('Number of Slides to Scroll:', 'maxgalleria-image-slider') ?>
			</td>
			<td>
				<select id="<?php echo $options->slider_slides_to_scroll_key ?>" name="<?php echo $options->slider_slides_to_scroll_key ?>">
				<?php foreach ($options->slider_number_of_slides as $key => $name) { ?>
					<?php $selected = ($options->get_slider_slides_to_scroll() == $key) ? 'selected="selected"' : ''; ?>
					<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $name ?></option>
				<?php } ?>
				</select>
			</td>
		</tr>    

		<tr>
			<td>
				<?php _e('Number of Slides to Show:', 'maxgalleria-image-slider') ?>
			</td>
			<td>
				<select id="<?php echo $options->slider_slides_to_show_key ?>" name="<?php echo $options->slider_slides_to_show_key ?>">
				<?php foreach ($options->slider_number_of_slides as $key => $name) { ?>
					<?php $selected = ($options->get_slider_slides_to_show() == $key) ? 'selected="selected"' : ''; ?>
					<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $name ?></option>
				<?php } ?>
				</select>
			</td>
		</tr>    
		<tr>
			<td class="mg-italic" colspan = "2"><?php _e('This is how many slides you want to show at one time.', 'maxgalleria-slick-carousel') ?></td>
		</tr>	
		
		<tr>
			<td>
				<?php _e('Number of Rows:', 'maxgalleria-image-slider') ?>
			</td>
			<td>
				<select id="<?php echo $options->slider_rows_key ?>" name="<?php echo $options->slider_rows_key ?>">
				<?php foreach ($options->slider_number_of_rows as $key => $name) { ?>
					<?php $selected = ($options->get_rows() == $key) ? 'selected="selected"' : ''; ?>
					<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $name ?></option>
				<?php } ?>
				</select>
			</td>
		</tr>    		
		
		<tr>
			<td>
				<label for="<?php echo $options->slider_slides_per_row_key ?>"><?php _e('Number of Sliders per Row:', 'maxgalleria-slick-carousel') ?></label>
			</td>
			<td>
        <?php 
          $sliders_per_row = trim($options->get_slides_per_row()); 
          if ($sliders_per_row === '')
            $sliders_per_row = $options->get_slides_per_row_default();
        ?>        
				<input type="text" class="small mag-popup-settings" id="<?php echo $options->slider_slides_per_row_key ?>" name="<?php echo $options->slider_slides_per_row_key ?>" value="<?php echo $sliders_per_row ?>" />
			</td>
		</tr>		
		
		<tr>
			<td>
				<label for="<?php echo $options->slider_initial_slide_enabled_key ?>"><?php _e('Initial Slide: ', 'maxgalleria-slick-carousel') ?></label>
			</td>
			<td>
        <?php 
          $initial_slide = trim($options->get_slider_initial_slide_enabled()); 
          if ($initial_slide === '')
            $initial_slide = $options->slider_initial_slide_enabled_default;
        ?>        
				<input type="text" class="small mag-popup-settings" id="<?php echo $options->slider_initial_slide_enabled_key ?>" name="<?php echo $options->slider_initial_slide_enabled_key ?>" value="<?php echo $initial_slide ?>" />
			</td>
		</tr>
		<tr>
			<td class="mg-italic" colspan = "2"><?php _e('Go to the Images tab and count down from the top until you reach the slide you want to start with.  Start your count with 0.', 'maxgalleria-slick-carousel') ?></td>
		</tr>	
    		
		<tr>
			<td>
				<label for="<?php echo $options->slider_adaptive_height_enabled_key ?>"><?php _e('Adaptive Height Enabled:', 'maxgalleria-slick-carousel') ?></label>
			</td>
			<td>
				<input type="checkbox" id="<?php echo $options->slider_adaptive_height_enabled_key ?>" name="<?php echo $options->slider_adaptive_height_enabled_key ?>" <?php echo (($options->get_slider_adaptive_height_enabled() == 'on') ? 'checked' : '') ?> />
			</td>
		</tr>
    
		<tr>
			<td>
				<label for="<?php echo $options->slider_caption_enabled_key ?>"><?php _e('Slider Captions Enabled:', 'maxgalleria-slick-carousel') ?></label>
			</td>
			<td>
				<input type="checkbox" id="<?php echo $options->slider_caption_enabled_key ?>" name="<?php echo $options->slider_caption_enabled_key ?>" <?php echo (($options->get_slider_caption_enabled() == 'on') ? 'checked' : '') ?> />
			</td>
		</tr>
		<tr>
			<td>
				<label for="<?php echo $options->slider_image_click_enabled_key ?>"><?php _e('Slider Image Click Enabled:', 'maxgalleria-slick-carousel') ?></label>
			</td>
			<td>
				<input type="checkbox" id="<?php echo $options->slider_image_click_enabled_key ?>" name="<?php echo $options->slider_image_click_enabled_key ?>" <?php echo (($options->get_slider_image_click_enabled() == 'on') ? 'checked' : '') ?> />
			</td>
		</tr>
		<tr>
			<td>
				<?php _e('Slider Image Click Opens:', 'maxgalleria-slick-carousel') ?>
			</td>
			<td>
				<select id="<?php echo $options->slider_image_click_open_key ?>" name="<?php echo $options->slider_image_click_open_key ?>">
				<?php foreach ($options->slider_image_clicks as $key => $name) { ?>
					<?php $selected = ($options->get_slider_image_click_open() == $key) ? 'selected="selected"' : ''; ?>
					<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $name ?></option>
				<?php } ?>
				</select>
			</td>
		</tr>    
		
		<tr>
			<td>
				<label for="<?php echo $options->slider_open_new_tab_key ?>"><?php _e('Open Image Link in a New Tab:', 'maxgalleria-slick-carousel') ?></label>
			</td>
			<td>
				<input type="checkbox" id="<?php echo $options->slider_open_new_tab_key ?>" name="<?php echo $options->slider_open_new_tab_key ?>" <?php echo (($options->get_open_new_tab() == 'on') ? 'checked' : '') ?> />
			</td>
		</tr>
		
		
		<tr>
			<td>
				<label for="<?php echo $options->slider_auto_play_enabled_key ?>"><?php _e('Disable Auto Play:', 'maxgalleria-slick-carousel') ?></label>
			</td>
			<td>
				<input type="checkbox" id="<?php echo $options->slider_auto_play_enabled_key ?>" name="<?php echo $options->slider_auto_play_enabled_key ?>" <?php echo (($options->get_slider_auto_play_enabled() == 'on') ? 'checked' : '') ?> />
			</td>
		</tr>
		<tr>
			<td>
				<?php _e('Auto Play Speed:', 'maxgalleria-slick-carousel') ?>
			</td>
			<td>
				<select id="<?php echo $options->slider_slideshow_speed_key ?>" name="<?php echo $options->slider_slideshow_speed_key ?>">
				<?php foreach ($options->slider_slideshow_speeds as $key => $name) { ?>
					<?php $selected = ($options->get_slider_slideshow_speed() == $key) ? 'selected="selected"' : ''; ?>
					<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $name ?></option>
				<?php } ?>
				</select>
				(<?php _e('in seconds', 'maxgalleria-slick-carousel') ?>)
			</td>
		</tr>    
		
		<tr>
			<td>
				<label for="<?php echo $options->slider_slides_container_width_key ?>"><?php _e('Container Width: (in pixels with "px" or as percent with "%")', 'maxgalleria-slick-carousel') ?></label>
			</td>
			<td>
        <?php 
          $container_width = trim($options->get_slider_slides_container_width()); 
          if ($container_width === '')
            $container_width = $options->get_slider_slides_container_width_default();
        ?>        
				<input type="text" class="small mag-popup-settings" id="<?php echo $options->slider_slides_container_width_key ?>" name="<?php echo $options->slider_slides_container_width_key ?>" value="<?php echo $container_width ?>" />
			</td>
		</tr>
		
    <tr>
			<td>
				<label for="<?php echo $options->slider_slides_center_mode_key ?>"><?php _e('Center Mode Enabled:', 'maxgalleria-slick-carousel') ?></label>
			</td>
			<td>
				<input type="checkbox" id="<?php echo $options->slider_slides_center_mode_key ?>" name="<?php echo $options->slider_slides_center_mode_key ?>" <?php echo (($options->get_slider_center_mode() == 'on') ? 'checked' : '') ?> />
			</td>
		</tr>  		
		
<!--		<tr>
			<td>
				<label for="<?php echo $options->slider_slides_center_padding_key ?>"><?php _e('Center Padding: (in pixels with "px" or as percent with "%")', 'maxgalleria-slick-carousel') ?></label>
			</td>
			<td>
        <?php 
          $center_padding = trim($options->get_slider_center_padding()); 
          if ($center_padding === '')
            $center_padding = $options->get_slider_center_padding_default();
        ?>        
				<input type="text" class="small mag-popup-settings" id="<?php echo $options->slider_slides_center_padding_key ?>" name="<?php echo $options->slider_slides_center_padding_key ?>" value="<?php echo $center_padding ?>" />
			</td>
		</tr>-->
						
		<tr>
			<td>
				<label for="<?php echo $options->slider_dots_enabled_key ?>"><?php _e('Display Dots:', 'maxgalleria-slick-carousel') ?></label>
			</td>
			<td>
				<input type="checkbox" id="<?php echo $options->slider_dots_enabled_key ?>" name="<?php echo $options->slider_dots_enabled_key ?>" <?php echo (($options->get_slider_dots_enabled() == 'on') ? 'checked' : '') ?> />
			</td>
		</tr> 
		
		<tr>
			<td>
				<label for="<?php echo $options->slider_thumbnail_dots_key ?>"><?php _e('Use Thumbnails as Dots:', 'maxgalleria-slick-carousel') ?></label>
			</td>
			<td>
				<input type="checkbox" id="<?php echo $options->slider_thumbnail_dots_key ?>" name="<?php echo $options->slider_thumbnail_dots_key ?>" <?php echo (($options->get_thumbnail_dots() == 'on') ? 'checked' : '') ?> />
			</td>
		</tr>    		
		
    <tr>
			<td>
				<label for="<?php echo $options->hero_custom_dot_key ?>"><?php _e('Use Custom Dot:', 'maxgalleria-slick-carousel') ?></label>
			</td>
			<td>
				<input type="checkbox" id="<?php echo $options->hero_custom_dot_key ?>" name="<?php echo $options->hero_custom_dot_key ?>" <?php echo (($options->get_hero_custom_dot() == 'on') ? 'checked' : '') ?> />
			</td>
		</tr>				
		<tr>                
			<td>
				<?php _e('Custom Dot:', 'maxgalleria-slick-carousel') ?>
			</td>
			<td>          
				<input type="text" class="wide" id="<?php echo $options->hero_dot_key ?>" name="<?php echo $options->hero_dot_key ?>" value="<?php echo $options->get_hero_dot() ?>" />
				<input class="button dot-options" id="upload_custom_dot" type="button" value="Upload Custom Dot" />
			</td>
		</tr>			
		<tr>
			<td><?php _e('Custom Dot Width', 'maxgalleria-slick-carousel') ?></td>
			<td>
				<input type="text" class="small dot-options" id="<?php echo $options->hero_dot_width_key ?>" name="<?php echo $options->hero_dot_width_key ?>" value="<?php echo $options->get_hero_dot_width() ?>" /> pixels
			</td>
		</tr>
		<tr>
			<td><?php _e('Custom Dot Height', 'maxgalleria-slick-carousel') ?></td>
			<td>
				<input type="text" class="small" id="<?php echo $options->hero_dot_height_key ?>" name="<?php echo $options->hero_dot_height_key ?>" value="<?php echo $options->get_hero_dot_height() ?>" /> pixels
			</td>
		</tr>
		
		<tr>
			<td><?php _e('Dots Vertical Position', 'maxgalleria-slick-carousel') ?></td>
			<td>
        <?php 
          $dots_vertical_position = trim($options->get_dots_vertical_position()); 
          if ($dots_vertical_position === '')
            $dots_vertical_position = $options->get_dots_vertical_position_default();
        ?>        
				<input type="text" class="small" id="<?php echo $options->slider_dots_vertical_position_key ?>" name="<?php echo $options->slider_dots_vertical_position_key ?>" value="<?php echo $dots_vertical_position ?>" /> pixels
			</td>
		</tr>		
		
		<tr>
			<td>
				<label for="<?php echo $options->slider_drag_enabled_key ?>"><?php _e('Enable Mouse Drag:', 'maxgalleria-slick-carousel') ?></label>
			</td>
			<td>
				<input type="checkbox" id="<?php echo $options->slider_drag_enabled_key ?>" name="<?php echo $options->slider_drag_enabled_key ?>" <?php echo (($options->get_slider_drag_enabled() == 'on') ? 'checked' : '') ?> />
			</td>
		</tr>        
		<tr>
			<td>
				<label for="<?php echo $options->slider_fade_enabled_key ?>"><?php _e('Fade:', 'maxgalleria-slick-carousel') ?></label>
			</td>
			<td>
				<input type="checkbox" id="<?php echo $options->slider_fade_enabled_key ?>" name="<?php echo $options->slider_fade_enabled_key ?>" <?php echo (($options->get_slider_fade_enabled() == 'on') ? 'checked' : '') ?> />
			</td>
		</tr>  
    
		<tr>
			<td>
				<label for="<?php echo $options->slider_rtl_enabled_key ?>"><?php _e('Right to Left:', 'maxgalleria-slick-carousel') ?></label>
			</td>
			<td>
				<input type="checkbox" id="<?php echo $options->slider_rtl_enabled_key ?>" name="<?php echo $options->slider_rtl_enabled_key ?>" <?php echo (($options->get_slider_rtl_enabled() == 'on') ? 'checked' : '') ?> />
			</td>
		</tr>    
		
		<tr>
			<td>
				<label for="<?php echo $options->slider_infinite_enabled_key ?>"><?php _e('Infinite Scrolling:', 'maxgalleria-slick-carousel') ?></label>
			</td>
			<td>
				<input type="checkbox" id="<?php echo $options->slider_infinite_enabled_key ?>" name="<?php echo $options->slider_infinite_enabled_key ?>" <?php echo (($options->get_slider_infinite_enabled() == 'on') ? 'checked' : '') ?> />
			</td>
		</tr>    
<!--		<tr>
			<td>
				<label for="<?php //echo $options->slider_lazyload_enabled_key ?>"><?php //_e('Lazy Load:', 'maxgalleria-slick-carousel') ?></label>
			</td>
			<td>
				<input type="checkbox" id="<?php //echo $options->slider_lazyload_enabled_key ?>" name="<?php //echo $options->slider_lazyload_enabled_key ?>" <?php //echo (($options->get_slider_lazyload_enabled() == 'on') ? 'checked' : '') ?> />
			</td>
		</tr>		-->
		
		<tr>
			<td>
				<label for="<?php echo $options->slider_pause_on_focus_key ?>"><?php _e('Pause on Focus:', 'maxgalleria-slick-carousel') ?></label>
			</td>
			<td>
				<input type="checkbox" id="<?php echo $options->slider_pause_on_focus_key ?>" name="<?php echo $options->slider_pause_on_focus_key ?>" <?php echo (($options->get_pause_on_focus() == 'on') ? 'checked' : '') ?> />
			</td>
		</tr>    		
								
		<tr>
			<td>
				<label for="<?php echo $options->slider_hover_pause_enabled_key ?>"><?php _e('Pause on Hover:', 'maxgalleria-slick-carousel') ?></label>
			</td>
			<td>
				<input type="checkbox" id="<?php echo $options->slider_hover_pause_enabled_key ?>" name="<?php echo $options->slider_hover_pause_enabled_key ?>" <?php echo (($options->get_slider_hover_pause_enabled() == 'on') ? 'checked' : '') ?> />
			</td>
		</tr>    
		<tr>
			<td class="mg-italic" colspan = "2"><?php _e('If someone scrolls over the slider it will pause.', 'maxgalleria-slick-carousel') ?></td>
		</tr>	
				    
		<tr>
			<td>
				<label for="<?php echo $options->slider_pause_on_dots_hover_key ?>"><?php _e('Pause on Dots Hover:', 'maxgalleria-slick-carousel') ?></label>
			</td>
			<td>
				<input type="checkbox" id="<?php echo $options->slider_pause_on_dots_hover_key ?>" name="<?php echo $options->slider_pause_on_dots_hover_key ?>" <?php echo (($options->get_slider_pause_on_dots_hover() == 'on') ? 'checked' : '') ?> />
			</td>
		</tr>        
		<tr>
			<td class="mg-italic" colspan = "2"><?php _e('If someone scrolls over the dots, the slider will wait.', 'maxgalleria-slick-carousel') ?></td>
		</tr>			
		<tr>
		  <td colspan="2" class="options-heading"><span class="mg-heading"><?php _e('ADVANCED OPTIONS', 'maxgalleria-slick-carousel') ?></span></td>
		</tr>
		
		<tr>
			<td>
				<label for="<?php echo $options->slider_edgeFriction_key ?>"><?php _e('Edge Friction:', 'maxgalleria-slick-carousel') ?></label>
			</td>
			<td>
        <?php 
          $edge_friction = trim($options->get_edgeFriction()); 
          if ($edge_friction === '')
            $edge_friction = $options->get_edgeFriction_default();
        ?>        
				<input type="text" class="small mag-popup-settings" id="<?php echo $options->slider_edgeFriction_key ?>" name="<?php echo $options->slider_edgeFriction_key ?>" value="<?php echo $edge_friction ?>" />
			</td>
		</tr>
		<tr>
			<td class="mg-italic" colspan = "2">
				<?php _e('Resistance when swiping edges of non-infinite carousels', 'maxgalleria-slick-carousel') ?>
			</td>
		</tr>			
										
		<tr>
			<td>
				<label for="<?php echo $options->slider_focusOnSelect_key ?>"><?php _e('Focus On Select:', 'maxgalleria-slick-carousel') ?></label>
			</td>
			<td>
				<input type="checkbox" id="<?php echo $options->slider_focusOnSelect_key ?>" name="<?php echo $options->slider_focusOnSelect_key ?>" <?php echo (($options->get_focusOnSelect() == 'on') ? 'checked' : '') ?> />
			</td>
		</tr>    
		<tr>
			<td class="mg-italic" colspan = "2">
				<?php _e('Enable focus on selected (clicked) element.', 'maxgalleria-slick-carousel') ?>
			</td>
		</tr>			
						
		<tr>
			<td>
				<label for="<?php echo $options->slider_focusOnChange_key ?>"><?php _e('Focus On Change:', 'maxgalleria-slick-carousel') ?></label>
			</td>
			<td>
				<input type="checkbox" id="<?php echo $options->slider_focusOnChange_key ?>" name="<?php echo $options->slider_focusOnChange_key ?>" <?php echo (($options->get_focusOnChange() == 'on') ? 'checked' : '') ?> />
			</td>
		</tr>    
		<tr>
			<td class="mg-italic" colspan = "2">
				<?php _e('Puts focus on slide after change.', 'maxgalleria-slick-carousel') ?>
			</td>
		</tr>			
				
		<tr>
			<td>
				<label for="<?php echo $options->slider_swipe_to_slide_key ?>"><?php _e('Swipe To Slide:', 'maxgalleria-slick-carousel') ?></label>
			</td>
			<td>
				<input type="checkbox" id="<?php echo $options->slider_swipe_to_slide_key ?>" name="<?php echo $options->slider_swipe_to_slide_key ?>" <?php echo (($options->get_swipe_to_slide() == 'on') ? 'checked' : '') ?> />
			</td>
		</tr>    
		<tr>
			<td class="mg-italic" colspan = "2">
				<?php _e('Swipe to slide irrespective of slidesToScroll.', 'maxgalleria-slick-carousel') ?>
			</td>
		</tr>			
				
		<tr>
			<td>
				<label for="<?php echo $options->slider_touch_move_enabled_key ?>"><?php _e('Move Slide with Touch:', 'maxgalleria-slick-carousel') ?></label>
			</td>
			<td>
				<input type="checkbox" id="<?php echo $options->slider_touch_move_enabled_key ?>" name="<?php echo $options->slider_touch_move_enabled_key ?>" <?php echo (($options->get_slider_touch_move_enabled() == 'on') ? 'checked' : '') ?> />
			</td>
		</tr>    
		<tr>
			<td>
				<?php _e('Transition Speed:', 'maxgalleria-image-slider') ?>
			</td>
			<td>
				<select id="<?php echo $options->slider_animation_speed_key ?>" name="<?php echo $options->slider_animation_speed_key ?>">
				<?php foreach ($options->slider_animation_speeds as $key => $name) { ?>
					<?php $selected = ($options->get_slider_animation_speed() == $key) ? 'selected="selected"' : ''; ?>
					<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $name ?></option>
				<?php } ?>
				</select>
				(<?php _e('in seconds', 'maxgalleria-image-slider') ?>)
			</td>
		</tr>    
		
		<tr>
			<td>
				<?php _e('Lazyload Technique:', 'maxgalleria-image-slider') ?>
			</td>
			<td>
				<select id="<?php echo $options->slider_lazyLoad_key ?>" name="<?php echo $options->slider_lazyLoad_key ?>">
				<?php foreach ($options->lazyload_types as $key => $name) { ?>
					<?php $selected = ($options->get_lazyLoad() == $key) ? 'selected="selected"' : ''; ?>
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
			<td>
				<label for="<?php echo $options->slider_mobile_first_enabled_key ?>"><?php _e('Mobile First:', 'maxgalleria-slick-carousel') ?></label>
			</td>
			<td>
				<input type="checkbox" id="<?php echo $options->slider_mobile_first_enabled_key ?>" name="<?php echo $options->slider_mobile_first_enabled_key ?>" <?php echo (($options->get_slider_mobile_first_enabled() == 'on') ? 'checked' : '') ?> />
			</td>
		</tr>
		<tr>
			<td class="mg-italic" colspan = "2"><?php _e('Uses mobile first calculation for responsive settings.', 'maxgalleria-slick-carousel') ?></td>
		</tr>	
    
		<tr>
			<td>
				<label for="<?php echo $options->slider_swipe_key ?>"><?php _e('Swipe:', 'maxgalleria-slick-carousel') ?></label>
			</td>
			<td>
				<input type="checkbox" id="<?php echo $options->slider_swipe_key ?>" name="<?php echo $options->slider_swipe_key ?>" <?php echo (($options->get_slider_swipe() == 'on') ? 'checked' : '') ?> />
			</td>
		</tr>
		<tr>
			<td class="mg-italic" colspan = "2"><?php _e('If someone is using this on a touch sensitive screen and you want them to move the images with their fingers.', 'maxgalleria-slick-carousel') ?></td>
		</tr>	
    
		<tr>
			<td>
				<label for="<?php echo $options->slider_use_css_key ?>"><?php _e('Use CSS Transitions: ', 'maxgalleria-slick-carousel') ?></label>
			</td>
			<td>
				<input type="checkbox" id="<?php echo $options->slider_use_css_key ?>" name="<?php echo $options->slider_use_css_key ?>" <?php echo (($options->get_slider_use_css() == 'on') ? 'checked' : '') ?> />
			</td>
		</tr>
		
		<tr>
			<td>
				<label for="<?php echo $options->slider_use_css_key ?>"><?php _e('Use CSS Transformations: ', 'maxgalleria-slick-carousel') ?></label>
			</td>
			<td>
				<input type="checkbox" id="<?php echo $options->slider_use_css_transform_key ?>" name="<?php echo $options->slider_use_css_transform_key ?>" <?php echo (($options->get_css_transform() == 'on') ? 'checked' : '') ?> />
			</td>
		</tr>
		
    
		<tr>
			<td>
				<label for="<?php echo $options->slider_variable_width_key ?>"><?php _e('Allow Variable Width: ', 'maxgalleria-slick-carousel') ?></label>
			</td>
			<td>
				<input type="checkbox" id="<?php echo $options->slider_variable_width_key ?>" name="<?php echo $options->slider_variable_width_key ?>" <?php echo (($options->get_slider_variable_width() == 'on') ? 'checked' : '') ?> />
			</td>
		</tr>
    
		<tr>
			<td>
				<label for="<?php echo $options->slider_vertical_key ?>"><?php _e('Vertical Slide: ', 'maxgalleria-slick-carousel') ?></label>
			</td>
			<td>
				<input type="checkbox" id="<?php echo $options->slider_vertical_key ?>" name="<?php echo $options->slider_vertical_key ?>" <?php echo (($options->get_slider_vertical() == 'on') ? 'checked' : '') ?> />
			</td>
		</tr>
    
		<tr>
			<td>
				<label for="<?php echo $options->slider_vertical_swiping_key ?>"><?php _e('Vertical Swipe: ', 'maxgalleria-slick-carousel') ?></label>
			</td>
			<td>
				<input type="checkbox" id="<?php echo $options->slider_vertical_swiping_key ?>" name="<?php echo $options->slider_vertical_swiping_key ?>" <?php echo (($options->get_slider_vertical_swiping() == 'on') ? 'checked' : '') ?> />
			</td>
		</tr>
		
		<tr>
			<td>
				<label for="<?php echo $options->slider_slides_padding_key ?>"><?php _e('Padding Between Slides: (in pixels with "px" or as percent with "%")', 'maxgalleria-slick-carousel') ?></label>
			</td>
			<td>
        <?php 
          $slide_padding = trim($options->get_slider_padding()); 
          if ($slide_padding === '')
            $slide_padding = $options->get_slider_padding_default();
        ?>        
				<input type="text" class="small mag-popup-settings" id="<?php echo $options->slider_slides_padding_key ?>" name="<?php echo $options->slider_slides_padding_key ?>" value="<?php echo $slide_padding ?>" />
			</td>
		</tr>
		<tr>
			<td class="mg-italic" colspan = "2"><?php _e('When displaying single slides this should be 0.', 'maxgalleria-slick-carousel') ?></td>
		</tr>	
		
		<tr>
			<td><?php _e('CSS3 Animations Type:', 'maxgalleria-slick-carousel'); ?></td>
			<td>
				<table id="arrow-table">
					<tr>
						<td class="mg-radio">
							<input type="radio" name="<?php echo $options->slider_cssease_key ?>" value="ease" class="close-button" <?php echo ($options->get_cssease() === 'ease') ? 'checked' : ''; ?>>
						</td>							
						<td class="mg-radio">
							<input type="radio" name="<?php echo $options->slider_cssease_key ?>" value="linear" class="close-button" <?php echo ($options->get_cssease() === 'linear') ? 'checked' : ''; ?>>
						</td>
						<td class="mg-radio">
							<input type="radio" name="<?php echo $options->slider_cssease_key ?>" value="ease-in" class="close-button" <?php echo ($options->get_cssease() === 'ease-in') ? 'checked' : ''; ?>>
						</td>
						<td class="mg-radio">
							<input type="radio" name="<?php echo $options->slider_cssease_key ?>" value="ease-out" class="close-button" <?php echo ($options->get_cssease() === 'ease-out') ? 'checked' : ''; ?>>
						</td>
						<td class="mg-radio">
							<input type="radio" name="<?php echo $options->slider_cssease_key ?>" value="ease-in-out" class="close-button" <?php echo ($options->get_cssease() === 'ease-in-out') ? 'checked' : ''; ?>>
						</td>							
					</tr>
					<tr>
						<td class="radio-text" style="text-align:center">ease</td>							
						<td class="radio-text" style="text-align:center">linear</td>							
						<td class="radio-text" style="text-align:center">ease-in</td>							
						<td class="radio-text" style="text-align:center">ease-out</td>							
						<td class="radio-text" style="text-align:center">ease-in-out</td>							
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td class="mg-italic" colspan = "2"><?php _e('Sets the speed of CSS3 animations.', 'maxgalleria-slick-carousel') ?></td>
		</tr>
		
    <tr>
			<td>
				<label for="<?php echo $options->slider_wait_for_animate_key ?>"><?php _e('Wait for Animate:', 'maxgalleria-slick-carousel') ?></label>
			</td>
			<td>
				<input type="checkbox" id="<?php echo $options->slider_wait_for_animate_key ?>" name="<?php echo $options->slider_wait_for_animate_key ?>" <?php echo (($options->get_wait_for_animate() == 'on') ? 'checked' : '') ?> />
			</td>
		</tr>		
		<tr>
			<td class="mg-italic" colspan = "2">
				<?php _e("Ignores requests to advance the slide while animating.", 'maxgalleria-slick-carousel') ?>
			</td>
		</tr>			
		
		<tr>
			<td>
				<label for="<?php echo $options->slider_touch_threshold_key ?>"><?php _e('Touch Threshold:', 'maxgalleria-slick-carousel') ?></label>
			</td>
			<td>
        <?php 
          $touch_threshold = trim($options->get_touch_threshold()); 
          if ($touch_threshold === '')
            $touch_threshold = $options->get_touch_threshold_default();
        ?>        
				<input type="text" class="small mag-popup-settings" id="<?php echo $options->slider_touch_threshold_key ?>" name="<?php echo $options->slider_touch_threshold_key ?>" value="<?php echo $touch_threshold ?>" />
			</td>
		</tr>
		<tr>
			<td class="mg-italic" colspan = "2">
				<?php _e("To advance slides, the user must swipe a length of (1/touchThreshold) * the width of the slider.", 'maxgalleria-slick-carousel') ?>
			</td>
		</tr>			
		
				
		<tr>
			<td>
				<label for="<?php echo $options->slider_zindex_key ?>"><?php _e('ZIndex:', 'maxgalleria-slick-carousel') ?></label>
			</td>
			<td>
        <?php 
          $slide_zindex = trim($options->get_zindex()); 
          if ($slide_zindex === '')
            $slide_zindex = $options->get_zindex_default();
        ?>        
				<input type="text" class="small mag-popup-settings" id="<?php echo $options->slider_zindex_key ?>" name="<?php echo $options->slider_zindex_key ?>" value="<?php echo $slide_zindex ?>" />
			</td>
		</tr>
		<tr>
			<td class="mg-italic" colspan = "2">
				<?php _e("Set the zIndex values for slides.", 'maxgalleria-slick-carousel') ?>
			</td>
		</tr>			
		
		<tr>
			<td colspan="2"><?php _e('Responsive Break Points:', 'maxgalleria-slick-carousel') ?></td>
		</tr>
		<tr>
			<td colspan = "2">
				<textarea cols="70" rows="25" name="<?php echo $options->slider_breakpoints_key ?>" id="<?php echo $options->slider_breakpoints_key ?>"><?php echo $options->get_breakpoints(); ?></textarea>
			</td>
		</tr>
		<tr>
			
		</tr>		
			<td colspan="2"><?php _e('Here you can enter responsive breakpoints with specific slider settings.', 'maxgalleria-slick-carousel') ?> <a id="bp-example" style="cursor: pointer"><?php _e('Click here to view example breakpoints code.', 'maxgalleria-slick-carousel') ?></a></td>
		<tr id="breakpoint-example" style="display:none">
			<td>
		[{<br>
    &nbsp;&nbsp;breakpoint: 1024,<br>
    &nbsp;&nbsp;settings: {<br>
    &nbsp;&nbsp;&nbsp;&nbsp;slidesToShow: 3,<br>
    &nbsp;&nbsp;&nbsp;&nbsp;slidesToScroll: 3<br>
    &nbsp;&nbsp;}<br>
    },<br>
    {<br>
    &nbsp;&nbsp;breakpoint: 600,<br>
    &nbsp;&nbsp;settings: {<br>
    &nbsp;&nbsp;&nbsp;&nbsp;slidesToShow: 2,<br>
    &nbsp;&nbsp;&nbsp;&nbsp;slidesToScroll: 2<br>
    &nbsp;&nbsp;}<br>
    },<br>
    {<br>
    &nbsp;&nbsp;breakpoint: 480,<br>
    &nbsp;&nbsp;settings: {<br>
    &nbsp;&nbsp;&nbsp;&nbsp;slidesToShow: 1,<br>
    &nbsp;&nbsp;&nbsp;&nbsp;slidesToScroll: 1<br>
    &nbsp;&nbsp;}<br>
    }]<br>
			</td>
			
		</tr>
		
		<tr>
			<td>
				<?php _e('Breakpoints respond to:', 'maxgalleria-image-slider') ?>
			</td>
			<td>
				<select id="<?php echo $options->slider_respondto_key ?>" name="<?php echo $options->slider_respondto_key ?>" style="width:186px">
				<?php foreach ($options->respondto_types as $key => $name) { ?>
					<?php $selected = ($options->get_respondto() == $key) ? 'selected="selected"' : ''; ?>
					<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $name ?></option>
				<?php } ?>
				</select>
			</td>
		</tr>    
				
		<tr>
		  <td colspan="2" class="options-heading"><span class="mg-heading"><?php _e('HERO SLIDER OPTIONS', 'maxgalleria-slick-carousel') ?></span></td>
		</tr>		
    <tr>
			<td>
				<label for="<?php echo $options->hero_mode_key ?>"><?php _e('Hero Slider Mode:', 'maxgalleria-slick-carousel') ?></label>
			</td>
			<td>
				<input type="checkbox" id="<?php echo $options->hero_mode_key ?>" name="<?php echo $options->hero_mode_key ?>" <?php echo (($options->get_hero_mode() == 'on') ? 'checked' : '') ?> />
			</td>
		</tr>		
		<tr>
			<td class="mg-italic" colspan = "2">
				<?php _e('For a full width Hero slider, check Hero Mode and enter the size of your full screen images, such as 2120 x 1120.', 'maxgalleria-slick-carousel') ?>
			</td>
		</tr>			
		<tr>
			<td>
				<?php _e('Hero Slider Width:', 'maxgalleria-slick-carousel') ?>
			</td>
			<td>
				<input class="small hero-options" type="text" id="<?php echo $options->hero_width_key ?>" name="<?php echo $options->hero_width_key ?>" value="<?php echo $options->get_hero_width() ?>" /> pixels
			</td>
		</tr>
		<tr>
			<td>
				<?php _e('Hero Slider Height:', 'maxgalleria-slick-carousel') ?>
			</td>
			<td>
				<input class="small" type="text" id="<?php echo $options->hero_height_key ?>" name="<?php echo $options->hero_height_key ?>" value="<?php echo $options->get_hero_height() ?>" /> pixels
			</td>
		</tr>
		
		<tr>
			<td colspan="2" class="options-heading"><span class="mg-heading"><?php _e('SLIDER CUSTOM CSS:', 'maxgalleria-slick-carousel') ?></span></td>
		</tr>
		<tr>
			<td colspan = "2">
				<?php 
				$custom_css = trim($options->get_hero_custom_css());
				if($custom_css === '')
				  $custom_css = $options->get_hero_custom_css_default();				
				?>
				<textarea cols="70" rows="25" name="<?php echo $options->hero_custom_css_key ?>" id="<?php echo $options->hero_custom_css_key ?>"><?php echo $custom_css; ?></textarea>
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
		
		
		<tr>
			<td colspan = "2">
				<p><?php _e('For non stop infinite scrolling use the following settings:', 'maxgalleria-slick-carousel'); ?></p>
				<ul>
					<li><?php _e('Number of Slides to Scroll: 1', 'maxgalleria-slick-carousel'); ?></li>
					<li><?php _e('Disable Auto Play: unchecked', 'maxgalleria-slick-carousel'); ?></li>
					<li><?php _e('Auto Play Speed: 0', 'maxgalleria-slick-carousel'); ?></li>
					<li><?php _e('Transition Speed: 5', 'maxgalleria-slick-carousel'); ?></li>
					<li><?php _e('Infinite Scrolling: checked', 'maxgalleria-slick-carousel'); ?></li>
					<li><?php _e('CSS3 Animations: "linear"', 'maxgalleria-slick-carousel'); ?></li>
				</ul>
				<p><?php _e('If you run into any issues email us at <a href="mailto:support@maxfoundry.com">support@maxfoundry.com</a>', 'maxgalleria-slick-carousel'); ?></p>
			</td>
		</tr>


	</table>
</div>
<script type="text/javascript">		
	jQuery(document).ready(function() {
		var ww = jQuery('#post_id_reference').text();
		window.original_send_to_editor = window.send_to_editor;
    		
		jQuery('#<?php echo $options->ns_border_color_key ?>').css('border-color','<?php echo $options->get_border_color(); ?>');
		jQuery('#<?php echo $options->ns_shadow_color_key ?>').css('border-color','<?php echo $options->get_shadow_color(); ?>');
		
		jQuery("#<?php echo $options->ns_shadow_key ?>").change(function() {
			var shadow_type = jQuery("#<?php echo $options->ns_shadow_key ?>").val();
			if(shadow_type === 'color') {
				jQuery("#<?php echo $options->ns_shadow_color_key ?>").prop('disabled', false);
			} else {
				jQuery("#<?php echo $options->ns_shadow_color_key ?>").prop('disabled', 'disabled');
			}	
    });   
		
		var shadow_type = jQuery("#<?php echo $options->ns_shadow_key ?>").val();
		if(shadow_type === 'color') {
			jQuery("#<?php echo $options->ns_shadow_color_key ?>").prop('disabled', false);
		} else {
			jQuery("#<?php echo $options->ns_shadow_color_key ?>").prop('disabled', 'disabled');
		}	
		
		jQuery('#<?php echo $options->ns_show_border_key ?>').click(function(){
			if(this.checked) {
			  jQuery("#<?php echo $options->ns_border_color_key ?>").prop('disabled', false);
			  jQuery(".border-thickness").prop('disabled', false);
			  jQuery(".border-radius").prop('disabled', false);				
				jQuery("#border-thickness-default").prop("checked", true)
				jQuery("#border-radius-default").prop("checked", true)
				
			} else {
			  jQuery("#<?php echo $options->ns_border_color_key ?>").prop('disabled', 'disabled');
			  jQuery(".border-thickness").prop('disabled', 'disabled');
			  jQuery(".border-radius").prop('disabled', 'disabled');
			}	
		});		
		
		if(jQuery('#<?php echo $options->ns_show_border_key ?>').is(':checked')) {
			jQuery("#<?php echo $options->ns_border_color_key ?>").prop('disabled', false);
			jQuery(".border-thickness").prop('disabled', false);
			jQuery(".border-radius").prop('disabled', false);				
		} else {
			jQuery("#<?php echo $options->ns_border_color_key ?>").prop('disabled', 'disabled');
			jQuery(".border-thickness").prop('disabled', 'disabled');
			jQuery(".border-radius").prop('disabled', 'disabled');
			
		}

		jQuery("#<?php echo $options->ns_border_color_key . '2' ?>").click(function() {
			if(!jQuery("#<?php echo $options->ns_border_color_key ?>").prop('disabled')) {				
		    jQuery("#<?php echo $options->ns_border_color_key ?>").click();
			}	
	  });  

		jQuery(".ns-shadow-type").change(function() {
			var shadow_type = this.value
			if(shadow_type === 'color') {
				jQuery("#<?php echo $options->ns_shadow_color_key ?>").prop('disabled', false);
			jQuery("#<?php echo $options->ns_shadow_color_key . '2' ?>").prop('disabled', false);
			} else {
				jQuery("#<?php echo $options->ns_shadow_color_key ?>").prop('disabled', 'disabled');
			jQuery("#<?php echo $options->ns_shadow_color_key . '2' ?>").prop('disabled', 'disabled');
			}	
			if(shadow_type === 'none') {
				jQuery(".ns-blur-type").prop('disabled', 'disabled');
				jQuery(".ns-spread-type").prop('disabled', 'disabled');
				jQuery("#<?php echo $options->ns_shadow_color_key ?>").prop('disabled', 'disabled');
			  jQuery("#<?php echo $options->ns_shadow_color_key . '2' ?>").prop('disabled', 'disabled');
			} else {
				jQuery(".ns-blur-type").prop('disabled', false);
				jQuery(".ns-spread-type").prop('disabled', false);
			}				
			
    });   
		
		jQuery("#<?php echo $options->ns_shadow_color_key . '2' ?>").click(function() {
			if(!jQuery("#<?php echo $options->ns_shadow_color_key ?>").prop('disabled')) {				
		    jQuery("#<?php echo $options->ns_shadow_color_key ?>").click();
		  }
	  }); 

		jQuery('#<?php echo $options->hero_custom_arrow_key ?>').click(function(){
			if(this.checked) {
			  jQuery(".arrow-options").prop('disabled', false);				
			  jQuery(".default-arrows").prop('disabled', 'disabled');								 
			} else {
			  jQuery(".arrow-options").prop('disabled', 'disabled');				
			  jQuery(".default-arrows").prop('disabled', false);				
			}	
		});				
		
		if(jQuery('#<?php echo $options->hero_custom_arrow_key; ?>').is(':checked')) {
			jQuery(".arrow-options").prop('disabled', false);
			jQuery(".default-arrows").prop('disabled', 'disabled');								 
		} else {
			jQuery(".arrow-options").prop('disabled', 'disabled');
			jQuery(".default-arrows").prop('disabled', false);				
		}
		
		jQuery('#<?php echo $options->hero_custom_dot_key ?>').click(function(){
			if(this.checked) {
			  jQuery(".dot-options").prop('disabled', false);				
			} else {
			  jQuery(".dot-options").prop('disabled', 'disabled');				
			}	
		});				
		
		if(jQuery('#<?php echo $options->hero_custom_dot_key; ?>').is(':checked')) {
			jQuery(".dot-options").prop('disabled', false);
		} else {
			jQuery(".dot-options").prop('disabled', 'disabled');
		}
		
		
		jQuery('#<?php echo $options->hero_mode_key ?>').click(function(){
			if(this.checked) {
			  jQuery(".hero-options").prop('disabled', false);				
			} else {
			  jQuery(".hero-options").prop('disabled', 'disabled');				
			}	
		});				
		
		if(jQuery('#<?php echo $options->hero_mode_key; ?>').is(':checked') || 
			 jQuery('#<?php echo $options->slider_thumbnail_dots_key; ?>').is(':checked')) {
			jQuery(".hero-options").prop('disabled', false);
		} else {
			jQuery(".hero-options").prop('disabled', 'disabled');
		}
		
		jQuery('#<?php echo $options->hero_custom_dot_key ?>').click(function(){
			jQuery('#<?php echo $options->slider_thumbnail_dots_key ?>').prop('checked', false);				
			jQuery(".dot-options").prop('disabled', false);				
		});
		
		jQuery('#<?php echo $options->slider_thumbnail_dots_key ?>').click(function(){
			jQuery('#<?php echo $options->hero_custom_dot_key ?>').prop('checked', false);				
			jQuery(".dot-options").prop('disabled', false);				
		});
		
		if( jQuery('#<?php echo $options->slider_thumbnail_dots_key; ?>').is(':checked')) {
			jQuery(".dot-options").prop('disabled', false);				
		}
		
				
		window.send_to_editor_left_arrow = function(html){
			url = jQuery(html).attr('href');
			jQuery('#<?php echo $options->hero_left_arrow_key ?>').val(url);
			tb_remove();
		}
		
		jQuery('#upload_left_arrow').click(function() {
			window.send_to_editor=window.send_to_editor_left_arrow;
			formfield = jQuery('#<?php echo $options->hero_left_arrow_key ?>').attr('name');
			tb_show('', 'media-upload.php?post_id=' + ww + '&type=image&TB_iframe=true');
		return false;
		});
		
		window.send_to_editor_right_arrow = function(html){
			url = jQuery(html).attr('href');
			jQuery('#<?php echo $options->hero_right_arrow_key ?>').val(url);
			tb_remove();
		}
		
		jQuery('#upload_right_arrow').click(function() {
			window.send_to_editor=window.send_to_editor_right_arrow;
			formfield = jQuery('#<?php echo $options->hero_right_arrow_key ?>').attr('name');
			tb_show('', 'media-upload.php?post_id=' + ww + '&type=image&TB_iframe=true');
		return false;
		});
		
		window.send_to_editor_custom_dot = function(html){
			url = jQuery(html).attr('href');
			jQuery('#<?php echo $options->hero_dot_key ?>').val(url);
			tb_remove();
		}
		
		jQuery('#upload_custom_dot').click(function() {
			window.send_to_editor=window.send_to_editor_custom_dot;
			formfield = jQuery('#<?php echo $options->hero_dot_key ?>').attr('name');
			tb_show('', 'media-upload.php?post_id=' + ww + '&type=image&TB_iframe=true');
		return false;
		});
		
		var editor = CodeMirror.fromTextArea( document.getElementById( '<?php echo $options->hero_custom_css_key ?>' ), {
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
		
		jQuery('#bp-example').click(function() {
			if(!jQuery('#breakpoint-example').is(':visible')) {
				jQuery('#breakpoint-example').slideDown(200);
			} else {
				jQuery('#breakpoint-example').slideUp(600);
			}
		});		
						
	});
</script>
<?php } else if($maxgalleria_slick_carousel->license_valid == 'inactive') { ?>
	<script>
	jQuery(document).ready(function(){
	  jQuery('.page-title-action').hide();
	});  
  </script>    

  <?php
  $settings_url = site_url() . '/wp-admin/edit.php?post_type=maxgallery&page=maxgalleria-settings&addon=slick-slider';
  ?>
  
  <div class='license_warning expired'>
    <h3><?php _e('Your license has not been activated for this site.', 'maxgalleria-slick-carousel'); ?> </h3>

    <p><?php printf(__('Please enter the license key you received from MaxGalleria.com in the <a href="%s">MaxGalleria Setting, Slick Slider tab</a>. After entering the license key, click the Save Changes button and then click the Activate button.','maxgalleria-slick-carousel'), $settings_url); ?></p>

  </div>
  
  <?php } else { ?>
	<script>
	jQuery(document).ready(function(){
	  jQuery('.page-title-action').hide();
	});  
  </script>    
  
  <?php 
  $expiration = get_option(MAXGALLERIA_SLICK_CAROUSEL_EXPIRES);    
  $expiration = date("F d, Y", strtotime($expiration));
                 
  ?>  
  <div class='license_warning expired'>
    <h3><?php _e('License Expired', 'maxgalleria-slick-carousel'); ?> </h3>

    <p><?php printf(__('Your license expired on %s. Renew your license to save or edit galleries, get updates and new features plus support!.','maxgalleria-slick-carousel'), $expiration); ?></p>

    <p><?php printf(__('Renew your license for a discount via  %s Your Account %s on our Website.</p>', 'maxgalleria-slick-carousel'), "<a href='https://maxgalleria.com/my-account' target='_blank'>", "</a>" ); ?></p>
  </div>
  
  <?php }