<?php

namespace Elysa\Pfive\m;

class UserManager extends BaseManager
{
  // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // //////////////////////////////////////////////              CREATE              ///////////////////////////////////////////////////////
  // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  public function addUser($username, $password, $email, $firstname, $lastname)
  {
    $db = $this->dbConnect();
    $request = $db->prepare('INSERT INTO users (username, password, email, firstname, lastname, about, is_admin) VALUES (?, ?, ?, ?, ?," ", 1)');
    $request->execute(array($username, $password, $email, $firstname, $lastname));
  }

  // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // //////////////////////////////////////////////              READ              ///////////////////////////////////////////////////////
  // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  public function getUser($username)
  {
    $db = $this->dbConnect();
    $request = $db->prepare('SELECT * FROM users WHERE username = ?');
    $request->execute(array($username));
    $user = $request->fetch();
    return $user;
  }

  // If username exist return the number of username.
  public function numberOfUsername($username)
  {
    $db = $this->dbConnect();
    $request = $db->prepare('SELECT * FROM users WHERE username = ?');
    $request->execute(array($username));
    global $numberOfUsername;
    $numberOfUsername = $request->rowCount();
    return $numberOfUsername;
  }

  public function numberOfUserEmail($email)
  {
    $db = $this->dbConnect();
    $request = $db->prepare('SELECT * FROM users WHERE email = ?');
    $request->execute(array($email));
    global $numberOfUserEmail;
    $numberOfUserEmail = $request->rowCount();
    return $numberOfUserEmail;
  }

  //Check if the user username is in DB
  public function checkUserParams($username)
  {
    $db = $this->dbConnect();
    $request = $db->prepare('SELECT * FROM users WHERE username = ?');
    $request->execute(array($username));
    global $checkedUserParams;
    $checkedUserParams = $request->fetch();
    return $checkedUserParams;
  }

  // Get edito
  public function getEdito()
  {
    $newManager = new BaseManager();
    $db = $newManager->dbConnect();
    $reponse = $db->query("SELECT about FROM users WHERE username = 'admin' AND is_admin = 0");
    $edito = $reponse->fetch();
    $ed = $edito['about'];
    return $ed;
  }

  //Check if the user username is in DB
  public function getUserIdFromName($username)
  {
    $db = $this->dbConnect();
    $request = $db->prepare('SELECT id FROM users WHERE username = ?');
    $request->execute(array($username));
    $userId = $request->fetch();
    return $userId['id'];
  }

  private function getUsernameByUserId($id)
  {
    $db = $this->dbConnect();
    // Request
    $request = $db->prepare('SELECT U.username, C.* FROM users U JOIN comments C ON U.id = C.user_id
     WHERE C.id=?');
    $request->execute(array($id));
    $username = $request->fetchAll();
    foreach ($username as $comment) {
      $newComment = new Comment($comment['id'], $comment['user_id'], $comment['post_id'], $comment['content'], $comment['date_creation'], $comment['status']);
      $newComment->setUsername($comment['username']);
      $comments[] = $newComment;
    }
    return $comments;
  }

  // commentaire 1 écrit par toto
  // comm 2 ecrit par admin
  public function getUsernames($comments)
  {
    for ($i = 0; $i < count($comments); $i++) {
      $id = $comments[$i]->getId();
      $user = $this->getUsernameByUserId($id);
      $username = $user[0];
      // var_dump($username);
    }
    return $username;
  }


  // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // //////////////////////////////////////////////              UPDATE              ///////////////////////////////////////////////////////
  // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  public function updateEdito($content)
  {
    // Connect to DB
    $newManager = new BaseManager();
    $db = $newManager->dbConnect();
    // Request
    $request = $db->prepare("UPDATE users SET about = ? WHERE username = 'admin' AND is_admin = 0");
    $comment = $request->execute(array($content));
    return $comment;
  }
  public function updateCommentary($commentary_id, $content)
  {
    // Connect to DB
    $newManager = new BaseManager();
    $db = $newManager->dbConnect();
    // Request
    $request = $db->prepare('UPDATE comments SET content = ?, update_date = NOW() WHERE commentary_id = ?');
    $comment = $request->execute(array($content, $commentary_id));

    return $comment;
  }

  // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // //////////////////////////////////////////////              DELETE              ///////////////////////////////////////////////////////
  // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
