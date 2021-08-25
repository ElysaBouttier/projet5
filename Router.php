<?php

namespace controller;

session_start();
// Autoloader 
require_once('vendor/autoload.php');

class Router
{
    public function __construct()
    {
        try {
            // If controller exist
            if (isset($_GET['controller'])) {
                // If action in post
                if (isset($_GET['action'])) {
                    // CommentController
                    if ($_GET['controller'] == 'CommentController') {
                    }
                    // ContactController
                    elseif ($_GET['controller'] == 'ContactController') {
                        // Go to contact page
                        if ($_GET['action'] == 'showContactView') {
                            $newContactController = new ContactController();
                            $newContactController->showContactView();
                        }
                        elseif ($_GET['action'] == 'sendMessage') {
                            $newContactController = new ContactController();
                            $newContactController->sendMessage();
                        }
                        
                    }
                    // ImageController
                    elseif ($_GET['controller'] == 'ImageController') {
                        // Add image to Post
                        if ($_GET['action'] == 'addImage') {
                            
                        }
                    }
                    // PostController
                    elseif ($_GET['controller'] == 'PostController') {
                        // Go to blog page
                        if ($_GET['action'] == 'showBlogView') {
                            $newPostController = new PostController();
                            $newPostController->showBlogView();
                        }

                        // Go to addPost page
                        elseif ($_GET['action'] == 'showAddPostView') {
                            $newPostController = new PostController();
                            $newPostController->showAddPostView();
                        }

                        // Go to blog page
                        elseif ($_GET['action'] == 'addPost') {
                            // $newPostController->addPost($title, $content, $creation_date);
                            $title = isset($_POST['title']) ? strip_tags($_POST['title']) : NULL;
                            $content = isset($_POST['content']) ? $_POST['content'] : NULL;
                            $miniatureImg = isset($_POST['miniature-img']) ? $_POST['miniature-img'] : NULL;
                            $newPostController = new PostController();
                            $newPostController->addPost($title, $content, $miniatureImg);

                            $image = isset($_POST['text-first-img']) ? $_POST['text-first-img'] : NULL;
                            $newImageController = new ImageController();
                            $newImageController->addImage($title, $content, $miniatureImg);
                        }
                    }

                    // UserController
                    elseif ($_GET['controller'] == 'UserController') {
                        // Go to home page
                        if ($_GET['action'] == 'showHomeView') {
                            $newUserController = new UserController();
                            $newUserController->showHomeView();
                        }

                        // Go to pannel_config page
                        if ($_GET['action'] == 'showAddPostView') {
                            $newUserController = new UserController();
                            $newUserController->showAddPostView();
                        }

                        // Go to pannel_config page
                        if ($_GET['action'] == 'showPannelView') {
                            $newUserController = new UserController();
                            $newUserController->showPannelView();
                        }

                        // Go to registrer page
                        elseif ($_GET['action'] == 'showRegistrerView') {
                            $newUserController = new UserController();
                            $newUserController->showRegistrerView();
                        }
                        // Registrer
                        elseif ($_GET['action'] == 'registerAction') {
                            // Delete HTML and PHP tags from the username, password, email, firstname, lastname
                            $username = isset($_POST['username']) ? strip_tags($_POST['username']) : NULL;
                            $password_hash = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : NULL;
                            $password_confirm = isset($_POST['password_confirm']) ? password_hash($_POST['password_confirm'], PASSWORD_DEFAULT) : NULL;
                            $email = isset($_POST['email']) ? strip_tags($_POST['email']) : NULL;
                            $firstname = isset($_POST['firstname']) ? strip_tags($_POST['firstname']) : NULL;
                            $lastname = isset($_POST['lastname']) ? strip_tags($_POST['lastname']) : NULL;
                            $newUserController = new UserController();
                            $newUserController->register($username, $password_hash, $password_confirm, $email, $firstname, $lastname);
                        }

                        // Connection
                        elseif ($_GET['action'] == 'loginAction') {
                            if (empty($_SESSION)) {
                                $username = isset($_POST['username']) ? strip_tags($_POST['username']) : NULL;
                                $password = isset($_POST['password']) ? strip_tags($_POST['password']) : NULL;
                                $newUserController = new UserController();
                                $newUserController->login($username, $password);
                            } else {
                                header('Location: /');
                            }
                        }
                        // Log out if click on logout button
                        elseif ($_GET['action'] == 'logout') {
                            require_once('view/backend/log_out.php');
                        }
                    }
                } else {
                    require_once('view/frontend/404.php');
                }
            } else {
                require_once('view/frontend/home.php');
            }
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            echo $errorMessage;
            exit;
            require_once('view/frontend/404.php');
        }
    }
}
