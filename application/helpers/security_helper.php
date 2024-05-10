<?php
if(!function_exists('verify_password'))
{
    function verify_password($password,$hashedpassword)
    {
        return password_verify($password,$hashedpassword);
    }
}