<?php

// recent posts shortcode

function IU_recent_posts_shortcode($atts, $content = null) {
	
	global $post;
	
	extract(shortcode_atts(array(
		'cat'     => '',
		'num'     => '5',
		'offset'   => '0',
    
	), $atts));
	
	$args = array(
		'category_name'  => $cat,
		'posts_per_page' => $num,
		'offset'          => $offset,
	);
	
	$output = '';
	
	$posts = get_posts($args);
	
	foreach($posts as $post) {
		
		setup_postdata($post);
    $category = get_the_category();
    $date = get_the_date();
    $output .= '<div class="col-12 col-sm-6 col-lg-3 my-3">
                  <a href="'. get_the_permalink() .'">
                    <img src="'. get_the_post_thumbnail_url() .'" class="small-featured-article-image img-fluid">
                  </a>
                  <div class="small-featured-article-excerpt">
                    <a href="'. esc_url(home_url()) .'/'.  $category[0]->slug .'/">
                      <span class="category-tag">'. $category[0]->cat_name .'</span>
                    </a>
                    <a href="'. get_the_permalink() .'">
                      <h6>'. get_the_title() .'</h6>
                      <p class="date-posted m-0 category-tag"> '. $date .' </p>
                    </a>
                  </div>
                </div>
                ';
		
	}
	
	wp_reset_postdata();
	
	return '<div class="row my-2 row-eq-height category-article-preview-row">'. $output .'</div><a class="btn btn-block btn-primary form-control mx-auto" href=" ' . esc_url(home_url('/')) . 'category/dividend-stocks/" style="width:60%;">View More</a>';
	
}
add_shortcode('recent_posts', 'IU_recent_posts_shortcode');


// Top 4 posts shortcode

function IU_top_posts_shortcode($atts, $content = null) {
	
	global $post;
	
	extract(shortcode_atts(array(
		'cat'     => '',
		'num'     => '5',
        'offset'   => '0',
        'meta_key' => '_custom_post_order',
        'orderby' => 'meta_value',
        'order' => 'ASC' 
    
	), $atts));
	
	$args = array(
		'category_name'  => $cat,
		'posts_per_page' => $num,
        'offset'          => $offset,
        'meta_key' => $meta_key,
        'orderby' => $orderby,
        'order' => $order
	);
	
	$output = '';
	
	$posts = get_posts($args);
	
	foreach($posts as $post) {
		
		setup_postdata($post);
    $category = get_the_category();
    $date = get_the_date();
    $output .= '<div class="col-12 col-sm-6 col-lg-3 my-3">
                  <a href="'. get_the_permalink() .'">
                    <img src="'. get_the_post_thumbnail_url() .'" class="small-featured-article-image img-fluid">
                  </a>
                  <div class="small-featured-article-excerpt">
                    <a href="'. esc_url(home_url()) .'/'.  $category[0]->slug .'/">
                      <span class="category-tag">'. $category[0]->cat_name .'</span>
                    </a>
                    
                    <a href="'. get_the_permalink() .'">
                      <h6>'. get_the_title() .'</h6>
                      <p class="date-posted m-0 category-tag"> '. $date .' </p>
                    </a>
                  </div>
                </div>';
		
	}
	
	wp_reset_postdata();
	
	return '<div class="row my-2 row-eq-height category-article-preview-row">'. $output .'</div>';
	
}
add_shortcode('top_posts', 'IU_top_posts_shortcode');