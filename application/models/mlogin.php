<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mlogin extends CI_Model {


	function check()
	{
		$email = $this->input->post('email');
		$password  = md5($this->input->post('password'));

		$query = $this->db->query("select * from user where email = '$email' and password = '$password' and status = 'aktif'");

		return $query->result();
	}

	function register()
	{
		$data_register = array(
			'level'		=> $this->input->post('level'),
			'nama'		=> $this->input->post('fname').' '.$this->input->post('lname'),
			'email'		=> $this->input->post('email'),
			'password'	=> md5($this->input->post('password')),
			'alamat'	=> '-',
			'no_hp'		=> $this->input->post('no_hp'),
			'status'	=> 'aktif'
		);

		$this->db->insert('user', $data_register);
	}

// akhir dari model
}