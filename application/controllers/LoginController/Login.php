<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function handleLoginDecision()
    {
        if($this->is_session_started('id'))
        {
            redirect('home');
        }

        $this->load->view('SupportComponent/header.php');
        $this->load->view('MainComponent/Login.php');
        $this->load->view('SupportComponent/footer.php');
    }

    
    //** UTILITIES */

    private function is_session_started($dataInfo)
    {
        $sessionId = $this->session->userdata('user_id');
        return !empty($sessionId);
    }
}