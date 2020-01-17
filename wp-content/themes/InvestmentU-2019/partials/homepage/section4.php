<!-- video section -->
<div class="container-fluid py-4" id="section04">
    <div class="row">
        <div class="container">
            <div class="row">
                <?php
                    $count = 0;
                    $the_query = new WP_Query(array(
                        'post_type'=>'post',
                        'post_status'=>'publish',
                        'posts_per_page'=>3,
                        'category_name' => 'video',
                        'meta_key' => '_custom_post_order',
                        'orderby' => 'meta_value_num',
                        'order' => 'DESC'
                    ));
                    if( $the_query->have_posts() ):
                    while ( $the_query->have_posts() ) : $the_query->the_post();
                    if($count == 0) {
                ?>
                <div class="col-12 col-lg-6">
                    <div class="video-container">
                        <?php
                            $wistia = get_field('video_wistia_code');
                            $youtube = get_field('youtube_link');
                        ?>
                        <?php if(!empty($wistia)) { ?>
                            <!-- Wistia Video -->
                            <?php if ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() ): ?>
                                <!-- <script async custom-element="amp-wistia-player" src="https://cdn.ampproject.org/v0/amp-wistia-player-0.1.js"></script>
                                <amp-wistia-player
                                    data-media-hashed-id="<?php echo $wistia; ?>"
                                    width="512" height="360" layout="responsive"></amp-wistia-player> -->
                            <?php else: ?>
                                <script src="https://fast.wistia.com/embed/medias/<?php echo $wistia; ?>.jsonp" async></script>
                                <script src="https://fast.wistia.com/assets/external/E-v1.js" async></script>
                                <div class="wistia_responsive_padding" style="position:relative;">
                                <div class="wistia_responsive_wrapper" style="height:100%;left:0;top:0;width:100%;">
                                <div class="wistia_embed wistia_async_<?php echo $wistia; ?> seo=false videoFoam=true" style="height:100%;position:relative;width:100%">
                                <div class="wistia_swatch" style="height:100%;left:0;opacity:0;overflow:hidden;position:absolute;top:0;transition:opacity 200ms;width:100%;">
                                <img src="https://fast.wistia.com/embed/medias/<?php echo $wistia; ?>/swatch" style="filter:blur(5px);height:100%;object-fit:contain;width:100%;" alt="" onload="this.parentNode.style.opacity=1;" />
                                </div></div></div></div>
                            <?php endif; ?>
                        <?php } elseif(!empty($youtube)) { ?>
                            <!-- Youtube Video -->
                            <object style="width:100%;height:300px; float: none; clear: both; margin: 0 auto;"
                                data="<?php echo $youtube; ?>"></object>
                        <?php } ?>
                        <a href="<?php the_permalink(); ?>"><h1 class="mt-3 p-black"><?php the_title(); ?></h1></a>
                    </div>
                </div>
                <?php
                $count = 1;
                }
                else
                { ?>
                <div class="col-12 col-sm-6 col-lg-3">
                    <a href="<?php the_permalink(); ?>">
                    <?php if ( has_post_thumbnail() ) { ?>
                        <img src="<?php the_post_thumbnail_url('medium'); ?>" class="featured-article-image img-fluid">
                    <?php } else { ?>
                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/iu-default-image.jpg" class="featured-article-image img-fluid" alt="<?php the_title(); ?>" />
                    <?php } ?>
                    </a>
                    <div class="featured-article-excerpt pt-2">
                        <?php $category = get_the_category(); ?>
                        <a href="<?= esc_url(home_url('/')); ?>category/<?php echo $category[0]->slug; ?>/">
                            <span class="category-tag generic-color cat-<?php echo $category[0]->slug; ?>"><?php echo $category[0]->cat_name; ?></span>
                        </a>
                        <a href="<?php the_permalink(); ?>">
                            <h4 class="small-title"><?php the_title(); ?></h4>
                        </a>
                        <div class="p-black e-margin"><?php the_excerpt(); ?></div>
                        <span><a href="<?php the_permalink(); ?>" class="readmore">Watch Now &raquo;</a></span>
                    </div>
                </div>

                <?php }
	    endwhile; endif; ?>
            </div>
        </div>
    </div>
</div>
