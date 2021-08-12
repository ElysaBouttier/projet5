<?php

namespace controller;

session_start();
// Autoloader 
require_once('vendor/autoload.php');

class Router
{
    public function __construct()
    {
        try{
            // If controller exist
            if(isset($_GET['controller']))
            {
                // If action in post
                if(isset($_GET['action']))
                {
                    // CommentController
                    if($_GET['controller'] == 'CommentController')
                    {

                    }
                    // ContactController
                    if($_GET['controller'] == 'ContactController')
                    {
                        // Go to contact page
                        if ($_GET['action'] == 'showContactView') {
                            $newContactController = new ContactController();
                            $newContactController->showContactView();
                        }
                    }
                    // ImageController
                    if ($_GET['controller'] == 'ImageController') 
                    {
                    }
                    // PostController
                    if ($_GET['controller'] == 'PostController') 
                    {
                    }
                    // UserController
                    if ($_GET['controller'] == 'UserController') 
                    {
                        // Go to registrer page
                        if ($_GET['action'] == 'showRegistrerView') {
                            $newUserController = new UserController();
                            $newUserController->showRegistrerAction();
                            var_dump("coucou .....////////////////////////////////////////////////////");

                        }
                        // Registrer
                        if ($_GET['action'] == 'registerAction') {
                            // Delete HTML and PHP tags from the username, password, email, firstname, lastname
                            $username = isset($_POST['username']) ? strip_tags($_POST['username']) : NULL;
                            $password_hash = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : NULL;
                            $email = isset($_POST['email']) ? strip_tags($_POST['email']) : NULL;
                            $firstname = isset($_POST['firstname']) ? strip_tags($_POST['firstname']) : NULL;
                            $lastname = isset($_POST['lastname']) ? strip_tags($_POST['lastname']) : NULL;
                            $newUserController = new UserController();
                            $newUserController->register($username, $password_hash, $email, $firstname, $lastname);
                            print_r("coucou .....////////////////////////////////////////////////////");
                            var_dump("coucou .....////////////////////////////////////////////////////");

                        }

                        // Connection
                        // elseif ($_GET['action'] == 'loginAction') {
                        //     if (empty($_SESSION)) {
                        //         $username = isset($_POST['username']) ? strip_tags($_POST['username']) : NULL;
                        //         $password = isset($_POST['password']) ? strip_tags($_POST['password']) : NULL;
                        //         $newUserController = new UserController();
                        //         $newUserController->login($username, $password);
                        //     } else {
                        //         header('Location: /');
                        //     }
                        // }
                        // Log out if click on logout button
                        elseif ($_GET['action'] == 'logoutAction') {
                            require_once('view/backend/deconnection.php');
                        }
                    }
                }
            }
        }        
        catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            echo $errorMessage;
            exit;
            require_once('view/frontend/404.php');
        }
    }
}
?>