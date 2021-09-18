<?php

namespace Elysa\Pfive\c;

use Elysa\Pfive\m\Message as Message;
use Elysa\Pfive\m\PostManager as PostManager;
use Elysa\Pfive\m\CommentManager as CommentManager;


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
        $post = $newPostManager->getPost($id);
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
    
    public function showAddPostViewComplete($id)
    {
        $newPostManager = new PostManager();
        $post = $newPostManager->getPost($id);
        // Si l'id du billet n'existe pas alors on affiche une erreur
        if ($post->getId() == null)
        {
            // Vue
            require_once ('view/frontend/404.php');
        }
        else
        {
            // Vue
            require_once ('view/backend/add_post_complete.php');
        }
        require_once('./view/backend/add_post_complete.php');
    }

    public function editPostAction($id){
        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $post = new PostManager();
            $post->updatePost($_GET['id'], ($_POST['title']), ($_POST['content']), ($_POST['miniatureImg']));
            $newMessage = new Message();
            $newMessage->setSuccess("<p>Merci, votre oeuvre a bien été modifié !</p>");
            var_dump('coucou');
        }
        $newPostManager = new PostManager();
        $post = $newPostManager->getPost($id);
        // Vue
        require_once ('view/backend/edit_post.php');
    }




    // 
    // 
    // TODO
    // 
    // 
    public function addDraft($title, $content, $miniatureImg){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($title) && !empty($miniatureImg) && !empty($content)) {
                $newCommentManager = new PostManager();
                $newCommentManager->addDraft($title, $content, $miniatureImg);
                $newMessage = new Message();
                $newMessage->setSuccess("<p>Votre oeuvre à bien été créée, veuillez ajouter des photos !</p>");
            } else {
                $newMessage = new Message();
                $newMessage->setError("<p>Tous les champs doivent être rempli !</p>");
            }
        }
        $newUserManager = new UserController();
        $newUserManager -> showPannelView();
    }
}
