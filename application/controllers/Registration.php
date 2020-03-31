<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->helper('form','url');
        $this->load->library('form_validation');
	}

	public function index(){

		$this->form_validation->set_rules('name' , 'name' , 'required|trim' , ['required' => 'Nama kamu belum dimasukkan.']);

		$this->form_validation->set_rules('phone' , 'phone' , 'required|trim|min_length[11]|is_unique[user.phone]' , [
			'required' => 'Nomor WA nya wajib ya.' , 
			'min_length' => 'Nomor WA tidak valid.' , 
			'is_unique'=> 'Nomor WA sudah digunakan!'	
		]);
		$this->form_validation->set_rules('password1' , 'password' , 'required|trim|min_length[3]|matches[password2]' , [
			'matches' => "Password kamu tidak cocok!",
			'required' => 'Passwordnya wajib diisi ya.',
			'min_length' => 'Passwordnya terlalu pendek!'
		]);
		$this->form_validation->set_rules('password2' , 'password' , 'required|trim|matches[password1]', [
			'matches' => "Password kamu tidak cocok!",
			'required' => 'Passwordnya wajib diisi ya.',
			'min_length' => 'Passwordnya terlalu pendek!'
		]);
		
		if ($this->form_validation->run() == false) {
		
			$data['title'] = 'Daftar | GenQu';
			$data['user'] = $this->User_model->User();
			$this->load->view('template/header_config');
			// $this->load->view('template/header_bootstrap');
			$this->load->view('template/header_main');
			$this->load->view('template/header', $data);
			$this->load->view('template/navbar_main');
			$this->load->view('registration');
			$this->load->view('template/footer_main');
			$this->load->view('template/footer');
			

		
		} else {
			$data = [
				'id' => random_bytes(50),
				'name' => htmlspecialchars($this->input->post('name' , true )),
				'img' => 'user_default.svg',
				'password' => $this->input->post('password1' , true ),
				'phone' => $this->input->post('phone' , true ),
				'role' => 2,
				'date_created' => time(),
			];
			$this->db->insert('user', $data);

			// $this->_sendEmail();

			$this->session->set_flashdata('message' , "<div class='alert alert-success' role='alert'>Selamat, Berhasil mendaftarkan diri :) </div>");
			redirect('home');
		}
	}
}
