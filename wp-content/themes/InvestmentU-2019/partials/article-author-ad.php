<?php $authorDescription = get_the_author_meta('description');
if ( ! empty ( $authorDescription ) ) {
?>
    <h6>About <a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn p-black"><?= get_the_author(); ?></a></h6>
    <!-- <p><?php //echo get_the_author_meta('description'); ?></p> -->
    <p><?php echo types_render_usermeta("author-description"); ?></p>
    <!-- <h6>Like what you’re reading from <?php // get_the_author(); ?>? Sign up for his eletter, <?php // echo get_post_meta( $post->ID, 'publication-source', true); ?>.</h6> -->
<?php } else { ?>
    <!-- <h6>Like what you’re reading on Investment U? Sign up for our free e-letter</h6> -->
<?php } ?>
<div class="native-leadgen-signup">
  <?php revive_display( 17 ); ?>
</div>
