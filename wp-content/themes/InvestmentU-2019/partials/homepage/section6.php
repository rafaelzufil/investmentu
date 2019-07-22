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
<h3 class="mb-3 small-title">Meet the Experts</h3>
    <div class="container text-center my-3">
    <div class="row mx-auto my-auto">
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
                                            <img class="img-fluid headshot" src="<?php the_sub_field('expert_headshot'); ?>" alt="<?php the_sub_field('expert_name'); ?>">
                                            </a>
                                        </div>
                                        <div class="title-wrapper"><p class="mt-2"><strong><?php the_sub_field('expert_name'); ?></strong></p>
                                        <p> <?php the_sub_field('expert_title'); ?></p></div>
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
    </div>
</div>









</div>

