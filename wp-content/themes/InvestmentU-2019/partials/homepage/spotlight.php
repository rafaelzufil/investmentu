<!-- 
homepage-spotlight

This template builds out a section under the homepage containing content from the Homepage Spotlight page. Its custom field group is set up to read specifically this page by Title, so don't change that!
 -->
<?php
$args = array(
    'post_type' => 'page',
    'name' => 'homepage-spotlight',
    'posts_per_page' => '1'
);
$the_query = new WP_Query($args);
?>
<?php if (have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>
        <section class="container mt-3">
            <div class="d-none col-md-12 d-md-flex justify-content-between p-3 mt-5" id="spotlight">
                <div class="d-flex align-items-start flex-column">
                    <header class="mb-auto">
                        <div class="d-flex align-items-center">
                            <img class="mr-1" src="<?php the_field('spotlight_icon'); ?>">
                            <h4 class="m-0">
                                <?php the_field('spotlight_heading'); ?>
                            </h4>
                        </div>
                        <h5 class="mt-2">
                            <?php the_field('spotlight_subhead'); ?>
                        </h5>
                    </header>
                    <section class="d-flex align-items-start flex-column">
                        <div class="mb-auto">
                            <?php the_field('spotlight_copy'); ?>
                        </div>
                        <a class="btn btn-primary px-5 mt-3" target="_blank" href="<?php the_field('spotlight_button_url'); ?>">
                            <?php the_field('spotlight_button_text'); ?>
                        </a>
                    </section>
                </div>
                <div class="d-none d-lg-flex align-items-start justify-content-end">
                    <img src="<?php the_field('spotlight_image'); ?>" class="img-fluid spotlight-image">
                </div>
            </div>

            <div class="d-flex col-md-12 d-md-none p-0" id="spotlight-mobile">
                <div class="d-flex align-items-start flex-column">
                    <header class="mt-2 mx-2">
                        <div class="d-flex align-items-center">
                            <img class="mr-1" src="<?php the_field('spotlight_icon'); ?>">
                            <h4 class="m-0">
                                <?php the_field('spotlight_heading'); ?>
                            </h4>
                        </div>
                        <h5 class="mt-2">
                            <?php the_field('spotlight_subhead'); ?>
                        </h5>
                    </header>
                    <section class="mt-1 mb-2 mx-2">
                        <?php the_field('spotlight_copy'); ?>
                        <a class="btn btn-block btn-primary mt-2" target="_blank" href="<?php the_field('spotlight_button_url'); ?>">
                            <?php the_field('spotlight_button_text'); ?>
                        </a>
                    </section>
                </div>
            </div>

        </section>
<?php endwhile;
endif; ?>