<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_Model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	public function get_category()
        {
                $query = $this->db->get('categories');
                return $query->result();
        }
        public function editcategory($id)
        {
                $this->db->where('id',$id);
                $query = $this->db->get('categories');
                return $query->row();
        }

        public function insertcategory($data)
        {
                return $this->db->insert('categories',$data);
        }
        public function updatecategory($id,$data)
        {
                $this->db->where('id',$id);
                return $this->db->update('categories',$data);
        }
        public function deletecategory($id)
        {
                return $this->db->delete('categories',['id'=>$id]);
        }
}