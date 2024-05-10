<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class LoginHelper
{
    public function getResult($authResult)
    {
        $message="Invalid input";
        $status=false;

        switch($authResult)
        {
            case "EmailFound":
                $message = "You successfully login";
                $status = true;
                break;
            case "PassFailed":
                $message = "Password is incorrect";
                $status = false;
                break;
            case "EmailNotFound":
                $message = "Email not found";
                $status = false;
                break;
        }

        return $result = array(
            'message' => $message,
            'status' => $status
        );
    }
}