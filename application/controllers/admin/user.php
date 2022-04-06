<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		// load helper

		// load model
		$this->load->model('admin/muser');
		$this->load->model('admin/msales');
		$this->load->model('admin/mcare');
		$this->load->model('admin/mdaycare');



		/*//check login
		if($this->session->userdata('status') != "login"){
			echo '<script>alert(\'Login terlebih dahulu untuk mengakses halaman ini!\');document.location=\''.base_url('login').'\'</script>';*/
	}

	public function index()
	{
		$data['title'] = 'Admin | Manage User';

		$data['user_data'] = $this->muser->user();
		$data['confirm_data_index']		= count($this->msales->data_confirm());
		$data['confirm_data_care_index']		= count($this->mcare->data_confirm());
		$data['confirm_data_daycare_index']		= count($this->mdaycare->data_confirm());
		$total_notif = $data['confirm_data_index'] + $data['confirm_data_daycare_index'] + $data['confirm_data_care_index'];
		$data['total_notif']	= $total_notif;
		$total_penjualan	= count($this->msales->sales());
		$total_care	= count($this->mcare->care());
		$total_daycare	= count($this->mdaycare->daycare());
		$total = $total_penjualan + $total_care + $total_daycare;
		$data['order_selesai_data_index']		= $total;

		$data['notif_order_data']		= $this->msales->data_confirm();
		$data['notif_order_care_data']		= $this->mcare->data_confirm();
		$data['notif_order_daycare_data']		= $this->mdaycare->data_confirm();

		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('templates_admin/navbar', $data);
		$this->load->view('admin/user/user', $data);
		$this->load->view('templates_admin/footer');
	}

	public function change_level($id)
	{
		if (!isset($id)) show_404();

		$this->muser->change_level($id);
		$this->session->set_flashdata('success', 'Data berhasil diubah.');
		redirect('user');
	}

	public function status_user_inactive($id)
	{
		if (!isset($id)) show_404();

		$this->muser->status_user_inactive($id);
		redirect('user');
	}

	public function status_user_active($id)
	{
		if (!isset($id)) show_404();

		$this->muser->status_user_active($id);
		redirect('user');
	}
}
