<?php
require_once WP_PLUGIN_DIR . '/maxgalleria/maxgallery-options.php';

class MaxGalleriaSlickSliderOptions extends MaxGalleryOptions {
	public $nonce_save_slick_slider_defaults = array(
		'action' => 'save_slick_slider_defaults',
		'name' => 'maxgalleria_save_slick_slider_defaults'
	);
	
	public $skins = array();
	public $slider_animation_speeds = array();
	public $slider_effects = array();
	public $slider_image_clicks = array();
	public $slider_slideshow_speeds = array();
	public $slider_number_of_slides  = array();
	public $border_sizes = array();
	public $border_color = "";
	public $border_radiuses = array();
	public $gallery_id;
	public $shadow_types = array();
	public $shadow_widths = array();
	public $hide_presets = "";
	public $respondto_types = array();
  public $license_expiration;
	
	public function __construct($post_id = 0) {
		parent::__construct($post_id);

		$this->gallery_id = $post_id;
		
		$this->skins = array(
			'black' => __('Black', 'maxgalleria-slick-carousel'),
			'ghost' => __('Ghost', 'maxgalleria-slick-carousel'),
			'kitt' => __('Kitt', 'maxgalleria-slick-carousel'),
			'silver' => __('Silver', 'maxgalleria-slick-carousel'),
			'standard' => __('Standard', 'maxgalleria-slick-carousel'),
		);
		
		$this->new_skins = array(
			'borderless' => __('Borderless', 'maxgalleria-slick-carousel'),
			'picture-frame' => __('Picture Frame', 'maxgalleria-slick-carousel'),
			'picture-shadow' => __('Picture Shadow', 'maxgalleria-slick-carousel'),
			'drop-shadow' => __('Drop Shadow', 'maxgalleria-slick-carousel'),
			'inner-shade' => __('Inner Shade', 'maxgalleria-slick-carousel'),
			'slim-frame' => __('Slim Frame', 'maxgalleria-slick-carousel'),
			'mg-custom' => __('Custom', 'maxgalleria-slick-carousel')
		);
		
		
		$this->slider_animation_speeds = array(
			'0' => '0.0',
			'0.1' => '0.1',
			'0.2' => '0.2',
			'0.3' => '0.3',
			'0.4' => '0.4',
			'0.5' => '0.5',
			'0.6' => '0.6',
			'0.7' => '0.7',
			'0.8' => '0.8',
			'0.9' => '0.9',
			'1.0' => '1.0',
			'1.1' => '1.1',
			'1.2' => '1.2',
			'1.3' => '1.3',
			'1.4' => '1.4',
			'1.5' => '1.5',
			'1.6' => '1.6',
			'1.7' => '1.7',
			'1.8' => '1.8',
			'1.9' => '1.9',
			'2.0' => '2.0',
			'2.1' => '2.1',
			'2.2' => '2.2',
			'2.3' => '2.3',
			'2.4' => '2.4',
			'2.5' => '2.5',
			'2.6' => '2.6',
			'2.7' => '2.7',
			'2.8' => '2.8',
			'2.9' => '2.9',
			'3.0' => '3.0',
			'3.1' => '3.1',
			'3.2' => '3.2',
			'3.3' => '3.3',
			'3.4' => '3.4',
			'3.5' => '3.5',
			'3.6' => '3.6',
			'3.7' => '3.7',
			'3.8' => '3.8',
			'3.9' => '3.9',
			'4.0' => '4.0',
			'4.1' => '4.1',
			'4.2' => '4.2',
			'4.3' => '4.3',
			'4.4' => '4.4',
			'4.5' => '4.5',
			'4.6' => '4.6',
			'4.7' => '4.7',
			'4.8' => '4.8',
			'4.9' => '4.9',
			'5.0' => '5.0'
		);
				
		$this->slider_image_clicks = array(
			'attachment_image_page' => __('Image Page', 'maxgalleria-slick-carousel'),
			'attachment_image_link' => __('Image Link', 'maxgalleria-slick-carousel'),
			'attachment_image_source' => __('Original Image', 'maxgalleria-slick-carousel')
		);
		
		$this->slider_slideshow_speeds = array(
			'0' => '0.0',
			'0.5' => '0.5',
			'1.0' => '1.0',
			'1.5' => '1.5',
			'2.0' => '2.0',
			'2.5' => '2.5',
			'3.0' => '3.0',
			'3.5' => '3.5',
			'4.0' => '4.0',
			'4.5' => '4.5',
			'5.0' => '5.0',
			'5.5' => '5.5',
			'6.0' => '6.0',
			'6.5' => '6.5',
			'7.0' => '7.0',
			'7.5' => '7.5',
			'8.0' => '8.0',
			'8.5' => '8.5',
			'9.0' => '9.0',
			'9.5' => '9.5',
			'10.0' => '10.0'
		);
		
	  $this->slider_number_of_slides = array(
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
			'6' => '6',
			'7' => '7',
			'8' => '8',
			'9' => '9',
			'10' => '10'
		);

		$this->border_sizes  = array(
			1 => 1,
			3 => 3,
			5 => 5,
			7 => 7,
			10 => 10,
			15 => 15
    );
	
    $this->border_radiuses = array(
			0 => 0,
			10 => 10,
			20 => 20,
			30 => 30,
			40 => 40,
			50 => 50,
			60 => 60,
			70 => 70,
			80 => 80,
			90 => 90
    );
		
    $this->shadow_types = array(
			'none' => __('None', 'maxgalleria-slick-carousel'),
			'inside' => __('Inside', 'maxgalleria-slick-carousel'),
			'behind' => __('Behind', 'maxgalleria-slick-carousel'),
			//'behind-inside' => __('Behind & Inside', 'maxgalleria-slick-carousel'),
			'color' => __('Color', 'maxgalleria-slick-carousel')
    );

    $this->shadow_blurs = array(
			5 => 5,
			10 => 10,
			15 => 15,
			20 => 20		
    );
		
    $this->shadow_spreads = array(
			0 => 0,
			1 => 1,
			2 => 2,
			3 => 3		
    );
		
	  $this->slider_number_of_rows = array(
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5'
		);
		
    $this->lazyload_types = array(
			'ondemand' => __('On Demand', 'maxgalleria-slick-carousel'),
			'progressive' => __('Progressive', 'maxgalleria-slick-carousel')
    );		
		
    $this->respondto_types = array(
			'window' => __('Window', 'maxgalleria-slick-carousel'),
			'slider' => __('Slider', 'maxgalleria-slick-carousel'),
			'min' => __('Min (the smaller of the two)', 'maxgalleria-slick-carousel')
    );		
		
				
		$this->hide_presets = get_option( "mg_hide_presets" );
										
	}
	
