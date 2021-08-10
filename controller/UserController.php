<?php
namespace Controller;

use App\Model\Message;
use App\Model\UserManager;


class UserController
{

    // registrer
    public function register($pseudo, $password, $email, $firstname, $lastname)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newMessage = new Message();

            if (!empty($_POST['pseudo']) && !empty($_POST['password']) && !empty($_POST['password_confirm']) 
            && !empty($_POST['email'])  && !empty($_POST['firstname']) && !empty($_POST['lastname'])) {

                // Check the pseudo lenght 
                $pseudoLength = strlen($pseudo);
                if ($pseudoLength <= 40) {

                    // Check email format
                    if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email)) {

                        // Check pseudo format
                        if (preg_match("#^[a-zA-Z0-9]+$#", $pseudo)) {
                            $newUserManager = new UserManager();
                            // $newUserManager->checkUserPseudo($pseudo);
                            $checkedUserPseudo = $GLOBALS['checkedUserPseudo'];
                            if ($checkedUserPseudo == 0) {
                                $newUserManager = new UserManager();
                                // $newUserManager->checkUserEmail($email);
                                $checkedUserEmail = $GLOBALS['checkedUserEmail'];

                                // Check password format
                                if ($checkedUserEmail == 0) {
                                    if ($_POST['password'] == $_POST['password_confirm']) {
                                        if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$#', $_POST['password'])) {
                                            
                                            // Check firstname format
                                            if (preg_match("#^[a-zA-Z]+$#", $firstname)) {

                                                // Check lastname format
                                                if (preg_match("#^[a-zA-Z]+$#", $lastname)) {
                                                    $pseudo = htmlspecialchars($pseudo);
                                                    $password = htmlspecialchars($password);
                                                    $email = htmlspecialchars($email);
                                                    $email = htmlspecialchars($firstname);
                                                    $email = htmlspecialchars($lastname);
                                                    // $newUserManager->addUser($pseudo, $password, $email);
                                                    $newMessage->setSuccess("<p>Compte crée avec succès ! 
                                                    <a href='?controller=AdminController&action=indexAction'>
                                                    Se connecter</a>
                                                    </p>");
                                                
                                                } else {
                                                    $newMessage->setError("<p>Prénom invalide !</p>");                                                    
                                                }
                                            } else {
                                                $newMessage->setError("<p>Prénom invalide !</p>");
                                            }        
                                        } else {
                                            $newMessage->setError("<p>Votre mot de passe doit contenir 8 caractères minimum dont <br/>
                                            au moins une lettre majuscule!<br/>
                                            au moins une lettre minuscule!<br/>
                                            au moins un chiffre!<br/>
                                            au moins un caractère spéciale!</p>");
                                        }
                                    } else {
                                        $newMessage->setError("<p>Vos mots de passe ne correspondent pas !</p>");
                                    }
                                } else {
                                    $newMessage->setError("<p>Cette adresse email est déjà utilisée !</p>");
                                }
                            } else {
                                $newMessage->setError("<p>Ce pseudo est déjà utilisé !</p>");
                            }
                        } else {
                            $newMessage->setError("<p>Pseudo invalide !</p>");
                        }
                    } else {
                        $newMessage->setError("<p>Adresse email invalide !</p>");
                    }
                } else {
                    $newMessage->setError("<p>Votre pseudo ne doit pas dépasser 40 caractères !</p>");
                }
            } else {
                $newMessage->setError("<p>Veuillez remplir tous les champs !</p>");
            }
        }
        require_once('view/frontend/register.php');
    }
}