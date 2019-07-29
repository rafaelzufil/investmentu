<?php $authorDescription = get_the_author_meta('description');
if ( ! empty ( $authorDescription ) ) {
?>
    <h6>About <a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn p-black"><?= get_the_author(); ?></a></h6>
    <p><?php echo get_the_author_meta('description'); ?></p>
    <h6>Like what you’re reading from <?= get_the_author(); ?>? Sign up for his eletter, <?php echo get_post_meta( $post->ID, 'publication-source', true); ?>.</h6>
<?php } else { ?>
    <h6>Like what you’re reading on Investment U? Sign up for our free e-letter</h6>
<?php } ?>
<div class="native-leadgen-signup">
    <form action="https://signupapp2.com/signupapp/signups/process" method="post" name="SimpleSignUp" data-toggle="validator" role="form" id="lead-gen" "="" >
    <div class="form-group row mx-auto my-3">
        <input type="text" class="form-control col-8">
        <button class="btn btn-block btn-primary form-control col-4" type="submit">Subscribe Now</button>
        <input name="signup.sourceId" type="hidden" value="X300V727">
          <input name="signup.listCode" type="hidden" value="INVESTME">
          <input name="signup.redirectUrl" id="redirectUrl" type="hidden" value="">
          <input name="signup.welcomeEmailTemplateName" type="hidden" value="">
    </div>
    </form>
</div>
