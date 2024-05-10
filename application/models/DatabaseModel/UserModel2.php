<?php

class UserModel2 extends CI_Model
{
    private $_tableName = 'employee';

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('security');
    }

    public function getUsers()
    {
        return $this->db
                    ->get($this->_tableName)
                    ->result();
    }

    public function GetUser($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get($this->_tableName);
        if($query->num_rows()==1)
        {
           return $query->row_array();
        }
    }

    public function GetUserBy($data,$id)
    {
        $this->db->where($data,$id);
        return $query = $this->db->get($this->_tableName)->result();
    }

    public function insertUser($data)
    {
        return $this->db
                    ->insert($this->_tableName,$data);
    }

    public function GetLastInsertedId()
    {
        return $this->db->insert_id();
    }

    public function editUser($id)
    {
        return $this->db
                    ->get_where($this->_tableName,['id'=> $id])
                    ->row();
    }

    public function updateUser($data, $id)
    {
        return $this->db
                    ->update($this->_tableName,$data,['id'=>$id]);
    }

    public function deleteUser($id)
    {
        return $this->db
                    ->delete($this->_tableName,['id'=>$id]);
    }

    public function searchUser($query)
    {
        $this->db->like('firstName',$query);
        $this->db->or_like('lastName', $query);
        $this->db->or_like('pet', $query);
        $this->db->or_like('email', $query);
        $this->db->or_like('role', $query);

        $result = $this->db->get($this->_tableName)->result();
        return $result;
    }

    public function authenticate($email,$password)
    {
        $this->db->where('email',$email);
        $query = $this->db->get($this->_tableName);
        if($query->num_rows()==1)
        {
            $result = $query->row_array();
            $valid = password_verify($this->TrimPassword($password),
            $this->TrimPassword($result['password']));

            return $valid? "EmailFound" : "PassFailed";
        }
        return "EmailNotFound";
    }

    public function getSingleData($locationData,$equivalenceData,$returnData)
    {
        $this->db->where($locationData,$equivalenceData);
        $query = $this->db->get($this->_tableName);
        if($query->num_rows()==1)
        {
            $result = $query->row_array();
            return $result[$returnData];
        }
    }

    public function TrimPassword($password)
    {
        return trim($password);
    }

    public function IsEmailExist($email)
    {
        $this->db->where('email',$email);
        $query = $this->db->get($this->_tableName);
        return ($query->num_rows() == 1)? true:false;
    }

    public function GetUsersWithIds($data,$ids)
    {
        $this->db->select('*');
        $this->db->from($this->_tableName);
        $this->db->where_in($data,$ids);
        $query = $this->db->get();
        return $query->result();
    }
}
?>