<!-- 

homepage-spotlight

This template builds out a section under the homepage containing content from the Homepage Spotlight page. Its custom field group is set up to read specifically this page by Title, so don't change that!

 -->
<?php
    $args = array(
        'post_type' => 'page',
        'name' => 'homepage-spotlight',
        'posts_per_page' => '1'
    );
    $the_query = new WP_Query ( $args );
?>
<?php if( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
    <!-- <style>
		#spotlight {
            border: 1px solid #4e81c1;
            border-top: 15px solid #4e81c1;
		}

		#spotlight header img {
			width: 55px;
		}
        #spotlight h4 {
            font-size: 21px;
        }
        #spotlight h5 {
            font-size: 17px;
            color: #4e81c1;
        }
        #spotlight p {margin-bottom: .25rem}
        #spotlight a.btn {
            color: white;
            font-weight: 700;
        }
	</style> -->
	<section class="container mt-3">
        <div class="col-12 d-flex justify-content-between p-0" id="spotlight">
            <div class="align-items-start flex-column">
                <header class="mt-3 ml-3">
                    <div class="d-flex align-items-center">
                        <img class="mr-2" src="<?php the_field('spotlight_icon'); ?>">
                        <h4 class="m-0">
                            <?php the_field('spotlight_heading'); ?>
                        </h4>
                    </div>
                    <h5 class="mt-2">
                        <?php the_field('spotlight_subhead'); ?>
                    </h5>
                </header>
                <section class="my-3 ml-3">
                    <?php the_field('spotlight_copy'); ?>
                    <a class="btn btn-primary mt-2" target="_blank" href="<?php the_field('spotlight_button_url'); ?>">
                        <?php the_field('spotlight_button_text'); ?>
                    </a>
                </section>
            </div>
            
            <img src="<?php the_field('spotlight_image'); ?>" class="mr-3 mt-3 img-fluid">
        </div>
	</section>
<?php endwhile; endif; ?>