<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Care extends CI_Controller {

	function __construct()
    {
		parent::__construct();

		// load helper

		// load model
		$this->load->model('mhome');
        $this->load->model('mcare');
        $this->load->model('admin/mbank');

		//load library
		$this->load->library('pagination');

		/*//check login
		if($this->session->userdata('status') != "login"){
			echo '<script>alert(\'Login terlebih dahulu untuk mengakses halaman ini!\');document.location=\''.base_url('login').'\'</script>';*/
	}

	public function index()
	{
		$data['title'] = 'PetLife-Care | Care Service';
		$data['menu_katalog'] = $this->mhome->category();
		$data['product_data'] = $this->mhome->product();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu', $data);
		$this->load->view('public/petcare', $data);
		$this->load->view('templates/footer');

	}

    public function cat_care()
    {
        $data['title'] = 'PetLife-Care | Cat Care Service';
        $data['menu_katalog'] = $this->mhome->category();
        $data['product_data'] = $this->mhome->product();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu', $data);
        $this->load->view('public/catcare', $data);
        $this->load->view('templates/footer');
    }

    public function dog_care()
    {
        $data['title'] = 'PetLife-Care | Dog Care Service';
        $data['menu_katalog'] = $this->mhome->category();
        $data['product_data'] = $this->mhome->product();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu', $data);
        $this->load->view('public/dogcare', $data);
        $this->load->view('templates/footer');

    }

    public function checkout(){

        $data['title'] = 'PetLife-Care | Checkout Care';
        $data['menu_katalog'] = $this->mhome->category();
        $data['bank_data'] = $this->mbank->bank();
        $data['cart_data'] = $this->cart->contents();
        

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu', $data);
        if($this->uri->segment(1)=='co_care_dog'){
            $this->load->view('public/co_care_dog', $data);
        }else{
            $this->load->view('public/co_care', $data);
        }
        $this->load->view('templates/footer');
    }

    public function order()
    {
        $date = date('Y-m-d', now());
        $time = date('H:i:s', now());
        // random generator
        $rn   = mt_rand(1000, 9999);

        // unique id
        $id_order_care = substr(str_replace('-','',$date), 2).$rn;

        $this->mcare->create_order($id_order_care);
        redirect('invoice_care/'.$id_order_care);
    }

    public function invoice($id)
    {
        $data['title'] = 'PetLife-Care | Invoice';
        $data['invoice_data'] = $this->mcare->invoice($id);
        $data['menu_katalog'] = $this->mhome->category();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu', $data);
        $this->load->view('public/invoice_care', $data);
        $this->load->view('templates/footer');
    }

    // timer tagihan
    public function timer($id)
    {
        $inv        = $this->mcare->invoice($id);
        $date_now   = date('Y-m-d H:i:s', now());
        $cek_order = $this->mcare->cek_order($id);

        foreach($inv as $row)
        {
            $datetime = $row->tgl_waktu_pemesanan;
        }

        $awal  = new DateTime($datetime);
        $akhir = new DateTime($date_now);
        $diff  = $awal->diff($akhir);
        if($diff->h > 0)
        {
            echo "Waktu pembayaran telah habis";
        }
        else
        {
            echo 59-$diff->i . ' Menit ';
            echo 60-$diff->s . ' Detik ';
            echo "<br><br><button class='btn btn-primary py-3 px-4' data-toggle='modal' data-target='#modal_confirm'>Konfirmasi Pemabayaran</button><br><br>";      
        }
    }

    public function process_invoice()
    {
        $id_order = $this->input->post('id_pesanan');
        $this->mcare->confirm();
        redirect('invoice_care/'.$id_order);

    }
}
