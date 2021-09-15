<?php

namespace Elysa\Pfive\m;

class PostManager extends BaseManager
{
    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // //////////////////////////////////////////////              CREATE              ///////////////////////////////////////////////////////
    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Add post and put in draft
    public function addPost($title, $content, $miniatureImg)
    {
        // DB Connection
        $newManager = new BaseManager();
        $db = $newManager->dbConnect();
        // Create new line
        $request = $db->prepare('INSERT INTO posts (id, title, content, $miniatureImg, status, creation_date) VALUES (?, ?, ?, ?, 1, NOW())');
        $request->execute(array($title, $content, $miniatureImg));
    }


    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // //////////////////////////////////////////////              READ              ///////////////////////////////////////////////////////
    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function getAllPost()
    {
        $newManager = new BaseManager();
        $db = $newManager->dbConnect();

        $request = $db->query('SELECT id, title, content, miniature_img, DATE_FORMAT(creation_date,"le : %d/%m/%Y à %Hh%i") AS creation_date, DATE_FORMAT(update_date, "le : %d/%m/%Y à %Hh%i") AS update_date, status FROM posts');

        $request->execute(array());
        $result = $request->fetchAll();
        $posts = [];
        // For each post put it on an array
        foreach ($result as $post) {
            $newPost = new Post($post['id'], $post['title'], $post['content'], $post['miniature_img'], $post['creation_date'], $post['update_date']);
            $posts[] = $newPost;
        }

        return $posts;
    }

    // Get a post by ID
    public function getPost($id)
    {
        $newManager = new BaseManager();
        $db = $newManager->dbConnect();
        $request = $db->prepare('SELECT id, title, content, miniature_img, DATE_FORMAT(creation_date,"le : %d/%m/%Y à %Hh%i") AS creation_date, DATE_FORMAT(update_date, "le : %d/%m/%Y à %Hh%i") AS update_date, status FROM posts WHERE id = ?');
        $request->execute(array((int)$id));
        $post = $request->fetch();
        $response = new Post($post['id'], $post['title'], $post['content'], $post['miniature_img'], $post['url_img'], $post['creation_date'], $post['update_date']);

        return $response;
    }

    // Get draft post
    public function getDraft()
    {
        // Connect to DB
        $newManager = new BaseManager();
        $db = $newManager->dbConnect();
        // Request
        $request = $db->prepare('SELECT id, title, content, miniature_img, DATE_FORMAT(creation_date,"le : %d/%m/%Y à %Hh%i") AS creation_date, DATE_FORMAT(update_date, "le : %d/%m/%Y à %Hh%i") AS update_date, status FROM posts WHERE status = 1');
        $request->execute(array());
        $results = $request->fetchAll();
        // Push in array
        $post = [];
        foreach ($results as $post) {
            $newPost = new Post($post['id'], $post['title'], $post['content'], $post['miniature_img'], $post['creation_date'], $post['update_date'], $post['status']);
            $posts[] = $newPost;
        }
        // Return a list of comment 
        return $posts;
    }

    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // //////////////////////////////////////////////              UPDATE              ///////////////////////////////////////////////////////
    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function updatePost($title, $content, $miniatureImg){
        $newManager = new BaseManager();
        $db = $newManager->dbConnect();
        $request = $db->prepare('UPDATE blogposts SET title = ?, content = ?, url_img = ?, updated_datetime = NOW() WHERE blogpost_id = ?');
        $post = $request->execute(array($title, $content, $miniatureImg));

        return $post;
    }
    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // //////////////////////////////////////////////              DELETE              ///////////////////////////////////////////////////////
    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
