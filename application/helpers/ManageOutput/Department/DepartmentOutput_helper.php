<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Output
{
    function getResult($result)
    {
        $message = ($result)?
                   "Department is already exist":
                   "New Department is added successfuly";
        $status = ($result)?false:true;

        return $response = array(
            'message' => $message,
            'status' => $status
        );
    }
    function getEditResult($result)
    {
        $message = ($result)?
                   "Department is already exist":
                   "Edit Department is successfuly";
        $status = ($result)?false:true;

        return $response = array(
            'message' => $message,
            'status' => $status
        );
    }

    function getDeleteResult()
    {
        $message = "Deleted successfully";
        $status = true;

        return $response = array(
            'message' => $message,
            'status' => $status
        );
    }

    function getNullResult()
    {
        return $response = array(
            'message' => "You need to add name of department",
            'status' => false
        );
    }
}