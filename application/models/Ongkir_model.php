<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Ongkir_model extends CI_model {
	
	public function allOngkir()
	{
		return $this->db->get('ongkir')->result_array();
	}

	public function province()
	{
		$province = "SELECT DISTINCT(provinsi_tujuan) AS provinsi_tujuan FROM ongkir ";
		$result = $this->db->query($province);
		return $result->result();
    }
    
    public function userOngkir()
	{	
		if($data['user'] = $this->User_model->user() ==0)
		{
			$this->session->set_flashdata('message' , "<div class='alert alert-danger' role='alert'>Duuh, Kamu belum masuk sayang. Masuk dulu gih!</div>");
			redirect('store');
		} else  {
		$data['user'] = $this->User_model->user();
		$id = $data['user']['id'];
		$tujuan = $data['user']['city'];
        $this->db->select('*');
        $this->db->from('ongkir');
        $this->db->join('my_cart','my_cart.tujuan = ongkir.tujuan','left');
        $this->db->join('user','user.id = my_cart.u_id','left');
        $this->db->where('ongkir.tujuan', $tujuan);
        $this->db->where('my_cart.payment_status', 0);
        $query = $this->db->get();
		return $query->row();
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

	public function province1()
	{
		$query = "SELECT DISTINCT * 
							FROM `ongkir`
							  ON `ongkir`.`provinsi_tujuan` = `ongkir`.`provinsi_tujuan`						
				";
		return $this->db->query($query)->result_array();
	}
    
    public function cityByProvince()
	{
		if($data['user'] = $this->User_model->user() ==0)
		{
			$this->session->set_flashdata('message' , "<div class='alert alert-danger' role='alert'>Duuh, Kamu belum masuk sayang. Masuk dulu gih!</div>");
			redirect('store');
		} else  {
		$data['user'] = $this->User_model->user();
		$pro = $data['user']['province'];
		$id = $data['user']['id'];
        $this->db->select('*');
        $this->db->from('ongkir');
        // $this->db->join('product','product.id_product = my_cart.product_id','left');
        $this->db->join('user','user.province = ongkir.provinsi_tujuan','left');
        $this->db->where('user.id', $id);
        $this->db->where('ongkir.provinsi_tujuan', $pro);
        // $this->db->where('my_cart.payment_status', 0);
        $query = $this->db->get();
		return $query->result();
		}
	}

	
}
