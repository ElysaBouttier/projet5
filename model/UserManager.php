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
    // $request = $db->prepare("INSERT INTO users (username, password, email, firstname, lastname, about, is_admin) VALUES ('admin', 'Admin123!', 'eee@eee.fr', 'coucou', 'coucou', ' ', 1)");


    $request->execute(array($username, $password, $email, $firstname, $lastname));
  }

  // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // //////////////////////////////////////////////              READ              ///////////////////////////////////////////////////////
  // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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

  // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // //////////////////////////////////////////////              UPDATE              ///////////////////////////////////////////////////////
  // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  public function updateEdito($content){
    // Connect to DB
    $newManager = new BaseManager();
    $db = $newManager->dbConnect();
    // Request
    $request = $db->prepare("UPDATE users SET about = ? WHERE username = 'admin' AND is_admin = 0");
    $comment = $request->execute(array($content));
    return $comment;
}
public function updateCommentary($commentary_id, $content){
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
