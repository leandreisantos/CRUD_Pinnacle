<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Json
{
    public function SetOutput($ci_instance,$output)
    {
        $ci_instance
             ->set_content_type('application/json')
             ->set_output(json_encode($output));
    }
}