<?php

namespace Elysa\Pfive\c;

use Elysa\Pfive\m\Message as Message;
use Elysa\Pfive\m\UserManager as UserManager;
use Elysa\Pfive\m\PostManager as PostManager;
use Elysa\Pfive\m\CommentManager as CommentManager;


// Admin123!!

class UserController
{
    public function showHomeView()
    {
        require_once('./view/frontend/home.php');
    }

    public function showPannelView($content, $username)
    {
        // Objet
        $newPostManager = new PostManager();
        $newCommentManager = new CommentManager();
        $newUserManager = new UserManager();
        // Method
        $posts = $newPostManager->getAllPost();
        $drafts = $newPostManager->getAllDraft();
        $edito = $newUserManager -> getEdito($username);
        $newUserManager -> updateEdito($content);

        // View
        require_once ('view/backend/pannel_config.php');
    }

    // public function editEdito($content, $username)
    // {
    //      // Objet
    //      $newPostManager = new PostManager();
    //      $newCommentManager = new CommentManager();
    //      $newUserManager = new UserManager();
    //      // Method
    //      $posts = $newPostManager->getAllPost();
    //      $drafts = $newPostManager->getAllDraft();
    //      $edito = $newUserManager -> getEdito($content);
    //      $newEdito = $newUserManager -> updateEdito($content);
    //      // View
    //      require_once ('view/backend/pannel_config.php');
    // }

    public function showRegistrerView()
    {
        require_once('./view/frontend/registrer.php');
    }
    // registrer
    public function register($username, $password, $password_confirm, $email, $firstname, $lastname)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newMessage = new Message();

            if (
                !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['password_confirm'])
                && !empty($_POST['email'])  && !empty($_POST['firstname']) && !empty($_POST['lastname'])
            ) {

                // Check the username lenght 
                $usernameLength = strlen($username);
                if ($usernameLength <= 40) {

                    // Check email format
                    if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email)) {

                        // Check username format
                        if (preg_match("#^[a-zA-Z0-9]+$#", $username)) {
                            $newUserManager = new UserManager();
                            $newUserManager->numberOfUsername($username);
                            $numberOfUsername = $GLOBALS['numberOfUsername'];
                            if ($numberOfUsername == 0) {
                                $newUserManager = new UserManager();
                                $newUserManager->numberOfUserEmail($email);
                                $numberOfUserEmail = $GLOBALS['numberOfUserEmail'];

                                // Check password format
                                if ($numberOfUserEmail == 0) {
                                    if ($_POST['password'] == $_POST['password_confirm']) {
                                        if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$#', $_POST['password'])) {

                                            // Check firstname format
                                            if (preg_match("#^[a-zA-Z]+$#", $firstname)) {

                                                // Check lastname format
                                                if (preg_match("#^[a-zA-Z]+$#", $lastname)) {
                                                    $username = htmlspecialchars($username);
                                                    $password = htmlspecialchars($password);
                                                    $email = htmlspecialchars($email);
                                                    $email = htmlspecialchars($firstname);
                                                    $email = htmlspecialchars($lastname);
                                                    $newUserManager->addUser($username, $password, $email, $firstname, $lastname);
                                                    $newMessage->setSuccess("<p>Inscription validée ! Vous pouvez vous connecter!</p>");
                                                } else {
                                                    $newMessage->setError("<p>Veuillez remplir votre nom !</p>");
                                                }
                                            } else {
                                                $newMessage->setError("<p>Veuillez remplir votre prénom !</p>");
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
                                $newMessage->setError("<p>Ce username est déjà utilisé !</p>");
                            }
                        } else {
                            $newMessage->setError("<p>username invalide !</p>");
                        }
                    } else {
                        $newMessage->setError("<p>Adresse email invalide !</p>");
                    }
                } else {
                    $newMessage->setError("<p>Votre username ne doit pas dépasser 40 caractères !</p>");
                }
            } else {
                $newMessage->setError("<p>Veuillez remplir tous les champs !</p>");
            }
        }
        require_once('./view/frontend/registrer.php');
    }

    // Login Action
    public function login($username, $password)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newMessage = new Message();
            if (!empty($_POST['username']) && !empty($_POST['password'])) {

                // Make some verification if pseudo & password match
                $newUserManager = new UserManager();
                $newUserManager->checkUserParams($_POST['username']);
                $checkedUserParams = $GLOBALS['checkedUserParams'];
                $isPasswordCorrect = password_verify($_POST['password'], $checkedUserParams['password']);

                if ($isPasswordCorrect == true) {
                    $_SESSION['id'] = $checkedUserParams['id'];
                    $_SESSION['username'] = $checkedUserParams['username'];
                    $_SESSION['email'] = $checkedUserParams['email'];
                    $_SESSION['firstname'] = $checkedUserParams['firstname'];
                    $_SESSION['lastname'] = $checkedUserParams['lastname'];
                    $_SESSION['is_admin'] = $checkedUserParams['is_admin'];

                    $admin = $_SESSION['is_admin'];
                    // Redirection after connection on index.php
                    if ($admin == 0) {
                        header("Location: index.php?controller=UserController&action=showPannelView");
                    } else {
                        header("Location: index.php?controller=UserController&action=showHomeView");
                    }
                    // require_once('./view/frontend/home.php');
                    exit;
                } else {
                    $newMessage->setError("<p>Erreur d'identifiants!</p>");
                }
            } else {
                $newMessage->setError("<p>Tous les champs doivent être remplis !</p>");
            }
        }
        require_once('view/inc/_login.php');
    }
}
