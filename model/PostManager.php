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
        $request = $db->prepare('INSERT INTO posts ( title, content, miniature_img, creation_date, status, heart_quantity, like_quantity) VALUES ( ?, ?, ?, NOW(), 0, 0, 0)');
        $request->execute(array($title, $content, $miniature_img));
    }


    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // //////////////////////////////////////////////              READ              ///////////////////////////////////////////////////////
    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function getAllPost()
    {
        $newManager = new BaseManager();
        $db = $newManager->dbConnect();

        $request = $db->query('SELECT id, title, content, miniature_img, DATE_FORMAT(creation_date,"le : %d/%m/%Y à %Hh%i") AS creation_date, DATE_FORMAT(update_date, "le : %d/%m/%Y à %Hh%i") AS update_date, status, heart_quantity, like_quantity, creation_date AS cdate FROM posts WHERE status = 1 ORDER BY cdate DESC');

        $request->execute(array());
        $result = $request->fetchAll();
        $posts = [];
        // For each post put it on an array
        foreach ($result as $post) {
            $newPost = new Post($post['id'], $post['title'], $post['content'], $post['miniature_img'], $post['creation_date'], $post['update_date'], $post['status'],$post['heart_quantity'], $post['like_quantity']);
            $posts[] = $newPost;
        }
        return $posts;
    }

    public function getAllDraft()
    {
        $newManager = new BaseManager();
        $db = $newManager->dbConnect();

        $request = $db->query('SELECT id, title, content, miniature_img, DATE_FORMAT(creation_date,"le : %d/%m/%Y à %Hh%i") AS creation_date, DATE_FORMAT(update_date, "le : %d/%m/%Y à %Hh%i") AS update_date, status, heart_quantity, like_quantity, creation_date AS cdate FROM posts WHERE status = 0 ORDER BY cdate DESC');

        $request->execute(array());
        $result = $request->fetchAll();
        $drafts = [];
        // For each post put it on an array
        foreach ($result as $draft) {
            $newDraft = new Post($draft['id'], $draft['title'], $draft['content'], $draft['miniature_img'], $draft['creation_date'], $draft['update_date'], $draft['status'],$draft['heart_quantity'], $draft['like_quantity']);
            $drafts[] = $newDraft;
        }
        return $drafts;
    }

    // Get a post by ID
    public function getPostById($id)
    {
        $newManager = new BaseManager();
        $db = $newManager->dbConnect();
        $request = $db->prepare('SELECT id, title, content, miniature_img, DATE_FORMAT(creation_date,"le : %d/%m/%Y à %Hh%i") AS creation_date, DATE_FORMAT(update_date, "le : %d/%m/%Y à %Hh%i") AS update_date, status, heart_quantity, like_quantity FROM posts WHERE id = ?');
        $request->execute(array((int)$id));
        $post = $request->fetch();
        $response = new Post($post['id'], $post['title'], $post['content'], $post['miniature_img'], $post['creation_date'], $post['update_date'], $post['status'],$post['heart_quantity'], $post['like_quantity']);

        return $response;
    }

    // Get draft post
    public function getDraft()
    {
        // Connect to DB
        $newManager = new BaseManager();
        $db = $newManager->dbConnect();
        // Request
        $request = $db->prepare('SELECT id, title, content, miniature_img, DATE_FORMAT(creation_date,"le : %d/%m/%Y à %Hh%i") AS creation_date, DATE_FORMAT(update_date, "le : %d/%m/%Y à %Hh%i") AS update_date, status, heart_quantity, like_quantity FROM posts WHERE status = 1');
        $request->execute(array());
        $results = $request->fetchAll();
        // Push in array
        $post = [];
        foreach ($results as $post) {
            $newPost = new Post($post['id'], $post['title'], $post['content'], $post['miniature_img'], $post['creation_date'], $post['update_date'], $post['status'], $post['heart_quantity'], $post['like_quantity']);
            $posts[] = $newPost;
        }
        // Return a list of comment 
        return $posts;
    }

    // TODO
    public function getUserNameFromUserId(int $userId)
    {
        $db = $this->dbConnect();
        $request = $db->query('SELECT U.username  FROM users U JOIN comments C ON U.id = c.user_id WHERE user_id= ?');
        $request->execute(array((int)$userId));
        $post = $request->fetch();
        // return $username;
    }



    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // //////////////////////////////////////////////              UPDATE              ///////////////////////////////////////////////////////
    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    // Make an update of the draft 
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

    // Add thumb to the post 
    public function addThumbToPost($id)
    {
        $newManager = new BaseManager();
        $db = $newManager->dbConnect();
        $request = $db->prepare('UPDATE posts SET like_quantity = like_quantity + 1 WHERE id = ?');
        $post = $request->execute(array($id));
        return $post;
    }
    // Remove thumb to the post 
    public function removeThumbToPost($id)
    {
        $newManager = new BaseManager();
        $db = $newManager->dbConnect();
        $request = $db->prepare('SELECT heart_quantity FROM posts WHERE id = ?');
        $post = $request->execute(array($id));
        $request = $db->prepare('UPDATE posts SET like_quantity = like_quantity - 1 WHERE id = ?');
        $post = $request->execute(array($id));

        return $post;
    }

    // Add or remove thumb to the post 
    public function addHeartToPost($id)
    {
        $newManager = new BaseManager();
        $db = $newManager->dbConnect();
        $request = $db->prepare('UPDATE posts SET heart_quantity = heart_quantity + 1 WHERE id = ?');
        $post = $request->execute(array($id));
        return $post;
    }

    public function removeHeartToPost($id)
    {
        $newManager = new BaseManager();
        $db = $newManager->dbConnect();
        $request = $db->prepare('UPDATE posts SET heart_quantity = heart_quantity - 1 WHERE id = ?');
        $post = $request->execute(array($id));

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
    
    

    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // //////////////////////////////////////              ASSOC IMG USER TABLE              /////////////////////////////////////////////////
    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    // If assoc_image_user table doesn't exist, it will create the association
    public function assocImagesUserExist($postId, $userId){
        $newManager = new BaseManager();
        $db = $newManager->dbConnect();

        $request = $db->prepare('SELECT * FROM assoc_images_users WHERE fk_post_id = ? AND fk_user_id = ?');
        $request->execute(array($postId, $userId));
        $result = $request->fetch();
        
        if(!$result){
            $request = $db->prepare('INSERT INTO assoc_images_users ( fk_post_id, fk_user_id, is_like_selected, is_heart_selected) VALUES ( ?, ?, 0, 0)');
            $request->execute(array($postId, $userId));
        }
    }

    // LIKE
    // Look if "is like" is selected for this userId
    public function checkLikeSelected($postId, $userId)
    {
        $newManager = new BaseManager();
        $db = $newManager->dbConnect();
        
        $request = $db->prepare('SELECT is_like_selected FROM assoc_images_users WHERE fk_post_id = ? AND fk_user_id = ?');
        $request->execute(array($postId, $userId));
        $result = $request->fetch();
        $result = $result['is_like_selected'];
        return $result;
    }

    //  If like is already selected => make unselected
    public function updateLikeSelected($postId, $userId)
    {
        $newManager = new BaseManager();
        $db = $newManager->dbConnect();

        $postManager = new PostManager;
        $result = $postManager -> assocImagesUserExist($postId, $userId);
        $result = $postManager -> checkLikeSelected($postId, $userId);
 
        if ($result == 1){
            $request = $db->prepare('UPDATE assoc_images_users SET is_like_selected = 0 WHERE fk_post_id = ? AND fk_user_id = ?');
            $request->execute(array($postId, $userId));
            return true;
        }
        else{
            $request = $db->prepare('UPDATE assoc_images_users SET is_like_selected = 1 WHERE fk_post_id = ? AND fk_user_id = ?');
            $request->execute(array($postId, $userId));
            return false;
        }
    }

    // HEART
    // Look if "is like" is selected for this userId
    public function checkHeartSelected($postId, $userId)
    {
        $newManager = new BaseManager();
        $db = $newManager->dbConnect();
        
        $request = $db->prepare('SELECT is_heart_selected FROM assoc_images_users WHERE fk_post_id = ? AND fk_user_id = ?');
        $request->execute(array($postId, $userId));
        $result = $request->fetch();
        $result = $result['is_heart_selected'];
        return $result;
    }

    //  If like is already selected => make unselected
    public function updateHeartSelected($postId, $userId)
    {
        $newManager = new BaseManager();
        $db = $newManager->dbConnect();

        $postManager = new PostManager;
        $result = $postManager -> assocImagesUserExist($postId, $userId);
        $result = $postManager -> checkHeartSelected($postId, $userId);
 
        if ($result == 1){
            $request = $db->prepare('UPDATE assoc_images_users SET is_heart_selected = 0 WHERE fk_post_id = ? AND fk_user_id = ?');
            $request->execute(array($postId, $userId));
            return true;
        }
        else{
            $request = $db->prepare('UPDATE assoc_images_users SET is_heart_selected = 1 WHERE fk_post_id = ? AND fk_user_id = ?');
            $request->execute(array($postId, $userId));
            return false;
        }
    }
}
