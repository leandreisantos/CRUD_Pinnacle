<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    /**
    * Handle login decision
    */
    public function handleLoginDecision()
    {
        if($this->isLoggedIn()) redirect('home');
        $this->loadLoginPage();
    }

    
    //** UTILITIES */

    /**
     * Load login page
     */

    private function loadLoginPage()
    {
        $data=[
            'greetingHead' => "<span>Welcome</span> sign in to website.",
            'greetingSub' => "Welcome to my platform! We're thrilled to have you here. Please enter your credentials below to access your account."
        ];

        $this->load->view('SupportComponent/header');
        $this->load->view('MainComponent/Login',$data);
        $this->load->view('SupportComponent/footer');
    }

    /**
     * Check if user is logged in
     * 
     * @return bool
     */
    private function isLoggedIn()
    {
        $userId = $this->session->userdata('user_id');
        return !empty($userId);
    }
}