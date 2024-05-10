<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ViewDepartmentsTab extends CI_Controller{
    private $_jsonHelper;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DatabaseModel/EntityManagementModel2');
        $this->_entityModel = new EntityManagementModel2();
        $this->_jsonHelper = new Json();
    }

    public function ShowDepartmentsTab()
    {
        $departments = $this->_entityModel->GetSingleEntity('departments');
        // $departmentsData['departments'] = $departments;
        // $departmentsData['departmentsTable'] = $this->load->view('SupportComponent/Department/departmentTable',$departmentsData,true);

        // $departmentsData['title'] = "Deparments";
        // $departmentsData['description'] = "All the departments are listed here.";
        // $departmentsData['buttonAdd'] = $this->load->view('SupportComponent/Department/departmentAddBtn','',true);


        // $departments['content'] = $this->load->view('TabComponent/view_departments',$departmentsData,true);

        $departmentsData=[
            'departments' => $departments,
            'title' => "Departments",
            'description'=>"All the departments are listed here.",
            'buttonAdd'=> $this->load->view('SupportComponent/Department/departmentAddBtn','',true)
        ];
        $departmentsData['departmentsTable'] = $this->load->view('SupportComponent/Department/departmentTable',$departmentsData,true);
        $data['viewDeptTab']= $this->load->view('TabComponent/view_support',$departmentsData,true);
        $this->_jsonHelper->SetOutput($this->output,$data);
    }

}