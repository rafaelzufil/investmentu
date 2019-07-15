<?php
class MaxGalleriaSlickSliderTemplate {
	public function enqueue_styles($options) {

		$slider_stylesheet = apply_filters(MAXGALLERIA_SLICK_CAROUSEL_FILTER_SLIDER_STYLESHEET, MAXGALLERIA_SLICK_CAROUSEL_PLUGIN_URL . '/libs/slick/slick.css');
		wp_enqueue_style('maxgalleria-slick-carousel-slick', $slider_stylesheet);
    
		$slider_stylesheet = apply_filters(MAXGALLERIA_SLICK_THEME_CAROUSEL_FILTER_SLIDER_STYLESHEET, MAXGALLERIA_SLICK_CAROUSEL_PLUGIN_URL . '/libs/slick/slick-theme.css');
		wp_enqueue_style('maxgalleria-slick-theme-carousel-slick', $slider_stylesheet);    
		
		$main_stylesheet = apply_filters(MAXGALLERIA_SLICK_CAROUSEL_FILTER_MAIN_STYLESHEET, MAXGALLERIA_SLICK_CAROUSEL_PLUGIN_URL . '/maxgalleria-slick-carousel.css');
		wp_enqueue_style('maxgalleria-slick-carousel', $main_stylesheet);

		// Load skin style
		$skin = $options->get_skin();
		$skin_stylesheet = apply_filters(MAXGALLERIA_SLICK_CAROUSEL_FILTER_SKIN_STYLESHEET, MAXGALLERIA_SLICK_CAROUSEL_PLUGIN_URL . '/skins/' . $skin . '.css', $skin);
		wp_enqueue_style('maxgalleria-slick-carousel-skin-' . $skin, $skin_stylesheet);
		
		$mg_style_file = get_post_meta($options->gallery_id, "mg-css-file", true );
		if($mg_style_file !== '') {
		  wp_enqueue_style('maxgalleria-slick-slider-style-' . $options->gallery_id, $mg_style_file);			
		} else if($options->get_arrow() != 0 ) {
		  wp_enqueue_style('maxgalleria-slick-slider-style-' . $options->gallery_id, $mg_style_file);			
		}
				
		// Check to load custom styles
		if ($options->get_custom_styles_enabled() == 'on' && $options->get_custom_styles_url() != '') {
			wp_enqueue_style('maxgalleria-slick-carousel-custom', $options->get_custom_styles_url(), array('maxgalleria-slick-slider-style-' . $options->gallery_id, 'maxgalleria-slick-carousel-skin-' . $skin, 'maxgalleria-slick-carousel' ));
		} 
	}
	
	public function enqueue_scripts($options) {
		wp_enqueue_script('jquery');
		
		$slider_script = apply_filters(MAXGALLERIA_SLICK_CAROUSEL_FILTER_SLIDER_SCRIPT, MAXGALLERIA_SLICK_CAROUSEL_PLUGIN_URL . '/libs/slick/slick.min.js');
		wp_enqueue_script('maxgalleria-slick-carousel-slick', $slider_script, array('jquery'), false, true );
				
		// Check to load custom scripts
		if ($options->get_custom_scripts_enabled() == 'on' && $options->get_custom_scripts_url() != '') {
			wp_enqueue_script('maxgalleria-slick-carousel-custom', $options->get_custom_scripts_url(), array('jquery'));
		}
	}
	
	public function get_slider_image($attachment, $options) {
		global $maxgalleria;
						
		if($options->get_hero_mode() === 'on') {
			$hero_width = $options->get_hero_width();
			$hero_height = $options->get_hero_height();
			$width = apply_filters(MAXGALLERIA_SLICK_CAROUSEL_FILTER_SLIDER_IMAGE_WIDTH, $hero_width);
			$height = apply_filters(MAXGALLERIA_SLICK_CAROUSEL_FILTER_SLIDER_IMAGE_HEIGHT, $hero_height);
			$crop = apply_filters(MAXGALLERIA_SLICK_CAROUSEL_FILTER_SLIDER_IMAGE_CROP, false);							
		} else {	
			$width = apply_filters(MAXGALLERIA_SLICK_CAROUSEL_FILTER_SLIDER_IMAGE_WIDTH, 960);
			$height = apply_filters(MAXGALLERIA_SLICK_CAROUSEL_FILTER_SLIDER_IMAGE_HEIGHT, 640);
			$crop = apply_filters(MAXGALLERIA_SLICK_CAROUSEL_FILTER_SLIDER_IMAGE_CROP, true);
		}
		
		return $maxgalleria->image_gallery->resize_image($attachment, $width, $height, $crop);
	}
	
