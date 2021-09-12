<?php

namespace Elysa\Pfive\m;

class PostManager extends BaseManager
{
    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // //////////////////////////////////////////////              CREATE              ///////////////////////////////////////////////////////
    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function addPost($title, $content, $miniatureImg)
    {
        // DB Connection
        $newManager = new BaseManager();
        $db = $newManager->dbConnect();
        // Create new line
        $request = $db->prepare('INSERT INTO posts (id, title, content, $miniatureImg, status, creation_date) VALUES (?, ?, ?, ?, 0, NOW())');
        $request->execute(array($title, $content, $miniatureImg));
    }


    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // //////////////////////////////////////////////              READ              ///////////////////////////////////////////////////////
    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    // Get a post by ID
    public function getPost($id)
    {
        $newManager = new BaseManager();
        $db = $newManager->dbConnect();
        $request = $db->prepare('SELECT id, title, content, miniature_img, DATE_FORMAT(creation_date,"le : %d/%m/%Y à %Hh%i") AS create_date, DATE_FORMAT(update_date, "le : %d/%m/%Y à %Hh%i") AS update_date, status FROM posts WHERE id = ?');
        $request->execute(array((int)$id));
        $post = $request->fetch();
        $response = new Post($post['id'], $post['title'], $post['content'], $post['miniature_img'], $post['url_img'], $post['create_date'], $post['update_date']);

        return $response;
    }

    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // //////////////////////////////////////////////              UPDATE              ///////////////////////////////////////////////////////
    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // //////////////////////////////////////////////              DELETE              ///////////////////////////////////////////////////////
    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
