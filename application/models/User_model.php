<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_model {
	
	public function allUsers()
	{
		return $this->db->get('user')->result_array();
	}

	public function sumAllUsers()
	{
		$all_users = "SELECT COUNT(id) AS id FROM user ";
		$result = $this->db->query($all_users);
		return $result->result()->sumAllUsers;
	}

	public function User()
	{
		return $this->db->get_where('user' , ['phone' => $this->session->userdata('phone')])->row_array();
	}

	
}
