<?php

namespace Model;

class Message
{
    public function __contruct()
    {
    }

    // Return error message
    public function setError($message)
    {
        log("errror msg");
        global $alert;
        $alert = [
            'alertMessage' => $message
        ];
    }

    // Return succes message
    public function setSuccess($message)
    {
        log("Success msg");
        global $success;
        $success = [
            'successMessage' => $message
        ];
    }
}
