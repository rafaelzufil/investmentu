<main>
  <div class="container">
    <div class="row mt-4">
      <div class="col-8">
        <div class="row">
          <div class="col-12">
            <h3 class="page-title"><?php echo get_the_author_meta( 'display_name' ); ?></h3>
            <h5 class="expert-title"><?php echo types_render_usermeta("author-title"); ?></h5>
          </div>
        </div>
        <div class="category-paragraph-description pt-4">
          <div class="exp-headshot float-right ml-3 mb-3"><?php echo types_render_usermeta("author-headshot"); ?></div> 
          <p><?php echo types_render_usermeta("author-description"); ?></p>
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
