<?php ob_start();

//Load Composer's autoloader
require './vendor/autoload.php';
?>

<div class="container contact-container">
    <div class="row-100 justify-content-center align-items-center contact-div">
        <div class="col-12 contact-div-div">
            <form method="POST" action="?controller=ContactController&action=sendMessage" id="contactForm" name="contactForm" class="contactForm">
                <h3 class="mb-4 contact_us_h3">
                    Nous contacter
                </h3>
                <label class="label" for="name">Nom et Prénom</label>
                <div class="form-group-contact">
                    <input type="text" class="form-control" name="name" required="required" id="name" placeholder="Nom et Prénom">
                    <i class="fas fa-check-circle" id="successName"></i>
                    <i class="fas fa-exclamation-circle" id="errorName"></i>
                    <small>Invalide</small>
                </div>
                <label class="label" for="email">Email</label>
                <div class="form-group-contact">
                    <input type="email" class="form-control" name="email" required="required" id="email" placeholder="Email">
                    <i class="fas fa-check-circle" id="successMail"></i>
                    <i class="fas fa-exclamation-circle" id="errorMail"></i>
                    <small>Invalide</small>
                </div>
                <label class="label" for="subject">Titre</label>
                <div class="form-group-contact">
                    <input type="text" class="form-control" name="subject" required="required" id="subject" placeholder="Titre">
                    <i class="fas fa-check-circle" id="successSubject"></i>
                    <i class="fas fa-exclamation-circle" id="errorSubject"></i>
                    <small>Invalide</small>
                </div>
                <label class="label" for="#">Message</label>
                <div class="form-group">
                    <textarea name="content" class="form-control" id="content" cols="30" rows="4" placeholder="Message"></textarea>
                </div>
                <button class="btn btn-primary contact-btn">
                    Envoyer
                </button>
                <!-- <input type="submit" value="Send Message" class="btn btn-primary">
                        <div class="submitting"></div> -->
            </form>
        </div>
    </div>
</div>


<!-- JS -->
<script src="../../public/js/validationForm.js"></script>

<?php $content = ob_get_clean(); ?>
<!-- Vue require -->
<?php require_once('template.php'); ?>