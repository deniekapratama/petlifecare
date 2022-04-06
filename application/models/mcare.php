<?php
class Mcare extends CI_Model{

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

	public function create_order($id_order_care){
		$date = date('Y-m-d', now());
		$time = date('H:i:s', now());

		$update_alamat = array(
			'alamat' => $this->input->post('alamat')
		);

		$this->db->where('id_user', $this->input->post('id_user'));
		$this->db->update('user', $update_alamat);

		$order_data = array(
    		'id_order'			=> $id_order_care,
			'id_user' 			=> $this->input->post('id_user'),
			'nama_paket'		=> $this->input->post('paket'),
			'nama_penerima'		=> $this->input->post('nama'),
			'total' 			=> $this->input->post('total'),
			'id_bank'			=> $this->input->post('id_bank'),
			'no_telp'			=> $this->input->post('no_telp'),
			'alamat'			=> $this->input->post('alamat'),
			'tgl_order'			=> $date,
			'tgl_waktu_order'	=> $date.' '.$time,
			'status_order'	 	=> '0'
		);

		$this->db->insert('order_perawatan', $order_data);

    }

    public function cek_order($id)
    {
    	$this->db->select('*');
    	$this->db->from('order_perawatan');
    	$this->db->where('id_order', $id);
    	$query = $this->db->get();
    	return $query->result();
    }

    public function invoice($id)
    {
    	$this->db->select('pb.id_order as id_pesanan, pb.id_user, pb.nama_paket, pb.nama_penerima, pb.total, pb.id_bank, pb.no_telp, pb.alamat, pb.tgl_order as tgl_pemesanan, pb.tgl_waktu_order as tgl_waktu_pemesanan, pb.bukti_transfer, pb.status_order as status_pesanan, b.nama_bank, b.nama_pemilik, b.no_rekening, b.logo_bank');
		$this->db->from('order_perawatan pb');
		$this->db->join('bank b', 'b.id_bank = pb.id_bank');
		$this->db->where('pb.id_order', $id);

		$query = $this->db->get();
		return $query->result();
    }

    // KONFIRMASI TAGIHAN
	public function confirm()
	{
		$id_order = $this->input->post('id_pesanan');

		$imageName 						= 'bt'.time().'.png';
		$config['file_name'] 			= $imageName;
		$config['upload_path']   		= './assets/img/bukti_transfer';
        $config['allowed_types'] 		= 'jpg|jpeg|png';
        $config['overwrite']			= true;
	    $config['max_size']             = 1024;

		$data = array(
				'bukti_transfer'=>$imageName,
				'status_order'=>'1'
			);

		$this->db->where('id_order', $id_order);
		$this->db->update('order_perawatan', $data);

		$this->upload->initialize($config);
		$this->upload->do_upload('bukti_transfer');
		$this->upload->data();
	}
     
}