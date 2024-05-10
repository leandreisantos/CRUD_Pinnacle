<?php
// **This class is handle the storing new user
// **,updating information of user and deleting a user
defined('BASEPATH') OR exit('No direct script access allowed');

class DataManagement extends CI_Controller
{
    public $_userModel;
    public $_updateData;
    private $_departmentModel;
    private $_positionModel;
    private $_entityModel;

    private $_userDataHelper;
    private $_userOutputHelper;
    private $_passwordHelper;
    private $_jsonHelper;
    private $_inputValidation;
    private $_logStatus;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('DataAccess/User/UserData_helper','ManageOutput/User/UserOutput_helper',
        'DataAccess/PassManagement_helper','ManageOutput/Json_helper','DataAccess/UpdateData_helper.php',
        'InputValidation/User/UserInputValidation_helper.php'));

        $this->_userModel = new UserModel2();
        $this->_departmentModel = new EntityManagementModel();
        $this->_positionModel = new PositionModel();
        $this->_logStatus = new LogStatusModel();

        $this->load->model('DatabaseModel/EntityManagementModel2');
        $this->_entityModel = new EntityManagementModel2();

        $this->_updateData = new UpdateData();
        $this->_userDataHelper = new UserData();
        $this->_userOutputHelper = new Output();
        $this->_passwordHelper = new PassManagement();
        $this->_inputValidation = new UserInputValidation();
        $this->_jsonHelper = new Json();
    }

    public function Action($action,$id="0",$updateInfo="information")
    {
            $data = $this->_updateData->GetData($this);

            switch($action)
            {
                case "Create":
                    $this->Create($data);
                    break;
                case "Edit":
                    $this->Edit();
                    break;
                case "Update":
                    $this->Update($data,$id,$updateInfo);
                    break;
                case "Delete":
                    $this->Delete($id);
                default:
                    show_404();
            }
    }

    public function Create($data)
    {
        $manageOutput = $this->_userOutputHelper->getNullResult();

        $userData = $this->_userDataHelper->getDataFromForm($this);
        $allFieldsInputted = $this->_inputValidation->IsValid($userData);
        $isPasswordMatch = $this->_inputValidation->MatchPassword($userData['password'],$userData['password']);

        if($allFieldsInputted)
        {
            if($isPasswordMatch)
            {
                $isEmailExist = $this->_userModel->IsEmailExist($userData['email']);
        
                if(!$isEmailExist)
                {
                    $userData['password'] = $this->_passwordHelper->HashThisPassword($userData['password']);

                    //** ADD NEW USER TO TABLE */
                    $this->_userModel->insertUser($userData);
                    $userId = $this->_userModel->GetLastInsertedId();

                    //** ADD THE USER IN TIME LOG TABLE*/
                    $timelogData = $this->GetTimeLogData($userId);
                    $this->_logStatus->SetStatus($timelogData);
                }
                    
                $manageOutput = $this->_userOutputHelper->getResult($isEmailExist);
            }
        }
        
        $employees = $this->_entityModel->GetSingleEntity('employee');
        $currentIndex = 0;
        foreach($employees as $employee)
        {
            //** CHANGE THE DEPARTMENT & POSITION ID WITH NAME BEFORE SHOW IN TABLE */
            $departmentId = $employee->department;
            $departmentName = $this->_departmentModel->GetDepartment($departmentId,'name');
            $employees[$currentIndex]->department = $departmentName;

            $positionId = $employee->position;
            $positionName = $this->_positionModel->GetPosition($positionId,'name');
            $employees[$currentIndex]->position = $positionName;

            $employee->aliasName = strtoupper(substr($employee->firstName,0,1).substr($employee->lastName,0,1));

            $currentIndex ++;
        }
        //$completeData = $this->DeptAndPostToName($employees);
        $userData["employees"] = $employees;
        $manageOutput['tbody'] = $this->load->view('SupportComponent/User/userTable',$userData,true);
        $this->_jsonHelper->SetOutput($this->output,$manageOutput);
    }

    public function Edit()
    {
        $this->data = $this->_userDataHelper->getDataFromEdit($this);
        $isEmailExist = $this->_userModel->IsEmailExist($this->data['email']);
        // if(!$isEmailExist)
        // {
            $this->_userModel->updateUser($this->data,$this->data['id']);
        // }

        $employees = $this->_entityModel->GetSingleEntity('employee');
        $currentIndex = 0;
        foreach($employees as $employee)
        {
            //** CHANGE THE DEPARTMENT & POSITION ID WITH NAME BEFORE SHOW IN TABLE */
            $departmentId = $employee->department;
            $departmentName = $this->_departmentModel->GetDepartment($departmentId,'name');
            $employees[$currentIndex]->department = $departmentName;

            $positionId = $employee->position;
            $positionName = $this->_positionModel->GetPosition($positionId,'name');
            $employees[$currentIndex]->position = $positionName;

            $employee->aliasName = strtoupper(substr($employee->firstName,0,1).substr($employee->lastName,0,1));

            $currentIndex ++;
        }
        //$completeData = $this->DeptAndPostToName($employees);
        $userData["employees"] = $employees;
        $manageOutput['tbody'] = $this->load->view('SupportComponent/User/userTable',$userData,true);
        $this->_jsonHelper->SetOutput($this->output,$manageOutput);

        // $employees = $this->_entityModel->GetSingleEntity('employee');
        // $completeData = $this->DeptAndPostToName($employees);
        // $userData["employees"] = $completeData;
        // $manageOutput = $this->_userOutputHelper->getEditResult(false);
        // $manageOutput['tbody'] = $this->load->view('SupportComponent/User/userTable',$userData,true);

        // $this->_jsonHelper->SetOutput($this->output,$manageOutput);
    }


    private function Update($data,$id,$updateInfo)
    {
        if($updateInfo == "updateRole")
        {
            $inWhatInfo = $this->input->POST('role');
            $roleData = array(
                'role' => $inWhatInfo
            );
            $this->_userModel->updateUser($roleData,$id);
        }else{
            $this->_userModel->updateUser($data, $id);
        }
    }

    private function Delete(/*$id*/)
    {
        //** Check if user deletion was successful */
        //$this->_userModel->deleteUser($id);
        // if($this->_userModel->deleteUser($id))
        // {
        //     echo "Successfully deleted";
        // } 
        // else 
        // {
        //     echo "Failed to delete user";
        // }

        //GET ID
        $userId = $this->input->POST('id');
        if($this->_userModel->deleteUser($userId)){
            redirect('home');
        } else {
            echo "Deleting employee failed";
        };
    }
    public function SortBy($pattern)
    {

        //GET JSON
        $json_data = $this->input->post('employees');
        //Decode the JSON data into an array
        $employees = json_decode($json_data,true);
        
        // $employees = null;

        if($pattern == 'all'){
            $employees = $this->_entityModel->GetSingleEntity('employee');
        }else{
        //     $employees = $this->_entityModel->GetEmployeeSortedBy($pattern,'employee');
        // }
            // unsort($employees,function($a,$b){
            //     return strcmp($a[$pattern],$b[$pattern]);
            // });

         }
        $currentIndex = 0;
        foreach($employees as $employee)
        {
            //** CHANGE THE DEPARTMENT & POSITION ID WITH NAME BEFORE SHOW IN TABLE */
            $departmentId = $employee->department;
            $departmentName = $this->_departmentModel->GetDepartment($departmentId,'name');
            $employees[$currentIndex]->department = $departmentName;

            $positionId = $employee->position;
            $positionName = $this->_positionModel->GetPosition($positionId,'name');
            $employees[$currentIndex]->position = $positionName;

            $employee->aliasName = strtoupper(substr($employee->firstName,0,1).substr($employee->lastName,0,1));

            $currentIndex ++;
        }
        //$completeData = $this->DeptAndPostToName($employees);
        $userData["employees"] = $employees;
        $manageOutput['tbody'] = $this->load->view('SupportComponent/User/userTable',$userData,true);
        $this->_jsonHelper->SetOutput($this->output,$manageOutput);
        // $completeData = $this->DeptAndPostToName($employees);
        // $userData["employees"] = $completeData;
        // $manageOutput['tbody'] = $this->load->view('SupportComponent/User/userTable',$userData,true);

        // $this->_jsonHelper->SetOutput($this->output,$manageOutput);
    }

    public function SearchUser()
    {
        //Get the search query
        $query = $this->input->post('query');

        $employees = $this->_userModel->searchUser($query);
        $currentIndex = 0;
        foreach($employees as $employee)
        {
            //** CHANGE THE DEPARTMENT & POSITION ID WITH NAME BEFORE SHOW IN TABLE */
            $departmentId = $employee->department;
            $departmentName = $this->_departmentModel->GetDepartment($departmentId,'name');
            $employees[$currentIndex]->department = $departmentName;

            $positionId = $employee->position;
            $positionName = $this->_positionModel->GetPosition($positionId,'name');
            $employees[$currentIndex]->position = $positionName;

            $employee->aliasName = strtoupper(substr($employee->firstName,0,1).substr($employee->lastName,0,1));

            $currentIndex ++;
        }
        //$completeData = $this->DeptAndPostToName($employees);
        $userData["employees"] = $employees;
        $manageOutput['tbody'] = $this->load->view('SupportComponent/User/userTable',$userData,true);
        $this->_jsonHelper->SetOutput($this->output,$manageOutput);
        // $completeData = $this->DeptAndPostToName($employees);
        // $userData["employees"] = $completeData;
        // $manageOutput['tbody'] = $this->load->view('SupportComponent/User/userTable',$userData,true);

        // $this->_jsonHelper->SetOutput($this->output,$manageOutput);
    }

    //** OTHER UTILITIES TO SUPPORT USER MANAGEMENT*/


    private function DeptAndPostToName($employees)
    {
        $currentIndex = 0;
        foreach($employees as $employee)
        {
            //** CHANGE THE DEPARTMENT & POSITION ID WITH NAME BEFORE SHOW IN TABLE */
            $departmentId = $employee->department;
            $departmentName = $this->_departmentModel->GetDepartment($departmentId,'name');
            $employees[$currentIndex]->department = $departmentName;

            $positionId = $employee->position;
            $positionName = $this->_positionModel->GetPosition($positionId,'name');
            $employees[$currentIndex]->position = $positionName;

            $currentIndex ++;
        }
        return $employees;
    }

    // private function RefreshTable()
    // {
    //     $data['departments']=$this->_departmentModel->GetDepartments();
    //     $data['positions']=$this->_positionModel->GetPositions();
    //     $data['users']=$this->_userModel->getUsers();
        
    //     return $this->load->view("SupportComponent/User/userTable.php",$data,true);
    // }

    private function GetTimeLogData($userId)
    {
        return $result = array(
            'employee_id' => $userId,
            'log_status' => false
        );
    }


}