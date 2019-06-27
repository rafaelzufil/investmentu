<!-- ?? grey banner section -->
<?php
    $args = array(
        'post_type' => 'page',
        'name' => 'homepage-categories',
        'posts_per_page' => '1'
    );
    $the_query = new WP_Query ( $args );
?>
<?php if( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
<div class="container-fluid py-4" id="section02">
    <div class="row">
        <div class="container">
            <div class="row">
                <?php  if( have_rows('categories') ): ?>
                <?php while(have_rows('categories')) : the_row(); ?>
                    <div class="col-12 col-md-4 pb-3 pb-md-0">
                        <div class="row">
                            <div class="col-3 col-md-12 col-lg-3 mb-md-2">
                                <a href="<?= esc_url(home_url('/')); ?>/<?php the_sub_field('category_slug'); ?>">
                                    <img src="<?php the_sub_field('category_icon'); ?>" class="img-fluid mx-auto d-block">
                                </a>
                            </div>
                            <div class="col-9 col-md-12 col-lg-9">
                                <a href="<?= esc_url(home_url('/')); ?>/<?php the_sub_field('category_slug'); ?>">
                                    <h6 class="text-left text-md-center text-lg-left"><?php the_sub_field('category_title'); ?></h6>
                                    <div class="p-black"><?php the_sub_field('category_exerpt'); ?></div>
                                </a>
                            </div>   
                        </div>
                    </div>
                <?php endwhile; endif; ?>
            </div>
        </div>
    </div>
</div>
<?php endwhile; endif; ?>