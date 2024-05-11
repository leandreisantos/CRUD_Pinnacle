<?php
require_once APPPATH.'controllers\CRUDOperations.php';
defined('BASEPATH') or die('No direct script access allowed');

class PositionManagement extends CRUDOperations
{

    public $data;
    private $_positionDatatHelper;
    private $_jsonHelper;


    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('DataAccess/Position/PositionData_helper'));

        $this->_positionDatatHelper = new PositionData();
        $this->_jsonHelper = new Json();
    }

    public function Create()
    {
        //Getting data form view
        $positionName = $this->input->POST('position');

        //Checking data
        if(empty($positionName))
        {
            $response = [
                'message' => "Please input position name.",
                'status' => false
            ];

            $this->_jsonHelper->SetOutput($this->output,$response);
        }

        $this->data = [
            'name' =>$positionName
        ];

        $manageOutput=$this->CreateData($this->data,'name',$this->data['name'],"SupportComponent/Position/positionTable.php",'positions','positions');

        $this->_jsonHelper->SetOutput($this->output,$manageOutput);
    }

    public function Edit()
    {
        $this->data = [
            'id' =>$this->input->POST('id'),
            'name' =>$this->input->POST('name')
        ];

        $manageOutput=$this->EditData($this->data,'name',$this->data['name'],"SupportComponent/Position/positionTable.php",'positions','positions','id');

        $this->_jsonHelper->SetOutput($this->output,$manageOutput);
    }

    public function Delete()
    {
        $id = $this->input->POST('id');

        $manageOutput = $this->DeleteData('id',$id,'positions');
        $this->_jsonHelper->SetOutput($this->output,$manageOutput);
    }

    public function SortBy($pattern)
    {
        $manageOutput = $this->SortData($pattern,'all','positions','SupportComponent/Position/positionTable');


        $this->_jsonHelper->SetOutput($this->output,$manageOutput);
    }

    // public function _output($manage){
    //     $this->_jsonHelper->SetOutput($this->output,$manageOutput);
    // }
}