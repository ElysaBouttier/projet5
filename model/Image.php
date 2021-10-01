<?php

namespace Elysa\Pfive\m;

class Image
{

    // VARIABLES
    private $id;
    private $url_img;
    private $heart_quantity;
    private $like_quantity;
    private $post_id;
    private $content;


    // CONSTRUCTOR
    public function __construct($id, $url_img, $heart_quantity, $like_quantity, $post_id, $content)
    {
        $this->id = $id;
        $this->url_img = $url_img;
        $this->heart_quantity = $heart_quantity;
        $this->like_quantity = $like_quantity;
        $this->post_id = $post_id;
        $this->content = $content;
    }


    // GETTERS
    public function getId()
    {
        return $this->id;
    }
    public function getUrl()
    {
        return $this->url_img;
    }
    public function getHeartQuantity()
    {
        return $this->heart_quantity;
    }
    public function getLikeQuantity()
    {
        return $this->like_quantity;
    }
    public function getPostId()
    {
        return $this->post_id;
    }
    public function getContent()
    {
        return $this->content;
    }


    // SETTERS
    public function setId($id)
    {
        $id = (int) $id;
        if ($id > 0) {
            $this->id = $id;
        } else {
            throw new \Exception('Problem with $id in Image model!');
        }
    }
    public function setUrl($url_img)
    {
        if (is_string($url_img)) {
            $this->url_img = $url_img;
        } else {
            throw new \Exception('Problem with $url_img in Image model!');
        }
    }
    public function setHeartQuantity($heart_quantity)
    {
        $heart_quantity = (int) $heart_quantity;
        if ($heart_quantity > 0) {
            $this->heart_quantity = $heart_quantity;
        } else {
            throw new \Exception('Problem with $heart_quantity in Image model!');
        }
    }
    public function setLikeQuantity($like_quantity)
    {
        $like_quantity = (int) $like_quantity;
        if ($like_quantity > 0) {
            $this->like_quantity = $like_quantity;
        } else {
            throw new \Exception('Problem with $like_quantity in Image model!');
        }
    }
    public function setPostId($post_id)
    {
        $post_id = (int) $post_id;
        if ($post_id > 0) {
            $this->post_id = $post_id;
        } else {
            throw new \Exception('Problem with $post_id in Image model!');
        }
    }
    public function setContent($content)
    {
        if (is_string($content)) {
            $this->content = $content;
        } else {
            throw new \Exception('Problem with $content in Image model!');
        }
    }
}
