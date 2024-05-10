<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ViewPositionsTab extends CI_Controller{
    private $_jsonHelper;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DatabaseModel/EntityManagementModel2');
        $this->_entityModel = new EntityManagementModel2();
        $this->_jsonHelper = new Json();
    }

    public function ShowPositionsTab()
    {
        $positions = $this->_entityModel->GetSingleEntity('positions');
        $positionsData['positions'] = $positions;
        $positionsData['positionsTable'] = $this->load->view('SupportComponent/Position/positionTable',$positionsData,true);

        $data['viewPositionsTab']= $this->load->view('TabComponent/view_positions',$positionsData,true);
        $this->_jsonHelper->SetOutput($this->output,$data);
    }

}