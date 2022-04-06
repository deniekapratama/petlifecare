<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
    {
		parent::__construct();

		// load helper

		// load model
		$this->load->model('mhome');

		//load library
		$this->load->library('pagination');

		/*//check login
		if($this->session->userdata('status') != "login"){
			echo '<script>alert(\'Login terlebih dahulu untuk mengakses halaman ini!\');document.location=\''.base_url('login').'\'</script>';*/
	}

	public function index()
	{
		$data['title'] = 'PetLife-Care';
		$data['menu_katalog'] = $this->mhome->category();
		$data['product_data'] = $this->mhome->product();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu', $data);
		$this->load->view('public/home', $data);
		$this->load->view('templates/footer');

	}

    public function check_order()
    {
        $data['title'] = 'PetLife-Care | Check Order';
        $data['menu_katalog'] = $this->mhome->category();
        $data['product_data'] = $this->mhome->product();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu', $data);
        $this->load->view('public/check_order', $data);
        $this->load->view('templates/footer');

    }

    public function order()
    {
        $id_order = $this->input->post('id_order');
        $jenis_transaksi = $this->input->post('jenis_transaksi');

        if($jenis_transaksi == 'shop'){
            redirect('invoice/'.$id_order);
        }else if($jenis_transaksi == 'care'){
            redirect('invoice_care/'.$id_order);
        }else{
            redirect('invoice_daycare/'.$id_order);
        }
    }

	public function petcare()
	{
		$data['title'] = 'PetLife-Care | Care Service';
		$data['menu_katalog'] = $this->mhome->category();
		$data['product_data'] = $this->mhome->product();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu', $data);
		$this->load->view('public/petcare', $data);
		$this->load->view('templates/footer');

	}

	public function page_pet_shop($id)
	{
		$data['menu_katalog'] = $this->mhome->category();
		$data['detail_katalog'] = $this->mhome->getByIdCategory($id);
		$data['title'] = 'PetLife-Care | '.$data['detail_katalog'];
		$data['product_data'] = $this->mhome->product_katalog_rows($id);


		//konfigurasi pagination
		$config['base_url'] 		= base_url().'pet_shop/'.$this->uri->segment(2).'/';
        $config['total_rows'] = count($data['product_data']); //total row
        $config['per_page'] = 8;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
        // Membuat Style pagination untuk BootStrap v4
      	$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = '&gt';
        $config['prev_link']        = '&lt';
        $config['full_tag_open']    = '<div class="col text-center"><div class="block-27"><ul>';
        $config['full_tag_close']   = '</ul></div></div>';
        $config['num_tag_open']     = '<li>';
        $config['num_tag_close']    = '</li>';
        $config['cur_tag_open']     = '<li class="active"><span>';
        $config['cur_tag_close']    = '</span></li>';
        $config['next_tag_open']    = '<li>';
        $config['next_tagl_close']  = '&lt;</li>';
        $config['prev_tag_open']    = '<li>';
        $config['prev_tagl_close']  = '&gt;</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
 
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
 
        $data['product_data'] = $this->mhome->product_katalog($id, $config["per_page"], $data['page']);          
 
        $data['pagination'] = $this->pagination->create_links();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu', $data);
		$this->load->view('public/petshop', $data);
		$this->load->view('templates/footer');
	}

	public function detail_product($id)
	{
		$data['title'] = 'PetLife-Care | Detail Product';
		$data['menu_katalog'] = $this->mhome->category();
		$data['product_data'] = $this->mhome->getByIdProduct($id);

		if (!$data['product_data']) show_404();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu', $data);
        $this->load->view('public/detail_product', $data);
        $this->load->view('templates/footer');
	}

	public function add_to_cart(){ //fungsi Add To Cart
        $data = array(
            'id' => $this->input->post('id_barang'), 
            'name' => $this->input->post('nama_barang'), 
            'price' => $this->input->post('harga'), 
            'qty' => $this->input->post('quantity'), 
        );
        $this->cart->insert($data);
        echo $this->show_cart(); //tampilkan cart setelah added
    }
 
    public function show_cart(){ //Fungsi untuk menampilkan Cart
        $output = '';
        $no = 0;
        foreach ($this->cart->contents() as $items) {
            $no++;
            $output .='
                <tr>
                    <td>'.$items['name'].'</td>
                    <td>'.rpCurrency($items['price']).'</td>
                    <td>'.$items['qty'].'</td>
                    <td>'.rpCurrency($items['subtotal']).'</td>
                    <td><button type="button" id="'.$items['rowid'].'" class="hapus_cart btn btn-danger btn-xs">Batal</button></td>
                </tr>
            ';
        }
        $output .= '
            <tr>
                <th colspan="3">Total</th>
                <th colspan="2">'.'Rp '.rpCurrency($this->cart->total()).'</th>
            </tr>
        ';
        return $output;
    }
 
    public function load_cart(){ //load data cart
        echo $this->show_cart();
    }
 
    public function hapus_cart(){ //fungsi untuk menghapus item cart
        $data = array(
            'rowid' => $this->input->post('row_id'), 
            'qty' => 0, 
        );
        $this->cart->update($data);
        echo $this->show_cart();
    }
}
