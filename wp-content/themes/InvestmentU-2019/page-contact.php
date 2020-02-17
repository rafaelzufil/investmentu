
    <?php if ( function_exists( 'is_amp_endpoint' ) && !is_amp_endpoint() ):  ?>
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
    <?php else: ?>
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
                        <form action-xhr="<?php get_template_directory_uri() . '/amp-contact-form.php'?>" class="js-contact-form contactUs margin-top" method="post" id="contact_us_form" name="SimpleSignUp" role="form" target="_top">
                            <input type="text" name="email" class="form-control form-control-lg" placeholder="Email" required="">
                            <input type="text" name="first_name" class="form-control form-control-lg" placeholder="First Name and Last Name" required="">
                            <input type="text" name="phone" class="form-control form-control-lg" placeholder="Phone Number">
                            <select name="request_type" class="form-control form-control-lg">
                                <option value="">Reason for Contacting</option>
                                <option value="Email Problems">Email not Received</option>
                                <option value="Login Problems">Login Problems</option>
                                <option value="Customer Maintenance">Update Email Address</option>
                                <option value="Editorial Comments">Feedback to the Editor</option>
                                <option value="Miscellaneous">Other</option>
                                <option value="Unsubscribe">Remove Me From Email List</option>
                                <option value="Subscription Cancellation Request">Subscription Cancellation Request</option>
                                <option value="Auto Renew / Maintenance Fee Cancellation Request">Auto Renew / Maintenance Fee Cancellation Request</option>
                            </select>
                            <textarea name="message" placeholder="Questions/Comments" class="form-control form-control-lg" rows="4" cols="50"></textarea>
                            <input type="hidden" name="website" value="customerservice@profittrends.com">
                            <input type="hidden" name="redirect_url" value="">
                            <button type="submit" class="btn navy-button">Send Now</button>
                            <div class="amp-form-message">
                                <div submit-success>
                                    <template type="amp-mustache">
                                        Thanks for reaching out.
                                        We will get in touch with you shortly.
                                    </template>
                                </div>
                                <div submit-error>
                                    <template type="amp-mustache">
                                        Error while submitting the form.
                                        {{result}}
                                    </template>
                                </div>
                            </div>
                        </form>
                    </article>
                    </div>
                </div>
                </div>
            </div>
            </div>

        </main>
        <?php endwhile; ?>
    <?php endif; ?>
