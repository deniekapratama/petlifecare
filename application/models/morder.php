<?php
class Morder extends CI_Model{

// Konstruktur
function __construct()
{
	parent::__construct();
	// mengambil data model, library, helper

	/**
	*
	* Model dan Helper di define dengan array
	*
	*/
	$array_helper = array(
		'date'
	);

	$array_library = array(
		'upload'
	);

	// HELPER
	$this->load->helper($array_helper);

	// LIBRARY
	$this->load->library($array_library);
}

	public function create_order($id_pesanan){
		$date = date('Y-m-d', now());
		$time = date('H:i:s', now());

		$cart_data	= $this->cart->contents();

		$update_alamat = array(
			'alamat' => $this->input->post('alamat')
		);

		$this->db->where('id_user', $this->input->post('id_user'));
		$this->db->update('user', $update_alamat);

		$order_data = array(
    		'id_pesanan'		=> $id_pesanan,
			'id_user' 			=> $this->input->post('id_user'),
			'nama_penerima'		=> $this->input->post('nama'),
			'total' 			=> $this->input->post('total'),
			'id_bank'			=> $this->input->post('id_bank'),
			'no_telp'			=> $this->input->post('no_telp'),
			'alamat'			=> $this->input->post('alamat'),
			'tgl_pemesanan'		=> $date,
			'tgl_waktu_pemesanan'=> $date.' '.$time,
			'status_pesanan' 	=> '0'
		);

		$this->db->insert('pesanan_barang', $order_data);

		foreach ($cart_data as $key => $d_cart) {
			$order_detail[] = array(
				'id_pesanan'	=> $id_pesanan,
				'id_barang'		=> $d_cart['id'],
				'qty'			=> $d_cart['qty'],
				'subtotal'		=> $d_cart['subtotal']
			);
		}

		$this->db->insert_batch('pesanan_barang_detail', $order_detail);

		foreach ($cart_data as $key => $d_cart) {
			$update_data_barang = array(
				'stok'			=> $d_cart['qty']
			);

			$this->db->where('id_barang', $d_cart['id']);
			$this->db->update('barang', $update_data_barang);
		}
    }

    public function cek_barang($id)
    {
    	$this->db->select('*');
    	$this->db->from('pesanan_barang');
    	$this->db->where('id_pesanan', $id);
    	$query = $this->db->get();
    	return $query->result();
    }

    public function invoice($id)
    {
    	$this->db->select('pb.id_pesanan, pb.id_user, pb.nama_penerima, pb.total, pb.id_bank, pb.no_telp, pb.alamat, pb.tgl_pemesanan, pb.tgl_waktu_pemesanan, pb.bukti_transfer, pb.status_pesanan, b.nama_bank, b.nama_pemilik, b.no_rekening, b.logo_bank');
		$this->db->from('pesanan_barang pb');
		$this->db->join('bank b', 'b.id_bank = pb.id_bank');
		$this->db->where('pb.id_pesanan', $id);

		$query = $this->db->get();
		return $query->result();
    }

    // KONFIRMASI TAGIHAN
	public function confirm()
	{
		$id_pesanan = $this->input->post('id_pesanan');

		$imageName 						= 'bt'.time().'.png';
		$config['file_name'] 			= $imageName;
		$config['upload_path']   		= './assets/img/bukti_transfer';
        $config['allowed_types'] 		= 'jpg|jpeg|png';
        $config['overwrite']			= true;
	    $config['max_size']             = 1024;

		$data = array(
				'bukti_transfer'=>$imageName,
				'status_pesanan'=>'1'
			);

		$this->db->where('id_pesanan', $id_pesanan);
		$this->db->update('pesanan_barang', $data);

		$this->upload->initialize($config);
		$this->upload->do_upload('bukti_transfer');
		$this->upload->data();
	}
     
}