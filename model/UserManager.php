<?php

namespace App\Model;

class UserManager extends BaseManager
{
    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // //////////////////////////////////////////////              CREATE              ///////////////////////////////////////////////////////
    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function addUser($username, $password, $email, $firstname, $lastname)
    {
      $db = $this->dbConnect();
      var_dump($username);
      print_r($username);
      print("coucou .....////////////////////////////////////////////////////");
      var_dump("coucou .....////////////////////////////////////////////////////");
      // $request = $db->prepare('INSERT INTO users (username, password, email, firstname, lastname, about, is_admin) VALUES (?, ?, ?, ?, ?," ", 1)');
      $request = $db->prepare("INSERT INTO users (username, password, email, firstname, lastname, about, is_admin) VALUES ('admin', 'Admin123!', 'eee@eee.fr', 'coucou', 'coucou', ' ', 1)");
     
      
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
    global $checkedUsername;
    $checkedUsername = $request->rowCount();
    return $checkedUsername;
    }

    public function numberOfUserEmail($email)
    {
    $db = $this->dbConnect();
    $request = $db->prepare('SELECT * FROM users WHERE email = ?');
    $request->execute(array($email));
    global $checkedUserEmail;
    $checkedUserEmail = $request->rowCount();
    return $checkedUserEmail;
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

    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // //////////////////////////////////////////////              UPDATE              ///////////////////////////////////////////////////////
    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // //////////////////////////////////////////////              DELETE              ///////////////////////////////////////////////////////
    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
