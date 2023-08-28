<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Brand_Model extends CI_Model
{
           public function __construct()
        {
                parent::__construct();
                
        }
        public function get_brands()
        {
                $query = $this->db->get('brands');
                return $query->result();
        }
        public function editbrand($id)
        {
                $this->db->where('id',$id);
                $query = $this->db->get('brands');
                return $query->row();
        }

        public function insertbrand($data)
        {
                return $this->db->insert('brands',$data);
        }
        public function updatebrand($id,$data)
        {
                $this->db->where('id',$id);
                return $this->db->update('brands',$data);
        }
        public function deletebrand($id)
        {
                return $this->db->delete('brands',['id'=>$id]);
        }
}
