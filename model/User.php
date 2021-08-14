<?php

namespace model;

class User
{

    // VARIABLES
    private $id;
    private $username;
    private $password;
    private $email;
    private $firstname;
    private $lastname;
    private $about;
    private $is_admin;


    // CONSTRUCTOR
    public function __construct($id, $username, $password, $email, $firstname, $lastname, $about, $is_admin)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->about = $about;
        $this->is_admin = $is_admin;
    }

    // GETTERS

    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }
    
    public function getLastname()
    {
        return $this->lastname;
    }
    
    public function getAbout()
    {
        return $this->about;
    }
    
    public function getIsAdmin()
    {
        return $this->is_admin;
    }

    // SETTERS
    public function setId($id)
    {
        $id = (int) $id;
        if ($id > 0) {
            $this->id = $id;
        } else {
            throw new \Exception('Problem with $id in User model!');
        }
    }

    public function setPseudo($pseudo)
    {
        if (is_string($pseudo)) {
            $this->pseudo = $pseudo;
        } else {
            throw new \Exception('Problem with $pseudo in User model!');
        }
    }

    public function setPassword($password)
    {
        if (is_string($password)) {
            $this->password = $password;
        } else {
            throw new \Exception('Problem with $password in User model!');
        }
    }

    public function setEmail($email)
    {
        if (!is_string($email)) {
            $this->email = $email;
        } else {
            throw new \Exception('Problem with $email in User model!');
        }
    }

    public function setFirstname($firstname)
    {
        if (!is_string($firstname)) {
            $this->firstname = $firstname;
        } else {
            throw new \Exception('Problem with $firstname in User model!');
        }
    }

    public function setLastname($lastname)
    {
        if (!is_string($lastname)) {
            $this->lastname = $lastname;
        } else {
            throw new \Exception('Problem with $lastname in User model!');
        }
    }

    public function setAbout($about)
    {
        if (!is_string($about)) {
            $this->about = $about;
        } else {
            throw new \Exception('Problem with $about in User model!');
        }
    }

    public function is_admin($is_admin)
    {
        return $this->is_admin = $is_admin;
    }
}