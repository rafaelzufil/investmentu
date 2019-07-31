<?php
/**
 * Template Name: Intro category Template
 */
?>

<main>
    <div class="container">
      <div class="row mt-4 mb-5">
        <div class="col-12 col-md-8">
          <h1 class="page-title"><?php the_title(); ?></h1>
          <?php the_content(); ?>
          
        </div>
        <!-- SIDEBAR -->
        <?php get_template_part('partials/sidebar'); ?>
      </div>
      <?php get_template_part('partials/category-bottom-ad'); ?> <!-- Bottom Ad -->
    </div>

    
    <?php get_template_part('partials/homepage/section4'); ?> <!-- video section -->
    <?php get_template_part('partials/homepage/section5'); ?> <!-- other links section -->
    

  </main>