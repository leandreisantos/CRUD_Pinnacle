<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class ValidateForm extends CI_Controller
{
    public function DataFromForm($ci_instance)
    {
            $ci_instance->form_validation->set_rules('firstName','firstName','trim|required|regex_match[/[a-zA-Z]/]');
            $ci_instance->form_validation->set_rules('lastName','lastName','trim|required|regex_match[/[a-zA-Z]/]');
            $ci_instance->form_validation->set_rules('pet','pet','trim|required|regex_match[/[a-zA-Z]/]');
    
            if($this->form_validation->run())
            {
                return true;
            }
    }
}