	public function get_output($gallery, $attachments) {
		$options = new MaxGalleriaSlickSliderOptions($gallery->ID);
		
		do_action(MAXGALLERIA_SLICK_CAROUSEL_ACTION_BEFORE_ENQUEUE_STYLES, $options);
		$this->enqueue_styles($options);
		do_action(MAXGALLERIA_SLICK_CAROUSEL_ACTION_AFTER_ENQUEUE_STYLES, $options);
		
		do_action(MAXGALLERIA_SLICK_CAROUSEL_ACTION_BEFORE_ENQUEUE_SCRIPTS, $options);
		$this->enqueue_scripts($options);
		do_action(MAXGALLERIA_SLICK_CAROUSEL_ACTION_AFTER_ENQUEUE_SCRIPTS, $options);
		
		$output = '';
		
		// For the ghost skin, the description has to go outside of the gallery container
		if ($options->get_skin() == 'ghost') {
			if ($options->get_description_enabled() == 'on' && $options->get_description_position() == 'above') {
				if ($options->get_description_text() != '') {
				$output .= '<p class="mg-description above">' . $options->get_description_text() . '</p>';
				}
			}
		}

		$output .= apply_filters(MAXGALLERIA_SLICK_CAROUSEL_FILTER_BEFORE_GALLERY_OUTPUT, '', $gallery, $attachments, $options);
    if($options->get_slider_rtl_enabled()== 'on')
		  $output .= '<div id="maxgallery-' . $gallery->ID . '" class="mg-slick-carousel ' . $options->get_skin() . '" dir="rtl"' . ' style="width="' . $options->get_slider_slides_container_width() . '"' . ' >' . PHP_EOL;
    //else if($options->get_hero_mode() === 'on')
		//  $output .= '<div id="maxgallery-' . $gallery->ID . '" class="mg-slick-carousel ' . $options->get_skin() . '"' . '>' . PHP_EOL;
    else
		  $output .= '<div id="maxgallery-' . $gallery->ID . '" class="mg-slick-carousel ' . $options->get_skin() . '"' . ' style="width:' . $options->get_slider_slides_container_width() . '"' . '>' . PHP_EOL;
		
		// For all other skins, the description goes inside the gallery container
		if ($options->get_skin() != 'ghost') {
			if ($options->get_description_enabled() == 'on' && $options->get_description_position() == 'above') {
				if ($options->get_description_text() != '') {
					$output .= '<p class="mg-description above">' . $options->get_description_text() . '</p>' . PHP_EOL;
				}
			}
		}
    
		$attachments_count = count($attachments);
		$loop_counter = 0;
		foreach ($attachments as $attachment) {
			$loop_counter++;	
			$excluded = get_post_meta($attachment->ID, 'maxgallery_attachment_image_exclude', true);
			if (!$excluded) {
				$alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);
				$title = ($options->get_slider_caption_enabled() == 'on') ? $attachment->post_title : '';
				
				$slider_image = $this->get_slider_image($attachment, $options);
				if($options->get_slider_variable_width() == 'on') {
					$slider_image['url'] = wp_get_attachment_url($attachment->ID);					
				}
        
        if($options->get_slider_lazyload_enabled()== 'on')
  				$slider_image_element = '<img data-lazy="' . $slider_image['url'] . '" alt="' . esc_attr($alt) . '" title="' . esc_attr($title) . '" />' . PHP_EOL;
        else
  				$slider_image_element = '<img src="' . $slider_image['url'] . '" alt="' . esc_attr($alt) . '" title="' . esc_attr($title) . '" />' . PHP_EOL;
					
//  				$slider_image_element = '<div class="mg-slick-slide" ><img data-lazy="' . $slider_image['url'] . '" alt="' . esc_attr($alt) . '" title="' . esc_attr($title) . '" /></div>';
//        else
//  				$slider_image_element = '<img src="' . $slider_image['url'] . '" alt="' . esc_attr($alt) . '" title="' . esc_attr($title) . '" />';
  				// old $slider_image_element = '<div class="mg-slick-slide" ><img src="' . $slider_image['url'] . '" alt="' . esc_attr($alt) . '" title="' . esc_attr($title) . '" /></div>';
				
				//$slider_padding = $options->get_slider_padding();
				$border_thickness = $options->get_border_thickness();
				
				if($options->get_thumbnail_dots() == 'on') {
					$thumb_info = wp_get_attachment_image_src($attachment->ID, 'maxgallery-meta-video-thumb-small');
					//$thumb_info = wp_get_attachment_image_src($attachment->ID, 'thumbnail');
					$data_thumb = 'data-thumb="' . $thumb_info[0] .'"';
				} else
					$data_thumb = "";
								
				if ($options->get_slider_image_click_enabled() == 'on') {
					$target = ($options->get_open_new_tab() == 'on') ? '_blank' : '';
					$href = '';
					
					switch ($options->get_slider_image_click_open()) {
						case 'attachment_image_page':
							$href = get_attachment_link($attachment->ID);
							break;
						case 'attachment_image_link':
							$href = get_post_meta($attachment->ID, 'maxgallery_attachment_image_link', true);
              if($href == "")
                $href = $attachment->guid;
							break;
						default: // attachment_image_source
							$href = $attachment->guid;
							break;
					}
          															
					$output .= '<div class="slick-slide" ' . $data_thumb . '>' . PHP_EOL;
					$output .= '<a href="' . $href . '" target="' . $target . '">' . PHP_EOL;
					$output .=		apply_filters(MAXGALLERIA_SLICK_CAROUSEL_FILTER_BEFORE_SLIDER_IMAGE, '', $options);
					$output .=		apply_filters(MAXGALLERIA_SLICK_CAROUSEL_FILTER_SLIDER_IMAGE, $slider_image_element, $slider_image, $alt, $title);
					$output .=		apply_filters(MAXGALLERIA_SLICK_CAROUSEL_FILTER_AFTER_SLIDER_IMAGE, '', $attachment->ID, $options);
					$output .= '</a>' . PHP_EOL;
					$output .= '</div>' . PHP_EOL;
				}
				else {
					$output .= '<div class="slick-slide" ' . $data_thumb . '>' . PHP_EOL;
					$output .= apply_filters(MAXGALLERIA_SLICK_CAROUSEL_FILTER_BEFORE_SLIDER_IMAGE, '', $options);
					$output .= apply_filters(MAXGALLERIA_SLICK_CAROUSEL_FILTER_SLIDER_IMAGE, $slider_image_element, $slider_image, $alt, $title);
					$output .= apply_filters(MAXGALLERIA_SLICK_CAROUSEL_FILTER_AFTER_SLIDER_IMAGE, '', $attachment->ID, $options);
					$output .= '</div>' . PHP_EOL;
				}
			}
		}
		
