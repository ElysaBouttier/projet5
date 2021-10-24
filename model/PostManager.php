<?php

namespace Elysa\Pfive\m;

class PostManager extends BaseManager
{
    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // //////////////////////////////////////////////              CREATE              ///////////////////////////////////////////////////////
    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Add post and put in draft
    public function addDraft($title, $content, $miniature_img)
    {
        // DB Connection
        $newManager = new BaseManager();
        $db = $newManager->dbConnect();
        // Create new line
        $request = $db->prepare('INSERT INTO posts ( title, content, miniature_img, creation_date, status) VALUES ( ?, ?, ?, NOW(), 0)');
        $request->execute(array($title, $content, $miniature_img));
    }


    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // //////////////////////////////////////////////              READ              ///////////////////////////////////////////////////////
    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function getAllPost()
    {
        $newManager = new BaseManager();
        $db = $newManager->dbConnect();

        $request = $db->query('SELECT id, title, content, miniature_img, DATE_FORMAT(creation_date,"le : %d/%m/%Y à %Hh%i") AS creation_date, DATE_FORMAT(update_date, "le : %d/%m/%Y à %Hh%i") AS update_date, status FROM posts WHERE status = 1');

        $request->execute(array());
        $result = $request->fetchAll();
        $posts = [];
        // For each post put it on an array
        foreach ($result as $post) {
            $newPost = new Post($post['id'], $post['title'], $post['content'], $post['miniature_img'], $post['creation_date'], $post['update_date'], $post['status']);
            $posts[] = $newPost;
        }
        return $posts;
    }

    public function getAllDraft()
    {
        $newManager = new BaseManager();
        $db = $newManager->dbConnect();

        $request = $db->query('SELECT id, title, content, miniature_img, DATE_FORMAT(creation_date,"le : %d/%m/%Y à %Hh%i") AS creation_date, DATE_FORMAT(update_date, "le : %d/%m/%Y à %Hh%i") AS update_date, status FROM posts WHERE status=0');

        $request->execute(array());
        $result = $request->fetchAll();
        $drafts = [];
        // For each post put it on an array
        foreach ($result as $draft) {
            $newDraft = new Post($draft['id'], $draft['title'], $draft['content'], $draft['miniature_img'], $draft['creation_date'], $draft['update_date'], $draft['status']);
            $drafts[] = $newDraft;
        }

        return $drafts;
    }

    // Get a post by ID
    public function getPostById($id)
    {
        $newManager = new BaseManager();
        $db = $newManager->dbConnect();
        $request = $db->prepare('SELECT id, title, content, miniature_img, DATE_FORMAT(creation_date,"le : %d/%m/%Y à %Hh%i") AS creation_date, DATE_FORMAT(update_date, "le : %d/%m/%Y à %Hh%i") AS update_date, status FROM posts WHERE id = ?');
        $request->execute(array((int)$id));
        $post = $request->fetch();
        $response = new Post($post['id'], $post['title'], $post['content'], $post['miniature_img'], $post['creation_date'], $post['update_date'], $post['status']);

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

    //
    public function getUserNameFromUserId(int $userId)
    {
        $db = $this->dbConnect();
        $request = $db->query('SELECT U.username  FROM users U JOIN comments C ON U.id = c.user_id WHERE user_id= ?');
        $request->execute(array((int)$userId));
        $post = $request->fetch();
        var_dump($post);
        // return $username;
    }

    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // //////////////////////////////////////////////              UPDATE              ///////////////////////////////////////////////////////
    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    // Show 
    public function updateDraft($title, $content, $miniature_img, $status, $id)
    {
        $newManager = new BaseManager();
        $db = $newManager->dbConnect();
        $request = $db->prepare('UPDATE posts SET title = ?, content = ?, miniature_img = ?, update_date = NOW(), status = ? WHERE id = ?');
        $post = $request->execute(array($title, $content, $miniature_img, $status, $id));

        return $post;
    }

    // Show 
    public function showEditPostView($title, $content, $miniature_img, $id)
    {
        $newManager = new BaseManager();
        $db = $newManager->dbConnect();
        $request = $db->prepare('UPDATE posts SET title = ?, content = ?, miniature_img = ?, update_date = NOW() WHERE id = ?');
        $post = $request->execute(array($title, $content, $miniature_img, $id));

        return $post;
    }
    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // //////////////////////////////////////////////              DELETE              ///////////////////////////////////////////////////////
    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //Delete
    public function deletePost($id)
    {
        $baseManager = new BaseManager();
        $db = $baseManager->dbConnect();
        $request = $db->prepare('DELETE FROM posts WHERE id = ?');
        $request->execute(array($id));
    }
}
