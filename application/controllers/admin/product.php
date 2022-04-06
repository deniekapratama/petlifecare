<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    function __construct()
    {
		parent::__construct();

		// load helper

		// load model
		$this->load->model('admin/mproduct');
		$this->load->model('admin/msales');
		$this->load->model('admin/mcare');
		$this->load->model('admin/mdaycare');

		/*//check login
		if($this->session->userdata('status') != "login"){
			echo '<script>alert(\'Login terlebih dahulu untuk mengakses halaman ini!\');document.location=\''.base_url('login').'\'</script>';*/
	}

	public function index()
	{
		$data['title'] = 'Admin | Product';

		$data['product_data'] = $this->mproduct->product();
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
		$this->load->view('admin/product/product', $data);
		$this->load->view('templates_admin/footer');

	}

	public function page_tambah_product()
	{
		$data['title'] = 'Admin | Add Product';

		$data['kategori'] = $this->mproduct->data_kategori();
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
		$this->load->view('admin/product/tambah_product', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_product()
	{
		$this->mproduct->add_product();
		$this->session->set_flashdata('success', 'Data berhasil ditambah.');
		redirect('product');
	}

	public function page_edit_product($id)
	{

		$data['product_data'] = $this->mproduct->getByIdProduct($id);
		$data['kategori'] = $this->mproduct->data_kategori();
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
        if (!$data['product_data']){
        	$data['title'] = 'Admin | 404';

        	$this->load->view('templates_admin/header', $data);
        	$this->load->view('templates_admin/sidebar');
        	$this->load->view('templates_admin/navbar', $data);
        	$this->load->view('admin/404', $data);
        	$this->load->view('templates_admin/footer');
        }else{
        	$data['title'] = 'Admin | Edit Product';

        	$this->load->view('templates_admin/header', $data);
        	$this->load->view('templates_admin/sidebar');
        	$this->load->view('templates_admin/navbar', $data);
        	$this->load->view('admin/product/edit_product', $data);
        	$this->load->view('templates_admin/footer');
        }
		
	}

	public function edit_product()
	{
		$this->mproduct->edit_product();
		$this->session->set_flashdata('success', 'Data berhasil diubah.');
		redirect('product');
	}

	public function status_product_inactive($id)
    {
        if (!isset($id)) show_404();
        
        $this->mproduct->status_product_inactive($id);
        redirect('product');
    }

    public function status_product_active($id)
    {
        if (!isset($id)) show_404();
        
        $this->mproduct->status_product_active($id);
        redirect('product');
    }

	public function product_category()
	{
		$data['title'] = 'Admin | Category Product';

		$data['category_data'] = $this->mproduct->category();
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
		$this->load->view('admin/product/kategori', $data);
		$this->load->view('templates_admin/footer');
	}

	public function page_tambah_product_category()
	{
		$data['title'] = 'Admin | Add Category Product';
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
		$this->load->view('admin/product/tambah_kategori', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_category()
	{
		$this->mproduct->add_category();
		$this->session->set_flashdata('success', 'Data berhasil ditambah.');
		redirect('product_category');
	}

	public function page_edit_product_category($id)
	{

		$data['category_data'] = $this->mproduct->getByIdCategory($id);
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
        if (!$data['category_data']){
        	$data['title'] = 'Admin | 404';

        	$this->load->view('templates_admin/header', $data);
        	$this->load->view('templates_admin/sidebar');
        	$this->load->view('templates_admin/navbar', $data);
        	$this->load->view('admin/404', $data);
        	$this->load->view('templates_admin/footer');
        }else{
        	$data['title'] = 'Admin | Edit Category Product';

        	$this->load->view('templates_admin/header', $data);
        	$this->load->view('templates_admin/sidebar');
        	$this->load->view('templates_admin/navbar', $data);
        	$this->load->view('admin/product/edit_kategori', $data);
        	$this->load->view('templates_admin/footer');
        }
		
	}

	public function edit_category()
	{
		$this->mproduct->edit_category();
		$this->session->set_flashdata('success', 'Data berhasil diubah.');
		redirect('product_category');
	}

	public function status_category_inactive($id)
    {
        if (!isset($id)) show_404();
        
        $this->mproduct->status_category_inactive($id);
        redirect('product_category');
    }

    public function status_category_active($id)
    {
        if (!isset($id)) show_404();
        
        $this->mproduct->status_category_active($id);
        redirect('product_category');
    }
}
