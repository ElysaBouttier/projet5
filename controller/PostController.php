<?php

namespace Elysa\Pfive\c;


class PostController
{
    public function showBlogView()
    {
        require_once('./view/frontend/blog.php');
    }

    public function showAddPostView()
    {
        require_once('./view/backend/add_post.php');
    }


    // 
    // 
    // TODO
    // 
    // 
    public function addCommentAction($fk_blogpost_id, $username, $content)
    {
        // DEBUG


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            print_r('username', $username);
            if (!empty($username) && !empty($content)) {
                $newCommentManager = new CommentaryManager();
                $newCommentManager->add($fk_blogpost_id, $username, $content);
                $newMessage = new Message();
                $newMessage->setSuccess("<p>Merci, votre commentaire a bien été publié !</p>");
                // Création d'un cookie pour permettre à l'utilisateur de ne pas avoir à retaper son nom après un commentaire
                setcookie("author", $username, time() + 365 * 24 * 3600, null, null, false, true);
            } else {
                $newMessage = new Message();
                $newMessage->setError("<p>Tous les champs doivent être rempli !</p>");
            }
        }
        $newPostController = new PostController();
        $newPostController->showAction($fk_blogpost_id);
    }
    // public function addPost($title,){

    // }
}
