<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	function __construct()
    {
		parent::__construct();

		// load helper

		// load model
		$this->load->model('mhome');

		//load library
		$this->load->library('pagination');

	}

	public function index()
	{
		$data['title'] = 'PetLife-Care | About';
		$data['menu_katalog'] = $this->mhome->category();
		$data['product_data'] = count($this->mhome->product());
        $data['sales_data'] = count($this->mhome->all_sales());
        $data['customer_data'] = count($this->mhome->all_customer());
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu', $data);
		$this->load->view('public/about', $data);
		$this->load->view('templates/footer');

	}

}
