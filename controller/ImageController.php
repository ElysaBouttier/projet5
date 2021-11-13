<?php

namespace Elysa\Pfive\c;

use Elysa\Pfive\m\Image;
use Elysa\Pfive\m\ImageManager as ImageManager;
use Elysa\Pfive\m\Message as Message;
use Elysa\Pfive\m\PostManager;

class ImageController
{

    public function addImg($id, $url_img, $content)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($url_img)) {
                $newImageManager = new ImageManager();
                $newImageManager->addImage($id, $url_img, $content);
                $newMessage = new Message();
                $newMessage->setSuccess("<p>Merci, votre image a bien été ajouté à l'oeuvre !</p>");
            } else {
                $newMessage = new Message();
                $newMessage->setError("<p>Veuillez ajouter une image !</p>");
            }
        }
        $newPostController = new PostController;
        $newPostController->showEditPostView($id);
    }

    // Supprimer un billet depuis la page d'administration
    public function deleteImage($id, $post_id)
    {
        $newImageManager = new ImageManager();
        $deletedPost = $newImageManager->deleteImage($id);
        // Gestion des erreurs
        if ($deletedPost === false) {
            throw new \Exception("Impossible de supprimer l'image' !");
        } else {
            header("Location: index.php?controller=PostController&action=showEditPostView&id=" . $post_id);
        }
    }
}
