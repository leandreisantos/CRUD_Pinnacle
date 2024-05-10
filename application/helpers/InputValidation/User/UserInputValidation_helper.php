<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class UserInputValidation
{
    public function IsValid($userData)
    {
        $result = true;
        
        //** Checking for all input fields if empty */
        foreach($userData as $key=>$value)
        {
            if($value=="") $result=false;
        }

        //**Check the department and position input selection if they select any value */
        if($userData['department']==0||$userData['position']==0)
        {
            $result = false;
        }

        return $result;
    }

    public function MatchPassword($password,$confPassword)
    {
        return true; //TODO: NEED TO COMPARE PASS AND CONF PASS
    }
}