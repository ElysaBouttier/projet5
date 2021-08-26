<?php

namespace Elysa\Pfive\c;


class PostController
{
    public function showBlogView()
    {
        require_once('./view/frontend/blog.php');
    }

    public function showAddPostView()
    {
        require_once('./view/backend/add_post.php');
    }


    // 
    // 
    // TODO
    // 
    // 
    public function addPost(){

    }
}
