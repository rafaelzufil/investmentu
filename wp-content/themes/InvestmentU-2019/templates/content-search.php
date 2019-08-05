<article <?php post_class(); ?>>
  <div class="entry-summary">
    <?php //the_excerpt(); ?>
    <div class="articlePreview container">
        <div class="row row-eq-height">
            <div class="col-4">
                <?php $date = get_the_date(); ?>
                <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" class="img-fluid" alt="..." ></a>
            </div>
            <div class="col-8 ">
                <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
                <p class="articleDate publication-source"><?php echo $date; ?></p>
                <div class="article_preview d-none d-sm-block"><?php the_excerpt(); ?></div>
            </div>
        </div>
    </div> 
  </div>
</article>
