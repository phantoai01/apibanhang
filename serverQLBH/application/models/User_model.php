<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model
{
        public function __construct()
	{
		parent::__construct();
		
	}

        public function get_users()
        {

                $query = $this->db->get('users');
                return $query->result();
        }
        public function insertuser($data)
        {
                return $this->db->insert('users',$data);
        }

        public function edituser($id)
        {
                $this->db->where('id',$id);
                $query = $this->db->get('users');
                return $query->row();
                // $query = $this->db->get_where('usersss', ['id'=>$id]);
        }
        public function updateuser($id,$data)
        {
                $this->db->where('id',$id);
                return $this->db->update('users',$data);
        }

        public function deleteuser($id)
        {
                return $this->db->delete('users',['id'=>$id]);
        }
}

;?>