<?php

class DataManagementModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getData($tableName)
    {
        //Validate table
        $isTableNameValid = $this->validateTable($tableName);

        if($isTableNameValid){
            return $this->db->get($tableName)->result();
        }
        return false;
    }

    public function getSingleData($columnName,$id,$tableName)
    {
        //Validate table
        $isTableNameValid = $this->validateTable($tableName);

        if($isTableNameValid){
            $query = $this->db->query("SELECT * FROM $tableName WHERE $columnName='$id'");

           if($query->num_rows()==1){
                return $query->row_array();
           }
        }
        return false;
    }

    public function fetchSpecific($columnName,$equivalenceData, 
                                  $returnData,$tableName)
    {
        //Validate paremeter
        if(!$this->validateTable($tableName)||empty($columnName)
         ||empty($equivalenceData)||empty($returnData)){
            return false;
        }

        //Execute the query
        $query = $this->db->query("SELECT * FROM $tableName WHERE $columnName='$equivalenceData'");

        if($query->num_rows()>=1){
            $result = $query->row_array();
            return $result[$returnData];
        } else {
            return false;
        }
    }

    public function fetchFirstRecords($id,$tableName,$count,$columnName)
    {
        //Validate table
        $isTableNameValid = $this->validateTable($tableName);

        if($isTableNameValid){
            $query=$this->db->query("SELECT * FROM $tableName WHERE $columnName='$id' LIMIT $count");

            return $query->result();
        }
        return false;
    }

    public function updateSingleData($data,$equivData,$columnName,$tableName)
    {
        $isTableNameValid = $this->validateTable($tableName);

        if($isTableNameValid){

            //return $this->db->query("UPDATE $tableName SET $data WHERE $columnName='$equivData'");

            return $this->db
            ->update($tableName,$data,[$columnName=>$equivData]);
        }
        return false;
    }

    public function insert_data($data,$tableName)
    {
        return $this->db->insert($tableName,$data);
    }

    public function isDataExist($fieldName,$inputValue,$tableName)
    {
        $this->db->where($fieldName,$inputValue);
        $query = $this->db->get($tableName);
        return ($query->num_rows()>=1) ? true : false;
    }

    public function deleteData($columnData,$equivData,$tableName){
        return $this->db
                    ->delete($tableName,[$columnData=>$equivData]);
    }

    public function getDataSortedBy($pattern,$tableName)
    {
        $query = $this->db->select('*')
        ->from($tableName)
        ->order_by($pattern,'asc')
        ->get();

        return $query->result();
        // $query = "SELECT * FROM $tableName ORDER BY $pattern ASC";
        // return $this->db->query($query);
    }



    //** UTILITIES */

    private function validateTable($tableName)
    {
        if(!empty($tableName)){
            //Verify if the table exists in the database
            if($this->db->table_exists($tableName)){
                //Fetch data from the specified table
                return true;
            } else {
                //Table does not exist
                return false;
            }
        } else {
            //Invalid table name
            return false;
        }
    }
}