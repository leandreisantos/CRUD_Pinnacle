<?php

class EntityManagementModel extends CI_Model
{
    private $_departmentTable = "departments";

    public function GetSingleEntity()
    {
        return $this->db->get($this->_tableName)->result();
    }



    public function GetDepartments()
    {
        return $this->db
                    ->get($this->_departmentTable)
                    ->result();
    }

    public function GetDepartment($id,$returnData)
    {
        $this->db->where('id',$id);
        $query = $this->db->get($this->_departmentTable);
        if($query->num_rows()>=1)
        {
            $result = $query->row_array();
            return $result[$returnData];
        }
    }

    public function GetDepartmentsBy($data,$id,$returnData)
    {
        $this->db->where($data,$id);
        $query = $this->db->get($this->_departmentTable)->result();
        return $query;
    }

    public function GetDepartmentBy($data,$id,$returnData)
    {
        $this->db->where($data,$id);
        $query = $this->db->get($this->_departmentTable)->result();
        return $query;
        // if($query->num_rows()>=1)
        // {
        //     return $query->row_array();
        //     //return $result[$returnData];
        // }
    }

    public function GetDepartmentSortedBy($pattern,$tableName)
    {
        $query = $this->db->select('*')
                          ->from($tableName)
                          ->order_by($pattern,'asc')
                          ->get();

        return $query->result();
    }

    public function IsHeadDepartment($id)
    {
        $this->db->where('head_id',$id);
        $query = $this->db->get($this->_departmentTable);

        return ($query->num_rows()>=1)? true:false;
    }

    public function UpdateDepartment($data,$id)
    {
        return $this->db
              ->update($this->_departmentTable,$data,['id'=>$id]);
    }

    public function DeleteDepartment($id)
    {
        return $this->db
                    ->delete($this->_departmentTable,['id'=>$id]);
    }

    public function InsertDepartment($data)
    {
        return $this->db
                    ->insert($this->_departmentTable,$data);
    }

    public function IsDepartmentIsExist($department)
    {
        $this->db->where('name',$department);
        $query = $this->db->get($this->_departmentTable);
        return ($query->num_rows()>=1) ? true : false;
    }
}