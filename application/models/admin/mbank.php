<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mbank extends CI_Model {

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

	//******************* BANK *************//

	//fungsi load seluruh data bank
	public function bank()
	{
		$this->db->select('*');
		$this->db->from('bank');

		$query = $this->db->get();
		return $query->result();
	}

	//fungsi menyimpan data tambah bank
	public function add_bank()
	{
		$gambar_bank					= 'b'.time().'.png';
 		$config['file_name']			= $gambar_bank;
		$config['upload_path']   		= './assets/img/bank';
        $config['allowed_types'] 		= 'jpg|jpeg|png';
        $config['overwrite']			= true;
	    $config['max_size']             = 1024;

		$bank_data = array(
			'nama_pemilik' 		=> $this->input->post('nama_pemilik'),
			'nama_bank'			=> $this->input->post('nama_bank'),
			'no_rekening' 		=> $this->input->post('no_rekening'),
			'logo_bank'			=> $gambar_bank,
			'status' 			=> 'aktif'
		);

		$this->db->insert('bank', $bank_data);

		$this->upload->initialize($config);
		$this->upload->do_upload('gambar');
		$this->upload->data();
	}

	//fungsi mengambil data bank berdasarkan ID
 	public function getByIdBank($id)
 	{
 		$this->db->select('*');
		$this->db->from('bank');
 		$this->db->where('id_bank', $id);

 		$query = $this->db->get();
		return $query->result();
 	}

	//fungsi menyimpan data edit bank
	public function edit_bank()
	{
		$id_bank = $this->input->post('id_bank');

		if (!empty($_FILES['gambar']['name'])) {
			$gambar_bank					= 'b'.time().'.png';
 			$config['file_name']			= $gambar_bank;
			$config['upload_path']   		= './assets/img/bank';
        	$config['allowed_types'] 		= 'jpg|jpeg|png';
        	$config['overwrite']			= true;
	    	$config['max_size']             = 1024;

	    	$this->upload->initialize($config);
	    	$this->upload->do_upload('gambar');
	    	$this->upload->data();
		} else {
			$gambar_bank = $this->input->post('gambar_lama');
		}

		$bank_data = array(
			'nama_pemilik' 		=> $this->input->post('nama_pemilik'),
			'nama_bank'			=> $this->input->post('nama_bank'),
			'no_rekening' 		=> $this->input->post('no_rekening'),
			'logo_bank'			=> $gambar_bank,
			'status' 			=> 'aktif'
		);

		$this->db->where('id_bank', $id_bank);
		$this->db->update('bank', $bank_data);
	}

	//fungsi mengubah data menjadi tidak aktif
 	public function status_bank_inactive($id)
 	{
 		$data = array(
					'status' => 'inactive'
			);

		$this->db->where('id_bank', $id);
		$this->db->update('bank', $data);
 	}

 	//fungsi mengubah data menjadi aktif
  	public function status_bank_active($id)
 	{
 		$data = array(
					'status' => 'aktif'
			);

		$this->db->where('id_bank', $id);
		$this->db->update('bank', $data);
 	}

// akhir dari model
}