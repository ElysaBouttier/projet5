<?php
namespace Elysa\Pfive\m;

class CommentManager extends BaseManager
{
    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // //////////////////////////////////////////////              CREATE              ///////////////////////////////////////////////////////
    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // //////////////////////////////////////////////              READ              ///////////////////////////////////////////////////////
    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function getCommentsFromPost($id){
        // Connect to DB
        $newManager = new BaseManager();
        $db = $newManager->dbConnect();
        // Request
        $request = $db->prepare('SELECT id, user_id, post_id, content, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%i\') AS date_creation, status FROM comments WHERE post_id = ?');
        $request->execute(array($id));
        $result = $request->fetchAll();
        // Push in array
        $comments = [];
        foreach ($result as $comment) {
            $newComment = new Comment($comment['id'], $comment['user_id'], $comment['post_id'], $comment['content'], $comment['date_creation'], $comment['status']);
            $comments[] = $newComment;
        }
        // Return a list of comment 
        return $comments;
    }
    public function getReportedComments() {
        // Connect to DB
        $newManager = new BaseManager();
        $db = $newManager->dbConnect();
        // Request
        $request = $db->query('SELECT id, user_id, post_id, content, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%i\') AS date_creation, status FROM comments WHERE status = 1 ORDER BY status DESC LIMIT 10');
        $request->execute(array());
        $result = $request->fetchAll();
        // Push in array
        $comments = [];
        foreach ($result as $comment) {
            $newComment = new Comment($comment['id'], $comment['user_id'], $comment['post_id'], $comment['content'], $comment['date_creation'], $comment['status']);
            $comments[] = $newComment;
        }
        return $comments;
    }

    public function getUsername($id) {
        // Connect to DB
        $newManager = new BaseManager();
        $db = $newManager->dbConnect();
        // Request
        $request = $db->query('SELECT username FROM users AS u, comments AS c WHERE u.id=c.user_id ');
        $request->execute();
        $username = $request->fetch();
        return $username["username"];
    }

    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // //////////////////////////////////////////////              UPDATE              ///////////////////////////////////////////////////////
    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function alertComment($post_id)
    {
        // Connect to DB
        $newManager = new BaseManager();
        $db = $newManager->dbConnect();
        // Request
        $request = $db->prepare('UPDATE comments SET status= 1 WHERE post_id = ?');
        $alertedComment = $request->execute(array($post_id));
        return $alertedComment;
    }

    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // //////////////////////////////////////////////              DELETE              ///////////////////////////////////////////////////////
    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}