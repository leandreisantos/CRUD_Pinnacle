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
        $components = array(
            'SupportComponent/header',
            'MainComponent/Login',
            'SupportComponent/footer'
        );

        foreach($components as $component){
            $this->load->view($component);
        }
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