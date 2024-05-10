<?php
// ** This helper class help to manage to set
// ** and remove user session

if(!defined('BASEPATH')) exit('No direct script access allowed');
class Session
{
    function setUserSession($session,$data)
    {
        $session->set_userdata($data);
    }

    function destroyUserSession($session)
    {
        $session->sess_destroy();
        redirect('login');
    }
}