<?php ob_start();

//Load Composer's autoloader
require './vendor/autoload.php';
?>

<div class="container">
    <div class="contact-wrap w-100 p-md-5 p-4">
        <h3 class="mb-4 contact_us_h3">Contact Us</h3>

        <form method="POST" action="?controller=ContactController&action=sendMessage" id="contactForm" name="contactForm" class="contactForm">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="label" for="name">Nom Prénom</label>
                        <input type="text" class="form-control" name="name" required="required" id="name" placeholder="Nom et Prénom">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="label" for="email">Email</label>
                        <input type="email" class="form-control" name="email" required="required" id="email" placeholder="Email">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="label" for="subject">Titre</label>
                        <input type="text" class="form-control" name="subject" required="required" id="subject" placeholder="Titre">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="label" for="#">Message</label>
                        <textarea name="content" class="form-control" id="content" cols="30" rows="4" placeholder="Message"></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="submit" value="Send Message" class="btn btn-primary">
                        <div class="submitting"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<!-- Vue require -->
<?php require_once('template.php'); ?>