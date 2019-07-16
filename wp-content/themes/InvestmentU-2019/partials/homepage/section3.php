<!-- lower article previews section -->
<?php
    $the_query = new WP_Query(array(
        'post_type'=>'post', 
        'post_status'=>'publish', 
        'posts_per_page'=>3,
        'offset' => 4,
        'category__not_in' => array( 3275 ),
    )); 
    
?>
<div class="container" id="section03">
    <div class="row my-4 row-eq-height">
        <?php if( $the_query->have_posts() ): while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <div class="col-12 col-md-4 col-lg-3">
                <a href="<?php the_permalink(); ?>" class="featured-article-image" style="background-image: url(<?php the_post_thumbnail_url(); ?>)">
                </a>
                <a href="<?php the_permalink(); ?>">
                <img src="<?php the_post_thumbnail_url(); ?>" class="featured-article-image img-fluid">
                </a>
                <div class="featured-article-excerpt pt-2">
                    <?php $category = get_the_category(); ?>
                    <a href="<?= esc_url(home_url('/')); ?>category/<?php echo $category[0]->slug; ?>/">
                        <span class="category-tag <?php echo $category[0]->slug; ?>"><?php echo $category[0]->cat_name; ?></span>
                    </a>
                    <a href="<?php the_permalink(); ?>">
                        <h4 class="small-title m-0"><?php the_title(); ?></h4>
                        <?php get_template_part('partials/homepage/article-date'); ?>
                    </a>
                    <div class="p-black e-margin"><?php the_excerpt(); ?></div>
                    <span><a href="<?php the_permalink(); ?>" class="readmore">Read More &raquo;</a></span>
                </div>
            </div>
        <?php endwhile; endif; ?>	
        
        <?php get_template_part('partials/homepage/homepage-sidead'); ?>
    </div>
</div>
