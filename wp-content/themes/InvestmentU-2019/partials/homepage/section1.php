 <!-- top article previews section -->
 <!-- <p>Today's date <?php //echo date('F jS Y'); ?></p> -->
 <div class="container" id="section01">
    <div class="row my-4 row-eq-height">
 
        <?php
           
            $count = 0;
            $the_query = new WP_Query(array(
                'post_type'=>'post', 
                'post_status'=>'publish', 
                'posts_per_page'=>4,
                'category__not_in' => array( 3275 ),
            )); 
            if( $the_query->have_posts() ):
            while ( $the_query->have_posts() ) : $the_query->the_post(); 
            if($count == 0) {
        ?>
            <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
                <a href="<?php the_permalink(); ?>">
                <?php if ( has_post_thumbnail() ) { ?>
                    <img src="<?php the_post_thumbnail_url(); ?>" class="big-featured-article-image img-fluid first-post">
                <?php } else { ?>
                    <img src="<?php bloginfo('template_directory'); ?>/assets/images/iu-default-image.jpg" class="big-featured-article-image img-fluid first-post" alt="<?php the_title(); ?>" />
                <?php } ?>
                </a>
            </div>
            
            <div class="col-12 col-md-6 col-lg-3 main-featured-article-excerpt">
                <?php $category = get_the_category(); ?>
                <a href="<?= esc_url(home_url('/')); ?>/category/<?php echo $category[0]->slug; ?>/">
                    <span class="category-tag generic-color category-<?php echo $category[0]->slug; ?>"><?php echo $category[0]->cat_name; ?></span>    
                </a>
                <a href="<?php the_permalink(); ?>">
                    <h4 class="mb-0"><?php the_title(); ?></h4>
                </a>
                 <?php get_template_part('partials/homepage/article-date'); ?>
                <div class="p-black e-margin"><?php print_excerpt(150); ?></div>
                <span><a href="<?php the_permalink(); ?>" class="readmore">Read More &raquo;</a></span>
                
                 
            </div>
        <?php
        $count = 1;
        }
        else
        { ?>
            <div class="col-12 col-md-4 col-lg-2 mb-3  mb-lg-0">
                <a href="<?php the_permalink(); ?>">
                <?php if ( has_post_thumbnail() ) { ?>
                    <img src="<?php the_post_thumbnail_url(); ?>" class="small-featured-article-image img-fluid">
                <?php } else { ?>
                    <img src="<?php bloginfo('template_directory'); ?>/assets/images/iu-default-image.jpg" class="small-featured-article-image img-fluid" alt="<?php the_title(); ?>" />
                <?php } ?>
                
                </a>
                <div class="small-featured-article-excerpt pt-2">
                    <?php $category = get_the_category(); ?>
                    <a href="<?= esc_url(home_url('/')); ?>/category/<?php echo $category[0]->slug; ?>/">
                        <span class="category-tag generic-color category-<?php echo $category[0]->slug; ?>"><?php echo $category[0]->cat_name; ?></span>
                    </a>
                    
                    <a href="<?php the_permalink(); ?>">
                        <h6 class="m-0"><?php the_title(); ?></h6>
                        <?php get_template_part('partials/homepage/article-date'); ?>
                    </a>
                </div>
            </div>
        <?php }
	    endwhile; endif; ?>	
    </div>
</div>