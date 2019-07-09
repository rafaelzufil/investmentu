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
    $date = get_the_date();
    $output .= '<div class="col-12 col-sm-6 col-lg-3 my-3">
                  <a href="'. get_the_permalink() .'">
                    <img src="'. get_the_post_thumbnail_url() .'" class="small-featured-article-image img-fluid">
                  </a>
                  <div class="small-featured-article-excerpt">
                    <a href="'. esc_url(home_url()) .'/'.  $category[0]->slug .'/">
                      <span class="category-tag">'. $category[0]->cat_name .'</span>
                    </a>
                    <p class="date-posted m-0"> '. $date .' </p>
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
      $date = get_the_date();
      $output .= '<div class="col-12 col-sm-6 col-lg-3">
                    <a href="'. get_permalink( $authors_post->ID ) .'#">
                    <img src="'. $thumb .'" class="small-featured-article-image img-fluid">
                    </a>
                    <div class="small-featured-article-excerpt">
                    <a href="'. esc_url(home_url()) .'/'.  $category[0]->slug .'/">
                        <span class="category-tag">'. $category[0]->cat_name .'</span>
                    </a>
                    <p class="date-posted m-0"> '. $date .' </p>
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


//Insert ads after 10th paragraph of single post content.
 
add_filter( 'the_content', 'prefix_insert_post_ads' );
 
function prefix_insert_post_ads( $content ) {
     
    $ad_code = '<div class="article-native-ad row border-top border-bottom py-4 mb-4">
    <div class="col-5 col-lg-3">
    <a href="#">
        <img src="assets/img/princepug.jpg" class="small-featured-article-image img-fluid">
    </a>
    </div>
    <div class="col-7 col-lg-9 small-featured-article-excerpt">
    <a href="#">
        <span class="category-tag">Published Thru <em>Grey Circle News</em></span>
    </a>
    <a href="#">
        <h6>This Pug Would Be Da Belle of Da Ball</h6>
    </a>
    <p class="date-posted m-0">
        Posted June 12, 2019
    </p>
    <a href="#">
        <p class="m-0">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac
        turpis
        egestas. <span class="blue-link">Learn More</span></p>
    </a>
    </div>
</div>';
 
    if ( is_page( 'faq' ) || is_page( 'about-us' ) || is_single() && ! is_admin() ) {
        return prefix_insert_after_paragraph( $ad_code, 10, $content );
    }
     
    return $content;
}
  
// Parent Function that makes the magic happen
  
function prefix_insert_after_paragraph( $insertion, $paragraph_id, $content ) {
    $closing_p = '</p>';
    $paragraphs = explode( $closing_p, $content );
    foreach ($paragraphs as $index => $paragraph) {
 
        if ( trim( $paragraph ) ) {
            $paragraphs[$index] .= $closing_p;
        }
 
        if ( $paragraph_id == $index + 1 ) {
            $paragraphs[$index] .= $insertion;
        }
    }
     
    return implode( '', $paragraphs );
}


function create_post_type() {
	register_post_type( 'experts',
	 array(
        'labels' => array(
        'name' => __( 'Experts' ),
        'singular_name' => __( 'Expert' )
        ),
        'public' => true,
        'has_archive' => true,
      )
    );
    
}

add_action( 'init', 'create_post_type' );


/* Tmestamp for Homepage Articles */

    define( TIMEBEFORE_NOW,         'now' );
    define( TIMEBEFORE_MINUTE,      '{num} minute ago' );
    define( TIMEBEFORE_MINUTES,     '{num} minutes ago' );
    define( TIMEBEFORE_HOUR,        '{num} hour ago' );
    define( TIMEBEFORE_HOURS,       '{num} hours ago' );
    define( TIMEBEFORE_YESTERDAY,   'yesterday' );
    define( TIMEBEFORE_FORMAT,      '%e %b' );
    define( TIMEBEFORE_FORMAT_YEAR, '%e %b, %Y' );

    function time_ago( $time )
    {
        $out    = ''; // what we will print out
        $now    = time(); // current time
        $diff   = $now - $time; // difference between the current and the provided dates

        if( $diff < 60 ) // it happened now
            return TIMEBEFORE_NOW;

        elseif( $diff < 3600 ) // it happened X minutes ago
            return str_replace( '{num}', ( $out = round( $diff / 60 ) ), $out == 1 ? TIMEBEFORE_MINUTE : TIMEBEFORE_MINUTES );

        elseif( $diff < 3600 * 24 ) // it happened X hours ago
            return str_replace( '{num}', ( $out = round( $diff / 3600 ) ), $out == 1 ? TIMEBEFORE_HOUR : TIMEBEFORE_HOURS );

        elseif( $diff < 3600 * 24 * 2 ) // it happened yesterday
            return TIMEBEFORE_YESTERDAY;

        else // falling back on a usual date format as it happened later than yesterday
            return strftime( date( 'Y', $time ) == date( 'Y' ) ? TIMEBEFORE_FORMAT : TIMEBEFORE_FORMAT_YEAR, $time );
    }


/* Excerpt - Read More.. */
function excerpt_readmore($more) {
  return '... <a href="'. get_permalink($post->ID) . '" class="readmore"><em>' . 'Read More' . '</em></a>';
}
add_filter('excerpt_more', 'excerpt_readmore');
