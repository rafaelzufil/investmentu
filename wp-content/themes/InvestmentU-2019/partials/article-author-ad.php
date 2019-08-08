<hr style="color:#bdbdbd"/>
<?php $authorDescription = get_the_author_meta('description');
?>
    <h6>About <a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn p-black"><?= get_the_author(); ?></a></h6>
    <p><?php echo types_render_usermeta("author-description"); ?></p>
    <!-- <h6>Like what you’re reading from <?php // get_the_author(); ?>? Sign up for his eletter, <?php // echo get_post_meta( $post->ID, 'publication-source', true); ?>.</h6> -->

<!-- <div class="native-leadgen-signup">
  <?php //revive_display( 17 ); ?>
</div> -->

<?php

$terms = json_decode(json_encode(get_the_tags()), true);
$i = 0;

if ($terms && !is_front_page()) {

  foreach ($terms as $item) {

    if (strpos($item['slug'], 'zone') !== false) {
      $is_syndicated = 'true';
      break;
    }
  }
}

if ($is_syndicated !== 'true')):

?>
  <div class="native-leadgen-signup">
    <?php revive_display( 17 ); ?>
  </div>

<?php else: ?>
  <div class="native-leadgen-signup">
    <?php revive_display( 3 ); ?>
  </div>
<?php endif; ?>