	public $skin_default = 'standard';
	public $skin_default_key = 'maxgallery_skin_slick_carousel_default';
	public $skin_key = 'maxgallery_skin';
	public $slider_animation_speed_default = '1.0';
	public $slider_animation_speed_default_key = 'maxgallery_slick_animation_speed_slick_carousel_default';
	public $slider_animation_speed_key = 'maxgallery_slick_animation_speed';
	public $slider_arrows_enabled_default = '';
  public $slider_arrows_enabled_default_key = 'maxgallery_slick_arrows_enabled_default';
  public $slider_arrows_enabled_key = 'maxgallery_slick_arrows_enabled';
	public $slider_auto_play_enabled_default = '';
  public $slider_auto_play_enabled_default_key = 'maxgallery_slick_auto_play_enabled_default';
  public $slider_auto_play_enabled_key = 'maxgallery_slick_auto_play_enabled';
  public $slider_caption_enabled_default = '';
	public $slider_caption_enabled_default_key = 'maxgallery_slick_caption_enabled_slick_carousel_default';
	public $slider_caption_enabled_key = 'maxgallery_slick_caption_enabled';
	public $slider_dots_enabled_default = '';
  public $slider_dots_enabled_default_key = 'maxgallery_slick_dots_enabled_default';
  public $slider_dots_enabled_key = 'maxgallery_slick_dots_enabled';
	public $slider_drag_enabled_default = '';
  public $slider_drag_enabled_default_key = 'maxgallery_slick_drag_enabled_default';
  public $slider_drag_enabled_key = 'maxgallery_slick_drag_enabled';
	public $slider_fade_enabled_default = '';
  public $slider_fade_enabled_default_key = 'maxgallery_slick_fade_enabled_default';
  public $slider_fade_enabled_key = 'maxgallery_slick_fade_enabled';
	public $slider_hover_pause_enabled_default = '';
  public $slider_hover_pause_enabled_default_key = 'maxgallery_slick_hover_pause_enabled_default';
  public $slider_hover_pause_enabled_key = 'maxgallery_slick_hover_pause_enabled';
	public $slider_image_click_enabled_default = '';
	public $slider_image_click_enabled_default_key = 'maxgallery_slick_image_click_enabled_slick_carousel_default';
	public $slider_image_click_enabled_key = 'maxgallery_slick_image_click_enabled';
	public $slider_image_click_new_window_default = '';
	public $slider_image_click_new_window_key = 'maxgallery_slick_image_click_new_window';
	public $slider_image_click_open_default = 'attachment_image_page';
	public $slider_image_click_open_default_key = 'maxgallery_slick_image_click_open_slick_carousel_default';
	public $slider_image_click_open_key = 'maxgallery_slick_image_click_open';
	public $slider_infinite_enabled_default = '';
  public $slider_infinite_enabled_default_key = 'maxgallery_slick_infinite_enabled_default';
  public $slider_infinite_enabled_key = 'maxgallery_slick_infinite_enabled';
	public $slider_lazyload_enabled_default = 'ondemand';
  public $slider_lazyload_enabled_default_key = 'maxgallery_slick_lazyload_enabled_default';
  public $slider_lazyload_enabled_key = 'maxgallery_slick_lazyload_enabled';
	public $slider_rtl_enabled_default = '';
  public $slider_rtl_enabled_default_key = 'maxgallery_slick_rtl_enabled_default';
  public $slider_rtl_enabled_key = 'maxgallery_slick_rtl_enabled';
	public $slider_slideshow_speed_default = '5.0';
	public $slider_slideshow_speed_default_key = 'maxgallery_slick_slideshow_speed_slick_carousel_default';
	public $slider_slideshow_speed_key = 'maxgallery_slick_slideshow_speed';
	public $slider_touch_move_enabled_default = '';
  public $slider_touch_move_enabled_default_key = 'maxgallery_slick_touch_move_enabled_default';
  public $slider_touch_move_enabled_key = 'maxgallery_slick_touch_move_enabled';
    
	public $slider_adaptive_height_enabled_default = '';
  public $slider_adaptive_height_enabled_default_key = 'maxgallery_slick_adaptive_height_enabled_default';
  public $slider_adaptive_height_enabled_key = 'maxgallery_slick_adaptive_height_enabled';
  
	public $slider_mobile_first_enabled_default = '';
  public $slider_mobile_first_enabled_default_key = 'maxgallery_slick_mobile_first_enabled_default';
  public $slider_mobile_first_enabled_key = 'maxgallery_slick_mobile_first_enabled';
  
	public $slider_initial_slide_enabled_default = '0';
  public $slider_initial_slide_enabled_default_key = 'maxgallery_slick_initial_slide_enabled_default';
  public $slider_initial_slide_enabled_key = 'maxgallery_slick_initial_slide_enabled';
  
	public $slider_pause_on_dots_hover_default = '';
  public $slider_pause_on_dots_hover_default_key = 'maxgallery_slick_pause_on_dots_hover_default';
  public $slider_pause_on_dots_hover_key = 'maxgallery_slick_pause_on_dots_hover';
  
	public $slider_swipe_default = '';
  public $slider_swipe_default_key = 'maxgallery_slick_swipe_default';
  public $slider_swipe_key = 'maxgallery_slick_swipe';
  
	public $slider_use_css_default = '';
  public $slider_use_css_default_key = 'maxgallery_slick_use_css_default';
  public $slider_use_css_key = 'maxgallery_slick_use_css';
  
	public $slider_variable_width_default = '';
  public $slider_variable_width_default_key = 'maxgallery_slick_variable_width_default';
  public $slider_variable_width_key = 'maxgallery_slick_variable_width';  
  
	public $slider_vertical_default = '';
  public $slider_vertical_default_key = 'maxgallery_slick_vertical_default';
  public $slider_vertical_key = 'maxgallery_slick_vertical';  
  
  public $slider_vertical_swiping_default = '';
  public $slider_vertical_swiping_default_key = 'maxgallery_slick_vertical_swiping_default';
  public $slider_vertical_swiping_key = 'maxgallery_slick_vertical_swiping';  
	
  public $slider_slides_to_show_default = '1';
  public $slider_slides_to_show_default_key = 'maxgallery_slick_slides_to_show_default';
  public $slider_slides_to_show_key = 'maxgallery_slick_slides_to_show';  
	
  public $slider_slides_to_scroll_default = '1';
  public $slider_slides_to_scroll_default_key = 'maxgallery_slick_slides_to_scroll_default';
  public $slider_slides_to_scroll_key = 'maxgallery_slick_slides_to_scroll';  
	
  public $slider_slides_container_width_default = '100%';
  public $slider_slides_container_width_default_key = 'maxgallery_slick_slides_container_width_default';
  public $slider_slides_container_width_key = 'maxgallery_slick_slides_container_width_default';  
	
	public $slider_slides_center_mode_default = 'off';
  public $slider_slides_center_mode_default_key = 'maxgallery_slick_center_mode_default';
  public $slider_slides_center_mode_key = 'maxgallery_slick_center_mode';

	public $slider_slides_center_padding_default = '0';
  public $slider_slides_center_padding_default_key = 'maxgallery_slick_center_padding_default';
  public $slider_slides_center_padding_key = 'maxgallery_slick_center_padding';
	
	public $slider_slides_padding_default = '0';
  public $slider_slides_padding_default_key = 'maxgallery_slick_padding_default';
  public $slider_slides_padding_key = 'maxgallery_slick_padding';
	
	public $ns_show_border_default = 'off';
	public $ns_show_border_default_key = 'maxgallery_slick_style_show_border_default';
	public $ns_show_border_key = 'maxgallery_slick_style_show_border_enabled';  
	
	public $ns_border_thickness_default = '0';
	public $ns_border_thickness_default_key = 'maxgallery_slick_style_border_thickness_default';
	public $ns_border_thickness_key = 'maxgallery_slick_style_border_thickness_enabled';  
	
	public $ns_border_color_default = '#000000';
	public $ns_border_color_default_key = 'maxgallery_slick_style_border_color_default';
	public $ns_border_color_key = 'maxgallery_slick_style_border_color_enabled';  
	
//	public $ns_border_radius_default = '0';
//	public $ns_border_radius_default_key = 'maxgallery_slick_style_border_radius_default';
//	public $ns_border_radius_key = 'maxgallery_slick_style_border_radius_enabled';  
	
	public $ns_shadow_default = 'none';
	public $ns_shadow_default_key = 'maxgallery_slick_style_shadow_default';
	public $ns_shadow_key = 'maxgallery_slick_style_shadow_enabled';  
	
	public $ns_shadow_blur_default = '5';
	public $ns_shadow_blur_default_key = 'maxgallery_slick_style_shadow_blur_default';
	public $ns_shadow_blur_key = 'maxgallery_slick_style_shadow_blur_enabled';  
	
	public $ns_shadow_color_default = '#000000';
	public $ns_shadow_color_default_key = 'maxgallery_slick_style_shadow_color_default';
	public $ns_shadow_color_key = 'maxgallery_slick_style_shadow_color_enabled';  
	
