<?php while (have_posts()) : the_post(); ?>
  <main>
    <div class="container">
      <div class="row mt-4">
        <div class="col-12 col-md-8">
          <div class="row">
            <div class="col-12">
              <article>
                <div class="article-header mb-2">
                  <?php $category = get_the_category(); ?>
                  <a href="<?= esc_url(home_url('/')); ?>category/<?php echo $category[0]->slug; ?>/">
                    <span class="category-tag generic-color cat-<?php echo $category[0]->slug; ?>"><?php echo $category[0]->cat_name; ?></span>
                  </a>
                  <h1 class="page-title"><?php the_title(); ?></h1>
                  <?php get_template_part('templates/entry-meta'); ?>
                </div>
                <!-- <img src="<?php //the_post_thumbnail_url(); ?>" class="float-right ml-3 mb-3 featured-image"> -->
                <?php the_content(); ?>
                <!-- Lead gen ad for whichever franchise fits best -->  
                <?php // get_template_part('partials/article-mid-ad'); ?>
                <!-- Author Introduction -->
                <?php get_template_part('partials/article-author-ad'); ?>
              </article>
            </div>
          </div>
          <!-- Most recent articles by the same author -->
          <?php get_template_part('partials/experts-articles'); ?>
          <!-- Related Posts -->
          <?php get_template_part('partials/related-posts'); ?>
        </div>
        <!-- SIDEBAR -->
        <?php get_template_part('partials/sidebar'); ?>
      </div>
    </div>

  </main>
<?php endwhile; ?>
