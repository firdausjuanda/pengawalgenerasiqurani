<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->helper('form','url');
		$this->load->library('form_validation');
		$this->load->model('User_model');
		$this->load->model('Product_model');
		$this->load->model('Cart_model');
		$this->load->model('Ongkir_model');
    }
    
    public function index(){
		$this->form_validation->set_rules('name','name','required|trim');
		if($this->form_validation->run()==false){
			$data['title'] = 'Checkout | GenQu';
			$data['user'] = $this->User_model->User();
			$data['all_product'] = $this->Product_model->allProduct();
			$data['user_all_item'] = $this->Cart_model->userAllItem();
			$data['sum_user_item'] = $this->Cart_model->sumUserItem();
			$data['user_item'] = $this->Cart_model->UserItem();
			$data['all_ongkir'] = $this->Ongkir_model->allOngkir();
			$data['user_ongkir'] = $this->Ongkir_model->userOngkir();
			$data['cbp'] = $this->Ongkir_model->cityByProvince();
			$data['pro'] = $this->Ongkir_model->province();
			$this->load->view('template/header_config');
			// $this->load->view('template/header_bootstrap');
			$this->load->view('template/header_main');
			$this->load->view('template/header', $data);
			$this->load->view('template/navbar_main');
			$this->load->view('checkout', $data);
			$this->load->view('template/footer_main');
			$this->load->view('template/footer');
		} else {
			
			$user = $this->User_model->User();
			$user_id = $user['id'];
			$data_user = [
				'address' => htmlspecialchars($this->input->post('address',true)),
				'province' => htmlspecialchars($this->input->post('province',true)),
				'city' => htmlspecialchars($this->input->post('city',true)),
				'district' => htmlspecialchars($this->input->post('district',true)),
				'zip' => htmlspecialchars($this->input->post('zip',true)),
			];
			$this->db->where('id', $user_id);
			$this->db->update('user', $data_user);

			$data_cart = [
				'tujuan' => htmlspecialchars($this->input->post('city',true)),
			];
			$this->db->where('u_id', $user_id);
			$this->db->where('payment_status', 0);
			$this->db->update('my_cart', $data_cart);
			// $this->session->set_flashdata('message' , "
			// 	<div class='alert alert-success alert-dismissible' >
            //     <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            //     <h4><i class='icon fa fa-check'></i> Terima Kasih</h4>
            //     Berhasil diubah!
            //   	</div>
			// 	");
			redirect('payment');
		
		}
        

    }
}