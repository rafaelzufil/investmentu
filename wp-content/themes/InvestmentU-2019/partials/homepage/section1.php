 <!-- top article previews section -->
 <!-- <p>Today's date <?php //echo date('F jS Y'); ?></p> -->
 <div class="container" id="section01">
    <div class="row my-4 row-eq-height">
 
        <?php
            $tdate = get_the_date();
            $ydate =  date("F j, Y", strtotime("yesterday"));
            $date = get_the_date();
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
                    <img src="<?php the_post_thumbnail_url(); ?>" class="big-featured-article-image img-fluid">
                </a>
            </div>
            
            <div class="col-12 col-md-6 col-lg-3 main-featured-article-excerpt">
                <?php $category = get_the_category(); ?>
                <a href="<?= esc_url(home_url('/')); ?>/<?php echo $category[0]->slug; ?>/">
                    <span class="category-tag"><?php echo $category[0]->cat_name; ?></span>
                    <p><?php 
                        // if($date == $tdate) {
                        //     echo human_time_diff(get_the_time('U'), current_time('timestamp') ) . ' ago';
                        // } elseif( $date == $ydate) {
                        //     echo 'Posted Yesterday';
                        // } else {
                        //     echo $date;
                        // }
                    ?></p>
                   <!-- <time><?php //time_ago( get_the_time( 'U' ) ); ?></time> -->
                </a>
                <a href="<?php the_permalink(); ?>">
                    <h4><?php the_title(); ?></h4>
                </a>
                <p><?php the_excerpt(); ?></p>
                
            </div>
        <?php
        $count = 1;
        }
        else
        { ?>
            <div class="col-12 col-md-4 col-lg-2 mb-3  mb-lg-0">
                <a href="<?php the_permalink(); ?>">
                <img src="<?php the_post_thumbnail_url(); ?>" class="small-featured-article-image img-fluid">
                </a>
                <div class="small-featured-article-excerpt">
                    <?php $category = get_the_category(); ?>
                    <a href="<?= esc_url(home_url('/')); ?>/<?php echo $category[0]->slug; ?>/">
                        <span class="category-tag"><?php echo $category[0]->cat_name; ?></span>
                    </a>
                    
                    <a href="<?php the_permalink(); ?>">
                        <h6><?php the_title(); ?></h6>
                    </a>
                </div>
            </div>
        <?php }
	    endwhile; endif; ?>	
    </div>
</div>