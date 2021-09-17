<?php

namespace Elysa\Pfive\m;

class Post
{

    // VARIABLES
    private $id;
    private $title;
    private $content;
    private $creation_date;
    private $update_date;
    private $status;


    // CONSTRUCTOR
    public function __construct($id, $title, $content, $creation_date, $update_date, $status)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->creation_date = $creation_date;
        $this->update_date = $update_date;
        $this->status = $status;
    }

    // GETTERS
    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getCreationDate()
    {
        return $this->creation_date;
    }

    public function getUpdateDate()
    {
        return $this->update_date;
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
            throw new \Exception('Problem with $id in Post model!');
        }
    }

    public function setTitle($title)
    {
        if (is_string($title)) {
            $this->title = $title;
        } else {
            throw new \Exception('Problem with $title in Post model!');        }
    }

    public function setContent($content)
    {
        if (is_string($content)) {
            $this->content = $content;
        } else {
            throw new \Exception('Problem with $content in Post model!');        }
    }

    public function setDateCreation($creation_date)
    {
        return $this->creation_date = $creation_date;
    }

    public function setUpdateModification($update_date)
    {
        return $this->update_date = $update_date;
    }

    public function setStatus($status)
    {
        $status = (int) $status;
        if ($status > 0) {
            $this->status = $status;
        } else {
            throw new \Exception('Problem with $status in Post model!');
        }
    }
}
