<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_model {
	
	public function allProduct()
	{
		return $this->db->get('product')->result_array();
	}

	public function sumAllproduct()
	{
		$all_product = "SELECT COUNT(id) AS id FROM product ";
		$result = $this->db->query($all_product);
		return $result->result()->sumAllproduct;
	}

	public function product()
	{
		return $this->db->get_where('product' , ['phone' => $this->session->userdata('phone')])->row_array();
	}

	public function add($id)
	{
		$user = $this->User_model->User();
		$u_id = $user['id'];
		$this->db->select('product_id');
		$this->db->from('my_cart');
		$this->db->where('my_cart.u_id' ,  $u_id);
		$this->db->where('my_cart.payment_status', 0);
		$this->db->where('my_cart.product_id', $id);
		$result = $this->db->get();
		return $result->result();
	}

	
}
