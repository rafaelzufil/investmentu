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
                    <span class="category-tag"><?php echo $category[0]->cat_name; ?></span>
                  </a>
                  <h3 class="page-title"><?php the_title(); ?></h3>
                  <?php get_template_part('templates/entry-meta'); ?>
                </div>
                <!-- <img src="<?php //the_post_thumbnail_url(); ?>" class="float-right ml-3 mb-3 featured-image"> -->
                <?php 
                    $wistia = get_field('video_wistia_code');
                    $youtube = get_field('youtube_link'); 
                ?>
                <?php if(!empty($wistia)) { ?>
                    <!-- Wistia Video -->
                    <script src="https://fast.wistia.com/embed/medias/<?php echo $wistia; ?>.jsonp" async></script>
                    <script src="https://fast.wistia.com/assets/external/E-v1.js" async></script>
                    <div class="wistia_responsive_padding" style="position:relative;">
                    <div class="wistia_responsive_wrapper" style="height:100%;left:0;top:0;width:100%;">
                    <div class="wistia_embed wistia_async_<?php echo $wistia; ?> seo=false videoFoam=true" style="height:100%;position:relative;width:100%">
                    <div class="wistia_swatch" style="height:100%;left:0;opacity:0;overflow:hidden;position:absolute;top:0;transition:opacity 200ms;width:100%;">
                    <img src="https://fast.wistia.com/embed/medias/<?php echo $wistia; ?>/swatch" style="filter:blur(5px);height:100%;object-fit:contain;width:100%;" alt="" onload="this.parentNode.style.opacity=1;" />
                    </div></div></div></div>
                <?php } elseif(!empty($youtube)) { ?>
                    <!-- Youtube Video -->
                    <object style="width:100%;height:420px; float: none; clear: both; margin: 0 auto;"
                        data="<?php echo $youtube; ?>"></object>
                <?php } ?>
                <?php the_content(); ?>
             <!-- Lead gen ad for whichever franchise fits best -->  
                <?php get_template_part('partials/article-mid-ad'); ?>
                <!-- Author Introduction -->
                <?php get_template_part('partials/article-author-intro'); ?>
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
