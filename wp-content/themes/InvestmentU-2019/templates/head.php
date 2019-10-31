<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet preconnect" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <?php // commented out this instance of jQuery since the default WordPress jQuery is also loaded ?>
    <!-- jQuery -->
    <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>-->

    <?php // commented out this instance of jQuery since the default WordPress jQuery is also loaded ?>
    <!--  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->

    <style type="text/css">
        .search-form-wrapper {
            display: none;
            position: absolute;
            left: 0;
            right: 0;
            padding: 20px 15px;
            margin-top: 50px;
        }

        .search-form-wrapper.open {
            display: block;
        }
    </style>

    <?php if (is_home()) { ?>
        <style>
            .a2a_kit.a2a_kit_size_32.a2a_floating_style.a2a_default_style {
                display: none;
            }
        </style>
    <?php } ?>

    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-W57MZD');</script>
    <!-- End Google Tag Manager -->

    <?php wp_head(); ?>

    <!-- TypeKit Fonts-->
    <link rel="stylesheet preconnect" href="https://use.typekit.net/svc8hdj.css">
    <script>
        try {
            Typekit.load({async: true});
        } catch (e) {}
    </script>

    <!-- Font Awesome -->
    <!-- <script src="https://kit.fontawesome.com/957989842b.js"></script> -->

    <?php
    // moved it here to make sure that this appears after the jQuery library is loaded!!!
    // more details here: https://digwp.com/2011/09/using-instead-of-jquery-in-wordpress/
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('[data-toggle=search-form]').click(function () {
                $('.navbar').toggleClass('mb-5');
                $('.search-form-wrapper').toggleClass('open');
                $('.search-form-wrapper .search').focus();
                $('html').toggleClass('search-form-open');
            });
            $('[data-toggle=search-form-close]').click(function () {
                $('.search-form-wrapper').removeClass('open');
                $('html').removeClass('search-form-open');
            });
            $('.search-form-wrapper .search').keypress(function (event) {
                if ($(this).val() == "Search") $(this).val("");
            });

            $('.search-close').click(function (event) {
                $('.search-form-wrapper').removeClass('open');
                $('html').removeClass('search-form-open');
            });
        });
    </script>
    <script>
        jQuery(document).ready(function ($) {
            $('p:has(img.aligncenter)').addClass('aligncenter');
        });
    </script>
</head>
