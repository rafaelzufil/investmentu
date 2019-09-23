<main>
    <div class="container">
        <div class="row mt-4">
            <div class="col-12 col-md-8">
                <h1 class="page-title"><?php single_cat_title(); ?></h1>
                <?php if ( have_posts() ) : $count = 0;?>
                <?php
                // The Loop
                while ( have_posts() ) : the_post(); ?>
                    <div class="articlePreview container">
                        <div class="row row-eq-height">
                            <div class="col-4">
                                <?php $date = get_the_date(); ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php if ( has_post_thumbnail() ) { ?>
                                        <img src="<?php the_post_thumbnail_url('medium'); ?>" class="img-fluid">
                                    <?php } else { ?>
                                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/iu-default-image.jpg" class="img-fluid" alt="<?php the_title(); ?>" />
                                    <?php } ?>
                                </a>
                            </div>
                            <div class="col-8 ">
                                <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
                                <p class="articleDate publication-source"><?php echo $date; ?></p>
                                <div class="article_preview d-none d-sm-block"><?php the_excerpt(); ?></div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; else: ?>
                <p>Sorry, no posts matched your criteria.</p>
                <?php endif; ?>
                <?php iu_pagination(); ?>
                <?php revive_display( 3 ); ?>
            </div>
            <!-- SIDEBAR -->
            <?php get_template_part('partials/sidebar'); ?>
        </div>
    </div>
  </main>
