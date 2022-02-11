<?php

namespace Elysa\Pfive\c;

use Elysa\Pfive\m\Message as Message;
use Elysa\Pfive\m\CommentManager as CommentManager;
use Elysa\Pfive\m\UserManager;

class CommentController
{
    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // //////////////////////////////////////////////              CREATE              ///////////////////////////////////////////////////////
    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Add comment
    public function addComment($id, $username, $content)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($username) && !empty($content)) {
                $content = htmlspecialchars($content);
                $newCommentManager = new CommentManager();
                $newUserManager = new UserManager();
                $userId = $newUserManager->getUserIdFromName($username);
                $newCommentManager->add($userId, $id, $content);
                $newMessage = new Message();
                $newMessage->setSuccess("<p>Merci, votre commentaire a bien été publié !</p>");
            } else {
                $newMessage = new Message();
                $newMessage->setError("<p>Tous les champs doivent être rempli !</p>");
            }
        }
        $newPostController = new PostController();
        $newPostController->showPostById($id);
    }

    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // //////////////////////////////////////////////              UPDATE              ///////////////////////////////////////////////////////
    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function alertComment($id, $postId)
    {      
        $newCommentManager = new CommentManager();
        $alertedComment = $newCommentManager->alertComment($id);
        // Gestion des erreurs
        if ($alertedComment === true) {
            $newPostController = new PostController;
            $newPostController->showPostById($postId);
        } else {
            throw new \Exception("Impossible de signaler le commentaire !");
        }
    }

    public function validComment($id)
    {
        $comment = new CommentManager();
        $comment->validateComment($id);
        $newMessage = new Message();
        $newMessage->setSuccess("<p>Merci, le commentaire a bien été validé !</p>");

        // Vue
        $newUserController = new UserController();
        $newUserController->showPannelView($_SESSION['username']);
    }

    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // //////////////////////////////////////////////              DELETE              ///////////////////////////////////////////////////////
    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function deleteComment($id)
    {
        $comment = new CommentManager();
        $deletedComment = $comment->deleteComment($id);
        // Gestion des erreurs
        if ($deletedComment === false) {
            throw new \Exception("Impossible de supprimer le commentaire !");
        } else {
            $newMessage = new Message();
            $newMessage->setSuccess("<p>Merci, le commentaire a bien été supprimé !</p>");
            $newUserController = new UserController();
            $newUserController->showPannelView($_SESSION['username']);
        }
    }
}
