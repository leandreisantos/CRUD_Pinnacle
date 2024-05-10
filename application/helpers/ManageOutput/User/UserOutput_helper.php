<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Output
{
    function getResult($result)
    {
        $message = ($result)?
                   "Email is already exist":
                   "New User is added successfuly";
        $status = ($result)?false:true;

        return $response = array(
            'message' => $message,
            'status' => $status
        );
    }
    
    function getEditResult($result)
    {
        $message = ($result)?
        "User is already exist":
        "Edit User is successfuly";
        $status = ($result)?false:true;

        return $response = array(
        'message' => $message,
        'status' => $status
        );
    }

    function getNullResult()
    {
        return $response = array(
            'message' => "You need to fill up all form",
            'status' => false
        );
    }
}