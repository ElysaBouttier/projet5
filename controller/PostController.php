<?php

namespace Elysa\Pfive\c;

use Elysa\Pfive\m\Message as Message;
use Elysa\Pfive\m\PostManager as PostManager;
use Elysa\Pfive\m\CommentManager as CommentManager;
use Elysa\Pfive\m\ImageManager as ImageManager;


class PostController
{
    public function showBlogView()
    {
        require_once('./view/frontend/blog.php');
    }

    public function showPostById($id)
    {
        $newPostManager = new PostManager();
        $newCommentManager = new CommentManager();
        $post = $newPostManager->getPostById($id);
        $username = $newCommentManager->getUsername($id);
        $comments = $newCommentManager->getCommentsFromPost($id);

        // Si l'id du billet n'existe pas alors on affiche une erreur
        if ($post->getId() == null)
        {
            // Vue
            require_once ('view/frontend/404.php');
        }
        else
        {
            // Vue
            require_once ('view/frontend/blog.php');
        }
    }

    public function showAddPostView()
    {
        require_once('./view/backend/add_post.php');
    }    
    
    public function showEditPostView($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $newImageManager = new ImageManager();
            $allImages = $newImageManager -> getAllImageFromPost($id);

            $post = new PostManager();
            $post->showEditPostView(($_POST['title']), ($_POST['url_img']), ($_POST['content']),$_GET['id']);
            $newMessage = new Message();
            $newMessage->setSuccess("<p>Merci, votre oeuvre a bien été modifié !</p>");
        }
            
        $newPostManager = new PostManager();
        $post = $newPostManager->getPostById($id);
        
        $newImageManager = new ImageManager();
        $allImages = $newImageManager -> getAllImageFromPost($id);

        // Vue
        require_once ('view/backend/edit_post.php');
    }

    public function addDraft($title, $content, $miniatureImg, $username){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($title) && !empty($miniatureImg) && !empty($content)) {
                $newPostManager = new PostManager();
                $newPostManager->addDraft($title, $content, $miniatureImg);
                $newMessage = new Message();
                $newMessage->setSuccess("<p>Votre oeuvre à bien été créée, veuillez ajouter des photos !</p>");
            } else {
                $newMessage = new Message();
                $newMessage->setError("<p>Tous les champs doivent être rempli !</p>");
            }
        }
        $newUserManager = new UserController();
        $newUserManager -> showPannelView($username);
    }

    public function deletePost($id)
    {
        $newPostManager = new PostManager();
        $deletedPost = $newPostManager->deletePost($id);
        // Gestion des erreurs
        if ($deletedPost === false)
        {
            throw new \Exception("Impossible de supprimer le billet !");
        }
        else
        {
            header('Location: ?controller=UserController&action=showPannelView');
        }
    }
}
