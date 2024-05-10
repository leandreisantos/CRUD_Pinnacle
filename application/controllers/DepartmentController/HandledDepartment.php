<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HandledDepartment extends CI_Controller{
    private $_userModel2;
    private $_departmentModel;
    private $_positionModel;
    private $_activeUser;
    private $_jsonHelper;

    public function __construct()
    {
        parent::__construct();

        $this->_userModel2 = new UserModel2();
        $this->_departmentModel = new EntityManagementModel();
        $this->_positionModel = new PositionModel();
        $this->_jsonHelper = new Json();

        $this->_activeUser = $this->session->userdata('user_id');
    }

    public function ShowUnderEmp($deptId)
    {
        //Get all department IDs where the current user is head
        $allDepartmentId = $this->_departmentModel->GetDepartmentsBy('head_id',$this->_activeUser,'id');

        //Create collection of department IDs and names
        $collectionOfDeptId = [];
        $collectionNameOfDept =[];
        foreach($allDepartmentId as $departmentId)
        {
            $collectionOfDeptId[]=$departmentId->id;
            $collectionNameOfDept[$departmentId->id]=$departmentId->name;
        }
        $dataUser['DeptNames']=$collectionNameOfDept;

        $dataUser['usersInDept']=($deptId=="0")?$this->_userModel2->GetUsersWithIds('department',$collectionOfDeptId): $dataUser['usersInDept'] = $this->_userModel2->GetUsersWithIds('department',$deptId);

        //** Map position for each user */
        $positions = $this->_positionModel->GetPositions();
        foreach($dataUser['usersInDept'] as $user)
        {
           $result = $this->_positionModel->GetPosition($user->position,'name');
           $user->position = ($result!=null) ? $result : "Unknown";
        }

        $data['tbodyUnder'] = $this->load->view('SupportComponent/tbodyUndeEmp.php',$dataUser,true);
        $data['tableShowEmployeeUnder'] = $this->load->view('SupportComponent/tableUnderEmp.php',$dataUser,true);
        $data['datapass'] = $deptId;

        $this->_jsonHelper->SetOutput($this->output,$data);
    }
}