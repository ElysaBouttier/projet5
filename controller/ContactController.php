<?php
namespace App\Controller;



class ContactController
{
    public function showContactView(){
        echo("Coucou");
        require_once('../view/frontend/contact.php');
    }
}