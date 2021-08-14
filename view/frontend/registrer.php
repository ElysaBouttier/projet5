<?php ob_start(); ?>

<div class="container">
    <div class="row">
        <div class="col-12 registrer-content">

            <div class="col-12 text-center">
                <h1 class="titleRegistrer">Inscription</h1>
            </div>
            <br />
            <div class="form-registrer">
                <form action="?controller=UserController&action=registerAction" method="POST" class="col-9">
                    <div class="form-group">
                        <label>Pseudo :</label>
                        <input type="pseudo" name="username" class="form-control" placeholder="entrez votre pseudo" value="<?php if (isset($username)) {
                                                                                                                                echo $username;
                                                                                                                            } ?>">
                    </div>
                    <hr>
                    <div class="form-group">
                        <label>Prénom :</label>
                        <input type="firstname" name="firstname" class="form-control" placeholder="entrez votre prénom">
                    </div>
                    <hr>
                    <div class="form-group">
                        <label>Nom :</label>
                        <input type="lastename" name="lastname" class="form-control" placeholder="entrez votre nom" >
                    </div>
                    <hr>
                    <div class="form-group">
                        <label>Mot de passe :</label>
                        <input type="password" name="password" placeholder="minimum 8 caractères au moins une lettre minuscule, une lettre majuscule, un chiffre, un caractère spéciale" class="form-control">
                    </div>
                    <hr>
                    <div class="form-group">
                        <label>Confirmez le mot de passe :</label>
                        <input type="password" name="password_confirm" placeholder="minimum 8 caractères au moins une lettre majuscule, une lettre minuscule, un chiffre, un caractère spéciale" class="form-control">
                    </div>
                    <hr>
                    <div class="form-group">
                        <label>Email :</label>
                        <input type="email" name="email" placeholder="exemple@hotmail.fr" class="form-control" value="<?php if (isset($email)) {
                                                                                                                        } ?>">
                    </div>
                    <!-- <button type="button" class="btn btn-danger">Annuler</button> -->
                    <button type="submit" class="btn btn-primary">M'inscrire</button>
    
                </form>
            </div>
            

        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<!-- Vue require -->
<?php require_once('template.php'); ?>
