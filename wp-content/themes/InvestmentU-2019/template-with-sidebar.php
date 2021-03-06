<?php
/**
 * Template Name: Page with sidebar
 */
?>
<?php while (have_posts()) : the_post(); ?>
  <main>
    <div class="container">
      <div class="row mt-4">
        <div class="col-12 col-md-8">
          <div class="row">
            <div class="col-12">
              <article>
                <div class="article-header mb-3">
                  <h1 class="page-title "><?php the_title(); ?></h1>
                </div>
                <img src="<?php the_post_thumbnail_url(); ?>" class="float-right ml-3 mb-3 featured-image">
                <?php the_content(); ?>  
              </article>
            </div>
          </div>
          
        </div>
        <!-- SIDEBAR -->
        <?php get_template_part('partials/sidebar'); ?>
      </div>
    </div>

  </main>
<?php endwhile; ?>
