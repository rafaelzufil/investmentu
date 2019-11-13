<!-- headshot carousel -->

<?php
    $args = array(
        'post_type' => 'page',
        'name' => 'homepage-experts-carousel',
        'posts_per_page' => 5
    );
    $the_query = new WP_Query ( $args );
?>

<div class="container py-4" id="section06">
    <h1 class="mb-3 small-title">Meet the Experts</h1>
    <div class="container text-center my-3">
        <div class="row mx-auto my-auto">
            <?php if (function_exists( 'is_amp_endpoint' ) && is_amp_endpoint()): ?>
                <div id="expertCarousel" class="carousel slide w-100" data-ride="carousel">
                    <amp-carousel class="carousel1"
                      layout="responsive"
                      height="260"
                      width="150"
                      type="slides">
                        <?php if( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                            <?php  if( have_rows('experts') ): ?>
                                <?php while(have_rows('experts')) : the_row(); ?>
                                    <div class="slide">
                                        <amp-img src="<?php the_sub_field('expert_headshot'); ?>"
                                            width="150"
                                            height="150"
                                            alt="<?php the_sub_field('expert_name'); ?>"></amp-img>
                                        <amp-fit-text width="150"
                                            height="100">
                                            <div class="title-wrapper">
                                                <a href="<?php the_sub_field('expert_page_link'); ?>" class="p-black">
                                                    <p class="mt-2"><strong><?php the_sub_field('expert_name'); ?></strong></p>
                                                </a>
                                                <p><a href="<?php the_sub_field('expert_page_link'); ?>" class="p-black"><?php the_sub_field('expert_title'); ?></a></p>
                                            </div>
                                        </amp-fit-text>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        <?php endwhile; endif; ?>
                    </amp-carousel>
                </div>
            <?php else: ?>
                <div id="expertCarousel" class="carousel slide w-100" data-ride="carousel">
                    <?php if( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <div class="carousel-inner w-100" role="listbox">
                            <?php $count = 0; ?>
                                <?php  if( have_rows('experts') ): ?>
                                    <?php while(have_rows('experts')) : the_row(); ?>
                                        <div class="carousel-item item <?php echo ($count == 0) ? 'active' : ''; ?>">
                                            <div class="col-lg-2">
                                                <div class="headshot-wrapper">
                                                    <a href="<?php the_sub_field('expert_page_link'); ?>" title="<?php the_sub_field('expert_name'); ?>" class="thumb">
                                                    <img class="img-fluid headshot" src="<?php the_sub_field('expert_headshot'); ?>" alt="<?php the_sub_field('expert_name'); ?>" data-ignore>
                                                    </a>
                                                </div>
                                                <div class="title-wrapper"><a href="<?php the_sub_field('expert_page_link'); ?>" class="p-black"><p class="mt-2"><strong><?php the_sub_field('expert_name'); ?></strong></a></p>
                                                <p><a href="<?php the_sub_field('expert_page_link'); ?>" class="p-black"> <?php the_sub_field('expert_title'); ?></a></p></div>
                                            </div>
                                        </div>
                                    <?php $count++; ?>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                        </div>
                    <?php endwhile; endif; ?>
                    <a class="carousel-control-prev w-auto" href="#expertCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next w-auto" href="#expertCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
