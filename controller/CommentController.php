<?php

namespace Elysa\Pfive\c;

use Elysa\Pfive\m\Message as Message;
use Elysa\Pfive\m\CommentManager as CommentManager;


class CommentController
{

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
