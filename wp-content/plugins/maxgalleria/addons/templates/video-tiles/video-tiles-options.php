<?php
require_once MAXGALLERIA_PLUGIN_DIR . '/maxgallery-options.php';

class MaxGalleriaVideoTilesOptions extends MaxGalleryOptions {
	public $nonce_save_video_tiles_defaults = array(
		'action' => 'save_video_tiles_defaults',
		'name' => 'maxgalleria_save_video_tiles_defaults'
	);
	
	public $caption_positions = array();
	public $lightbox_sizes = array();
	public $skins = array();
	public $new_skins = array();
	public $thumb_clicks = array();
	public $thumb_columns = array();
	public $thumb_shapes = array();
	public $content_positions = array();
  public $overflow_y_settings = array();
  public $sort_orders = array();
	public $border_sizes = array();
	public $border_color = "";
	public $border_radiuses = array();
	public $gallery_id;
	public $shadow_types = array();
	public $shadow_widths = array();
	public $close_types = array();
	public $hide_presets = "";
		
	public function __construct($post_id = 0) {
		parent::__construct($post_id);

		$this->gallery_id = $post_id;
		$this->caption_positions = array(
			'below' => __('Below Image', 'maxgalleria'),
			'bottom' => __('Bottom of Image', 'maxgalleria')
		);
    
		$this->content_positions = array(
			'auto' => __('Auto', 'maxgalleria'),
			'true' => __('On', 'maxgalleria'),
			'false' => __('Off', 'maxgalleria')
		);
            
		$this->overflow_y_settings = array(
			'auto' => __('Auto', 'maxgalleria'),
			'scroll' => __('Scroll', 'maxgalleria'),
			'hidden' => __('Hidden', 'maxgalleria')
		);
    		
		$this->lightbox_sizes = array(
			'full' => __('Full', 'maxgalleria'),
			'custom' => __('Custom', 'maxgalleria')
		);

		$this->skins = array(
			'no-border' => __('No Border', 'maxgalleria'),
			'picture-frame' => __('Picture Frame (old)', 'maxgalleria'),
			'portal' => __('Portal', 'maxgalleria'),
			'portal-dark' => __('Portal Dark', 'maxgalleria'),
			'standard' => __('Standard', 'maxgalleria'),
			'standard-dark' => __('Standard Dark', 'maxgalleria'),
			'tightness' => __('Tightness', 'maxgalleria'),
			'tightness-dark' => __('Tightness Dark', 'maxgalleria'),
		);
		
		$this->new_skins = array(
			'borderless' => __('Borderless', 'maxgalleria'),
			'picture-frame2' => __('Picture Frame', 'maxgalleria'),
			'drop-shadow' => __('Drop Shadow', 'maxgalleria'),
			'inner-shade' => __('Inner Shade', 'maxgalleria'),
			'round-edge' => __('Rounded Edge', 'maxgalleria'),
			'slim-frame' => __('Slim Frame', 'maxgalleria')								
		);
				
		$this->thumb_clicks = array(
			'lightbox' => __('Video Lightbox', 'maxgalleria'),
			'video_url' => __('Video URL', 'maxgalleria')
		);

		$this->thumb_columns = array(
			1 => 1,
			2 => 2,
			3 => 3,
			4 => 4,
			5 => 5,
			6 => 6,
			7 => 7,
			8 => 8,
			9 => 9,
			10 => 10
		);
		
		$this->thumb_shapes = array(
			'landscape' => __('Landscape', 'maxgalleria'),
			'portrait' => __('Portrait', 'maxgalleria'),
			'square' => __('Square', 'maxgalleria')
		);
    
    $this->sort_orders = array(
			'asc' => __('Ascending ', 'maxgalleria'),
			'desc' => __('Descending', 'maxgalleria')        
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
			'none' => __('None', 'maxgalleria'),
			'inside' => __('Inside', 'maxgalleria'),
			'behind' => __('Behind', 'maxgalleria'),
			//'behind-inside' => __('Behind & Inside', 'maxgalleria'),
			'color' => __('Color', 'maxgalleria')
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
		
		$this->hide_presets = get_option( "mg_hide_presets" );
		
	}

	public $videos_per_page_key = 'maxgallery_videos_per_page';
	public $videos_per_page_default = '';
	public $videos_per_page_default_key = 'maxgallery_videos_per_page';
	public $skin_default = 'standard';
	public $skin_default_key = 'maxgallery_skin_video_tiles_default';
	public $skin_key = 'maxgallery_skin';
	public $thumb_caption_enabled_default = '';
	public $thumb_caption_enabled_default_key = 'maxgallery_thumb_caption_enabled_video_tiles_default';
	public $thumb_caption_enabled_key = 'maxgallery_thumb_caption_enabled';
	public $thumb_caption_position_default = 'below';
	public $thumb_caption_position_default_key = 'maxgallery_thumb_caption_position_video_tiles_default';
	public $thumb_caption_position_key = 'maxgallery_thumb_caption_position';
	public $thumb_click_default = 'lightbox';
	public $thumb_click_default_key = 'maxgallery_thumb_click_video_tiles_default';
	public $thumb_click_key = 'maxgallery_thumb_click';
	public $thumb_click_new_window_default = '';
	public $thumb_click_new_window_default_key = 'maxgallery_thumb_click_new_window_video_tiles_default';
	public $thumb_click_new_window_key = 'maxgallery_thumb_click_new_window';
	public $thumb_columns_default = 5;
	public $thumb_columns_default_key = 'maxgallery_thumb_columns_video_tiles_default';
	public $thumb_columns_key = 'maxgallery_thumb_columns';
	public $thumb_image_class_default = '';
	public $thumb_image_class_default_key = 'maxgallery_thumb_image_class_video_tiles_default';
	public $thumb_image_class_key = 'maxgallery_thumb_image_class';
	public $thumb_image_container_class_default = '';
	public $thumb_image_container_class_default_key = 'maxgallery_thumb_imagee_container_class_video_tiles_default';
	public $thumb_image_container_class_key = 'maxgallery_thumb_image_container_class';
	public $thumb_image_rel_attribute_default = 'mg-rel-video-thumbs';
	public $thumb_image_rel_attribute_default_key = 'maxgallery_thumb_image_rel_attribute_video_tiles_default';
	public $thumb_image_rel_attribute_key = 'maxgallery_thumb_image_rel_attribute';
	public $thumb_shape_default = 'square';
	public $thumb_shape_default_key = 'maxgallery_thumb_shape_video_tiles_default';
	public $thumb_shape_key = 'maxgallery_thumb_shape';
  
	public $vertical_fit_enabled_default = '';
	public $vertical_fit_enabled_default_key = 'maxgallery_vertical_fit_enabled_video_tiles_default';
	public $vertical_fit_enabled_key = 'maxgallery_vertical_fit_enabled';
  
	public $escape_key_enabled_default = 'on';
	public $escape_key_enabled_default_key = 'maxgallery_escape_key_enabled_video_tiles_default';
	public $escape_key_enabled_key = 'maxgallery_escape_key_enabled';
  
	public $align_top_enabled_default = '';
	public $align_top_enabled_default_key = 'maxgallery_align_top_enabled_video_tiles_default';
	public $align_top_enabled_key = 'maxgallery_align_top_enabled';
  
 	public $hide_close_btn_enabled_default = '';
	public $hide_close_btn_enabled_default_key = 'maxgallery_hide_close_btn_enabled_video_tiles_default';
	public $hide_close_btn_enabled_key = 'maxgallery_hide_close_btn_enabled';
  
  public $bg_click_close_enabled_default = '';
	public $bg_click_close_enabled_default_key = 'maxgallery_bg_click_close_enabled_video_tiles_default';
	public $bg_click_close_enabled_key = 'maxgallery_bg_click_close_enabled';

	public $fixed_content_position_default = 'auto';
	public $fixed_content_position_default_key = 'maxgallery_fixed_content_position_enabled_video_tiles_default';
	public $fixed_content_position_key = 'maxgallery_fixed_content_position_enabled';
  
	public $overflow_y_default = 'auto';
	public $overflow_y_default_key = 'maxgallery_overflow_y_video_tiles_default';
	public $overflow_y_key = 'maxgallery_overflow_y';
  
	public $removal_delay_default = '0';
	public $removal_delay_default_key = 'maxgallery_removal_delay_video_tiles_default';
	public $removal_delay_key = 'maxgallery_removal_delay';

	public $main_class_default = '';
	public $main_class_default_key = 'maxgallery_main_class_video_tiles_default';
	public $main_class_key = 'maxgallery_main_class';
  
	public $gallery_enabled_default = 'on';
	public $gallery_enabled_default_key = 'maxgallery_gallery_enabled_video_tiles_default';
	public $gallery_enabled_key = 'maxgallery_gallery_enabled';
  
	public $arrow_markup_default = "<button title='%title%' type='button' class='mfp-arrow mfp-arrow-%dir%'></button>";
	public $arrow_markup_default_key = 'maxgallery_arrow_markup_video_tiles_default';
	public $arrow_markup_key = 'maxgallery_arrow_markup';

	public $prev_button_title_default = "Previous (Left arrow key)";
	public $prev_button_title_default_key = 'maxgallery_prev_button_title_video_tiles_default';
	public $prev_button_title_key = 'maxgallery_prev_button_title';
  
	public $next_button_title_default = "Next (Right arrow key)";
	public $next_button_title_default_key = 'maxgallery_next_button_title_video_tiles_default';
	public $next_button_title_key = 'maxgallery_next_button_title';
  
  public $counter_markup_default = "<div class='mfp-counter'>%curr% of %total%</div>";
	public $counter_markup_default_key = 'maxgallery_counter_markup_video_tiles_default';
	public $counter_markup_key = 'maxgallery_counter_markup';
  
	public $sort_order_default = 'asc';
	public $sort_order_default_key = 'maxgallery_sort_order_video_tiles_default';
	public $sort_order_key = 'maxgallery_sort_order_video_tiles';

	public $dfactory_lightbox_default = '';
	public $dfactory_lightbox_default_key = 'maxgallery_video_dfactory_lightbox_default';
	public $dfactory_lightbox_key = 'maxgallery_video_dfactory_lightbox_enabled';  
	
	public $ns_show_border_default = '';
	public $ns_show_border_default_key = 'maxgallery_v_style_show_border_default';
	public $ns_show_border_key = 'maxgallery_v_style_show_border_enabled';  
	
	public $ns_border_thickness_default = '';
	public $ns_border_thickness_default_key = 'maxgallery_v_style_border_thickness_default';
	public $ns_border_thickness_key = 'maxgallery_v_style_border_thickness_enabled';  
	
	public $ns_border_color_default = '#000000';
	public $ns_border_color_default_key = 'maxgallery_v_style_border_color_default';
	public $ns_border_color_key = 'maxgallery_v_style_border_color_enabled';  
	
	public $ns_border_radius_default = '0';
	public $ns_border_radius_default_key = 'maxgallery_v_style_border_radius_default';
	public $ns_border_radius_key = 'maxgallery_v_style_border_radius_enabled';  
	
	public $ns_shadow_default = 'none';
	public $ns_shadow_default_key = 'maxgallery_v_style_shadow_default';
	public $ns_shadow_key = 'maxgallery_v_style_shadow_enabled';  
	
	public $ns_shadow_blur_default = '5';
	public $ns_shadow_blur_default_key = 'maxgallery_style_shadow_blur_default';
	public $ns_shadow_blur_key = 'maxgallery_style_shadow_blur_enabled';  
	
	public $ns_shadow_color_default = '#000000';
	public $ns_shadow_color_default_key = 'maxgallery_style_shadow_color_default';
	public $ns_shadow_color_key = 'maxgallery_style_shadow_color_enabled';  
	
	public $ns_shadow_spread_default = '0';
	public $ns_shadow_spread_default_key = 'maxgallery_style_shadow_spread_default';
	public $ns_shadow_spread_key = 'maxgallery_style_shadow_spread_enabled';  
	
	public $ns_lightbox_close_default = '0';
	public $ns_lightbox_close_default_key = 'maxgallery_style_v_lightbox_close_default';
	public $ns_lightbox_close_key = 'maxgallery_style_v_lightbox_close_enabled';  
	
	public $ns_lightbox_arrow_default = '0';
	public $ns_lightbox_arrow_default_key = 'maxgallery_style_v_lightbox_arrow_default';
	public $ns_lightbox_arrow_key = 'maxgallery_style_v_lightbox_arrow_enabled';  
	
	public function get_lightbox_arrow() {
		$value = $this->get_post_meta($this->ns_lightbox_arrow_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_lightbox_arrow_default();
		}
		
		return $value;
	}
	
	public function get_lightbox_arrow_default() {
		return get_option($this->ns_lightbox_arrow_default_key, $this->ns_lightbox_arrow_default);
	}
			
	public function get_lightbox_close() {
		$value = $this->get_post_meta($this->ns_lightbox_close_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_lightbox_close_default();
		}
		
		return $value;
	}
	
	public function get_lightbox_close_default() {
		return get_option($this->ns_lightbox_close_default_key, $this->ns_lightbox_close_default);
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
	
	public function get_border_radius() {
		$value = $this->get_post_meta($this->ns_border_radius_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_border_radius_default();
		}
		
		return $value;
	}
	
	public function get_border_radius_default() {
		return get_option($this->ns_border_radius_default_key, $this->ns_border_radius_default);
	}

	
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
  
	public function get_dfactory_lightbox() {
		$value = $this->get_post_meta($this->dfactory_lightbox_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_dfactory_lightbox_default();
		}
		
		return $value;
	}
	
	public function get_dfactory_lightbox_default() {
		return get_option($this->dfactory_lightbox_default_key, $this->dfactory_lightbox_default);
	}
    
  public function get_sort_order() {
		$value = $this->get_post_meta($this->sort_order_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_sort_order_default();
		}
		
		return $value;
	}
	
	public function get_sort_order_default() {
		return get_option($this->sort_order_default_key, $this->sort_order_default);
	}
    
	public function get_counter_markup() {
		$value = $this->get_post_meta($this->counter_markup_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_counter_markup_default();
		}
		
		return $value;
	}
	
	public function get_counter_markup_default() {
		return get_option($this->counter_markup_default_key, $this->counter_markup_default);
	}
    
  public function get_next_button_title() {
		$value = $this->get_post_meta($this->next_button_title_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_next_button_title_default();
		}
		
		return $value;
	}
	
	public function get_next_button_title_default() {
		return get_option($this->next_button_title_default_key, $this->next_button_title_default);
	}

	public function get_prev_button_title() {
		$value = $this->get_post_meta($this->prev_button_title_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_prev_button_title_default();
		}
		
		return $value;
	}
	
	public function get_prev_button_title_default() {
		return get_option($this->prev_button_title_default_key, $this->prev_button_title_default);
	}

	public function get_arrow_markup() {
		$value = $this->get_post_meta($this->arrow_markup_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_arrow_markup_default();
		}
		
		return $value;
	}
	
	public function get_arrow_markup_default() {
		return get_option($this->arrow_markup_default_key, $this->arrow_markup_default);
	}
  
	public function get_gallery_enabled() {
		$value = $this->get_post_meta($this->gallery_enabled_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_gallery_enabled_default();
		}
		
		return $value;
	}
	
	public function get_gallery_enabled_default() {
		return get_option($this->gallery_enabled_default_key, $this->gallery_enabled_default);
	}
    
	public function get_main_class() {
		$value = $this->get_post_meta($this->main_class_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_main_class_default();
		}
		
		return $value;
	}
	
	public function get_main_class_default() {
		return get_option($this->main_class_default_key, $this->main_class_default);
	}
  
	public function get_removal_delay() {
		$value = $this->get_post_meta($this->removal_delay_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_removal_delay_default();
		}
		
		return $value;
	}
	
	public function get_removal_delay_default() {
		return get_option($this->removal_delay_default_key, $this->removal_delay_default);
	}
  
	public function get_overflow_y() {
		$value = $this->get_post_meta($this->overflow_y_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_overflow_y_default();
		}
		
		return $value;
	}
	
	public function get_overflow_y_default() {
		return get_option($this->overflow_y_default_key, $this->overflow_y_default);
	}
  
  
  public function get_fixed_content_position() {
		$value = $this->get_post_meta($this->fixed_content_position_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_fixed_content_position_default();
		}
		
		return $value;
	}
	
	public function get_fixed_content_position_default() {
		return get_option($this->fixed_content_position_default_key, $this->fixed_content_position_default);
	}
  
	public function get_bg_click_close_enabled() {
		$value = $this->get_post_meta($this->bg_click_close_enabled_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_bg_click_close_enabled_default();
		}
		
		return $value;
	}
	
	public function get_bg_click_close_enabled_default() {
		return get_option($this->bg_click_close_enabled_default_key, $this->bg_click_close_enabled_default);
	}  
  
 	public function get_hide_close_btn_enabled() {
		$value = $this->get_post_meta($this->hide_close_btn_enabled_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_hide_close_btn_enabled_default();
		}
		
		return $value;
	}
	
	public function get_hide_close_btn_enabled_default() {
		return get_option($this->hide_close_btn_enabled_default_key, $this->hide_close_btn_enabled_default);
	}

	public function get_align_top_enabled() {
		$value = $this->get_post_meta($this->align_top_enabled_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_align_top_enabled_default();
		}
		
		return $value;
	}
	
	public function get_align_top_enabled_default() {
		return get_option($this->align_top_enabled_default_key, $this->align_top_enabled_default);
	}
    
  public function get_escape_key_enabled() {
		$value = $this->get_post_meta($this->escape_key_enabled_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_escape_key_enabled_default();
		}
		
		return $value;
	}
	
	public function get_escape_key_enabled_default() {
		return get_option($this->escape_key_enabled_default_key, $this->escape_key_enabled_default);
	}
     
	public function get_vertical_fit_enabled() {
		$value = $this->get_post_meta($this->vertical_fit_enabled_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_vertical_fit_enabled_default();
		}
		
		return $value;
	}
	
	public function get_vertical_fit_enabled_default() {
		return get_option($this->vertical_fit_enabled_default_key, $this->vertical_fit_enabled_default);
	}
  	  
  public function get_videos_per_page() {
		$value = $this->get_post_meta($this->videos_per_page_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_videos_per_page_default();
		}
		
		return $value;
	}
	
	public function get_videos_per_page_default() {
		return get_option($this->videos_per_page_default_key, $this->videos_per_page_default);
	}
  	
	public function get_skin() {
		$value = $this->get_post_meta($this->skin_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_skin_default();
		}
		
		return $value;
	}
	
	public function get_skin_default() {
		return get_option($this->skin_default_key, $this->skin_default);
	}
	
	public function get_thumb_caption_enabled() {
		$value = $this->get_post_meta($this->thumb_caption_enabled_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_thumb_caption_enabled_default();
		}
		
		return $value;
	}
	
	public function get_thumb_caption_enabled_default() {
		return get_option($this->thumb_caption_enabled_default_key, $this->thumb_caption_enabled_default);
	}
	
	public function get_thumb_caption_position() {
		$value = $this->get_post_meta($this->thumb_caption_position_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_thumb_caption_position_default();
		}
		
		return $value;
	}
	
	public function get_thumb_caption_position_default() {
		return get_option($this->thumb_caption_position_default_key, $this->thumb_caption_position_default);
	}
	
	public function get_thumb_click() {
		$value = $this->get_post_meta($this->thumb_click_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_thumb_click_default();
		}
		
		return $value;
	}
	
	public function get_thumb_click_default() {
		return get_option($this->thumb_click_default_key, $this->thumb_click_default);
	}
	
	public function get_thumb_click_new_window() {
		$value = $this->get_post_meta($this->thumb_click_new_window_key);
		if ($value == '') {
			$value = $this->thumb_click_new_window_default;
		}
		
		return $value;
	}
	
	public function get_thumb_columns() {
		$value = $this->get_post_meta($this->thumb_columns_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_thumb_columns_default();
		}
		
		return $value;
	}
	
	public function get_thumb_columns_default() {
		return get_option($this->thumb_columns_default_key, $this->thumb_columns_default);
	}
	
	public function get_thumb_columns_class() {
		$value = '';
		
		$columns = $this->get_thumb_columns();
		if ($columns == 1) { $value = 'mg-onecol'; }
		if ($columns == 2) { $value = 'mg-twocol'; }
		if ($columns == 3) { $value = 'mg-threecol'; }
		if ($columns == 4) { $value = 'mg-fourcol'; }
		if ($columns == 5) { $value = 'mg-fivecol'; }
		if ($columns == 6) { $value = 'mg-sixcol'; }
		if ($columns == 7) { $value = 'mg-sevencol'; }
		if ($columns == 8) { $value = 'mg-eightcol'; }
		if ($columns == 9) { $value = 'mg-ninecol'; }
		if ($columns == 10) { $value = 'mg-tencol'; }
		
		return $value;
	}
	
	public function get_thumb_image_class() {
		$value = $this->get_post_meta($this->thumb_image_class_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_thumb_image_class_default();
		}
		
		return $value;
	}
	
	public function get_thumb_image_class_default() {
		return get_option($this->thumb_image_class_default_key, $this->thumb_image_class_default);
	}
	
	public function get_thumb_image_container_class() {
		$value = $this->get_post_meta($this->thumb_image_container_class_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_thumb_image_container_class_default();
		}
		
		return $value;
	}
	
	public function get_thumb_image_container_class_default() {
		return get_option($this->thumb_image_container_class_default_key, $this->thumb_image_container_class_default);
	}
	
	public function get_thumb_image_rel_attribute() {
		$value = $this->get_post_meta($this->thumb_image_rel_attribute_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_thumb_image_rel_attribute_default();
		}
		
		return $value;
	}
	
	public function get_thumb_image_rel_attribute_default() {
		return get_option($this->thumb_image_rel_attribute_default_key, $this->thumb_image_rel_attribute_default);
	}
	
	public function get_thumb_shape() {
		$value = $this->get_post_meta($this->thumb_shape_key);
		if ($value == '' && $this->get_saves_count() < 1) {
			$value = $this->get_thumb_shape_default();
		}
		
		return $value;
	}
	
	public function get_thumb_shape_default() {
		return get_option($this->thumb_shape_default_key, $this->thumb_shape_default);
	}
	
	public function save_options($options = null) {
		if ($this->get_template() == 'video-tiles') {
			$options = $this->get_options();
			parent::save_options($options);
			$this->genearte_style_sheet();
		}
	}
	
	private function get_options() {
		return array(
			$this->skin_key,
			$this->thumb_caption_enabled_key,
			$this->thumb_caption_position_key,
			$this->thumb_click_key,
			$this->thumb_click_new_window_key,
			$this->thumb_columns_key,
			$this->thumb_image_class_key,
			$this->thumb_image_container_class_key,
			$this->thumb_image_rel_attribute_key,
			$this->thumb_shape_key,
			$this->videos_per_page_key,
      $this->vertical_fit_enabled_key,
      $this->escape_key_enabled_key,
      $this->align_top_enabled_key,
      $this->hide_close_btn_enabled_key,
      $this->bg_click_close_enabled_key,
      $this->fixed_content_position_key,
      $this->overflow_y_key,
      $this->removal_delay_key,
      $this->main_class_key,
      $this->gallery_enabled_key,
      $this->arrow_markup_key,
      $this->prev_button_title_key,
      $this->next_button_title_key,
      $this->counter_markup_key,
      $this->sort_order_key,
      $this->dfactory_lightbox_key,
			$this->ns_show_border_key,
			$this->ns_border_thickness_key,
			$this->ns_border_color_key,
			$this->ns_border_radius_key,
			$this->ns_shadow_key,
			$this->ns_shadow_blur_key,
			$this->ns_shadow_color_key,
			$this->ns_shadow_spread_key,
			$this->ns_lightbox_close_key,
			$this->ns_lightbox_arrow_key
		);
	}
	
	private function genearte_style_sheet() {
		
ob_start( );
?>
		
#maxgallery-<?php echo $this->gallery_id; ?>.mg-video-tiles .mg-thumbs .caption-bottom-container {
	position: absolute !important;
	bottom: 0px !important;
	left: 0px !important;
	width: 100% !important;
	background: rgba(0, 0, 0, 0.7) !important;
	border: none !important;
	padding: 0px !important;
}
#maxgallery-<?php echo $this->gallery_id; ?>.mg-video-tiles .mg-thumbs .caption.bottom {
	padding: 2px 4px 2px 4px !important;
	margin: 0px !important;
	color: #ffffff !important;
	text-shadow: 1px 1px 0px #000000 !important;
}
#maxgallery-<?php echo $this->gallery_id; ?>.mg-video-tiles .mg-thumbs .caption.below {
	padding: 2px 4px 2px 4px !important;
	margin: -10px 0px 10px 0px !important;
}
#maxgallery-<?php echo $this->gallery_id; ?>.mg-video-tiles .mg-thumbs ul li div {
	margin-top: 10px !important;
	margin-bottom: 10px !important;
	padding: 3% !important;
}
#maxgallery-<?php echo $this->gallery_id; ?>.mg-video-tiles .mg-thumbs ul li div:hover {
	box-shadow: 0px 0px 5px #b1b1b1 !important;
	-moz-box-shadow: 0px 0px 5px #b1b1b1 !important;
	-webkit-box-shadow: 0px 0px 5px #b1b1b1 !important;
}

