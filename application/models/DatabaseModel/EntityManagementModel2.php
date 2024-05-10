<?php

class EntityManagementModel2 extends CI_Model
{
    //private $_tableName;

    public function __construct()
    {
        parent::__construct();

    }

    public function GetSingleEntity($tableName)
    {
        return $this->db->get($tableName)->result();
    }

    public function GetDataInSingleEntity($data,$equivalentData,$tableName)
    {
        $this->db->where($data,$equivalentData);
        $query = $this->db->get($tableName);
        if($query->num_rows()==1)
        {
            return $query->row_array();
        }
        return null;
    }
    public function GetSpecificData($data,$equivalentData,$tableName,$desireData)
    {
        $result = $this->GetDataInSingleEntity($data,$equivalentData,$tableName);
        return $result[$desireData];
    }

    public function GetEmployeeSortedBy($pattern,$tableName)
    {
        $query = $this->db->select('*')
                          ->from($tableName)
                          ->order_by($pattern,'asc')
                          ->get();

        return $query->result();
    }


}