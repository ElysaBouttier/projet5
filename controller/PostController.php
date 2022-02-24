<?php

namespace Elysa\Pfive\c;

use Elysa\Pfive\m\Comment;
use Elysa\Pfive\m\Message as Message;
use Elysa\Pfive\m\PostManager as PostManager;
use Elysa\Pfive\m\CommentManager as CommentManager;
use Elysa\Pfive\m\ImageManager as ImageManager;


class PostController
{

    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // //////////////////////////////////////////////              SHOW VIEW              ////////////////////////////////////////////////////
    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function showBlogView()
    {
        require_once('./view/frontend/blog.php');
    }


    public function showAddPostView()
    {
        require_once('./view/backend/add_post.php');
    }

    public function showEditPostView($id)
    {
        $newPostManager = new PostManager();
        $post = $newPostManager->getPostById($id);

        $newImageManager = new ImageManager();
        $allImages = $newImageManager->getAllImageFromPost($id);

        // Vue
        require_once('view/backend/edit_post.php');
    }


    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // //////////////////////////////////////////////              Draft              ///////////////////////////////////////////////////////
    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function addDraft($title, $content, $miniatureImg, $username)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($title) && !empty($miniatureImg)) {
                $newPostManager = new PostManager();
                $newPostManager->addDraft($title, $content, $miniatureImg);
                $newMessage = new Message();
                $newMessage->setSuccess("<p>Votre oeuvre à bien été créée, veuillez ajouter des photos !</p>");
            } else {
                $newMessage = new Message();
                $newMessage->setError("<p>Veuillez ajouter un titre et une image !</p>");
            }
        }
        $newUserManager = new UserController();
        $newUserManager->showPannelView($username);
    }

    public function updateDraft($id, $title, $content, $status)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newImageManager = new ImageManager();
            $allImages = $newImageManager->getAllImageFromPost($id);
            $post = new PostManager();
            $post->updateDraft($title, $content, $status, $id);
            $newMessage = new Message();
            $newMessage->setSuccess("<p>Merci, votre oeuvre a bien été modifié !</p>");
        }
        header('Location: ?controller=PostController&action=showEditPostView&id=' . $id);
    }
    
    public function updateMiniatureImg($miniatureImg, $id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $post = new PostManager();
            $post->updateMiniatureImg($miniatureImg, $id);
            $newMessage = new Message();
            $newMessage->setSuccess("<p>Merci, votre oeuvre a bien été modifié !</p>");
        }
        header('Location: ?controller=PostController&action=showEditPostView&id=' . $id);
    }

    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
    // //////////////////////////////////////////////              POST              /////////////////////////////////////////////////////////
    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function showPostById($id)
    {
        $newPostManager = new PostManager();
        $post = $newPostManager->getPostById($id);
        $newImageManager = new ImageManager();
        $images = $newImageManager->getAllImageFromPost($id);
        $imageCount = $newImageManager->countImagesFromPost($id);
        $newCommentManager = new CommentManager();
        $comments = $newCommentManager->getCommentsFromPost($id);
       
        // Vue
        require_once('view/frontend/blog.php');

        // Si l'id du billet n'existe pas alors on affiche une erreur
        if ($post->getId() == null) {
            // Vue
            require_once('view/frontend/404.php');
        } else {
            // Vue
            require_once('view/frontend/blog.php');
        }
    }

    public function deletePost($id)
    {
        $newPostManager = new PostManager();
        $deletedPost = $newPostManager->deletePost($id);
        // Gestion des erreurs
        if ($deletedPost === false) {
            throw new \Exception("Impossible de supprimer le billet !");
        } else {
            header('Location: ?controller=UserController&action=showPannelView');
        }
    }

    public function updateThumbToPost($id, $userId)
    {
        $newPostManager = new PostManager();
        $newPostController = new PostController();
        $isLikeSelected = $newPostManager->updateLikeSelected($id, $userId);

        if ($isLikeSelected === true) {
            $newPostManager->removeThumbToPost($id);
        } else {
            $newPostManager->addThumbToPost($id);
        }
        $newPostController -> showPostById($id);
    }
    public function updateHeartToPost($id, $userId)
    {

        $newPostManager = new PostManager();
        $newPostController = new PostController();
        $isHeartSelected = $newPostManager->updateHeartSelected($id, $userId);

        if ($isHeartSelected === true) {
            $newPostManager->removeHeartToPost($id);
        } else {
            $newPostManager->addHeartToPost($id);
        }
        $newPostController -> showPostById($id);
    }
}
