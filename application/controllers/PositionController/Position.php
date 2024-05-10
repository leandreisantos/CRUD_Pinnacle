<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Position extends CI_Controller
{
    private $_ModelDB;
    private $_jsonOutput;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DatabaseModel/PositionModel');
        $this->load->helper('ManageOutput/Json_helper');
        $this->_ModelDB = new PositionModel();
        $this->_jsonOutput = new Json();
    }
    
    public function LoadPositionTable()
    {
        $this->SupportLoadTable("Position","position",
                                "positions",$this->_ModelDB->GetPositions());
    }

    public function LoadAddPostModal()
    {
        $data['proceedBtn'] = $this->load->view('SupportComponent/Position/postModalAddBtn.php','',true);

        $this->_jsonOutput->SetOutput($this->output,$data);
    }

    public function LoadEditPostModal()
    {
        $postId = $this->input->POST('id');
        $data['postName'] = $this->_ModelDB->GetPosition($postId,'name');
        $data['proceedBtn'] = $this->load->view("SupportComponent/Position/postModalEditBtn.php",['id'=>$postId],true);

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