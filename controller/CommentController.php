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
                $userId = $newUserManager -> getUserIdFromName($username);
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

    public function alertComment($id, $post_id)
    {
        $newCommentManager = new CommentManager();
        $alertedComment = $newCommentManager->alertComment($id);
        // Gestion des erreurs
        if ($alertedComment === false) {
            throw new \Exception("Impossible de signaler le commentaire !");
        } else {
            header('Location: ?controller=PostController&action=showAction&post_id=' . $post_id);
        }
    }

}
