<?php

namespace Elysa\Pfive\m;

class CommentManager extends BaseManager
{
    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // //////////////////////////////////////////////              CREATE              ///////////////////////////////////////////////////////
    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function add($userId, $id, $content)
    {
        // Connect to DB
        $newManager = new BaseManager();
        $db = $newManager->dbConnect();
        // Request
        $request = $db->prepare('INSERT INTO comments (user_id, post_id, content, date_creation, status) VALUES (?, ?, ?, Now(), 0)');
        $images = $request->execute(array($userId, $id, $content));

        return $images;
    }

    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // //////////////////////////////////////////////              READ              ///////////////////////////////////////////////////////
    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function getCommentsFromPost($id)
    {
        // Connect to DB
        $newManager = new BaseManager();
        $db = $newManager->dbConnect();
        // Request

        $request = $db->prepare('SELECT c.*, u.username FROM comments c, users u WHERE u.id=c.user_id AND c.post_id = ?');
        // TODO requete avec jointure pour recuperer username comment
        // $request = $db->prepare('SELECT id, user_id, post_id, content, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%i\') AS date_creation, status FROM comments WHERE post_id = ?');
        $request->execute(array($id));
        $result = $request->fetchAll();
        // Push in array
        $comments = [];
        foreach ($result as $comment) {
            $newComment = new Comment($comment['id'], $comment['user_id'], $comment['post_id'], $comment['content'], $comment['date_creation'], $comment['status']);
            $newComment->setUsername($comment['username']);
            $comments[] = $newComment ;
        }
        // Return a list of comment 
        return $comments;
    }
    public function getReportedComments()
    {
        // Connect to DB
        $newManager = new BaseManager();
        $db = $newManager->dbConnect();
        // Request
        $request = $db->query('SELECT u.username, c.id, c.user_id, c.post_id, c.content, DATE_FORMAT(c.date_creation, \'%d/%m/%Y à %Hh%i\') AS date_creation, c.status FROM comments c, users u WHERE c.status = 1 ORDER BY c.date_creation DESC LIMIT 10');
        $request->execute(array());
        $result = $request->fetchAll();      
        // Push in array
        $comments = [];
        foreach ($result as $comment) {
            $newComment = new Comment($comment['id'], $comment['user_id'], $comment['post_id'], $comment['content'], $comment['date_creation'], $comment['status']);
            $newComment->setUsername($comment['username']);
            $comments[] = $newComment;
        }
        return $comments;
    }

    public function getUsername($userId) //passer tableau userId 
    {
        // Connect to DB
        $newManager = new BaseManager();
        $db = $newManager->dbConnect();
        // Request
        $request = $db->prepare('SELECT username FROM users WHERE id=?');
        $username = $request->execute(array($userId));
        return $username;
    }

    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // //////////////////////////////////////////////              UPDATE              ///////////////////////////////////////////////////////
    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function alertComment($id)
    {
        // Connect to DB
        $newManager = new BaseManager();
        $db = $newManager->dbConnect();
        // Request
        $request = $db->prepare('UPDATE comments SET status= 1 WHERE id = ?');
        $alertedComment = $request->execute(array($id));
        return $alertedComment;
    }

    public function validateComment($id)
    {
        // Connect to DB
        $newManager = new BaseManager();
        $db = $newManager->dbConnect();
        // Request
        $request = $db->prepare('UPDATE comments SET status = 2 WHERE id = ?');
        $comment = $request->execute(array($id));

        return $comment;
    }

    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // //////////////////////////////////////////////              DELETE              ///////////////////////////////////////////////////////
    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function deleteComment($id)
    {
        $baseManager = new BaseManager();
        $db = $baseManager->dbConnect();
        // Request
        $request = $db->prepare('DELETE FROM comments WHERE id = ?');
        $deletedComment = $request->execute(array($id));
        return $deletedComment;
    }
}
