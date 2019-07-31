<?php 

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
        <h6>This Pug Would Be Da Belle of Da Ball</h6>
    </a>
    <a href="#">
        <p class="m-0">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac
        turpis
        egestas. <span class="blue-link">Learn More</span></p>
    </a>
    </div>
</div>';
 
    if ( is_page( 'faq' ) || is_page( 'about-us' ) || is_single() && ! is_admin() ) {
        return prefix_insert_after_paragraph( $ad_code, 8, $content );
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
