<?php

namespace Elysa\Pfive\m;

class Post
{

    // VARIABLES
    private $id;
    private $title;
    private $content;
    private $miniature_img;
    private $creation_date;
    private $update_date;
    private $status;
    private $heart_quantity;
    private $like_quantity;


    // CONSTRUCTOR
    public function __construct($id, $title, $content, $miniature_img, $creation_date, $update_date, $status, $heart_quantity, $like_quantity)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->miniature_img = $miniature_img;
        $this->creation_date = $creation_date;
        $this->update_date = $update_date;
        $this->status = $status;
        $this->heart_quantity = $heart_quantity;
        $this->like_quantity = $like_quantity;
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

    public function getMiniatureImg()
    {
        return $this->miniature_img;
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
    public function getHeartQuantity()
    {
        return $this->heart_quantity;
    }
    public function getLikeQuantity()
    {
        return $this->like_quantity;
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

    public function setMiniatureImg($miniature_img)
    {
        if (is_string($miniature_img)) {
            $this->miniature_img = $miniature_img;
        } else {
            throw new \Exception('Problem with $miniature_img in Post model!');        }
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
    public function setHeartQuantity($heart_quantity)
    {
        $heart_quantity = (int) $heart_quantity;
        if ($heart_quantity > 0) {
            $this->heart_quantity = $heart_quantity;
        } else {
            throw new \Exception('Problem with $heart_quantity in Post model!');
        }
    }
    public function setLikeQuantity($like_quantity)
    {
        $like_quantity = (int) $like_quantity;
        if ($like_quantity > 0) {
            $this->like_quantity = $like_quantity;
        } else {
            throw new \Exception('Problem with $like_quantity in Post model!');
        }
    }
}
