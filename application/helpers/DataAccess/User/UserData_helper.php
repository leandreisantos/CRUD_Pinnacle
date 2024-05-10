<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class UserData{
    public function getDataFromForm($ci_instance)
    {
        return $userData = [
            'firstName' => $ci_instance->input->POST('firstName'),
            'lastName' => $ci_instance->input->POST('lastName'),
            'pet' => $ci_instance->input->POST('pet'),
            'email' => $ci_instance->input->POST('email'),
            'password' => $ci_instance->input->POST('password'),
            'department'=>$ci_instance->input->POST('department'),
            'position'=>$ci_instance->input->POST('position')
        ];
    }

    public function getDataFromEdit($ci_instance)
    {
        return $userData = [
            'id'=>$ci_instance->input->POST('id'),
            'firstName' => $ci_instance->input->POST('firstName'),
            'lastName' => $ci_instance->input->POST('lastName'),
            'pet' => $ci_instance->input->POST('pet'),
            'email' => $ci_instance->input->POST('email'),
            'department'=>$ci_instance->input->POST('department'),
            'position'=>$ci_instance->input->POST('position')
        ];
    }
}