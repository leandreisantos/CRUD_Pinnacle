<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller
{
    private $_jsonOutput;
    public function  __construct()
    {
        parent::__construct();
        $this->_ModelDB = new EntityManagementModel();
        $this->_jsonOutput = new Json();
    }
    
    public function LoadDeptTable()
    {
        $this->SupportLoadTable("Department","department",
                                "departments",$this->_ModelDB->GetDepartments());
    }

    public function LoadEditDeptModal()
    {
        $deptId = $this->input->POST('id');
        $headId = $this->_ModelDB->GetDepartment($deptId,'head_id');
        $data['deptName'] = $this->_ModelDB->GetDepartment($deptId,'name');
        $data['head_id']= 0;
        if($headId!=null)
        {
            $data['head_id'] = $headId;
        }

        $data['proceedBtn'] = $this->load->view("SupportComponent/Department/deptModalEditBtn.php",['id'=>$deptId],true);
       
        $this->_jsonOutput->SetOutput($this->output,$data);

    }

    public function LoadAddDeptModal()
    {
        $data['proceedBtn'] = $this->load->view('SupportComponent/Department/deptModalAddBtn.php','',true);
        
        $this->_jsonOutput->SetOutput($this->output,$data);
    }

    public function SupportLoadTable($folderName,$fileName,
                                    $collectionName,$collectionData)
    {
        $data['addBtn'] = $this->load->view("SupportComponent/".$folderName."/".$fileName."AddBtn.php",'',true);
        $data['thead'] = $this->load->view("SupportComponent/".$folderName."/".$fileName."Thead.php",'',true);
        $data['tbody'] = $this->load->view("SupportComponent/".$folderName."/".$fileName."Table.php",[$collectionName=>$collectionData],true);
        
        $this->_jsonOutput->SetOutput($this->output,$data);

    }
}