<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends CI_Controller {

    function __construct()
    {
		parent::__construct();

		// load helper

		// load model
		$this->load->model('admin/mbank');
		$this->load->model('admin/msales');
		$this->load->model('admin/mcare');
		$this->load->model('admin/mdaycare');

		/*//check login
		if($this->session->userdata('status') != "login"){
			echo '<script>alert(\'Login terlebih dahulu untuk mengakses halaman ini!\');document.location=\''.base_url('login').'\'</script>';*/
	}

	public function index()
	{
		$data['title'] = 'Admin | Bank Manage';

		$data['bank_data'] = $this->mbank->bank();
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
		$this->load->view('admin/bank/bank', $data);
		$this->load->view('templates_admin/footer');

	}

	public function page_tambah_bank()
	{
		$data['title'] = 'Admin | Add Bank Account';
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
		$this->load->view('admin/bank/tambah_bank', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_bank()
	{
		$this->mbank->add_bank();
		$this->session->set_flashdata('success', 'Data berhasil ditambah.');
		redirect('bank');
	}

	public function page_edit_bank($id)
	{

		$data['bank_data'] = $this->mbank->getByIdBank($id);
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
        if (!$data['bank_data']){
        	$data['title'] = 'Admin | 404';

        	$this->load->view('templates_admin/header', $data);
        	$this->load->view('templates_admin/sidebar');
        	$this->load->view('templates_admin/navbar', $data);
        	$this->load->view('admin/404', $data);
        	$this->load->view('templates_admin/footer');
        }else{
        	$data['title'] = 'Admin | Edit Bank Account';

        	$this->load->view('templates_admin/header', $data);
        	$this->load->view('templates_admin/sidebar');
        	$this->load->view('templates_admin/navbar', $data);
        	$this->load->view('admin/bank/edit_bank', $data);
        	$this->load->view('templates_admin/footer');
        }
		
	}

	public function edit_bank()
	{
		$this->mbank->edit_bank();
		$this->session->set_flashdata('success', 'Data berhasil diubah.');
		redirect('bank');
	}

	public function status_bank_inactive($id)
    {
        if (!isset($id)) show_404();
        
        $this->mbank->status_bank_inactive($id);
        redirect('bank');
    }

    public function status_bank_active($id)
    {
        if (!isset($id)) show_404();
        
        $this->mbank->status_bank_active($id);
        redirect('bank');
    }

}
