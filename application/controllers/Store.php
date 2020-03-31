<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Product_model');
	}

	public function index(){
		$data['title'] = 'Pasar Sehat | GenQu';
		$data['user'] = $this->User_model->User();
		$data['all_product'] = $this->Product_model->allProduct();

		$this->load->view('template/header_config');
		// $this->load->view('template/header_bootstrap');
		$this->load->view('template/header_main');
		$this->load->view('template/header', $data);
		$this->load->view('template/navbar_main');
		$this->load->view('store');
		$this->load->view('template/footer_main');
		$this->load->view('template/footer');
	}

	public function add($id){
		
		$user = $this->User_model->User();
		$u_id = $user['id'];
		$add = $this->Product_model->add($id);
		if (!$this->session->userdata('phone'))
		{
		$this->session->set_flashdata('message' , "<div class='alert alert-danger' role='alert'>Duuh, Kamu belum masuk sayang. Masuk dulu gih!</div>");
		redirect('store');
		die;
		} elseif($add){
			$this->session->set_flashdata('message' , "<div class='alert alert-danger' role='alert'>Produk ini sudah ada dalam keranjangmu, Yuk cek di keranjang </div>");
		redirect('store');
		} else {
      		$data = [
				'u_id' => $u_id,  
				'product_id' => $id,
				'qty' => 1,
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
}
