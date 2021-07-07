<?php

namespace App\Model;

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
        $this->commentary_id = $commentary_id;
        $this->fk_blogpost_id = $fk_blogpost_id;
        $this->username = $username;
        $this->titleCommentary = $titleCommentary;
        $this->content = $content;
        $this->commentary_status = $commentary_status;
        $this->date_creation = $date_creation;
        $this->update_date = $update_date;
    }


    // GETTERS
    public function getIdCommentary()
    {
        return $this->commentary_id;
    }
    public function getIdBlogPost()
    {
        return $this->fk_blogpost_id;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function getTitleCommentary()
    {
        return $this->titleCommentary;
    }
    public function getContent()
    {
        return $this->content;
    }
    public function getValidateStatus()
    {
        return $this->commentary_status;
    }
    public function getDateCommentary()
    {
        return $this->date_creation;
    }
    public function getUpdateDate()
    {
        return $this->update_date;
    }


    // SETTERS
    public function setIdCommentary($idCommentary)
    {
        $idCommentary = (int) $idCommentary;
        if ($idCommentary > 0) {
            $this->idCommentary = $idCommentary;
        } else {
            throw new \Exception('Problème avec $blogpost_date_creation!');
        }
    }
    public function setIdBlogPost($idBlogPost)
    {
        $idBlogPost = (int) $idBlogPost;
        if ($idBlogPost > 0) {
            $this->idBlogPost = $idBlogPost;
        } else {
            throw new \Exception('Problème avec $idBlogPost!');
        }
    }
    public function setAuthorCommentary($authorCommentary)
    {
        if (is_string($authorCommentary)) {
            $this->authorCommentary = $authorCommentary;
        } else {
            throw new \Exception('Problème avec $authorCommentary!');
        }
    }
    public function setTitleCommentary($titleCommentary)
    {
        if (is_string($titleCommentary)) {
            $this->titleCommentary = $titleCommentary;
        } else {
            throw new \Exception('Problème avec $titleCommentary!');
        }
    }
    public function setContentCommentary($content)
    {
        if (is_string($content)) {
            $this->content = $content;
        } else {
            throw new \Exception('Problème avec $content!');
        }
    }
    public function setValidateStatus($validateStatus)
    {
        if (is_bool($validateStatus)) {
            $this->validateStatus = $validateStatus;
        } else {
            throw new \Exception('Problème avec $validateStatus!');
        }
    }
    public function setDateCommentary($date_creation)
    {
        return $this->date_creation = $date_creation;
    }
    public function setUpdateCommentary($update_date)
    {
        return $this->update_date = $update_date;
    }
}
