jQuery(document).ready(function() {
    
	jQuery("span.hidden-slick-slider-gallery-id").each(function() {
		var gallery_id = jQuery(this).html();
		var slider_autoplay = jQuery("#maxgallery-" + gallery_id + " span.hidden-slick-slider-autoplay").html();
		var slider_slideshow_speed = jQuery("#maxgallery-" + gallery_id + " span.hidden-slick-slider-slider-slideshow-speed").html();
		var slider_animation_speed = jQuery("#maxgallery-" + gallery_id + " span.hidden-image-slider-slider-animation-speed").html();
		var slider_dots = jQuery("#maxgallery-" + gallery_id + " span.hidden-slick-slider-dots").html();
		var slider_rtl = jQuery("#maxgallery-" + gallery_id + " span.hidden-slick-slider-rtl").html();
		var slider_infinite = jQuery("#maxgallery-" + gallery_id + " span.hidden-slick-slider-infinite").html();
		var slider_fade = jQuery("#maxgallery-" + gallery_id + " span.hidden-slick-slider-fade").html();
		var slider_arrows = jQuery("#maxgallery-" + gallery_id + " span.hidden-slick-slider-arrows").html();
		var slider_drag = jQuery("#maxgallery-" + gallery_id + " span.hidden-slick-slider-drag").html();
		var slider_hover_pause = jQuery("#maxgallery-" + gallery_id + " span.hidden-slick-slider-hover-pause").html();
		var slider_touch_move = jQuery("#maxgallery-" + gallery_id + " span.hidden-slick-slider-touch-move").html();
		var slider_adaptive_height = jQuery("#maxgallery-" + gallery_id + " span.hidden-slick-slider-adaptive-height").html();
		var slider_mobile_first = jQuery("#maxgallery-" + gallery_id + " span.hidden-slick-slider-mobile-first").html();
		var slider_initial_slide = jQuery("#maxgallery-" + gallery_id + " span.hidden-slick-slider-initial-slide").html();
		var slider_pause_on_dots_hover = jQuery("#maxgallery-" + gallery_id + " span.hidden-slick-slider-pause-on-dots-hover").html();   
		var slider_swipe = jQuery("#maxgallery-" + gallery_id + " span.hidden-slick-slider-swipe").html();   
		var slider_use_css = jQuery("#maxgallery-" + gallery_id + " span.hidden-slick-slider-use-css").html();   
		var slider_variable_width = jQuery("#maxgallery-" + gallery_id + " span.hidden-slick-slider-variable-width").html();   
		var slider_vertical = jQuery("#maxgallery-" + gallery_id + " span.hidden-slick-slider-vertical").html();   
		var slider_vertical_swiping = jQuery("#maxgallery-" + gallery_id + " span.hidden-slick-slider-vertical-swiping").html();   
		
		var slides_to_scroll = jQuery("#maxgallery-" + gallery_id + " span.hidden-image-slider-slides-to-scroll").html();
		var slides_to_show = jQuery("#maxgallery-" + gallery_id + " span.hidden-image-slider-slides-to-show").html();
		
                
    slider_arrows = (slider_arrows == 'true') ? true : false;
    slider_fade = (slider_fade == 'true') ? true : false;
    slider_infinite = (slider_infinite == 'true') ? true : false;
    slider_rtl = (slider_rtl == 'true') ? true : false;
    slider_dots = (slider_dots == 'true') ? true : false;
    slider_autoplay = (slider_autoplay == 'true') ? true : false;
    slider_drag = (slider_drag == 'true') ? true : false;
    slider_hover_pause = (slider_hover_pause == 'true') ? true : false;
    slider_touch_move = (slider_touch_move == 'true') ? true : false;
    slider_adaptive_height = (slider_adaptive_height == 'true') ? true : false;
    slider_mobile_first = (slider_mobile_first == 'true') ? true : false;
    slider_pause_on_dots_hover = (slider_pause_on_dots_hover == 'true') ? true : false;
    slider_swipe = (slider_swipe == 'true') ? true : false;
    slider_use_css = (slider_use_css == 'true') ? true : false;
    slider_variable_width = (slider_variable_width == 'true') ? true : false;
    slider_vertical = (slider_vertical == 'true') ? true : false;
    slider_vertical_swiping = (slider_vertical_swiping == 'true') ? true : false;       
		
		if(slider_initial_slide > 0)
			slider_initial_slide = slider_initial_slide - 1;
              
		jQuery("#maxgallery-" + gallery_id + ".mg-slick-carousel").slick({
      adaptiveHeight: slider_adaptive_height,
      arrows: slider_arrows,
      autoplay: slider_autoplay,
			autoplaySpeed: slider_slideshow_speed * 1000,
			dots: slider_dots,
			customPaging : function(slider, i) {
					var thumb = $(slider.$slides[i]).data("thumb");
					return "<a><img src='"+thumb+"'></a>";
			},			
      draggable: slider_drag,
      fade: slider_fade,
      infinite: slider_infinite,
      initialSlide: parseInt(slider_initial_slide),
      mobileFirst: slider_mobile_first,
      pauseOnHover: slider_hover_pause,
      pauseOnDotsHover: slider_pause_on_dots_hover,
      rtl: slider_rtl,
      slide: '.slick-slide',
      speed: slider_animation_speed * 1000,
      swipe: slider_swipe,
      touchMove: slider_touch_move,
      useCSS: slider_use_css,
      variableWidth: slider_variable_width,
      vertical: slider_vertical,
      verticalSwiping: slider_vertical_swiping,
			slidesToShow: slides_to_show,
//      prevArrow: '.prev',
//      nextArrow: '.next',
			slidesToScroll: slides_to_scroll
    });
	});
});
