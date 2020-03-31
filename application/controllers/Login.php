<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->helper('form','url');
        $this->load->library('form_validation');
	}

	public function loh(){
		$data['title'] = 'Home';
		$this->load->view('template/header_config');
		// $this->load->view('template/header_bootstrap');
		$this->load->view('template/header_main');
		$this->load->view('template/header', $data);
		$this->load->view('template/navbar_main');
		$this->load->view('login');
		$this->load->view('template/footer_main');
		$this->load->view('template/footer');

	}

	public function index()
	{
		$this->form_validation->set_rules('phone' , 'phone' , 'required|trim' , [
			'required' => 'Masukin nomor WA kamu ya.' ,
		]);
		$this->form_validation->set_rules('password' , 'password' , 'required|trim' , [
			'required' => 'Passwordnya dimasukin juga ya.'
		]);
		
		if ($this->session->userdata('phone'))
		{
			redirect('store');
			
		} 
		
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login';
			$data['user'] = $this->User_model->User();
			$this->load->view('template/header_config');
			// $this->load->view('template/header_bootstrap');
			$this->load->view('template/header_main');
			$this->load->view('template/header', $data);
			$this->load->view('template/navbar_main');
			$this->load->view('login');
			$this->load->view('template/footer_main');
			$this->load->view('template/footer');
	
		
		} else {
			var_dump('Berhasil');
			// Validasi success
			$this->_login();
		}

	}
	private function _login(){
		$phone = $this->input->post('phone');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user' , ['phone' => $phone])->row_array();
		
		//jika usernya ada
		if ($user) {

					
					//cek password
					if ($password == $user['password']){
							
						$data = [
							'phone' => $user['phone'],
							'role' => $user['role']
						];
						$this->session->set_userdata($data);
						
						if ($user['role'] == 1) {
							redirect('home');
						} else {
							redirect('store');
						}

					} else {
						$this->session->set_flashdata('message' , "<div class='alert alert-danger' role='alert'>Password kamu salah!</div>");
						redirect('login');	
					}

			} else {
			$this->session->set_flashdata('message' , "<div class='alert alert-danger' role='alert'>Nomor kamu belum terdaftar.</div>");
			redirect('login');
			}	
	}

	public function logout()
	{	
		$this->session->unset_userdata('phone');
		$this->session->unset_userdata('role');
		$this->session->set_flashdata('message' , "<div class='alert alert-success' role='alert'>You have logged out.</div>");
			redirect('home');
	}
}
