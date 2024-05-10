<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller
{
    private $_jsonHelper;    

    public function __construct()
    {
        parent::__construct();
        $this->_jsonHelper = new Json();
    }

    public function ShowAllNotification()
    {
        $data['body'] = $this->load->view('TabComponent/notification','',true);
        $this->_jsonHelper->SetOutput($this->output,$data);
    }
}