<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		// load helper

		// load model
		$this->load->model('mlogin');
	}

	public function index()
	{

		if ($this->session->userdata('status') == "login") 
		{
			if($this->session->userdata('level') == "customer")
			{
				redirect('home');
			}else{
				redirect('admin');
			}
		}else
			{
				$data['title'] = 'PetLife-Care | Login';
		
				$this->load->view('templates_admin/header', $data);
				$this->load->view('login', $data);
				$this->load->view('templates_admin/footer');
			}
	}

	public function register()
	{
		$data['title'] = 'PetLife-Care | Register';
		
		$this->load->view('templates_admin/header', $data);
		$this->load->view('register', $data);
		$this->load->view('templates_admin/footer');

	}

	public function login_process()
	{
		$cek = $this->mlogin->check();

		if(count($cek)>0)
		{
			foreach($cek as $cek)
			{
				$data = $cek->id_user;
				$this->session->set_userdata('id_user',$cek->id_user);
				$this->session->set_userdata('nama',$cek->nama);
				$this->session->set_userdata('email',$cek->email);
				$this->session->set_userdata('level',$cek->level);
				$this->session->set_userdata('alamat',$cek->alamat);
				$this->session->set_userdata('no_hp',$cek->no_hp);
				$this->session->set_userdata('status','login');
			}

			$_SESSION['user'] = $data;
			if($cek->level=='customer'){
				if(!empty($this->cart->contents()))
				{
					echo '<script>alert(\'Anda berhasil login !\');document.location=\''.base_url('cart').'\'</script>';
				}else{
					echo '<script>alert(\'Anda berhasil login !\');document.location=\''.base_url('home').'\'</script>';
				}
			}else{
				echo '<script>alert(\'Anda berhasil login !\');document.location=\''.base_url('admin').'\'</script>';
			}
		}else
		{
			$this->session->set_flashdata('error', 'Login gagal, Periksa kembali username dan password anda');
			redirect('login');
		}
	}

	public function register_process()
	{
		$this->mlogin->register();
		$this->session->set_flashdata('success', 'Registrasi Berhasil, Silahkan Login.');
		redirect('register');
	}

	public function logout()
	{
		session_destroy();
		redirect('login');
	}

}