	public $ns_shadow_spread_default = '0';
	public $ns_shadow_spread_default_key = 'maxgallery_slick_style_shadow_spread_default';
	public $ns_shadow_spread_key = 'maxgallery_slick_style_shadow_spread_enabled';  
			
	public $ns_arrow_default = '0';
	public $ns_arrow_default_key = 'maxgallery_slick_style_lightbox_arrow_default';
	public $ns_arrow_key = 'maxgallery_slick_style_lightbox_arrow_enabled';  
	
	public $slider_cssease_default = 'ease';
  public $slider_cssease_default_key = 'maxgallery_slick_cssease_default';
  public $slider_cssease_key = 'maxgallery_slick_cssease';
	
	public $hero_mode_default = 'off';
  public $hero_mode_default_key = 'maxgallery_slick_hero_mode_default';
  public $hero_mode_key = 'maxgallery_slick_hero_mode';

	public $hero_width_default = '2120';
  public $hero_width_default_key = 'maxgallery_slick_hero_width_default';
  public $hero_width_key = 'maxgallery_slick_width';
	
	public $hero_height_default = '1126';
  public $hero_height_default_key = 'maxgallery_slick_hero_height_default';
  public $hero_height_key = 'maxgallery_slick_height';
	
	public $hero_left_arrow_default = '';
  public $hero_left_arrow_default_key = 'maxgallery_slick_left_arrow_default';
  public $hero_left_arrow_key = 'maxgallery_slick_left_arrow';
	
	public $hero_right_arrow_default = '';
  public $hero_right_arrow_default_key = 'maxgallery_slick_right_arrow_default';
  public $hero_right_arrow_key = 'maxgallery_slick_right_arrow';
	
	public $hero_arrow_width_default = '';
  public $hero_arrow_width_default_key = 'maxgallery_slick_arrow_width_default';
  public $hero_arrow_width_key = 'maxgallery_slick_arrow_width';
	
	public $hero_arrow_height_default = '';
  public $hero_arrow_height_default_key = 'maxgallery_slick_arrow_height_default';
  public $hero_arrow_height_key = 'maxgallery_slick_arrow_height';
	
	public $hero_dot_default = '';
  public $hero_dot_default_key = 'maxgallery_slick_dot_default';
  public $hero_dot_key = 'maxgallery_slick_dot';
	
	public $hero_dot_width_default = '';
  public $hero_dot_width_default_key = 'maxgallery_slick_dot_width_default';
  public $hero_dot_width_key = 'maxgallery_slick_dot_width';

	public $hero_dot_height_default = '';
  public $hero_dot_height_default_key = 'maxgallery_slick_dot_height_default';
  public $hero_dot_height_key = 'maxgallery_slick_dot_height';
	
	public $hero_custom_arrow_default = 'off';
  public $hero_custom_arrow_default_key = 'maxgallery_slick_custom_arrow_default';
  public $hero_custom_arrow_key = 'maxgallery_slick_custom_arrow';

	public $hero_custom_dot_default = 'off';
  public $hero_custom_dot_default_key = 'maxgallery_slick_custom_dot_default';
  public $hero_custom_dot_key = 'maxgallery_slick_custom_dot';
	
	public $hero_custom_css_default = '';
  public $hero_custom_css_default_key = 'maxgallery_slick_custom_css_default';
  public $hero_custom_css_key = 'maxgallery_slick_custom_css';
	
	public $slider_thumbnail_dots_default = 'off';
  public $slider_thumbnail_dots_default_key = 'maxgallery_thumbnail_dots_default';
  public $slider_thumbnail_dots_key = 'maxgallery_thumbnail_dots';
	
	public $slider_dots_vertical_position_default = '25';
  public $slider_dots_vertical_position_default_key = 'maxgallery_dots_vertical_position_default';
  public $slider_dots_vertical_position_key = 'maxgallery_dots_vertical_position_dots';
	
	public $slider_zindex_default = '1000';
  public $slider_zindex_default_key = 'maxgallery_slick_zindex_default';
  public $slider_zindex_key = 'maxgallery_slick_zindex';
	
	public $slider_wait_for_animate_default = 'on';
  public $slider_wait_for_animate_default_key = 'maxgallery_slick_wait_for_animate_default';
  public $slider_wait_for_animate_key = 'maxgallery_slick_wait_for_animate';
	
	public $slider_use_css_transform_default = 'on';
  public $slider_use_css_transform_default_key = 'maxgallery_slick_use_transform_default';
  public $slider_use_css_transform_key = 'maxgallery_slick_use_transform';
	
	public $slider_touch_threshold_default = '5';
  public $slider_touch_threshold_default_key = 'maxgallery_slick_touch_threshold_default';
  public $slider_touch_threshold_key = 'maxgallery_slick_touch_threshold';
	
	public $slider_swipe_to_slide_default = 'off';
  public $slider_swipe_to_slide_default_key = 'maxgallery_swipe_to_slide_default';
  public $slider_swipe_to_slide_key = 'maxgallery_swipe_to_slide';
	
	public $slider_rows_default = '1';
  public $slider_rows_default_key = 'maxgallery_slider_rows_default';
  public $slider_rows_key = 'maxgallery_slider_rows';
	
	public $slider_slides_per_row_default = '1';
  public $slider_slides_per_row_default_key = 'maxgallery_slides_per_row_default';
  public $slider_slides_per_row_key = 'maxgallery_slides_per_rows';
	
	public $slider_pause_on_focus_default = 'on';
  public $slider_pause_on_focus_default_key = 'maxgallery_pause_on_focus_default';
  public $slider_pause_on_focus_key = 'maxgallery_pause_on_focus';
	
	public $slider_lazyLoad_default = 'ondemand';
  public $slider_lazyLoad_default_key = 'maxgallery_slider_lazyLoad_default';
  public $slider_lazyLoad_key = 'maxgallery_slider_lazyLoad';
	
	public $slider_focusOnChange_default = 'off';
  public $slider_focusOnChange_default_key = 'maxgallery_slider_focusonchange_default';
  public $slider_focusOnChange_key = 'maxgallery_slider_focusonchange';
	
	public $slider_focusOnSelect_default = 'off';
  public $slider_focusOnSelect_default_key = 'maxgallery_slider_focusonselect_default';
  public $slider_focusOnSelect_key = 'maxgallery_slider_focusonselect';
		
	public $slider_edgeFriction_default = '15';
  public $slider_edgeFriction_default_key = 'maxgallery_slider_edgefriction_default';
  public $slider_edgeFriction_key = 'maxgallery_slider_edgefriction';
	
	public $slider_accessibility_default = 'on';
  public $slider_accessibility_default_key = 'maxgallery_slider_accessibility_default';
  public $slider_accessibility_key = 'maxgallery_slider_accessibility';
	
	public $slider_breakpoints_default = '';
  public $slider_breakpoints_default_key = 'maxgallery_slider_breakpoints_default';
  public $slider_breakpoints_key = 'maxgallery_slider_breakpoints';
	
	public $slider_respondto_default = 'window';
  public $slider_respondto_default_key = 'maxgallery_slider_respondto_default';
  public $slider_respondto_key = 'maxgallery_slider_respondto';
	
	public $slider_open_new_tab_default = 'off';
  public $slider_open_new_tab_default_key = 'maxgallery_slider_open_new_tab_default';
  public $slider_open_new_tab_key = 'maxgallery_slider_open_new_tab';

	public function get_open_new_tab() {
		$value = $this->get_post_meta($this->slider_open_new_tab_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_open_new_tab_default();
		}
		
		return $value;
	}
		
	public function get_open_new_tab_default() {
		return get_option($this->slider_open_new_tab_default_key, $this->slider_open_new_tab_default);
	}						
	
	
	public function get_respondto() {
		$value = $this->get_post_meta($this->slider_respondto_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_respondto_default();
		}
		
		return $value;
	}
		
