<?php ob_start(); ?>

<div class="container">
    <div class="row registrer-content-div">
        <div class="col-12 registrer-content">

            <div class="col-12 text-center">
                <h1 class="titleRegistrer">Inscription</h1>
            </div>
            <div class="form-registrer" id="registrer">
                <form action="?controller=UserController&action=registerAction" method="POST" class="col-9">
                    <div class="form-group">
                        <label>Pseudo :</label>
                        <input id="pseudoRegistrer" type="pseudo" name="username" class="form-control" placeholder="entrez votre pseudo">
                        <i class="fas fa-check-circle formSuccess" id="successName"></i>
                        <i class="fas fa-exclamation-circle formError" id="errorName"></i>
                        <small class="smallErrorIndication">Invalide</small>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label>Prénom :</label>
                        <input id="firstnameRegistrer" type="firstname" name="firstname" class="form-control" placeholder="entrez votre prénom">
                        <i class="fas fa-check-circle formSuccess" id="successName"></i>
                        <i class="fas fa-exclamation-circle formError" id="errorName"></i>
                        <small class="smallErrorIndication">Invalide</small>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label>Nom :</label>
                        <input id="lastnameRegistrer" type="lastename" name="lastname" class="form-control" placeholder="entrez votre nom">
                        <i class="fas fa-check-circle formSuccess" id="successName"></i>
                        <i class="fas fa-exclamation-circle formError" id="errorName"></i>
                        <small class="smallErrorIndication">Invalide</small>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label>Mot de passe :</label>
                        <input id="passwordRegistrer" type="password" name="password" placeholder="minimum 8 caractères au moins une lettre minuscule, une lettre majuscule, un chiffre, un caractère spéciale" class="form-control">
                        <i class="fas fa-check-circle formSuccess" id="successName"></i>
                        <i class="fas fa-exclamation-circle formError" id="errorName"></i>
                        <small class="smallErrorIndication">Invalide : minimum 8 caractères au moins une lettre minuscule, une lettre majuscule, un chiffre, un caractère spéciale</small>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label>Confirmez le mot de passe :</label>
                        <input id="checkPasswordRegistrer" type="password" name="password_confirm" placeholder="minimum 8 caractères au moins une lettre majuscule, une lettre minuscule, un chiffre, un caractère spéciale" class="form-control">
                        <i class="fas fa-check-circle formSuccess" id="successName"></i>
                        <i class="fas fa-exclamation-circle formError" id="errorName"></i>
                        <small class="smallErrorIndication">Les mots de passe ne correspondent pas</small>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label>Email :</label>
                        <input id="mailRegistrer" type="email" name="email" placeholder="exemple@hotmail.fr" class="form-control" >
                        <i class="fas fa-check-circle formSuccess" id="successMail"></i>
                        <i class="fas fa-exclamation-circle formError" id="errorMail"></i>
                        <small class="smallErrorIndication">Invalide</small>
                    </div>
                    <div class="registrer-checkbox">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                        <label class="form-check-label" for="flexCheckDefault">
                            J'autorise ce site à concerver mes données personnelles transmises via ce formulaire.
                            Aucune exploitation commerciale ne sera faite des données concervées.
                            Voir notre <a href="?controller=ContactController&action=showRgpdView">politique de gestion des données personnelles.</a>
                        </label>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary registrer-btn">M'inscrire</button>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- JS -->
<script src="../../public/js/validationForm.js"></script>

<?php $content = ob_get_clean(); ?>

<!-- Vue require -->
<?php require_once('template.php'); ?>