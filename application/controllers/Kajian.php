<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kajian extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
	}

	public function index(){
		$data['title'] = 'Home';
		$data['user'] = $this->User_model->User();
		$this->load->view('template/header_config');
		// $this->load->view('template/header_bootstrap');
		$this->load->view('template/header_main');
		$this->load->view('template/header', $data);
		$this->load->view('template/navbar_main');
		$this->load->view('kajian');
		$this->load->view('template/footer_main');
		$this->load->view('template/footer');
	}
}
