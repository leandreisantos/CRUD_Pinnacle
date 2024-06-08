<?php
defined('BASEPATH') or die('No direct script access allowed');

class CRUDOperations extends CI_Controller{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataManagementModel');
    }

    protected function CreateData($data,$data1,$inputValue,$componentName,$tableName,$dataName)
    {
        return $this->DataProcess($data,$data1,$inputValue,$componentName,$tableName,$dataName,'create');  
    }

    protected function EditData($data,$data1,$inputValue,
    $componentName,$tableName,$dataName,$data2)
    {
        return $this->DataProcess($data,$data1,$inputValue,$componentName,$tableName,$dataName,'update',$data2);  
    }

    protected function DeleteData($columnData,$equivData,$tableName)
    {

        $this->DataManagementModel->deleteData($columnData,$equivData,$tableName);
        $response = array(
            'message' => "Deleted Successfully",
            'status' => true);
        
        return $response;
        
    }

    protected function SortData($pattern,$generalPattern,$tableName,$componentName)
    {
        $data = null;

        if($pattern == $generalPattern){
            $data = $this->DataManagementModel->getData($tableName);
        }else{
            $data = $this->DataManagementModel->getDataSortedBy($pattern,$tableName);
        } 

        $passData[$tableName] = $data;
        $manageOutput['tbody'] = $this->load->view($componentName,$passData,true);

        return $manageOutput;
    }

    protected function SearchData()
    {
        
    }






    private function DataProcess($data,$data1,$inputValue,
                                 $componentName,$tableName,$dataName,$dbAction,$data2=null)
    {
        $response = array(
            'message' => "You need to fill up all form",
            'status' => false
        );
        
        if($data[$data1] !== ""){

            $isDataExist = $this->DataManagementModel->isDataExist($data1,$inputValue,$tableName);

            if(!$isDataExist){

                switch($dbAction){
                    case 'create':
                        $this->DataManagementModel->insert_data($data,$tableName);
                        break;
                    case 'update':
                        $this->DataManagementModel->updateSingleData($data,$data[$data2],$data2,$tableName);
                }

                $response['message'] = "New $dataName is added successfully.";
                $response['status'] = true;
            } else {
                $response['message'] = "$dataName is already exist";
                $response['status'] = false;   
            }
        }

        $response['tbody'] =  $this->FinalizedOutput($response,$tableName,$componentName,$dataName);
        return $response;   
    }







    private function RefreshTable($tableName,$componentName,$dataName)
    {
        $data = $this->DataManagementModel->getData($tableName);
        return $this->load->view($componentName,[$dataName=>$data],true);
    }

    private function FinalizedOutput($manageOutput,$tableName,
                                     $componentName,$dataName)
    {
        return $this->RefreshTable($tableName,$componentName,$dataName);
    }

}