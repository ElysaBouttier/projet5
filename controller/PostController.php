<?php
namespace Controller;


class PostController
{
    public function showRBlogView(){
        require_once('./view/frontend/blog.php');
    }

    public function showAddPostView(){
        require_once('./view/backend/add_post.php');
    }
    
}