	public function get_respondto_default() {
		return get_option($this->slider_respondto_default_key, $this->slider_respondto_default);
	}						
	
	public function get_breakpoints() {
		$value = $this->get_post_meta($this->slider_breakpoints_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_breakpoints_default();
		}
		
		return $value;
	}
		
	public function get_breakpoints_default() {
		return get_option($this->slider_breakpoints_default_key, $this->slider_breakpoints_default);
	}						

	public function get_accessibility() {
		$value = $this->get_post_meta($this->slider_accessibility_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_accessibility_default();
		}
		
		return $value;
	}
		
	public function get_accessibility_default() {
		return get_option($this->slider_accessibility_default_key, $this->slider_accessibility_default);
	}						
	
	public function get_edgeFriction() {
		$value = $this->get_post_meta($this->slider_edgeFriction_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_edgeFriction_default();
		}
		
		return $value;
	}
		
	public function get_edgeFriction_default() {
		return get_option($this->slider_edgeFriction_default_key, $this->slider_edgeFriction_default);
	}						
	

	public function get_focusOnSelect() {
		$value = $this->get_post_meta($this->slider_focusOnSelect_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_focusOnSelect_default();
		}
		
		return $value;
	}
		
	public function get_focusOnSelect_default() {
		return get_option($this->slider_focusOnSelect_default_key, $this->slider_focusOnSelect_default);
	}						
	
	public function get_focusOnChange() {
		$value = $this->get_post_meta($this->slider_focusOnChange_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_focusOnChange_default();
		}
		
		return $value;
	}
		
	public function get_focusOnChange_default() {
		return get_option($this->slider_focusOnChange_default_key, $this->slider_focusOnChange_default);
	}						
	
	public function get_lazyLoad() {
		$value = $this->get_post_meta($this->slider_lazyLoad_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_lazyLoad_default();
		}
		
		return $value;
	}
		
	public function get_lazyLoad_default() {
		return get_option($this->slider_lazyLoad_default_key, $this->slider_lazyLoad_default);
	}						
	
	public function get_pause_on_focus() {
		$value = $this->get_post_meta($this->slider_pause_on_focus_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_pause_on_focus_default();
		}
		
		return $value;
	}
		
	public function get_pause_on_focus_default() {
		return get_option($this->slider_pause_on_focus_default_key, $this->slider_pause_on_focus_default);
	}					
	
	public function get_slides_per_row() {
		$value = $this->get_post_meta($this->slider_slides_per_row_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_rows_default();
		}
		
		return $value;
	}
	
	public function get_slides_per_row_default() {
		return get_option($this->slider_rows_default_key, $this->slider_rows_default);
	}					
	
	public function get_rows() {
		$value = $this->get_post_meta($this->slider_rows_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_rows_default();
		}
		
		return $value;
	}
	
	public function get_rows_default() {
		return get_option($this->slider_rows_default_key, $this->slider_rows_default);
	}				
		
	public function get_swipe_to_slide() {
		$value = $this->get_post_meta($this->slider_swipe_to_slide_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_swipe_to_slide_default();
		}
		
		return $value;
	}
	
	public function get_swipe_to_slide_default() {
		return get_option($this->slider_swipe_to_slide_default_key, $this->slider_swipe_to_slide_default);
	}				
		
	public function get_touch_threshold() {
		$value = $this->get_post_meta($this->slider_touch_threshold_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_touch_threshold_default();
		}
		
		return $value;
	}
	
	public function get_touch_threshold_default() {
		return get_option($this->slider_touch_threshold_default_key, $this->slider_touch_threshold_default);
	}				

	public function get_css_transform() {
		$value = $this->get_post_meta($this->slider_use_css_transform_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_css_transform_default();
		}
		
		return $value;
	}
	
	public function get_css_transform_default() {
		return get_option($this->slider_use_css_transform_default_key, $this->slider_use_css_transform_default);
	}				
		
	public function get_wait_for_animate() {
		$value = $this->get_post_meta($this->slider_wait_for_animate_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_wait_for_animate_default();
		}
		
		return $value;
	}
	
	public function get_wait_for_animate_default() {
		return get_option($this->slider_wait_for_animate_default_key, $this->slider_wait_for_animate_default);
	}				
	
	public function get_zindex() {
		$value = $this->get_post_meta($this->slider_zindex_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_zindex_default();
		}
		
		return $value;
	}
	
	public function get_zindex_default() {
		return get_option($this->slider_zindex_default_key, $this->slider_zindex_default);
	}				
	
	public function get_dots_vertical_position() {
		$value = $this->get_post_meta($this->slider_dots_vertical_position_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_dots_vertical_position_default();
		}
		
		return $value;
	}
	
	public function get_dots_vertical_position_default() {
		return get_option($this->slider_dots_vertical_position_default_key, $this->slider_dots_vertical_position_default);
	}				
		
	public function get_thumbnail_dots() {
		$value = $this->get_post_meta($this->slider_thumbnail_dots_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_thumbnail_dots_default();
		}
		
		return $value;
	}
	
	public function get_thumbnail_dots_default() {
		return get_option($this->slider_thumbnail_dots_default_key, $this->slider_thumbnail_dots_default);
	}				
		
	public function get_hero_custom_css() {
		$value = $this->get_post_meta($this->hero_custom_css_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_hero_custom_css_default();
		}
		
		return $value;
	}
	
	public function get_hero_custom_css_default() {
		return get_option($this->hero_custom_css_default_key, $this->hero_custom_css_default);
	}				
		
	public function get_hero_custom_dot() {
		$value = $this->get_post_meta($this->hero_custom_dot_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_hero_custom_dot_default();
		}
		
		return $value;
	}
	
	public function get_hero_custom_dot_default() {
		return get_option($this->hero_custom_dot_default_key, $this->hero_custom_dot_default);
	}				
			
	public function get_hero_custom_arrow() {
		$value = $this->get_post_meta($this->hero_custom_arrow_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_hero_custom_arrow_default();
		}
		
		return $value;
	}
	
	public function get_hero_custom_arrow_default() {
		return get_option($this->hero_custom_arrow_default_key, $this->hero_custom_arrow_default);
	}				
	
	public function get_hero_dot_height() {
		$value = $this->get_post_meta($this->hero_dot_height_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_hero_dot_height_default();
		}
		
		return $value;
	}
	
	public function get_hero_dot_height_default() {
		return get_option($this->hero_dot_height_default_key, $this->hero_dot_height_default);
	}				
	
	public function get_hero_dot_width() {
		$value = $this->get_post_meta($this->hero_dot_width_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_hero_dot_width_default();
		}
		
		return $value;
	}
	
	public function get_hero_dot_width_default() {
		return get_option($this->hero_dot_width_default_key, $this->hero_dot_width_default);
	}			
	
	public function get_hero_dot() {
		$value = $this->get_post_meta($this->hero_dot_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_hero_dot_default();
		}
		
		return $value;
	}
	
	public function get_hero_dot_default() {
		return get_option($this->hero_dot_default_key, $this->hero_dot_default);
	}			
		
	public function get_hero_arrow_height() {
		$value = $this->get_post_meta($this->hero_arrow_height_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_hero_arrow_height_default();
		}
		
		return $value;
	}
	
	public function get_hero_arrow_height_default() {
		return get_option($this->hero_arrow_height_default_key, $this->hero_arrow_height_default);
	}			

	public function get_hero_arrow_width() {
		$value = $this->get_post_meta($this->hero_arrow_width_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_hero_arrow_width_default();
		}
		
		return $value;
	}
	
	public function get_hero_arrow_width_default() {
		return get_option($this->hero_arrow_width_default_key, $this->hero_arrow_width_default);
	}		
	
	public function get_hero_right_arrow() {
		$value = $this->get_post_meta($this->hero_right_arrow_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_hero_right_arrow_default();
		}
		
		return $value;
	}
	