		// For all other skins, the description goes inside the gallery container
		if ($options->get_skin() != 'ghost') {
			if ($options->get_description_enabled() == 'on' && $options->get_description_position() == 'below') {
				if ($options->get_description_text() != '') {
					$output .= '<p class="mg-description below">' . $options->get_description_text() . '</p>' . PHP_EOL;
				}
			}
		}
  
		    
		$output .= '</div>' . PHP_EOL;
		$output .= apply_filters(MAXGALLERIA_SLICK_CAROUSEL_FILTER_AFTER_GALLERY_OUTPUT, '', $gallery, $attachments, $options);

		// For the ghost skin, the description has to go outside of the gallery container
		if ($options->get_skin() == 'ghost') {
			if ($options->get_description_enabled() == 'on' && $options->get_description_position() == 'below') {
				if ($options->get_description_text() != '') {
					$output .= '<p class="mg-description below">' . $options->get_description_text() . '</p>' . PHP_EOL;
				}
			}
		}
		
		$ease_value = $options->get_cssease();
		if($ease_value === "")
			$ease_value = "ease";

		$slider_initial_slide = $options->get_slider_initial_slide_enabled();
		if($slider_initial_slide == '')
			$slider_initial_slide = '0';

		$slide_zindex = trim($options->get_zindex()); 
		if ($slide_zindex == '')
			$slide_zindex = $options->get_zindex_default();

