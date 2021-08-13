<?php

namespace Model;

class Comment
{

    // VARIABLES
    private $id;
    private $user_id;
    private $post_id;
    private $content;
    private $date_creation;
    private $status;


    // CONSTRUCTOR
    public function __construct($id, $user_id, $post_id, $content, $date_creation, $status)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->post_id = $post_id;
        $this->content = $content;
        $this->date_creation = $date_creation;
        $this->status = $status;
    }


    // GETTERS
    public function getIdCommentary()
    {
        return $this->id;
    }
    public function getUserId()
    {
        return $this->user_id;
    }
    public function getPostId()
    {
        return $this->post_id;
    }
    public function getContent()
    {
        return $this->content;
    }
    public function getDate()
    {
        return $this->date_creation;
    }
    public function getStatus()
    {
        return $this->status;
    }


    // SETTERS
    public function setId($id)
    {
        $id = (int) $id;
        if ($id > 0) {
            $this->id = $id;
        } else {
            throw new \Exception('Problem with $id in Comment model!');
        }
    }
    public function setUserId($user_id)
    {
        $user_id = (int) $user_id;
        if ($user_id > 0) {
            $this->user_id = $user_id;
        } else {
            throw new \Exception('Problem with $user_id in Comment model!');
        }
    }
    public function setPostId($post_id)
    {
        $post_id = (int) $post_id;
        if ($post_id > 0) {
            $this->post_id = $post_id;
        } else {
            throw new \Exception('Problem with $post_id in Comment model!');
        }
    }
    public function setContent($content)
    {
        if (is_string($content)) {
            $this->content = $content;
        } else {
            throw new \Exception('Problem with $content!');
        }
    }
    public function setDate($date_creation)
    {
        return $this->date_creation = $date_creation;
    }
    public function setStatus($status)
    {
        $status = (int) $status;
        if ($status > 0) {
            $this->status = $status;
        } else {
            throw new \Exception('Problem with $status in Comment model!');
        }
    }
}
