<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php // Bootstrap 4.1.3 - for non-AMP pages ?>
    <?php if (!(function_exists( 'is_amp_endpoint' ) && is_amp_endpoint())): ?>
        <link rel="stylesheet preconnect" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
              integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <?php endif; ?>

    <?php // TypeKit fonts (should be ok for AMP based pages as well as these custom fonts are whitelisted in AMP) ?>
    <link rel="stylesheet" href="https://use.typekit.net/svc8hdj.css">

    <style type="text/css">
        <?php if (function_exists( 'is_amp_endpoint' ) && is_amp_endpoint()):
            // Bootstrap 4.1.3 for AMP pages (same version as the one for non-AMP pages, but loaded from the server
            include  $_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/InvestmentU-2019/assets/bootstrap-4.1.3/css/bootstrap.min.css';

            // main stylesheet
            include  $_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/InvestmentU-2019/assets/styles/main.css';
            ?>

            #sidebar-lead-gen-ad p {
                color: black;
            }

            #small-signup-form p {
                color: black !important;
            }

            .video-container a {
                text-decoration: none !important;
            }

            .video-container a:hover {
                color: #1F82C5 !important;
            }

            @media screen and (max-width: 991px) {
                .video-container {
                    padding: 0 0 30px 0 !important;
                }
            }
        <?php endif; ?>

        .container ins center a img {
            width: 100%
        }

        .search-form-wrapper {
            display: none;
            position: absolute;
            left: 0; right: 0;
            padding: 20px 15px;
            margin-top: 50px;
        }

        .search-form-wrapper.open {
            display: block;
        }

        <?php if (is_home()) { ?>
        .a2a_kit.a2a_kit_size_32.a2a_floating_style.a2a_default_style {
            display: none;
        }
        <?php } ?>
    </style>

    <?php wp_head(); ?>

    <?php if (function_exists( 'is_amp_endpoint' ) && is_amp_endpoint()): ?>
        <script async custom-element="amp-script" src="https://cdn.ampproject.org/v0/amp-script-0.1.js"></script>
        <script async custom-element="amp-carousel" src="https://cdn.ampproject.org/v0/amp-carousel-0.1.js"></script>
        <script async custom-element="amp-fit-text" src="https://cdn.ampproject.org/v0/amp-fit-text-0.1.js"></script>
        <script async custom-element="amp-selector" src="https://cdn.ampproject.org/v0/amp-selector-0.1.js"></script>
        <script async custom-element="amp-bind" src="https://cdn.ampproject.org/v0/amp-bind-0.1.js"></script>
        <script async custom-element="amp-lightbox-gallery" src="https://cdn.ampproject.org/v0/amp-lightbox-gallery-0.1.js"></script>
    <?php elseif (is_gtm_enabled()): ?>
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
            })(window, document, 'script', 'dataLayer', '<?php echo get_gtm_code() ?>');</script>
        <!-- End Google Tag Manager -->
    <?php endif; ?>
</head>