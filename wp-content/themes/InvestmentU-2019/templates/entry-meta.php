<div class="byline-container py-2">
    <?php $headshot_url = get_wp_user_avatar_src(); ?>
    
    <?php if(strpos($headshot_url, "blank") == false) {?>
    <img src="<?php echo get_wp_user_avatar_src(); ?>" class="headshot article-headshot align-middle d-inline-block">
    <?php } ?>
    <div class="align-middle d-inline-block ml-1">
        <p class="byline m-0"><?= __('By', 'sage'); ?> <a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?= get_the_author(); ?></a></p>
        <p class="publication-source m-0"><em>Originally posted <time class="updated" datetime="<?= get_post_time('c', true); ?>"><?= get_the_date(); ?></time> on <?php echo get_post_meta( $post->ID, 'publication-source', true); ?></em>
        </p>
    </div>
</div>