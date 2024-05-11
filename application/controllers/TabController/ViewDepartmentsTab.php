<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ViewDepartmentsTab extends CI_Controller{
    private $_jsonHelper;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataManagementModel');
        $this->_jsonHelper = new Json();
    }

    public function ShowDepartmentsTab()
    {
        $departments = $this->DataManagementModel->getData('departments');

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