<?php

class LogStatusModel extends CI_Model
{
    private $_table = "timelogs_status";

    public function SetStatus($data)
    {
        return $this->db
                    ->insert($this->_table,$data);
    }

    public function GetStatus($id)
    {
        $this->db->where('employee_id',$id);
        $query = $this->db->get($this->_table);
        if($query->num_rows()==1)
        {
            $result = $query->row_array();
            return $result['log_status'];
        }
    }

    public function GetLogId($id)
    {
        $this->db->where('employee_id',$id);
        $query = $this->db->get($this->_table);
        if($query->num_rows()==1)
        {
            $result = $query->row_array();
            return $result['log_id'];
        }
    }
    public function UpdateStatus($data,$id)
    {
        return $this->db->update($this->_table,$data,['employee_id'=>$id]);
    }
}