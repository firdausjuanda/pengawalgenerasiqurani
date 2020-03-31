<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_model extends CI_model {
	
	public function allItem()
	{
		return $this->db->get('my_cart')->result_array();
	}

	public function sumAllitem()
	{
		$all_item = "SELECT COUNT(id) AS id FROM my_cart ";
		$result = $this->db->query($all_item);
		return $result->result()->sumAllitem;
    }
	public function sumUserItem()
	{
		if($data['user'] = $this->User_model->user() ==0)
		{
			$this->session->set_flashdata('message' , "<div class='alert alert-danger' role='alert'>Duuh, Kamu belum masuk sayang. Masuk dulu gih!</div>");
			redirect('store');
		} else  {
		$data['user'] = $this->User_model->user();
		$id = $data['user']['id'];
		$item = "SELECT COUNT(id) AS id FROM my_cart WHERE u_id = $id AND payment_status = 0";
		$result = $this->db->query($item);
		return $result->row()->id;
		}        
	}
    
    public function userItem()
	{	
		if($data['user'] = $this->User_model->user() ==0)
		{
			$this->session->set_flashdata('message' , "<div class='alert alert-danger' role='alert'>Duuh, Kamu belum masuk sayang. Masuk dulu gih!</div>");
			redirect('store');
		} else  {
		$data['user'] = $this->User_model->user();
		$id = $data['user']['id'];
        $this->db->select('*');
        $this->db->from('my_cart');
        $this->db->join('product','product.id_product = my_cart.product_id','left');
        $this->db->join('user','user.id = my_cart.u_id','left');
        $this->db->where('my_cart.u_id', $id);
        $this->db->where('my_cart.payment_status', 0);
        $query = $this->db->get();
		return $query->result();
		}
	}
    
    public function productByItem(){
        $data['user'] = $this->User_model->user();
		$id = $data['user']['id'];
        $item = "SELECT * FROM my_cart WHERE u_id = $id AND payment_status = 0";
		$item_id = $item['product_id'];
		$queryProduct = "SELECT `product`.*
              			   FROM `product` JOIN `my_cart`
                  		     ON `product`.`id_product` = `my_cart`.`product_id`
                   		  WHERE `product`.`id_product` = $id
                        ";
        return $this->db->query($queryProduct)->result_array();
    }

	public function userAllItem()
	{
		return $this->db->get_where('my_cart' , ['u_id' => $this->session->userdata('id')])->result_array();
	}
    
    public function userItemById($id)
	{
		if($data['user'] = $this->User_model->user() ==0)
		{
			$this->session->set_flashdata('message' , "<div class='alert alert-danger' role='alert'>Duuh, Kamu belum masuk sayang. Masuk dulu gih!</div>");
			redirect('store');
		} else  {
		$data['user'] = $this->User_model->user();
		$user_id = $data['user']['id'];
        $this->db->select('*');
        $this->db->from('my_cart');
        $this->db->join('product','product.id_product = my_cart.product_id','left');
        $this->db->join('user','user.id = my_cart.u_id','left');
        $this->db->where('product.id_product', $id);
        $this->db->where('my_cart.u_id', $user_id);
        $this->db->where('my_cart.payment_status', 0);
        $query = $this->db->get();
		return $query->row();
		}
	}

	
}
