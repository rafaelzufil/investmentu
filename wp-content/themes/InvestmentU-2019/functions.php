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
  //'lib/ads.php',    // Article mid ad
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php', // Theme customizer
  'lib/pagination.php', // Pagination
  'lib/recent-posts.php' // category page recent posts

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
    <span class="category-tag generic-color cat-'. $category[0]->slug . ' ">'. $category[0]->cat_name .'</span>
    </a>
    <h6><a href="' . get_permalink( $authors_post->ID ) . '">' . apply_filters( 'the_title', $authors_post->post_title, $authors_post->ID ) . '</a></h6>
    <p class="date-posted m-0 category-tag">' . $date . '</p>

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


// /* Tmestamp for Homepage Articles */

//     define( TIMEBEFORE_NOW,         'now' );
//     define( TIMEBEFORE_MINUTE,      '{num} minute ago' );
//     define( TIMEBEFORE_MINUTES,     '{num} minutes ago' );
//     define( TIMEBEFORE_HOUR,        '{num} hour ago' );
//     define( TIMEBEFORE_HOURS,       '{num} hours ago' );
//     define( TIMEBEFORE_YESTERDAY,   'yesterday' );
//     define( TIMEBEFORE_FORMAT,      '%e %b' );
//     define( TIMEBEFORE_FORMAT_YEAR, '%e %b, %Y' );

//     function time_ago( $time )
//     {
//         $out    = ''; // what we will print out
//         $now    = time(); // current time
//         $diff   = $now - $time; // difference between the current and the provided dates

//         if( $diff < 60 ) // it happened now
//             return TIMEBEFORE_NOW;

//         elseif( $diff < 3600 ) // it happened X minutes ago
//             return str_replace( '{num}', ( $out = round( $diff / 60 ) ), $out == 1 ? TIMEBEFORE_MINUTE : TIMEBEFORE_MINUTES );

//         elseif( $diff < 3600 * 24 ) // it happened X hours ago
//             return str_replace( '{num}', ( $out = round( $diff / 3600 ) ), $out == 1 ? TIMEBEFORE_HOUR : TIMEBEFORE_HOURS );

//         elseif( $diff < 3600 * 24 * 2 ) // it happened yesterday
//             return TIMEBEFORE_YESTERDAY;

//         else // falling back on a usual date format as it happened later than yesterday
//             return strftime( date( 'Y', $time ) == date( 'Y' ) ? TIMEBEFORE_FORMAT : TIMEBEFORE_FORMAT_YEAR, $time );
//     }

// Add img-fluid class to all images
function add_image_responsive_class($content) {
  global $post;
  $pattern ="/<img(.*?)class=\"(.*?)\"(.*?)>/i";
  $replacement = '<img$1class="$2 img-fluid"$3>';
  $content = preg_replace($pattern, $replacement, $content);
  return $content;
}
add_filter('the_content', 'add_image_responsive_class');

// function custom_excerpt_length( $length ) {
//     return 20;
// }
// add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// Variable & intelligent excerpt length.
function print_excerpt($length) { // Max excerpt length. Length is set in characters
  global $post;
  $text = $post->post_excerpt;
  if ( '' == $text ) {
    $text = get_the_content('');
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]>', ']]>', $text);
  }
  $text = strip_shortcodes($text); // optional, recommended
  $text = strip_tags($text); // use ' $text = strip_tags($text,'&lt;p&gt;&lt;a&gt;'); ' if you want to keep some tags

  $text = substr($text,0,$length);
  $excerpt = reverse_strrchr($text, '.', 1);
  if( $excerpt ) {
    echo apply_filters('the_excerpt',$excerpt);
  } else {
    echo apply_filters('the_excerpt',$text);
  }
}

// Returns the portion of haystack which goes until the last occurrence of needle
function reverse_strrchr($haystack, $needle, $trail) {
  return strrpos($haystack, $needle) ? substr($haystack, 0, strrpos($haystack, $needle) + $trail) : false;
}

function revive_zone($location) {

  if ($location === 'sidebar') {
    $terms = json_decode(json_encode(get_the_tags()), true);
    $i = 0;

    if ($terms !== false) {

      foreach ($terms as $item) {
        if ($item['slug'] === 'zone: Wealthy Retirement') {
          $zone = 11;
          break;
        }
        if ($item['slug'] === 'zone: Liberty Through Wealth') {
          $zone = 12;
          break;
        }
        if ($item['slug'] === 'zone: Early Investing') {
          $zone = 13;
          break;
        }
        if ($item['slug'] === 'zone: Manward Press') {
          $zone = 14;
          break;
        }
        if ($item['slug'] === 'zone: Trade of the Day') {
          $zone = 15;
          break;
        }
        if ($item['slug'] === 'zone: Profit Trends') {
          $zone = 16;
          break;
        }
        $i++;
      };

    }

    if (!isset($zone)) {
      $zone = 4;
    }
    
  } else {

    $zone = $location;
  }

  return $zone;
}
