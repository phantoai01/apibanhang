<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_Model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function checklogin($email,$password)
	{
		$query = $this->db->where('email', $email)->where('password',$password)->get('users');
		return $query->result();
	}

	public function checklogincustomer($email,$password)
	{
		$query = $this->db->where('email', $email)->where('password',$password)->get('customers');
		return $query->result();
	}

	public function NewCustomer($data)
	{
		return $this->db->insert('customers',$data);
	}
	// public function NewShipping($data)
	// {
	// 	$this->db->insert('shipping',$data);
	// 	return $ship_id = $this->db->insert_id();//trả về và lấy ra cái id mới nhất là phương thức của codeigniter
	// }

	// public function insert_order($data_order)
	// {
	// 	return $this->db->insert('orders',$data_order);
	// }

	// public function insert_order_details($data_order_details)
	// {
	// 	return $this->db->insert('order_details',$data_order_details);
	// }
	
}