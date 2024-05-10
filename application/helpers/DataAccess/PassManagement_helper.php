<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class PassManagement
{
    public function HashThisPassword($password)
    {
        return password_hash($password,PASSWORD_DEFAULT);
    }
}