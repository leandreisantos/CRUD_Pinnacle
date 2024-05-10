<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class ProfileController extends CI_Controller
{
    private $_jsonHelper;
    private $_activeUser;
    //private $_userModel;
    //private $_positionModel;
    //private $_departmentModel;
    private $_userDTO;

    public function __construct()
    {
        parent::__construct();

        //** Models*/
        $this->load->model('UserDTO');

        //**Helper */
        $this->_jsonHelper = new Json();

        //**Decleration */
        //$this->_userModel = new UserModel2();
        //$this->_positionModel = new PositionModel();
        //$this->_departmentModel = new EntityManagementModel();
        $this->_userDTO = new UserDTO();

        $this->_activeUser = $this->session->userdata('user_id');
        $this->load->model('DataManagementModel');
    } 

    public function showProfileTab()
    {
        //**Fetch user data and create DTO */
        //$userData = $this->_userModel->GetUser($this->_activeUser);
        $userData = $this->DataManagementModel->getSingleData('id',$this->_activeUser,'employee');
        $userDTO = $this->createUserDTO($userData);

        //**Prepare data for the view */
        $viewData = [
            'user' => $userDTO,
            'userId' => $userData['id'],
            'aliasName' => $this->generateAliasName($userData)

        ];

        //**Set output */
        $viewData['profileTab'] = $this->load->view('TabComponent/profile_tab_view',$viewData,true);
        $this->_jsonHelper->SetOutput($this->output,$viewData);
    }

    public function editProfile()
    {
        $data=[
            'inputDisabled'=>false,
            'buttonForEdit'=>$this->load->view('SupportComponent/Profile/editInfo','',true)
        ];

        $this->_jsonHelper->SetOutput($this->output,$data);
    }

    public function saveChanges()
    {
        //Retrieve Form Data
        $data = array(
            'firstName' => $this->input->post('firstName'),
            'lastName' => $this->input->post('lastName'),
            'pet' => $this->input->post('pet')
        );

        $this->DataManagementModel->updateSingleData($data,$this->_activeUser,'id','employee');

        // $output = false;

        // if($data['firstName']==""){
        //     $output = false;
        // }
        
        // if($data['lastName']==""){
        //     $output = false;
        // }
        
        // if($data['pet']==""){
        //     $output = false;
        // } else {
        //    // $result = $this->_userModel->updateUser($data,$this->_activeUser);

        //     $result = $this->DataManagementModel->updateSingleData($data,$this->_activeUser,'id','employee');
        //     $output = $result ? true: false;
            
        // }

        // if($output)
        // {
        //     echo "Changes saved successfully!";
        // } else {
        //     echo "Failed to save changes.";
        // }
    }


    //** UTILITIES */
    private function generateAliasName($userData)
    {
        $firstNameInitial = strtoupper(substr($userData['firstName'],0,1));
        $lastNameInitial = strtoupper(substr($userData['lastName'],0,1));
        return $firstNameInitial.$lastNameInitial;
    }

    private function createUserDTO($userData)
    {
        $this->_userDTO->firstName = $userData['firstName'];
        $this->_userDTO->lastName = $userData['lastName'];
        $this->_userDTO->pet = $userData['pet'];
        $this->_userDTO->email = $userData['email'];
        $this->_userDTO->department = $this->getDepartmentName($userData['department']);
        $this->_userDTO->position = $this->getPositionName($userData['position']);
        $this->_userDTO->role = $userData['role'];

        return $this->_userDTO;
    }

    private function getPositionName($positionId)
    {
        //return $this->_positionModel->GetPosition($positionId,'name');
        return $this->DataManagementModel->fetchSpecific('id',$positionId,'name','positions');
    }
    private function getDepartmentName($deptId)
    {
        //return $this->_departmentModel->GetDepartment($deptId,'name');
        return $this->DataManagementModel->fetchSpecific('id',$deptId,'name','departments');
    }
}