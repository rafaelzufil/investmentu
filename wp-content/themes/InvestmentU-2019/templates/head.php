<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php if (!(function_exists( 'is_amp_endpoint' ) && is_amp_endpoint())): ?>
        <link rel="stylesheet preconnect" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
              integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <?php endif; ?>

    <?php // TypeKit fonts (should be ok for AMP based pages as well as these custom fonts are whitelisted in AMP) ?>
    <link rel="stylesheet" href="https://use.typekit.net/svc8hdj.css">

    <?php // TODO: AMP: revise these styles ?>
    <style type="text/css">
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

    <?php if (is_gtm_enabled()): ?>
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
    <?php endif ?>

    <?php wp_head(); ?>
</head>