button.mfp-close {
    z-index: 1046;
}

.mfp-close {
    font-size: 0;
    height: 40px;
    line-height: 44px;
    opacity: 1.0;
    position: absolute;
    right: 0 !important;
    text-align: center;
    text-decoration: none;
    top: 0;
    width: 40px !important;
}

<?php
    $gallery_style = ob_get_clean( );		

		
		$mg_styles_dir = get_option('maxgalleira-styles-path', '');
		$mg_styles_url = get_option('maxgalleira-styles-url', '');
    

		if($mg_styles_dir == '') {
			$mg_styles_dir = ABSPATH . DIRECTORY_SEPARATOR . "wp-content" . DIRECTORY_SEPARATOR . "mg-styles";
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
		
		$selector = "#maxgallery-{$this->gallery_id}.mg-video-tiles ul li a div img";

		$gallery_style .= PHP_EOL;		
		$gallery_style .= "$selector {" . PHP_EOL;
		
		if($this->get_show_border() != 'on' ) {
			$gallery_style .= "  border: 0 none !important;" . PHP_EOL;
    } else {
		
			$thickness = $this->get_border_thickness();
			switch ($thickness) {				
				case '1':
					$gallery_style .= "  border: 1px solid !important;" . PHP_EOL;								
					break;				
				case '3':
					$gallery_style .= "  border: 3px solid !important;" . PHP_EOL;								
					break;
				case '5':
					$gallery_style .= "  border: 5px solid !important;" . PHP_EOL;								
					break;
				case '7':
					$gallery_style .= "  border: 7px solid !important;" . PHP_EOL;								
					break;
				case '9':
					$gallery_style .= "  border: 9px solid !important;" . PHP_EOL;								
					break;
				case '15':
					$gallery_style .= "  border: 15px solid !important;" . PHP_EOL;								
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
					
			$border_color = $this->get_border_color();
			$border_radius = $this->get_border_radius();
		
			$gallery_style .= "  border-radius: {$border_radius}px !important;" . PHP_EOL;	
			$gallery_style .= "  border-color: $border_color !important;" . PHP_EOL;
			
			if($shadow_type !== 'none' ) {
				$gallery_style .= $wk . PHP_EOL;
				$gallery_style .= $moz . PHP_EOL;
				$gallery_style .= $box_shadow . PHP_EOL;
			}
			
    }  
    $gallery_style .= "}" . PHP_EOL;
			
    $close_icon = $this->get_lightbox_close();
    if($close_icon !== 0) {

      $close_image = "close-style-{$close_icon}-wt.png";

      $gallery_style .= "button.mfp-close {" . PHP_EOL;	
      $gallery_style .= "  background: url(\"". MAXGALLERIA_PLUGIN_URL . "/images/icons/$close_image\")	no-repeat scroll center center transparent !important;" . PHP_EOL;								
      $gallery_style .= "}" . PHP_EOL;
    }

    $arrow_style = $this->get_lightbox_arrow();

    if($arrow_style !== 0 ) {

      $left_arrow = "arrow-style-{$arrow_style}l-wt.png";
      $right_arrow = "arrow-style-{$arrow_style}r-wt.png";

      $gallery_style .= ".mfp-arrow-left::before, .mfp-arrow-left .mfp-b," . PHP_EOL;
      $gallery_style .= ".mfp-arrow-right::before, .mfp-arrow-right .mfp-b {" . PHP_EOL;
      $gallery_style .= "	border: 0 none;" . PHP_EOL;
      $gallery_style .= "}" . PHP_EOL;

      $gallery_style .= ".mfp-arrow-left::after, .mfp-arrow-left .mfp-a," . PHP_EOL;
      $gallery_style .= ".mfp-arrow-right::after, .mfp-arrow-right .mfp-a {" . PHP_EOL;
      $gallery_style .= "	border: 0 none;	" . PHP_EOL;
      $gallery_style .= "}" . PHP_EOL;

      $gallery_style .= "button.mfp-arrow.mfp-arrow-left {" . PHP_EOL;
      $gallery_style .= "  background: url(\"". MAXGALLERIA_PLUGIN_URL . "/images/icons/$left_arrow\")	no-repeat scroll center center transparent !important;" . PHP_EOL;								
      $gallery_style .= "}" . PHP_EOL;

      $gallery_style .= "button.mfp-arrow.mfp-arrow-right {" . PHP_EOL;
      $gallery_style .= "  background: url(\"". MAXGALLERIA_PLUGIN_URL . "/images/icons/$right_arrow\")	no-repeat scroll center center transparent !important;" . PHP_EOL;								
      $gallery_style .= "}" . PHP_EOL;

    }

    if($arrow_style != '0' || $this->get_skin() !== 'borderless' ) {
      if(file_put_contents($mg_style_file, $gallery_style )) {
        update_post_meta($this->gallery_id, "mg-css-file", $mg_style_css_url );
      }
    }	else {
      // delete the file
      if(file_exists($mg_style_file))
        unlink($mg_style_file);
    }												
									
		//}	
						
	}
	
}
?>