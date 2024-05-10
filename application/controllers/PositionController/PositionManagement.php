<?php
defined('BASEPATH') or die('No direct script access allowed');

class PositionManagement extends CI_Controller
{
    public $data;
    private $_ModelDB;
    private $_positionDatatHelper;
    private $_positionOutputHelper;
    private $_entityModel;
    private $_jsonHelper;


    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('DataAccess/Position/PositionData_helper','ManageOutput/Position/PositionOutput_helper',
        'ManageOutput/Json_helper'));
        $this->load->model('DatabaseModel/PositionModel');
        $this->load->model('DatabaseModel/EntityManagementModel2');
        $this->_entityModel = new EntityManagementModel2();

        $this->_ModelDB = new PositionModel();
        $this->_positionDatatHelper = new PositionData();
        $this->_positionOutputHelper = new Output();
        $this->_jsonHelper = new Json();
    }

    public function Create()
    {
        $manageOutput=$this->_positionOutputHelper->getNullResult();
        $this->data = $this->_positionDatatHelper->getDataFromForm($this);
        if($this->data['name'] !== "")
        {
            $isPostExist = $this->GetResultFromDB();

            if(!$isPostExist)
            {
                $this->_ModelDB->InsertPosition($this->data);
            }

            $manageOutput = $this->_positionOutputHelper->getResult($isPostExist);
        }

        $this->FinalizedOutput($manageOutput);
    }

    public function Edit()
    {
        $manageOutput=$this->_positionOutputHelper->getNullResult();
        $this->data = $this->_positionDatatHelper->getDataFromEdit($this);
        if($this->data['name'] !== ""){
            $isPostExist = $this->GetResultFromDB();

            if(!$isPostExist)
            {
                $this->_ModelDB->UpdatePosition($this->data,$this->data['id']);
            }
            
            $manageOutput = $this->_positionOutputHelper->getEditResult($isPostExist);
        }

        $this->FinalizedOutput($manageOutput);
    }

    public function Delete()
    {
        $this->data = $this->_positionDatatHelper->getDataFromDelete($this);

        $this->_ModelDB->DeletePosition($this->data['id']);
        $manageOutput = $this->_positionOutputHelper->getDeleteResult();

        $this->FinalizedOutput($manageOutput);
    }

    public function SortBy($pattern)
    {
        $positions = null;

        if($pattern == 'all'){
            $positions = $this->_entityModel->GetSingleEntity('positions');
        }else{
            $positions = $this->_entityModel->GetEmployeeSortedBy($pattern,'positions');
        } 

        $positionsData['positions'] = $positions;
        $manageOutput['tbody'] = $this->load->view('SupportComponent/Position/positionTable',$positionsData,true);
        $this->_jsonHelper->SetOutput($this->output,$manageOutput);
    }


    //** OTHER UTILITIES TO SUPPORT POSITION MANAGEMENT*/

    private function RefreshTable()
    {
        $positions = $this->_ModelDB->GetPositions();
        return $this->load->view("SupportComponent/Position/positionTable.php",['positions'=>$positions],true);
    }

    private function GetResultFromDB()
    {
       return $this->_ModelDB->IsPositionExist($this->data['name']);
    }

    private function FinalizedOutput($manageOutput)
    {
        $manageOutput['tbody'] = $this->RefreshTable();
        $this->_jsonHelper->SetOutput($this->output,$manageOutput);
    }

}