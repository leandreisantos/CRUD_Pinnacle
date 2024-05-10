<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ViewEmployeeTab extends CI_Controller{
    private $_jsonHelper;
    private $_departmentModel;
    private $_positionModel;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DatabaseModel/EntityManagementModel2');
        $this->_entityModel = new EntityManagementModel2();
        $this->_jsonHelper = new Json();
        $this->_departmentModel = new EntityManagementModel();
        $this->_positionModel = new PositionModel();
    }

    public function ShowEmployeeTab()
    {
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

        
        $userData["employees"] = $employees;
        $userData['employeeTotal'] = count($employees);
        $userData['employeeTable'] = $this->load->view('SupportComponent/User/userTable',$userData,true);

        $this->load->view("ModalComponent/UserManagementModal.php",$userData);

        $data['viewEmpTab'] = $this->load->view('TabComponent/view_employee',$userData,true);
        $this->_jsonHelper->SetOutput($this->output,$data);
    }
}