<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class UpdateData
{
    public function GetData($ci_instance)
    {
        $userData = [
            'firstName ' => $ci_instance->input->POST('firstName'),
            'lastName' => $ci_instance->input->POST('lastName'),
            'pet' => $ci_instance->input->POST('pet'),
            'email' => $ci_instance->input->POST('email')
        ];

        return $userData;
    }
}