	public function get_hero_right_arrow_default() {
		return get_option($this->hero_mode_default_key, $this->hero_mode_default);
	}		
	
	
	public function get_hero_left_arrow() {
		$value = $this->get_post_meta($this->hero_left_arrow_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_hero_left_arrow_default();
		}
		
		return $value;
	}
	
	public function get_hero_left_arrow_default() {
		return get_option($this->hero_left_arrow_default_key, $this->hero_left_arrow_default);
	}		
	
	public function get_hero_height() {
		$value = $this->get_post_meta($this->hero_height_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_hero_height_default();
		}
		
		return $value;
	}
	
	public function get_hero_height_default() {
		return get_option($this->hero_height_default_key, $this->hero_height_default);
	}	
	
	public function get_hero_width() {
		$value = $this->get_post_meta($this->hero_width_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_hero_width_default();
		}
		
		return $value;
	}
	
	public function get_hero_width_default() {
		return get_option($this->hero_width_default_key, $this->hero_width_default);
	}	
		
	public function get_hero_mode() {
		$value = $this->get_post_meta($this->hero_mode_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_hero_mode_default();
		}
		
		return $value;
	}
	
	public function get_hero_mode_default() {
		return get_option($this->hero_mode_default_key, $this->hero_mode_default);
	}	
	
	
	public function get_cssease() {
		$value = $this->get_post_meta($this->slider_cssease_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_cssease_default();
		}
		
		return $value;
	}
	
	public function get_cssease_default() {
		return get_option($this->slider_cssease_default_key, $this->slider_cssease_default);
	}	
		
	public function get_arrow() {
		$value = $this->get_post_meta($this->ns_arrow_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_arrow_default();
		}
		
		return $value;
	}
	
	public function get_arrow_default() {
		return get_option($this->ns_arrow_default_key, $this->ns_arrow_default);
	}
		
	public function get_shadow_spread() {
		$value = $this->get_post_meta($this->ns_shadow_spread_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_shadow_spread_default();
		}
		
		return $value;
	}
	
	public function get_shadow_spread_default() {
		return get_option($this->ns_shadow_spread_default_key, $this->ns_shadow_spread_default);
	}
	
	public function get_shadow_color() {
		$value = $this->get_post_meta($this->ns_shadow_color_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_shadow_color_default();
		}
		
		return $value;
	}
	
	public function get_shadow_color_default() {
		return get_option($this->ns_shadow_color_default_key, $this->ns_shadow_color_default);
	}

	public function get_shadow_blur() {
		$value = $this->get_post_meta($this->ns_shadow_blur_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_shadow_blur_default();
		}
		
		return $value;
	}
	
	public function get_shadow_blur_default() {
		return get_option($this->ns_shadow_blur_default_key, $this->ns_shadow_blur_default);
	}

	public function get_shadow() {
		$value = $this->get_post_meta($this->ns_shadow_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_shadow_default();
		}
		
		return $value;
	}
	
	public function get_shadow_default() {
		return get_option($this->ns_shadow_default_key, $this->ns_shadow_default);
	}
	
//	public function get_border_radius() {
//		$value = $this->get_post_meta($this->ns_border_radius_key);
//		if ($value == '' && $this->get_saves_count() < 1) {
//			$value = $this->get_border_radius_default();
//		}
//		
//		return $value;
//	}
//	
//	public function get_border_radius_default() {
//		return get_option($this->ns_border_radius_default_key, $this->ns_border_radius_default);
//	}

	
	public function get_border_color() {
		$value = $this->get_post_meta($this->ns_border_color_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_border_color_default();
		}
		
		return $value;
	}
	
	public function get_border_color_default() {
		return get_option($this->ns_border_color_default_key, $this->ns_border_color_default);
	}
	
	public function get_border_thickness() {
		$value = $this->get_post_meta($this->ns_border_thickness_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_border_thickness_default();
		}
		
		return $value;
	}
	
	public function get_border_thickness_default() {
		return get_option($this->ns_border_thickness_default_key, $this->ns_border_thickness_default);
	}
		
	public function get_show_border() {
		$value = $this->get_post_meta($this->ns_show_border_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_show_border_default();
		}
		
		return $value;
	}
	
  public function get_show_border_default() {
		return get_option($this->ns_show_border_default_key, $this->ns_show_border_default);
	}
	
  public function get_sort_order() {
		$value = $this->get_post_meta($this->sort_order_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_sort_order_default();
		}
		
		return $value;
	}
	
  public function get_slider_padding() {
		$value = $this->get_post_meta($this->slider_slides_padding_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_slider_padding_default();
		}
		
		return $value;
	}
	
  public function get_slider_padding_default() {
		return get_option($this->slider_slides_padding_default_key, $this->slider_slides_padding_default);
	}    
		
  public function get_slider_center_padding() {
		$value = $this->get_post_meta($this->slider_slides_center_padding_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_slider_center_padding_default();
		}
		
		return $value;
	}
	
  public function get_slider_center_padding_default() {
		return get_option($this->slider_slides_center_padding_default_key, $this->slider_slides_center_padding_default);
	}    
	
  public function get_slider_center_mode() {
		$value = $this->get_post_meta($this->slider_slides_center_mode_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_slider_center_mode_default();
		}
		
		return $value;
	}
	
  public function get_slider_center_mode_default() {
		return get_option($this->slider_slides_center_mode_default_key, $this->slider_slides_center_mode_default);
	}    
    	
  public function get_slider_slides_container_width() {
		$value = $this->get_post_meta($this->slider_slides_container_width_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_slider_slides_container_width_default();
		}
		
		return $value;
	}
	
  public function get_slider_slides_container_width_default() {
		return get_option($this->slider_slides_container_width_default_key, $this->slider_slides_container_width_default);
	}    
	
  public function get_slider_slides_to_scroll() {
		$value = $this->get_post_meta($this->slider_slides_to_scroll_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_slider_slides_to_scroll_default();
		}
		
		return $value;
	}
	
  public function get_slider_slides_to_scroll_default() {
		return get_option($this->slider_slides_to_scroll_default_key, $this->slider_slides_to_scroll_default);
	}    
	
  public function get_slider_slides_to_show() {
		$value = $this->get_post_meta($this->slider_slides_to_show_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_slider_slides_to_show_default();
		}
		
		return $value;
	}
	
  public function get_slider_slides_to_show_default() {
		return get_option($this->slider_slides_to_show_default_key, $this->slider_slides_to_show_default);
	}    
		
  public function get_slider_vertical_swiping() {
		$value = $this->get_post_meta($this->slider_vertical_swiping_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_slider_vertical_swiping_default();
		}
		
		return $value;
	}
	
  public function get_slider_vertical_swiping_default() {
		return get_option($this->slider_vertical_swiping_default_key, $this->slider_vertical_swiping_default);
	}    
  
  public function get_slider_vertical() {
		$value = $this->get_post_meta($this->slider_vertical_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_slider_vertical_default();
		}
		
		return $value;
	}
	
  public function get_slider_vertical_default() {
		return get_option($this->slider_vertical_default_key, $this->slider_vertical_default);
	}    
  
  public function get_slider_variable_width() {
		$value = $this->get_post_meta($this->slider_variable_width_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_slider_variable_width_default();
		}
		
		return $value;
	}
	
  public function get_slider_variable_width_default() {
		return get_option($this->slider_variable_width_default_key, $this->slider_variable_width_default);
	}    

  public function get_slider_use_css() {
		$value = $this->get_post_meta($this->slider_use_css_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_slider_use_css_default();
		}
		
		return $value;
	}
	
  public function get_slider_use_css_default() {
		return get_option($this->slider_use_css_default_key, $this->slider_use_css_default);
	}    
    
  public function get_slider_swipe() {
		$value = $this->get_post_meta($this->slider_swipe_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_slider_swipe_default();
		}
		
		return $value;
	}
	
