
    <?php while (have_posts()) : the_post(); ?>
    <main>
        <div class="container">
        <div class="row my-5">
            <div class="col-12 col-md-12">
            <div class="row">
                <div class="col-10 mx-auto">
                <article>
                    <div class="article-header mb-2">
                    <h1 class="page-title mb-4"><?php the_title(); ?></h1>
                    </div>
                    <?php the_content(); ?>
                    <div class="alert alert-secondary" id="alert" style="display: none;">
                        <h4>Thanks for reaching out.</h4>
                        <p>We will get in touch with you shortly.</p>
                    </div>
                    <form class="js-contact-form contactUs margin-top" id="contact_us_form"></form>
                </article>
                </div>
            </div>
            </div>
        </div>
        </div>

    </main>
    <?php endwhile; ?>

    <?php if ( function_exists( 'is_amp_endpoint' ) && !is_amp_endpoint() ):  ?>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

        <script type="text/javascript" src="<?php echo get_bloginfo('template_url') ?>/jquery.agora-contact-form.js"></script>

        <!--<link rel="stylesheet" type="text/css" href="//oxfordclub.com/apps/agora-contact-form/assets/js-contact-form.css">-->

        <script>
            function load_contact_form() {
                var contactform = new AgoraContactForm({
                    selector: '.js-contact-form',
                    action: 'https://oxfordclub.com/apps/agora-contact-form/',
                    redirect: '<?php echo home_url(); ?>/contact?contact=true',
                    email: 'customerservice@profittrends.com',
                    includeName: true,
                    includePhone: true,
                    requestTypes: {
                        'Reason for Contacting': '',
                        'Email not Received': 'Email Problems',
                        'Login Problems': 'Login Problems',
                        'Update Email Address': 'Customer Maintenance',
                        'Feedback to the Editor': 'Editorial Comments',
                        'Other': 'Miscellaneous',
                        'Remove Me From Email List': 'Unsubscribe',
                        'Subscription Cancellation Request':          'Subscription Cancellation Request',
                        'Auto Renew / Maintenance Fee Cancellation Request': 'Auto Renew / Maintenance Fee Cancellation Request',
                    }
                });
            }
            $(document).ready(function () {
                load_contact_form();
                if(window.location.href.indexOf('true') > -1) {
                    $('#alert').show();
                }
                var form = document.getElementById("contact_us_form");
                var email = form.elements.namedItem("email");
                email.required = true;
                var first_name = form.elements.namedItem("first_name");
                first_name.required = true;
                var last_name = form.elements.namedItem("last_name");
                last_name.required = true;
                var phone = form.elements.namedItem("phone");
                phone.required = true;
                var request_type = form.elements.namedItem("request_type");
                request_type.required = true;
                var message = form.elements.namedItem("message");
                message.required = true;
            });
        </script>
    <?php endif; ?>
