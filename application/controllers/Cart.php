<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Product_model');
		$this->load->model('Cart_model');
		$this->load->library('form_validation');
	}

	public function index(){


			$data['title'] = 'Keranjang | GenQu';
			$data['user'] = $this->User_model->User();
			$data['all_product'] = $this->Product_model->allProduct();
			$data['user_all_item'] = $this->Cart_model->userAllItem();
			$data['sum_user_item'] = $this->Cart_model->sumUserItem();
			$data['user_item'] = $this->Cart_model->UserItem();

			$this->load->view('template/header_config');
			// $this->load->view('template/header_bootstrap');
			$this->load->view('template/header_main');
			$this->load->view('template/header', $data);
			$this->load->view('template/navbar_main');
			$this->load->view('cart');
			$this->load->view('template/footer_main');
			$this->load->view('template/footer');


		
	}

	public function add($id){
		
		$user = $this->User_model->User();
		$user_id = $user['id'];
		if (!$this->session->userdata('phone'))
		{
		$this->session->set_flashdata('message' , "<div class='alert alert-danger' role='alert'>Duuh, Kamu belum masuk sayang. Masuk dulu gih!</div>");
		redirect('store');
		die;
		} else {
      		$data = [
				'user_id' => $user_id,  
				'product_id' => $id,
				'date_created' => time()  
      		];
			$this->db->insert('my_cart', $data);
			$this->session->set_flashdata('message' , "
				<div class='alert alert-success alert-dismissible' >
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-check'></i> Terima Kasih</h4>
                Berhasil ditambahkan!
              	</div>
				");
			redirect('store');
		}
	}
	public function delete($id){
		
		$user = $this->User_model->User();
		$user_id = $user['id'];
		if (!$this->session->userdata('phone'))
		{
		$this->session->set_flashdata('message' , "<div class='alert alert-danger' role='alert'>Duuh, Kamu belum masuk sayang. Masuk dulu gih!</div>");
		redirect('store');
		die;
		} else {
			$this->db->where('product_id', $id);  
			$this->db->where('u_id', $user_id); 
			$this->db->delete('my_cart');
			$this->session->set_flashdata('message' , "
				<div class='alert alert-success alert-dismissible' >
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-check'></i> Terima Kasih</h4>
                Berhasil dihapus!
              	</div>
				");
			redirect('cart');
		}
	}
	public function edit($id){
		
		$user = $this->User_model->User();
		$user_id = $user['id'];
		if (!$this->session->userdata('phone'))
		{
		$this->session->set_flashdata('message' , "<div class='alert alert-danger' role='alert'>Duuh, Kamu belum masuk sayang. Masuk dulu gih!</div>");
		redirect('store');
		die;

		} else {
		
		$this->form_validation->set_rules('qty_input','qty_input','required|trim');
		if($this->form_validation->run() == false){
			var_dump($this->input->post('qty_input',true));
			$data['title'] = 'Edit | GenQu';
			$data['user'] = $this->User_model->User();
			$data['all_product'] = $this->Product_model->allProduct();
			$data['user_all_item'] = $this->Cart_model->userAllItem();
			$data['sum_user_item'] = $this->Cart_model->sumUserItem();
			$data['user_item'] = $this->Cart_model->UserItem();
			$data['user_item_by_id'] = $this->Cart_model->userItemById($id);

			$this->load->view('template/header_config');
			// $this->load->view('template/header_bootstrap');
			$this->load->view('template/header_main');
			$this->load->view('template/header', $data);	
			$this->load->view('template/navbar_main');
			$this->load->view('edit', $data);
			$this->load->view('template/footer_main');
			$this->load->view('template/footer');
		} else {
			
			var_dump($this->input->post('qty_input',true));
			$user = $this->User_model->User();
			$user_id = $user['id'];
			$qty = [
				'qty' => htmlspecialchars($this->input->post('qty_input',true)),
			];
			$this->db->where('product_id', $id);
			$this->db->where('u_id', $user_id);
			$this->db->update('my_cart', $qty);
			$this->session->set_flashdata('message' , "
				<div class='alert alert-success alert-dismissible' >
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-check'></i> Terima Kasih</h4>
                Berhasil diubah!
              	</div>
				");
			redirect('cart');
		}
	}
}
}