  public function get_slider_swipe_default() {
		return get_option($this->slider_swipe_default_key, $this->slider_swipe_default);
	}    
  
  public function get_slider_pause_on_dots_hover() {
		$value = $this->get_post_meta($this->slider_pause_on_dots_hover_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_slider_pause_on_dots_hover_default();
		}
		
		return $value;
	}
	
  public function get_slider_pause_on_dots_hover_default() {
		return get_option($this->slider_pause_on_dots_hover_default_key, $this->slider_pause_on_dots_hover_default);
	}  

  public function get_slider_initial_slide_enabled() {
		$value = $this->get_post_meta($this->slider_initial_slide_enabled_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_slider_initial_slide_enabled_default();
		}
		
		return $value;
	}
	
  public function get_slider_initial_slide_enabled_default() {
		return get_option($this->slider_initial_slide_enabled_default_key, $this->slider_initial_slide_enabled_default);
	}  
  
  public function get_slider_mobile_first_enabled() {
		$value = $this->get_post_meta($this->slider_mobile_first_enabled_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_slider_mobile_first_enabled_default();
		}
		
		return $value;
	}
	
  public function get_slider_mobile_first_enabled_default() {
		return get_option($this->slider_mobile_first_enabled_default_key, $this->slider_mobile_first_enabled_default);
	}  
    
	public function get_skin() {
		$value = $this->get_post_meta($this->skin_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_skin_default();
		}
		
		// If still don't have a value after the saves_count check, use the default
		if ($value == '') {
			$value = $this->get_skin_default();
		}
		
		return $value;
	}
	
	public function get_skin_default() {
		return get_option($this->skin_default_key, $this->skin_default);
	}
	
	public function get_slider_animation_speed() {
		$value = $this->get_post_meta($this->slider_animation_speed_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_slider_animation_speed_default();
		}
		
		// If still don't have a value after the saves_count check, use the default
		if ($value == '') {
			$value = $this->get_slider_animation_speed_default();
		}
		
		return $value;
	}
	
	public function get_slider_animation_speed_default() {
		return get_option($this->slider_animation_speed_default_key, $this->slider_animation_speed_default);
	}
	
	public function get_slider_caption_enabled() {
		$value = $this->get_post_meta($this->slider_caption_enabled_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_slider_caption_enabled_default();
		}
		
		return $value;
	}
	
	public function get_slider_caption_enabled_default() {
		return get_option($this->slider_caption_enabled_default_key, $this->slider_caption_enabled_default);
	}
		
	public function get_slider_image_click_enabled() {
		$value = $this->get_post_meta($this->slider_image_click_enabled_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_slider_image_click_enabled_default();
		}
		
		return $value;
	}
	
	public function get_slider_image_click_enabled_default() {
		return get_option($this->slider_image_click_enabled_default_key, $this->slider_image_click_enabled_default);
	}
	
	public function get_slider_image_click_new_window() {
		$value = $this->get_post_meta($this->slider_image_click_new_window_key);
		if ($value == '') {
			$value = $this->slider_image_click_new_window_default;
		}
		
		return $value;
	}
	
	public function get_slider_image_click_open() {
		$value = $this->get_post_meta($this->slider_image_click_open_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_slider_image_click_open_default();
		}
		
		return $value;
	}

	public function get_slider_image_click_open_default() {
		return get_option($this->slider_image_click_open_default_key, $this->slider_image_click_open_default);
	}
	
	public function get_slider_slideshow_speed() {
		$value = $this->get_post_meta($this->slider_slideshow_speed_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_slider_slideshow_speed_default();
		}
		
		// If still don't have a value after the saves_count check, use the default
		if ($value == '') {
			$value = $this->get_slider_slideshow_speed_default();
		}
		
		return $value;
	}
	
	public function get_slider_slideshow_speed_default() {
		return get_option($this->slider_slideshow_speed_default_key, $this->slider_slideshow_speed_default);
	}
    
	public function get_slider_auto_play_enabled() {
		$value = $this->get_post_meta($this->slider_auto_play_enabled_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_slider_auto_play_enabled_default();
		}
		
		return $value;
	}
	
	public function get_slider_auto_play_enabled_default() {
		return get_option($this->slider_auto_play_enabled_default_key, $this->slider_auto_play_enabled_default);
	}
  
  public function get_slider_dots_enabled() {
		$value = $this->get_post_meta($this->slider_dots_enabled_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_slider_dots_enabled_default();
		}
		
		return $value;
	}
	
	public function get_slider_dots_enabled_default() {
		return get_option($this->slider_dots_enabled_default_key, $this->slider_dots_enabled_default);
	}
  
  public function get_slider_rtl_enabled() {
		$value = $this->get_post_meta($this->slider_rtl_enabled_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_slider_rtl_enabled_default();
		}
		
		return $value;
	}
  
	public function get_slider_rtl_enabled_default() {
		return get_option($this->slider_rtl_enabled_default_key, $this->slider_rtl_enabled_default);
	}  
  
  public function get_slider_infinite_enabled() {
		$value = $this->get_post_meta($this->slider_infinite_enabled_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_slider_infinite_enabled_default();
		}
		
		return $value;
	}
	
  public function get_slider_infinite_enabled_default() {
		return get_option($this->slider_infinite_enabled_default_key, $this->slider_infinite_enabled_default);
	}
  
  public function get_slider_fade_enabled() {
		$value = $this->get_post_meta($this->slider_fade_enabled_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_slider_fade_enabled_default();
		}
		
		return $value;
	}
	
  public function get_slider_fade_enabled_default() {
		return get_option($this->slider_fade_enabled_default_key, $this->slider_fade_enabled_default);
	}
  
  public function get_slider_lazyload_enabled() {
		$value = $this->get_post_meta($this->slider_lazyload_enabled_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_slider_lazyload_enabled_default();
		}
		
		return $value;
	}
	
  public function get_slider_lazyload_enabled_default() {
		return get_option($this->slider_lazyload_enabled_default_key, $this->slider_lazyload_enabled_default);
	}
  
  public function get_slider_arrows_enabled() {
		$value = $this->get_post_meta($this->slider_arrows_enabled_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_slider_arrows_enabled_default();
		}
		
		return $value;
	}
	
  public function get_slider_arrows_enabled_default() {
		return get_option($this->slider_arrows_enabled_default_key, $this->slider_arrows_enabled_default);
	}
  
    public function get_slider_hover_pause_enabled() {
		$value = $this->get_post_meta($this->slider_hover_pause_enabled_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_slider_hover_pause_enabled_default();
		}
		
		return $value;
	}
	
  public function get_slider_hover_pause_enabled_default() {
		return get_option($this->slider_hover_pause_enabled_default_key, $this->slider_hover_pause_enabled_default);
	}

  
  public function get_slider_drag_enabled() {
		$value = $this->get_post_meta($this->slider_drag_enabled_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_slider_drag_enabled_default();
		}
		
		return $value;
	}
	
  public function get_slider_drag_enabled_default() {
		return get_option($this->slider_drag_enabled_default_key, $this->slider_drag_enabled_default);
	}  
  
  public function get_slider_touch_move_enabled() {
		$value = $this->get_post_meta($this->slider_touch_move_enabled_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_slider_touch_move_enabled_default();
		}
		
		return $value;
	}
	
  public function get_slider_touch_move_enabled_default() {
		return get_option($this->slider_touch_move_enabled_default_key, $this->slider_touch_move_enabled_default);
	}  

  public function get_slider_adaptive_height_enabled() {
		$value = $this->get_post_meta($this->slider_adaptive_height_enabled_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_slider_adaptive_height_enabled_default();
		}
		
		return $value;
	}
	
  public function get_slider_adaptive_height_enabled_default() {
		return get_option($this->slider_adaptive_height_enabled_default_key, $this->slider_adaptive_height_enabled_default);
	}  
  
