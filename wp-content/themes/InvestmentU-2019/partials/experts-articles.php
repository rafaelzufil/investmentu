<div class="row my-4 row-eq-height category-article-preview-row border-top pt-4">
    <div class="col-12">
        <h6><a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn p-black"><?= get_the_author(); ?></a>'s Top Articles</h6>
    </div>
    <?php echo get_related_author_posts(); ?>
    <!-- <div class="col-12 col-sm-6 col-lg-3">
        <a href="#">
        <img src="assets/img/beachparty.jpg" class="small-featured-article-image img-fluid">
        </a>
        <div class="small-featured-article-excerpt">
        <a href="#">
            <span class="category-tag">Category Tag</span>
        </a>
        <a href="#">
            <h6>Walking on the Beach Like Four Stock Photo Models</h6>
        </a>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-lg-3">
        <a href="#">
        <img src="assets/img/roomservice.jpg" class="small-featured-article-image img-fluid">
        </a>
        <div class="small-featured-article-excerpt">
        <a href="#">
            <span class="category-tag">Category Tag</span>
        </a>
        <a href="#">
            <h6>Hungover? Give Up and Order Room Service!</h6>
        </a>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-lg-3">
        <a href="#">
        <img src="assets/img/princepug.jpg" class="small-featured-article-image img-fluid">
        </a>
        <div class="small-featured-article-excerpt">
        <a href="#">
            <span class="category-tag">Category Tag</span>
        </a>
        <a href="#">
            <h6>This Pug Would Be Da Belle of Da Ball</h6>
        </a>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-lg-3">
        <a href="#">
        <img src="assets/img/beachparty.jpg" class="small-featured-article-image img-fluid">
        </a>
        <div class="small-featured-article-excerpt">
        <a href="#">
            <span class="category-tag">Category Tag</span>
        </a>
        <a href="#">
            <h6>Walking on the Beach Like Four Stock Photo Models</h6>
        </a>
        </div>
    </div> -->
</div>