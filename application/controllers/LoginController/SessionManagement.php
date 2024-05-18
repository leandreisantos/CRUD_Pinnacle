<?php
// **This controller class handle the session of login and logout
// **of the user  

defined('BASEPATH') OR exit('No direct script access allowed');

class SessionManagement extends CI_Controller
{
    private $_userModel;
    private $_departmentModel;
    private $_positionModel;

    private $_loginData;
    private $_loginHelper;
    private $_sessionHelper;
    private $_jsonHelper;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(
            array('DataAccess/LoginData_helper.php',
            'ManageOutput/Login_helper.php','SessionHelper/session_helper.php','ManageOutput/Json_helper.php')
        );
        $this->_userModel = new UserModel2();
        $this->_departmentModel = new EntityManagementModel();
        $this->_positionModel = new PositionModel();

        $this->_loginData = new LoginData();
        $this->_loginHelper = new LoginHelper();
        $this->_sessionHelper = new Session();
        $this->_jsonHelper = new Json();

    }
    
    public function handleLoginFormSubmission()
    {
        $email = $this->input->POST('email');
        $password = $this->input->POST('password');

        $authResult = $this->_userModel->authenticate($email,$password);
        $result = $this->_loginHelper->getResult($authResult); 

        if($result['status']){
            //$userId = $this->_userModel->getSingleData('email',$email,'id');
            $this->_sessionHelper->setUserSession($this->session,$this->getUserSessionData($email));
        }
        
        $this->_jsonHelper->SetOutput($this->output,$result);

    }

    public function LogOutUser()
    {
        $this->_sessionHelper->destroyUserSession($this->session);
    }

    private function getUserSessionData($email)
    {
        $positionId = $this->_userModel->getSingleData('email',$email,'position');
        $departmentId = $this->_userModel->getSingleData('email',$email,'department');

        return $sessionData = array(
            'user_id' => $this->_userModel->getSingleData('email',$email,'id'),
            'user_position' => $this->_positionModel->GetPosition($positionId,'name'),
            'user_dept'=> $this->_departmentModel->GetDepartment($departmentId,"name"),
            "sample"=>"sample"
        );
    }
    
}