	public function save_options($options = null) {
		if ($this->get_template() == MAXGALLERIA_SLICK_CAROUSEL_KEY) {
			//error_log(print_r($_POST, true));
			$options = $this->get_options();
			parent::save_options($options);
			$this->genearte_style_sheet();

		}
	}
  	
	public function get_options() {
		return array(
			$this->skin_key,
		  $this->slider_animation_speed_key,
	    $this->slider_arrows_enabled_key,
	    $this->slider_auto_play_enabled_key,
			$this->slider_caption_enabled_key,
	    $this->slider_drag_enabled_key,
	    $this->slider_dots_enabled_key,
      $this->slider_fade_enabled_key,
      $this->slider_hover_pause_enabled_key,
			$this->slider_image_click_enabled_key,
			$this->slider_image_click_new_window_key,
			$this->slider_image_click_open_key,
	    $this->slider_infinite_enabled_key,
	    $this->slider_lazyload_enabled_key,
	    $this->slider_rtl_enabled_key,
			$this->slider_slideshow_speed_key,
      $this->slider_touch_move_enabled_key,
      $this->slider_adaptive_height_enabled_key,
      $this->slider_mobile_first_enabled_key,
      $this->slider_initial_slide_enabled_key,
      $this->slider_pause_on_dots_hover_key,
      $this->slider_swipe_key,
      $this->slider_use_css_key,
      $this->slider_variable_width_key,
      $this->slider_vertical_key,
      $this->slider_vertical_swiping_key,
			$this->slider_slides_to_show_key,
			$this->slider_slides_to_scroll_key,
			$this->slider_slides_container_width_key,
			$this->slider_slides_center_mode_key,
			$this->slider_slides_center_padding_key,
			$this->slider_slides_padding_key,
		  $this->ns_show_border_key,
			$this->ns_border_thickness_key,
			$this->ns_border_color_key,
			$this->ns_shadow_key,
			$this->ns_shadow_blur_key,
			$this->ns_shadow_color_key,
			$this->ns_shadow_spread_key,
		  $this->ns_arrow_key,
			$this->slider_cssease_key,
			$this->hero_mode_key,
			$this->hero_width_key,
			$this->hero_height_key,
			$this->hero_left_arrow_key,
			$this->hero_right_arrow_key,
			$this->hero_arrow_width_key,
			$this->hero_arrow_height_key,
			$this->hero_dot_key,
			$this->hero_dot_width_key,
			$this->hero_dot_height_key,
			$this->hero_custom_arrow_key,
			$this->hero_custom_dot_key,
			$this->hero_custom_css_key,
			$this->slider_thumbnail_dots_key,
			$this->slider_dots_vertical_position_key,
			$this->slider_zindex_key,
			$this->slider_wait_for_animate_key,
			$this->slider_use_css_transform_key,
			$this->slider_touch_threshold_key,
			$this->slider_swipe_to_slide_key,
			$this->slider_rows_key,
			$this->slider_slides_per_row_key,
			$this->slider_accessibility_key,
      $this->slider_pause_on_focus_key,
			$this->slider_lazyLoad_key,
			$this->slider_focusOnChange_key,
			$this->slider_focusOnSelect_key,
			$this->slider_edgeFriction_key,
			$this->slider_breakpoints_key,
			$this->slider_respondto_key,
			$this->slider_open_new_tab_key
  		);
	}
	
