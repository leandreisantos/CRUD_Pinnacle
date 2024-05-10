<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class LoginData
{
    public function GetData($ci_instance)
    {
        $_userLoginInfo = [
            'email'=>$ci_instance->input->POST('email'),
            'password'=>$ci_instance->input->POST('password')
        ];

        return $_userLoginInfo;
    }
}