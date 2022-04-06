<?php
 
class Cart extends CI_Controller{
     
    function __construct(){
        parent::__construct();
        $this->load->model('mhome');
        $this->load->model('morder');
        $this->load->model('admin/mbank');
    }
 
    public function index(){

        $data['title'] = 'PetLife-Care | My Cart';
        $data['menu_katalog'] = $this->mhome->category();
        $data['cart_data'] = $this->cart->contents();
        

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu', $data);
        $this->load->view('public/cart', $data);
        $this->load->view('templates/footer');
    }

    // product add to basket    
    function add() {
        $json = array();
        if (!empty($this->input->post('productID'))) {
            $id = $this->input->post('productID');
            $qty = $this->input->post('qty');
            $productInfo = $this->mhome->getByIdProduct($id);
            foreach($productInfo as $d_product){
                $cartData = array(
                'id' => $d_product->id_barang,
                'name' => $d_product->nama_barang,
                'price' => $d_product->harga,
                'description' => $d_product->keterangan,
                'qty' => $qty,
                'image' => $d_product->gambar,
            );
            }
            $this->cart->insert($cartData);
            $json['status'] = 1;
            $json['counter'] = count($this->cart->contents());
        } else {
            $json['status'] = 0;
        }
        header('Content-Type: application/json');
        echo json_encode($json);
    }

    // remove cart item
    function remove() {
        $json = array();
        if (!empty($this->input->post('productID'))) {
            $rowid = $this->input->post('productID');
            $data = array(
                'rowid' => $rowid,
                'qty' => 0
            );
            $this->cart->update($data);
        }
        header('Content-Type: application/json');
        echo json_encode($json);
    }

    // update cart item
    function update() {
        $json = array();
        if (!empty($this->input->post('productid'))) {
            $rowid = $this->input->post('productid');
            $qty = $this->input->post('qty');
            $data = array(
                'rowid' => $rowid,
                'qty' => $qty
            );
            $this->cart->update($data);
        }
        header('Content-Type: application/json');
        echo json_encode($json);
    }

    public function checkout(){

        $data['title'] = 'PetLife-Care | Checkout';
        $data['menu_katalog'] = $this->mhome->category();
        $data['bank_data'] = $this->mbank->bank();
        $data['cart_data'] = $this->cart->contents();
        

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu', $data);
        $this->load->view('public/checkout', $data);
        $this->load->view('templates/footer');
    }

    public function order()
    {
        $date = date('Y-m-d', now());
        $time = date('H:i:s', now());
        // random generator
        $rn   = mt_rand(1000, 9999);

        // unique id
        $id_pesanan = substr(str_replace('-','',$date), 2).$rn;

        $this->morder->create_order($id_pesanan);
        $this->session->unset_userdata('cart_contents');
        redirect('invoice/'.$id_pesanan);
    }

    public function invoice($id)
    {
        $data['title'] = 'PetLife-Care | Invoice';
        $data['invoice_data'] = $this->morder->invoice($id);
        $data['menu_katalog'] = $this->mhome->category();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu', $data);
        $this->load->view('public/invoice', $data);
        $this->load->view('templates/footer');
    }

    // timer tagihan
    public function timer($id)
    {
        $inv        = $this->morder->invoice($id);
        $date_now   = date('Y-m-d H:i:s', now());
        $cek_barang = $this->morder->cek_barang($id);

        foreach($inv as $row)
        {
            $datetime = $row->tgl_waktu_pemesanan;
        }

        $awal  = new DateTime($datetime);
        $akhir = new DateTime($date_now);
        $diff  = $awal->diff($akhir);
        if($diff->h > 0)
        {
            foreach($cek_barang as $update_data_barang){
                $data_barang = array(
                    'stok' => $update_data_barang->qty
                );
                $this->db->where('id_barang', $update_data_barang->id_barang);
                $this->db->update('barang', $data_barang);
            }
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
        $id_pesanan = $this->input->post('id_pesanan');
        $this->morder->confirm();
        redirect('invoice/'.$id_pesanan);

    }
    
}