		$touch_threshold = trim($options->get_touch_threshold()); 
		if ($touch_threshold == '')
			$touch_threshold = $options->get_touch_threshold_default();
		
		$slider_rows = trim($options->get_rows()); 
		if ($slider_rows == '')
			$slider_rows = $options->get_rows_default();
		
		$slider_per_row = trim($options->get_slides_per_row()); 
		if ($slider_per_row == '')
			$slider_per_row = $options->get_slides_per_row_default();
		
		$edge_friction = trim($options->get_edgeFriction()); 
		if ($edge_friction == '')
			$edge_friction = $options->get_edgeFriction_default();
		
		$accessibility = trim($options->get_accessibility()); 
		if ($accessibility == '')
			$accessibility = $options->get_accessibility_default();
		
		$slides_to_show = trim($options->get_slider_slides_to_show());
		if( $slides_to_show == '' )
			$slides_to_show = '1';
		
		$slides_to_scroll = trim($options->get_slider_slides_to_scroll());
		if($slides_to_scroll == '')
			$slides_to_scroll = '1';

$output .= '<script>'. PHP_EOL;
$output .= '	jQuery(document).ready(function(){'. PHP_EOL;

$output .= '    jQuery("#maxgallery-' . $gallery->ID . '.mg-slick-carousel").slick({'. PHP_EOL;
$output .= '      accessibility: ' . (($accessibility == 'on') ? 'true' : 'false' ) . ','. PHP_EOL;
$output .= '      adaptiveHeight: ' . (($options->get_slider_adaptive_height_enabled() == 'on') ? 'true' : 'false' ) . ','. PHP_EOL;
$output .= '      arrows: ' . (($options->get_slider_arrows_enabled() == 'on') ? 'false' : 'true' ) . ','. PHP_EOL;
$output .= '      autoplay: ' . (($options->get_slider_auto_play_enabled() == 'on') ? 'false' : 'true') . ','. PHP_EOL;
$output .= '      autoplaySpeed: ' . (floatval($options->get_slider_slideshow_speed()) * 1000) . ','. PHP_EOL;
$output .= '       centerMode: ' . (($options->get_slider_center_mode() == 'on') ? 'true' : 'false') . ','. PHP_EOL;
//$output .= '      centerPadding: "0",'. PHP_EOL;
$output .= '      centerPadding: "' . $options->get_slider_center_padding() .'",'. PHP_EOL;
$output .= '      cssEase: "' . $ease_value .'",'. PHP_EOL;
$output .= '      dots: ' . (($options->get_slider_dots_enabled()== 'on') ? 'true' : 'false') . ','. PHP_EOL;
if($options->get_thumbnail_dots() == 'on') {
	$output .= '      customPaging : function(slider, i) {'. PHP_EOL;
	$output .= '        var thumb = jQuery(slider.$slides[i]).data("thumb");'. PHP_EOL;
	$output .= '        return "<a><img src=\'"+thumb+"\'></a>";'. PHP_EOL;
	$output .= '      },'. PHP_EOL;			
}
$output .= '      draggable: ' . (($options->get_slider_drag_enabled()== 'on') ? 'true' : 'false' ) . ','. PHP_EOL;
$output .= '      edgeFriction: ' . $edge_friction .','. PHP_EOL;
$output .= '      fade: ' . (($options->get_slider_fade_enabled()== 'on') ? 'true' : 'false' ) . ','. PHP_EOL;
$output .= '      focusOnSelect: ' . (($options->get_focusOnSelect()== 'on') ? 'true' : 'false' ) . ','. PHP_EOL;
$output .= '      focusOnChange: ' . (($options->get_focusOnChange()== 'on') ? 'true' : 'false' ) . ','. PHP_EOL;
$output .= '      infinite: ' . (($options->get_slider_infinite_enabled()== 'on') ? 'true' : 'false' ) . ','. PHP_EOL;
$output .= '      initialSlide: ' . $slider_initial_slide . ','. PHP_EOL;
$output .= '      lazyLoad: "' . $options->get_lazyLoad() .'",'. PHP_EOL;
$output .= '      mobileFirst: ' . (($options->get_slider_mobile_first_enabled()== 'on') ? 'true' : 'false' ) . ','. PHP_EOL;
$output .= '      pauseOnFocus: ' . (($options->get_pause_on_focus()== 'on') ? 'true' : 'false' ) . ','. PHP_EOL;
$output .= '      pauseOnHover: ' . (($options->get_slider_hover_pause_enabled()== 'on') ? 'true' : 'false' ) . ','. PHP_EOL;
$output .= '      pauseOnDotsHover: ' . (($options->get_slider_pause_on_dots_hover()== 'on') ? 'true' : 'false' ) . ','. PHP_EOL;
$output .= '      rtl: ' . (($options->get_slider_rtl_enabled()== 'on') ? 'true' : 'false' ) . ','. PHP_EOL;
//$output .= '      slide: ".slick-slide",' . PHP_EOL;
$breakpoints = $options->get_breakpoints();
if(strlen($breakpoints) > 0)
  $output .= '      responsive: ' . $breakpoints .','. PHP_EOL;
$output .= '      respondTo: "' . $options->get_respondto() .'",'. PHP_EOL;
$output .= '      rows: ' . $slider_rows .','. PHP_EOL;
$output .= '      slidesPerRow: ' . $slider_per_row .','. PHP_EOL;
$output .= '      slidesToShow: ' . $slides_to_show .','. PHP_EOL;
$output .= '      slidesToScroll: '. $slides_to_scroll .','. PHP_EOL;
$output .= '      speed: ' . $options->get_slider_animation_speed() * 1000  . ','. PHP_EOL;
$output .= '      swipe: ' . (($options->get_slider_swipe()== 'on') ? 'true' : 'false' ) .','. PHP_EOL;	
$output .= '      swipeToSlide: ' . (($options->get_swipe_to_slide()== 'on') ? 'true' : 'false' ) .','. PHP_EOL;	
$output .= '      touchThreshold: ' . $touch_threshold .','. PHP_EOL;
$output .= '      touchMove: ' . (($options->get_slider_touch_move_enabled()== 'on') ? 'true' : 'false' ) .','. PHP_EOL;
$output .= '      useCSS: ' . (($options->get_slider_use_css()== 'on') ? 'true' : 'false' ) .','. PHP_EOL;
$output .= '      useTransform: ' . (($options->get_css_transform()== 'on') ? 'true' : 'false' ) .','. PHP_EOL;
$output .= '      variableWidth: ' . (($options->get_slider_variable_width()== 'on') ? 'true' : 'false' ) .','. PHP_EOL;
$output .= '      vertical: ' . (($options->get_slider_vertical()== 'on') ? 'true' : 'false' ) .','. PHP_EOL;
$output .= '      waitForAnimate: ' . (($options->get_wait_for_animate()== 'on') ? 'true' : 'false' ) .','. PHP_EOL;
$output .= '      zIndex: ' . $slide_zindex .','. PHP_EOL;
$output .= '      verticalSwiping: ' . (($options->get_slider_vertical_swiping()== 'on') ? 'true' : 'false' ) . PHP_EOL;
$output .= '		});'. PHP_EOL;
$output .= '	});'. PHP_EOL;
$output .= '</script>'. PHP_EOL;

		
		
		return apply_filters(MAXGALLERIA_SLICK_CAROUSEL_FILTER_GALLERY_OUTPUT, $output, $gallery, $attachments, $options);
	}
}
?>