<?php

class TimeLogModel extends CI_Model
{
    private $_table = "employee_time_log";

    public function SetTimeIn($data)
    {
        return $this->db
                    ->insert($this->_table,$data);
    }
    public function SetTimeOut($data,$id)
    {
        return $this->db->update($this->_table,$data,['logId'=>$id]);
    }

    public function GetLatestTimeLog($id,$desireData)
    {
        $this->db->select("*");
        $this->db->from($this->_table);
        $this->db->where('employeeId',$id);
        $this->db->order_by('logId','DESC');
        $this->db->limit(1);

        $query = $this->db->get();

        if($query->num_rows()>0)
        {
            $result = $query->row_array();
            return $result[$desireData];
        }
        else{
            return null;
        }
    }

    public function GetTimeLog($id)
    {
        $query = $this->db->get_where($this->_table,array('employeeId'=> $id));

        return $query->result();
    }

    public function GetFirst5TimeLog($id)
    {
        $query =$this->db->get_where($this->_table,array('employeeId'=> $id),3);
        return $query->result();

    }


    public function GetLastInsertedId()
    {
        return $this->db->insert_id();
    }

}