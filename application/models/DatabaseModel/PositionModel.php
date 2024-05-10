<?php

class PositionModel extends CI_Model
{
    private $_positionTable = "positions";

    public function GetPositions()
    {
        return $this->db
                    ->get($this->_positionTable)
                    ->result();
    }
    public function GetPosition($id,$returnData)
    {
        $this->db->where('id',$id);
        $query = $this->db->get($this->_positionTable);
        if($query->num_rows()>=1)
        {
            $result = $query->row_array();
            return $result[$returnData];
        }
    }
    public function UpdatePosition($data,$id)
    {
        return $this->db
              ->update($this->_positionTable,$data,['id'=>$id]);
    }
    public function DeletePosition($id)
    {
        return $this->db
                    ->delete($this->_positionTable,['id'=>$id]);
    }
    public function InsertPosition($data)
    {
        return $this->db
                    ->insert($this->_positionTable,$data);
    }

    public function IsPositionExist($position)
    {
        $this->db->where('name',$position);
        $query = $this->db->get($this->_positionTable);
        return ($query->num_rows()>=1) ? true : false;
    }
}