<?php

// namespace Elysa\Pfive\c;

use Elysa\Pfive\c\ContactController;
use Elysa\Pfive\c\UserController;
use Elysa\Pfive\c\PostController;
use Elysa\Pfive\c\ImageController;
use Elysa\Pfive\c\CommentController;

session_start();
// Autoloader 
require_once('vendor/autoload.php');
require_once('./public/vendor/autoload.php');


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
                        if ($_GET['action'] == 'addComment') {
                            if (isset($_GET['id']) && $_GET['id'] > 0) {
                                // Conditions ternaires
                                $username = isset($_POST['username']) ? strip_tags($_POST['username']) : NULL;
                                $content = isset($_POST['content']) ? strip_tags($_POST['content']) : NULL;
                                $newCommentController = new CommentController();
                                $newCommentController->addComment($_GET['id'], $username, $content);
                            } else {
                                // erreur 404
                                require_once('view/frontend/404.php');
                            }
                        }
                        // Signal the comment 
                        elseif ($_GET['action'] == 'alertComment') {                            
                            if (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['postId']) && $_GET['postId'] > 0) {
                                $id = $_GET['id'];
                                $postId = $_GET['postId'];
                                $newCommentController = new CommentController();
                                $newCommentController->alertComment($id, $postId);
                            }
                            else {
                                require_once('view/frontend/404.php');
                            }
                        }
                        // Update signaled comment
                        elseif ($_GET['action'] == 'validComment') {
                            $newAdminController = new CommentController();
                            $newAdminController->validComment($_GET['id']);
                        }
                        // Delete signaled comment
                        elseif ($_GET['action'] == 'deleteComment') {
                            $newAdminController = new CommentController();
                            $newAdminController->deleteComment($_GET['id']);
                        }
                        
                    }
                    // ContactController
                    elseif ($_GET['controller'] == 'ContactController') {
                        // Go to contact page
                        if ($_GET['action'] == 'showContactView') {
                            $newContactController = new ContactController();
                            $newContactController->showContactView();
                        }
                        elseif ($_GET['action'] == 'showRgpdView') {
                            $newContactController = new ContactController();
                            $newContactController->showRgpdView();
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
                            if (isset($_GET['id']) && $_GET['id'] > 0) {
                                $url_img = isset($_POST['url_img']) ? strip_tags($_POST['url_img']) : NULL;
                                $content = isset($_POST['content']) ? $_POST['content'] : NULL;
                                $newImgController = new ImageController();
                                $newImgController->addImg($_GET['id'],$url_img, $content);
                            } else {
                                // error 404
                                require_once('view/frontend/404.php');
                            }
                        }

                        // Delete
                        elseif ($_GET['action'] == 'deleteImage') {
                            if (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['post_id']) && $_GET['post_id'] > 0) {
                                $newImgController = new ImageController();
                                $newImgController->deleteImage($_GET['id'], $_GET['post_id']);
                            }
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

                        elseif ($_GET['action'] == 'showEditPostView') {
                            $newAdminController = new PostController();
                            $newAdminController->showEditPostView($_GET['id']);
                        }

                        // Go to Post page
                        elseif ($_GET['action'] == 'showPostById') {
                            if (isset($_GET['id']) && $_GET['id'] > 0) {
                                $id = $_GET['id'];
                                $newAdminController = new PostController();
                                $newAdminController->showPostById($id);
                            } else {
                                // error 404
                                require_once('view/frontend/404.php');
                            }
                        }

                        // Go to blog page
                        elseif ($_GET['action'] == 'addDraft') {
                            $title = isset($_POST['title']) ? strip_tags($_POST['title']) : NULL;
                            $content = isset($_POST['content']) ? $_POST['content'] : NULL;
                            $miniatureImg = $_FILES["miniature_img"]["name"];
                            $username = isset($_POST['username']) ? $_POST['username'] : NULL;
                            $newPostController = new PostController();
                            $newPostController->addDraft($title, $content, $miniatureImg, $username);
                        }
                        
                         // Go to blog page
                        elseif ($_GET['action'] == 'deletePost') {
                            $newPostController = new PostController();
                            $newPostController->deletePost($_GET['id']);
                        }

                        // Add draft online or update it
                         elseif ($_GET['action'] == 'updatePost') {
                            if (isset($_GET['id']) && $_GET['id'] > 0) {
                                $id = isset($_GET['id']) ? strip_tags($_GET['id']) : NULL;
                                $title = isset($_POST['title']) ? strip_tags($_POST['title']) : NULL;
                                $content = isset($_POST['content']) ? strip_tags($_POST['content']) : NULL;
                                $miniatureImg = $_FILES["miniature_img"]["name"];
                                $newPostController = new PostController();

                                if ($_POST['status'] == "draft"){
                                    $status = 0;
                                }
                                if ($_POST['status'] == "online"){
                                    $status = 1;
                                }
                                $newPostController->updateDraft($id, $title, $content, $miniatureImg, $status);
                            }
                        }
                        // Update thumb Number
                         elseif ($_GET['action'] == 'addThumb') {
                            $newPostController = new PostController();
                            $id = $_GET['id'];
                            $userid = $_SESSION['id'];
                            $newPostController->updateThumbToPost($id, $userid);
                        }
                        // Update love Number
                        elseif ($_GET['action'] == 'addLove') {
                            $newPostController = new PostController();
                            $id = $_GET['id'];
                            $userid = $_SESSION['id'];
                            $newPostController->updateHeartToPost($id, $userid);
                        }
                        
                    }

                    // UserController
                    elseif ($_GET['controller'] == 'UserController') {
                        // Go to home page
                        if ($_GET['action'] == 'showHomeView') {
                            $newUserController = new UserController();
                            $newUserController->showHomeView();
                        }

                        // Go to addPost page
                        if ($_GET['action'] == 'showAddPostView') {
                            $newPostController = new PostController();
                            $newPostController->showAddPostView();
                        }

                        // Go to pannel_config page
                        if ($_GET['action'] == 'showPannelView') {
                            $newUserController = new UserController();
                            $username = $_SESSION['username'];
                            $content = isset($_POST['content']) ? strip_tags($_POST['content']) : NULL;
                            $newUserController->showPannelView($content, $username);
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
                        // Update edito
                        elseif ($_GET['action'] == 'editEdito') {
                            $newUserController = new UserController();
                            $content = isset($_POST['content']) ? strip_tags($_POST['content']) : NULL;
                            $username = $_SESSION['username'];
                            $newUserController->updateEdito($content, $username);
                        }
                    }
                } else {
                    require_once('view/frontend/404.php');
                }
            } else {
                $newUserController = new UserController();
                $newUserController->showHomeView();
            }
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            echo $errorMessage;
            exit;
            require_once('view/frontend/404.php');
        }
    }
}