	private function genearte_style_sheet() {
		
		
ob_start( );
?>

<?php
    $gallery_style = ob_get_clean( );		

		
		$mg_styles_dir = get_option('maxgalleira-styles-path', '');
		$mg_styles_url = get_option('maxgalleira-styles-url', '');
		
		if($mg_styles_dir === '') {
			$mg_styles_dir = get_home_path() . DIRECTORY_SEPARATOR . "wp-content" . DIRECTORY_SEPARATOR . "mg-styles";
			if(!file_exists($mg_styles_dir)) {
				if(mkdir($mg_styles_dir)) {
					$mg_styles_url = site_url() . "/wp-content/mg-styles";
					update_option('maxgalleira-styles-path', $mg_styles_dir, true );
					update_option('maxgalleira-styles-url', $mg_styles_url, true );
				}
			}			
		}
		
		$mg_css_file = "mg-" . $this->gallery_id . ".css";
		$mg_style_file = $mg_styles_dir . DIRECTORY_SEPARATOR . $mg_css_file;
		$mg_style_css_url = $mg_styles_url . "/" . $mg_css_file;
		
		$selector = "#maxgallery-{$this->gallery_id}.mg-slick-carousel.mg-custom";
		$slider_padding = $this->get_slider_padding();
		
		if($this->get_skin() !== 'borderless') {
		
			$gallery_style .= PHP_EOL;		
			$gallery_style .= "$selector {" . PHP_EOL;

			if($this->get_show_border() === 'off') {
				$gallery_style .= "  border: 0 none;" . PHP_EOL;
			} else {

				$border_color = $this->get_border_color();
				//$border_radius = $this->get_border_radius();

				$thickness = $this->get_border_thickness();			
				switch ($thickness) {				
					case '1':
						$gallery_style .= "  border: 1px solid $border_color;" . PHP_EOL;								
						break;				
					case '3':
						$gallery_style .= "  border: 3px solid $border_color;" . PHP_EOL;								
						break;
					case '5':
						$gallery_style .= "  border: 5px solid $border_color;" . PHP_EOL;								
						break;
					case '7':
						$gallery_style .= "  border: 7px solid $border_color;" . PHP_EOL;								
						break;
					case '9':
						$gallery_style .= "  border: 10px solid $border_color;" . PHP_EOL;								
						break;
					case '15':
						$gallery_style .= "  border: 15px solid $border_color;" . PHP_EOL;								
						break;
				}	

				$shadow_type = $this->get_shadow();

				$show_string = "";
				$inset = "";
				if($shadow_type !== 'none' ) {
					$shadow_width = $this->get_shadow_blur();				
					$shadow_spread = $this->get_shadow_spread();

					if($shadow_type === 'inside')
						$inset = "inset";

					if($shadow_type === 'color') {
						$shadow_color = $this->get_shadow_color();
						list($r, $g, $b) = sscanf($shadow_color, "#%02x%02x%02x");						
						$show_string = "0px 0px {$shadow_width}px {$shadow_spread}px rgba({$r},{$g},{$b},0.75);";
					} else
						$show_string = "$inset 0px 0px {$shadow_width}px {$shadow_spread}px rgba(0,0,0,0.75);";

						$wk = "  -webkit-box-shadow: " . $show_string;
						$moz = "  -moz-box-shadow: " . $show_string;
						$box_shadow = "  box-shadow: " . $show_string;

				}


				//$gallery_style .= "  border-radius: {$border_radius}px !important;" . PHP_EOL;	

				if($shadow_type !== 'none' ) {
					$gallery_style .= $wk . PHP_EOL;
					$gallery_style .= $moz . PHP_EOL;
					$gallery_style .= $box_shadow . PHP_EOL;
				}

				$gallery_style .= "}" . PHP_EOL;

	//			if($border_radius > 0) {
	//				$border_radius_img = $border_radius - 10;
	//				$gallery_style .= "$selector .slick-slide a img {" . PHP_EOL;
	//				$gallery_style .= "  border-radius: {$border_radius_img}px !important;" . PHP_EOL;
	//				$gallery_style .= "}" . PHP_EOL;			
	//		  }

				$offset = 1;

				if($this->get_show_border() === 'on') {
					$offset += $thickness;
				}
				if($shadow_type !== 'none' ) {
					$shadow_width = $this->get_shadow_blur();				
					$shadow_spread = $this->get_shadow_spread();
					$offset += $shadow_width + $shadow_spread;
				}

				//$gallery_style .= ".slick-dots {" . PHP_EOL;
				//$gallery_style .= "  margin-top: {$offset}px !important;" . PHP_EOL;
				//$gallery_style .= "}" . PHP_EOL;

			}
		}
		
		if($slider_padding !== '0') {

			$gallery_style .= ".slick-initialized .slick-slide {" . PHP_EOL;
			$gallery_style .= "	 margin-right: $slider_padding;" . PHP_EOL;							
			$gallery_style .= "}" . PHP_EOL;

		}
								
		$arrow_style = $this->get_arrow();

		if($arrow_style != '0' ) {


			$left_arrow = "arrow-style-{$arrow_style}l-wt.png";
			$right_arrow = "arrow-style-{$arrow_style}r-wt.png";

			$gallery_style .= ".slick-prev, .slick-next {" . PHP_EOL;
			$gallery_style .= "  background: none !important;" . PHP_EOL;
			$gallery_style .= "}" . PHP_EOL;

			$gallery_style .= ".slick-prev::before, .slick-next::before {" . PHP_EOL;
			$gallery_style .= "	display: none ;" . PHP_EOL;
			$gallery_style .= "}" . PHP_EOL;
			
			if($this->get_hero_mode() === 'on' &&  ($this->get_hero_right_arrow() !== '' && $this->get_hero_left_arrow() !== '') ) {

				$arrow_width = $this->get_hero_arrow_width();
				$arrow_height = $this->get_hero_arrow_height();

				$gallery_style .= "button.slick-prev.slick-arrow {" . PHP_EOL;
				$gallery_style .= "  background: url(\"" . $this->get_hero_left_arrow() . "\")	no-repeat scroll center center transparent !important;" . PHP_EOL;								
				$gallery_style .= "  display: block;" . PHP_EOL;
				$gallery_style .= "  height: {$arrow_height}px;" . PHP_EOL;
				$gallery_style .= "  width: {$arrow_width}px;" . PHP_EOL;
				$gallery_style .= "}" . PHP_EOL;

				$gallery_style .= "button.slick-next.slick-arrow {" . PHP_EOL;
				$gallery_style .= "  background: url(\"" . $this->get_hero_right_arrow() . "\")	no-repeat scroll center center transparent !important;" . PHP_EOL;								
				$gallery_style .= "  display: block;" . PHP_EOL;
				$gallery_style .= "  height: {$arrow_height}px;" . PHP_EOL;
				$gallery_style .= "  width: {$arrow_width}px;" . PHP_EOL;
				$gallery_style .= "}" . PHP_EOL;

			} else {

				$gallery_style .= "button.slick-prev.slick-arrow {" . PHP_EOL;
				$gallery_style .= "  background: url(\"". MAXGALLERIA_PLUGIN_URL . "/images/icons/$left_arrow\")	no-repeat scroll center center transparent !important;" . PHP_EOL;								
				$gallery_style .= "  display: block;" . PHP_EOL;

				if($arrow_style === '5') {
					$gallery_style .= "  height: 50px;" . PHP_EOL;
					$gallery_style .= "  width: 50px;" . PHP_EOL;
				} else if($arrow_style === '6') {
					$gallery_style .= "  height: 49px;" . PHP_EOL;
					$gallery_style .= "  width: 50px;" . PHP_EOL;
				} else  if($arrow_style === '7') {
					$gallery_style .= "  height: 50px;" . PHP_EOL;
					$gallery_style .= "  width: 50px;" . PHP_EOL;
				} else {
					$gallery_style .= "  height: 50px;" . PHP_EOL;
					$gallery_style .= "  width: 30px;" . PHP_EOL;					
				}
				$gallery_style .= "}" . PHP_EOL;

				$gallery_style .= "button.slick-next.slick-arrow {" . PHP_EOL;
				$gallery_style .= "  background: url(\"". MAXGALLERIA_PLUGIN_URL . "/images/icons/$right_arrow\")	no-repeat scroll center center transparent !important;" . PHP_EOL;								
				$gallery_style .= "  display: block;" . PHP_EOL;

				if($arrow_style === '5') {
					$gallery_style .= "  height: 50px;" . PHP_EOL;
					$gallery_style .= "  width: 50px;" . PHP_EOL;
				} else if($arrow_style === '6') {
					$gallery_style .= "  height: 49px;" . PHP_EOL;
					$gallery_style .= "  width: 50px;" . PHP_EOL;
				} else  if($arrow_style === '7') {
					$gallery_style .= "  height: 50px;" . PHP_EOL;
					$gallery_style .= "  width: 50px;" . PHP_EOL;
				} else {
					$gallery_style .= "  height: 50px;" . PHP_EOL;
					$gallery_style .= "  width: 30px;" . PHP_EOL;					
				}
				$gallery_style .= "}" . PHP_EOL;

			}

			if($this->get_hero_mode() === 'on' && $this->get_hero_dot() !== '') {

				$gallery_style .= "#maxgallery-{$this->gallery_id}.mg-slick-carousel .slick-dots li button {" . PHP_EOL;
				$gallery_style .= "		background: url(\"" . $this->get_hero_dot() . "\") no-repeat scroll 0 0 transparent;" . PHP_EOL;
				$gallery_style .= "		text-indent: -9999px;" . PHP_EOL;
				$gallery_style .= "		width: " . $this->get_hero_dot_width() . "px;" . PHP_EOL;
				$gallery_style .= "		height: " . $this->get_hero_dot_height() . "px;" . PHP_EOL;
				$gallery_style .= "		overflow:hidden;" . PHP_EOL;
				$gallery_style .= "}" . PHP_EOL;


			} 
		}

		if($this->get_thumbnail_dots() === 'on') {
			$gallery_style .= "#maxgallery-{$this->gallery_id}.mg-slick-carousel .slick-dots li {" . PHP_EOL;
			$gallery_style .= "		width: " . $this->get_hero_dot_width() . "px;" . PHP_EOL;
				$gallery_style .= "}" . PHP_EOL;				

			$gallery_style .= "#maxgallery-{$this->gallery_id}.mg-slick-carousel .slick-dots {" . PHP_EOL;
			$gallery_style .= "		bottom: " . $this->get_dots_vertical_position() . "px;" . PHP_EOL;
			$gallery_style .= "}" . PHP_EOL;
				
		}


		$custom_css = trim($this->get_hero_custom_css());
		if($custom_css === '')
			$custom_css = $this->get_hero_custom_css_default();

		if($custom_css !== '')
			$gallery_style .= $custom_css;

		if($arrow_style != '0' || $this->get_skin() !== 'borderless' || $custom_css !== '' || $this->get_thumbnail_dots() === 'on' || ($slider_padding !== '0') ) {
			if(file_put_contents($mg_style_file, $gallery_style )) {
				update_post_meta($this->gallery_id, "mg-css-file", $mg_style_css_url );
			}
		}	else {
			// delete the file
			if(file_exists($mg_style_file))
			  unlink($mg_style_file);
		}		
			
						
	}
  
	public function check_license() {
    
    $valid_license = true;

		$license = trim( get_option( 'mg_edd_slick_license_key' ) );
	
		if($license != "") {
		
			$args = array(
				'edd_action' => 'check_license',
				'license' => $license,
				'item_name' => urlencode( EDD_SLICK_NAME ), // the name of our product in EDD
				'url'       => site_url()          
			);

			$request = wp_remote_post(MG_EDD_SHOP_URL,  array( 'body' => $args, 'timeout' => 15, 'sslverify' => false ) );

			$response = json_decode($request['body']);
            
      update_option(MAXGALLERIA_SLICK_CAROUSEL_EXPIRES, $response->expires);
      
      $this->license_expiration = $response->expires;
      
			$expire_time = strtotime($response->expires);
      
      $currnet_date_time = date('Y-m-d H:i:s');
			$today_time = strtotime($currnet_date_time);
			if($expire_time < $today_time)
        $valid_license = false;
            
    }
    return $valid_license;
        
  }
  	
}
?>