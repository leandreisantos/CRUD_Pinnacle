<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller
{
    private $_jsonHelper;
    private $_entityModel;
    private $_userTable;
    private $_deptTable;
    private $_postTable;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DatabaseModel/EntityManagementModel2');
        $this->_entityModel = new EntityManagementModel2();
        
        $this->_jsonHelper = new Json();
        $this->_userTable = 'employee';
        $this->_deptTable = 'departments';
        $this->_postTable = 'positions';
    }

    public function LoadUserTable()
    {
        $collectionEntity=[
            'users'=>$this->_userTable,
            'departments'=>$this->_deptTable,
            'positions'=>$this->_postTable
        ];

        $collection=[];
        foreach($collectionEntity as $key=>$value)
        {
            $collection[$key] = $this->_entityModel->GetSingleEntity($value);
        }
        // $collection['users'] = $this->_entityModel->GetSingleEntity($this->_userTable);
        // $collection['departments']=$this->_entityModel->GetSingleEntity($this->_deptTable);
        // $collection['positions']=$this->_entityModel->GetSingleEntity($this->_postTable);

        $this->SupportLoadTable("User","user",
                                 "users",$collection);
    }

    public function LoadAddUserModal()
    {
        $data['registerDesign'] = $this->load->view("SupportComponent/User/ConBtnRegister.php",'',true);

        $this->_jsonHelper->SetOutput($this->output,$data);
    }

    public function LoadEditUserModal()
    {
        $userId = $this->input->POST('id');
        $data['userInfo'] = $this->_entityModel->GetDataInSingleEntity('id',$userId,$this->_userTable);
        $data['submitChanges']=$this->load->view("SupportComponent/User/userModalEditBtn.php",['id'=>$userId],true);

        $this->_jsonHelper->SetOutput($this->output,$data);
    }
    
    public function SupportLoadTable($folderName,$fileName,
                                    $collectionName,$collectionData)
    {
        $data['addBtn'] = $this->load->view("SupportComponent/".$folderName."/".$fileName."AddBtn.php",'',true);
        $data['thead'] = $this->load->view("SupportComponent/".$folderName."/".$fileName."Thead.php",'',true);
        $data['tbody'] = $this->load->view("SupportComponent/".$folderName."/".$fileName."Table.php",$collectionData,true);

        $this->_jsonHelper->SetOutput($this->output,$data);
    }

}