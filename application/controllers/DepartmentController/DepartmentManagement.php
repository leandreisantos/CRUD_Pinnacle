<?php
defined('BASEPATH') or die('No direct script access allowed');

class DepartmentManagement extends CI_Controller
{
    public $data;
    private $_ModelDB;
    private $_departmentDatatHelper;
    private $_departmentOutputHelper;
    private $_entityModel;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('DataAccess/Department/DepartmentData_helper',
                                  'ManageOutput/Department/DepartmentOutput_helper','ManageOutput/Json_helper'));
        $this->load->model('DatabaseModel/EntityManagementModel');

        $this->_ModelDB = new EntityManagementModel();
        $this->_departmentDatatHelper = new DepartmentData();
        $this->_departmentOutputHelper = new Output();
        $this->_jsonHelper = new Json();

        $this->load->model('DatabaseModel/EntityManagementModel2');
        $this->_entityModel = new EntityManagementModel2();
    }

    public function Create()
    {
        $manageOutput = $this->_departmentOutputHelper->getNullResult();
        $this->data = $this->_departmentDatatHelper->getDataFromForm($this);
        if($this->data['name'] !=="")
        {
            $isDeptExist = $this->GetResultFromDB();

            if(!$isDeptExist)
            {
                $this->_ModelDB->InsertDepartment($this->data);
            }
            
            $manageOutput = $this->_departmentOutputHelper->getResult($isDeptExist);
        }
        $this->FinalizedOutput($manageOutput);
    }

    public function Edit()
    {
        $manageOutput = $this->_departmentOutputHelper->getNullResult();
        $this->data = $this->_departmentDatatHelper->getDataFromEdit($this);
        if($this->data['name'] !== "")
        {
            //$isDeptExist = $this->GetResultFromDB(); 
            $isDeptExist = false;
            //if(!$isDeptExist)
           // {
                $this->_ModelDB->UpdateDepartment($this->data,$this->data['id']);
            //}
            $manageOutput = $this->_departmentOutputHelper->getEditResult($isDeptExist);
        }
        $this->FinalizedOutput($manageOutput);
    }

    public function Delete()
    {
        $this->data = $this->_departmentDatatHelper->getDataFromDelete($this);

        $this->_ModelDB->DeleteDepartment($this->data['id']);
        $manageOutput = $this->_departmentOutputHelper->getDeleteResult();

        $this->FinalizedOutput($manageOutput);
    }


    public function SortBy($pattern)
    {
        $departments = null;

        if($pattern == 'all'){
            $departments = $this->_entityModel->GetSingleEntity('departments');
        }else{
            $departments = $this->_entityModel->GetEmployeeSortedBy($pattern,'departments');
        } 

        $departmentData['departments'] = $departments;
        $manageOutput['tbody'] = $this->load->view('SupportComponent/Department/departmentTable',$departmentData,true);
        $this->_jsonHelper->SetOutput($this->output,$manageOutput);
    }


    //** OTHER UTILITIES TO SUPPORT DEPARTMENT MANAGEMENT*/

    private function RefreshTable()
    {
        $departments = $this->_ModelDB->GetDepartments();
        return $this->load->view("SupportComponent/Department/departmentTable.php",['departments'=>$departments],true);
    }

    private function FinalizedOutput($manageOutput)
    {
        $manageOutput['tbody'] = $this->RefreshTable();
        $this->_jsonHelper->SetOutput($this->output,$manageOutput);
    }

    private function GetResultFromDB()
    {
       return $this->_ModelDB->IsDepartmentIsExist($this->data['name']);
    }
}