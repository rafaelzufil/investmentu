<main>
  <div class="container">
    <div class="row mt-4">
      <div class="col-8">
        <div class="row">
        <?php
        $auth_id = get_the_author_meta('ID');
        ?>
          <div class="col-12">
            <h1 class="page-title"><?php echo get_the_author_meta( 'display_name'); ?></h1>
            <!-- <h5 class="expert-title"><?php //echo types_render_usermeta("author-title"); ?></h5> -->
            <h5 class="expert-title"><?php the_field('author_title', 'user_' . $auth_id); ?></h5>
          </div>
        </div>
        <div class="category-paragraph-description py-3 ">
          <div class="exp-headshot float-right ml-3 mb-3"><img src="<?php the_field('author_headshot', 'user_' . $auth_id); ?>" ></div> 
          <p><?php the_field('author_description', 'user_' . $auth_id); ?></p>
        </div>
        <h5>Articles by <a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn p-black"><?= get_the_author(); ?></a></h5>
        
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>        
              <div class="articlePreview container">
                  <div class="row row-eq-height">
                      <div class="col-4">
                          <?php $date = get_the_date(); ?>
                          <a href="<?php the_permalink(); ?>">
                            <?php if ( has_post_thumbnail() ) { ?>
                                <img src="<?php the_post_thumbnail_url(); ?>" class="img-fluid">
                            <?php } else { ?>
                                <img src="<?php bloginfo('template_directory'); ?>/assets/images/iu-default-image.jpg" class="img-fluid" alt="<?php the_title(); ?>" />
                            <?php } ?>
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

      </div>
      <!-- SIDEBAR -->
      <?php get_template_part('partials/sidebar'); ?>
    </div>
  </div>
</main>
