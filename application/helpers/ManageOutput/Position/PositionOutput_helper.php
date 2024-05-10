<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Output
{
    function getResult($result)
    {
        $message = ($result)?
                   "Position is already exist":
                   "New Position is added successfuly";
        $status = ($result)?false:true;

        return $response = array(
            'message' => $message,
            'status' => $status
        );
    }
    function getNullResult()
    {
        return $response = array(
            'message' => "You need to add name of position",
            'status' => false
        );
    }

    function getEditResult($result)
    {
        $message = ($result)?
                   "Position is already exist":
                   "Edit Position is successfuly";
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
}