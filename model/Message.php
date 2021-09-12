<?php

namespace Elysa\Pfive\m;

class Message
{
    public function __contruct()
    {
    }

    // Return error message
    public function setError($message)
    {
        global $alert;
        $alert = [
            'alertMessage' => $message
        ];
    }

    // Return succes message
    public function setSuccess($message)
    {
        global $success;
        $success = [
            'successMessage' => $message
        ];
    }
}
