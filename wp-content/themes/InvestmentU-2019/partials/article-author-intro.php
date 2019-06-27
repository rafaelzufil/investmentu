<h6>About <a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn p-black"><?= get_the_author(); ?></a></h6>
<p><?php echo get_the_author_meta('description'); ?></p>
<div class="native-leadgen-signup">
    <h6>Like what you’re reading from Facey? Sign up for his eletter, Grey Circle News.</h6>
    <form>
    <div class="form-group row mx-auto my-3">
        <input type="text" class="form-control col-8">
        <button class="btn btn-block btn-primary form-control col-4" type="submit">Subscribe Now</button>
    </div>
    </form>
</div>