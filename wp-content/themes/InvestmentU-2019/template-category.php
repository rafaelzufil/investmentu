<?php
/**
 * Template Name: Intro category Template
 */
?>

<main>
    <div class="container">
      <div class="row mt-4">
        <div class="col-12 col-md-8">
          <h3 class="page-title"><?php the_title(); ?></h3>
          <div class="row">
                <?php
                    global $post;
                    $post_slug = $post->post_name;
                    
                    $the_query = new WP_Query(array(
                        'post_type'=>'post', 
                        'post_status'=>'publish', 
                        'posts_per_page'=>4,
                        'category_name' => $post_slug,
                        'meta_key' => '_custom_post_order',
                        'orderby' => 'meta_value',
                        'order' => 'ASC'
                    )); 
                    if( $the_query->have_posts() ):
                    while ( $the_query->have_posts() ) : $the_query->the_post(); 
                ?>
                <div class="col-12 col-sm-6 col-lg-3 mt-4">
                    <a href="<?php the_permalink(); ?>">
                        <img src="<?php the_post_thumbnail_url(); ?>" class="small-featured-article-image img-fluid">
                    </a>
                    <div class="featured-article-excerpt">
                        <?php $category = get_the_category(); ?>
                        <a href="<?= esc_url(home_url('/')); ?>category/<?php echo $category[0]->slug; ?>/">
                            <span class="category-tag"><?php echo $category[0]->cat_name; ?></span>
                        </a>
                        <a href="<?php the_permalink(); ?>">
                            <h6><?php the_title(); ?></h6>
                        </a>
                        
                    </div>
                </div>
                <?php endwhile; endif; ?>
            </div>
            <hr>
          <?php the_content(); ?>
          
        </div>
        <!-- SIDEBAR -->
        <?php get_template_part('partials/sidebar'); ?>
      </div>
    </div>

    <?php get_template_part('partials/homepage/section4'); ?> <!-- video section -->
    <?php get_template_part('partials/homepage/section5'); ?> <!-- other links section -->

  </main>