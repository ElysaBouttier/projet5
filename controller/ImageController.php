<?php
namespace Elysa\Pfive\c;

use Elysa\Pfive\m\ImageManager as ImageManager;
use Elysa\Pfive\m\Message as Message;
use Elysa\Pfive\m\PostManager;

class ImageController
{

    public function addImg($id,$url_img, $content){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($url_img) && !empty($content)) {
                $newImageManager = new ImageManager();
                $newImageManager->addImage($id, $url_img, $content);
                $newMessage = new Message();
                $newMessage->setSuccess("<p>Merci, votre image a bien été ajouté à l'oeuvre !</p>");
            } else {
                $newMessage = new Message();
                $newMessage->setError("<p>Tous les champs doivent être rempli !</p>");
            }
        }
        $newPostManager = new PostManager();
    }
}