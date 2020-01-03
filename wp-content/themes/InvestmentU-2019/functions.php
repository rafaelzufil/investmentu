
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
  //wp_enqueue_script('carl/js', 'https://carl.pubsvs.com/carl.js'  );
  wp_enqueue_script('validation-js', get_template_directory_uri() .'/assets/scripts/email-validation.js' );

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
     if ( !empty($thumb) ) {
        $thumb = get_the_post_thumbnail_url($authors_post->ID, 'post-thumbnail');
     } else { 
        $thumb = 'https://s3.amazonaws.com/assets.investmentu.com/iu-default-image.jpg';
     } 

    // $postdate = 
    $output .= '<div class="col-12 col-sm-6 col-lg-3">
    <a href="'. get_permalink( $authors_post->ID ) .'#">
    <img src="'. $thumb .'" class="small-featured-article-image img-fluid">
    </a>
    <div class="small-featured-article-excerpt">
    <a href="'. esc_url(home_url()) .'/category/'.  $category[0]->slug .'/">
    <span class="category-tag generic-color cat-'. $category[0]->slug . ' ">'. $category[0]->cat_name .'</span>
    </a>
    <h6><a href="' . get_permalink( $authors_post->ID ) . '">' . apply_filters( 'the_title', $authors_post->post_title, $authors_post->ID ) . '</a></h6>
    <p class="date-posted m-0 category-tag">' . get_the_date('F j, Y', $authors_post->ID) . '</p>

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



// Add img-fluid class to all images
function add_image_responsive_class($content) {
  global $post;
  $pattern ="/<img(.*?)class=\"(.*?)\"(.*?)>/i";
  $replacement = '<img$1class="$2 img-fluid"$3>';
  $content = preg_replace($pattern, $replacement, $content);
  return $content;
}
add_filter('the_content', 'add_image_responsive_class');

//Apply class to every paragraph that hold image
// add_filter( 'the_content', 'img_p_class_content_filter' ,20);
// function img_p_class_content_filter($content) {
//   // assuming you have created a page/post entitled 'debug'
//   $content = preg_replace("/(<p[^>]*)(\>.*)(\<img.*)(<\/p>)/im", "\$1 class='aligncenter'\$2\$3\$4", $content);

//   return $content;
// }

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
        if ($item['slug'] === 'zone-wealthy-retirement') {
          $zone = 11;
          break;
        }
        if ($item['slug'] === 'zone-liberty-through-wealth') {
          $zone = 12;
          break;
        }
        if ($item['slug'] === 'zone-early-investing') {
          $zone = 13;
          break;
        }
        if ($item['slug'] === 'zone-manward-press') {
          $zone = 14;
          break;
        }
        if ($item['slug'] === 'zone-trade-of-the-day') {
          $zone = 15;
          break;
        }
        if ($item['slug'] === 'zone-profit-trends') {
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

// Queue lytics-css file from S3
function enqueue_lytics_styles() {
  wp_register_style( 'lytics-css', 'https://s3.amazonaws.com/assets.oxfordclub.com/css/investmentu/lytics-styles.css' );
  wp_enqueue_style( 'lytics-css'); 
}

add_action( 'wp_enqueue_scripts', 'enqueue_lytics_styles' );