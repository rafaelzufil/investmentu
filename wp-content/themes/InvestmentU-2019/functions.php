<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php', // Theme customizer
  'lib/pagination.php' // Pagination
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

function roots_scripts() {

  wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/assets/styles/slick-theme.css', false, '1');
  wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/assets/styles/slick.css', false, '1');
}
add_action('wp_enqueue_scripts', 'roots_scripts', 100);

/**
 * Bootstrap Navigation
 */
// Register Custom Navigation Walker
require_once get_template_directory() . '/wp-bootstrap-navwalker/class-wp-bootstrap-navwalker.php';


// Filter except length to 35 words.
// tn custom excerpt length
function tn_custom_excerpt_length( $length ) {
  return 10;
  }
  add_filter( 'excerpt_length', 'tn_custom_excerpt_length', 999 );


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
                    </a>
                  </div>
                </div>';
		
	}
	
	wp_reset_postdata();
	
	return '<div class="row my-2 row-eq-height category-article-preview-row">'. $output .'</div>';
	
}
add_shortcode('recent_posts', 'IU_recent_posts_shortcode');


// Authors Related articles

function get_related_author_posts() {
  global $authordata, $post;

  $authors_posts = get_posts( array( 'author' => $authordata->ID, 'post__not_in' => array( $post->ID ), 'posts_per_page' => 4 ) );

  foreach ( $authors_posts as $authors_post ) {
      $category = get_the_category($authors_post->ID);
      $thumb = get_the_post_thumbnail_url($authors_post->ID, 'post-thumbnail');
      $output .= '<div class="col-12 col-sm-6 col-lg-3">
                    <a href="'. get_permalink( $authors_post->ID ) .'#">
                    <img src="'. $thumb .'" class="small-featured-article-image img-fluid">
                    </a>
                    <div class="small-featured-article-excerpt">
                    <a href="'. esc_url(home_url()) .'/'.  $category[0]->slug .'/">
                        <span class="category-tag">'. $category[0]->cat_name .'</span>
                    </a>
                    <h6><a href="' . get_permalink( $authors_post->ID ) . '">' . apply_filters( 'the_title', $authors_post->post_title, $authors_post->ID ) . '</a></h6>
                    
                    </div>
                </div>';
  }
  return $output;
}


function custom_video_cat_template($single_template) {
  global $post;
    if ( in_category( 'video' )) {
       $single_template = dirname( __FILE__ ) . '/single-video.php';
  }
  return $single_template;
}
add_filter( "single_template", "custom_video_cat_template" ) ;