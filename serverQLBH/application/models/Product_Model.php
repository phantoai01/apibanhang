<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_Model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	public function insertproduct($data)
	{
		return $this->db->insert('products',$data);
	}

        public function get_product()
        {
                $query = $this->db->select('categories.title as tendanhmuc, products.*, brands.title as tenthuonghieu')
                ->from('categories')
                ->join('products','products.category_id=categories.id')
                ->join('brands','brands.id=products.brand_id')
                ->get();
                return $query->result();
        }

        //lấy id ở edit đẩy vào đây để truy vấn
        public function editproduct($id)
        {
        	$query = $this->db->get_where('products', ['id'=>$id]);
                return $query->row();
        }
        public function updateproduct($id,$data)
        {
                return $this->db->update('products',$data,['id'=>$id]);
        }
        public function deleteproduct($id)
        {
                return $this->db->delete('products',['id'=>$id]);
        }
}