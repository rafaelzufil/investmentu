<div class="byline-container py-2">
    <?php 
        $auth_id = get_the_author_meta('ID'); 
        $headshot_url = get_field('author_headshot', 'user_' . $auth_id); 
    ?>
   
    <?php if(!empty($headshot_url)) { ?>
    <img src="<?php the_field('author_headshot', 'user_' . $auth_id); ?>" class="headshot article-headshot align-middle d-inline-block">
    <?php } ?>
    <div class="align-middle d-inline-block ml-1">
        <p class="byline m-0"><?= __('By', 'sage'); ?> <a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?= get_the_author(); ?></a></p>        
        <?php if ( get_post_meta( $post->ID, 'publication-source', true) !== "" ) {?>
            <p class="publication-source m-0"><em>Originally posted <time class="updated" datetime="<?= get_post_time('c', true); ?>"><?= get_the_date(); ?></time> on <?php echo get_post_meta( $post->ID, 'publication-source', true); ?></em>
            </p>
        <?php } else { ?>
            <p class="publication-source m-0"><em>Originally posted <time class="updated" datetime="<?= get_post_time('c', true); ?>"><?= get_the_date(); ?></time></em>
            </p>
        <?php } ?>
    </div>
</div>