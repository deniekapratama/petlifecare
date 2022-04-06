<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mproduct extends CI_Model {

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

	//******************* PRODUCT *************//

	//fungsi load seluruh data product
	public function product()
	{
		$this->db->select('b.id_barang, b.id_katalog, k.jenis_katalog, b.nama_barang, b.keterangan, b.gambar, b.harga, b.stok, b.status');
		$this->db->from('barang b');
		$this->db->join('katalog k', 'k.id_katalog = b.id_katalog');

		$query = $this->db->get();
		return $query->result();
	}

	//fungsi load seluruh data katalog yang aktif
	public function data_kategori()
	{
		$this->db->select('*');
		$this->db->from('katalog');
		$this->db->where('status','aktif');

		$query = $this->db->get();
		return $query->result();
	}

	//fungsi menyimpan data tambah product
	public function add_product()
	{
		$gambar_product					= 'pd'.time().'.png';
 		$config['file_name']			= $gambar_product;
		$config['upload_path']   		= './assets/img/product';
        $config['allowed_types'] 		= 'jpg|jpeg|png';
        $config['overwrite']			= true;
	    $config['max_size']             = 1024;

		$product_data = array(
			'id_katalog' 		=> $this->input->post('id_katalog'),
			'nama_barang'		=> $this->input->post('nama_product'),
			'keterangan' 		=> $this->input->post('keterangan'),
			'gambar'			=> $gambar_product,
			'harga'				=> $this->input->post('harga'),
			'stok'				=> $this->input->post('stok'),
			'status' 			=> 'aktif'
		);

		$this->db->insert('barang', $product_data);

		$this->upload->initialize($config);
		$this->upload->do_upload('gambar');
		$this->upload->data();
	}

	//fungsi mengambil data product berdasarkan ID
 	public function getByIdProduct($id)
 	{
 		$this->db->select('b.id_barang, b.id_katalog, k.jenis_katalog, b.nama_barang, b.keterangan, b.gambar, b.harga, b.stok, b.status');
		$this->db->from('barang b');
		$this->db->join('katalog k', 'k.id_katalog = b.id_katalog');
 		$this->db->where('b.id_barang', $id);

 		$query = $this->db->get();
		return $query->result();
 	}

	//fungsi menyimpan data edit product
	public function edit_product()
	{
		$id_barang = $this->input->post('id_barang');

		if (!empty($_FILES['gambar']['name'])) {
			$gambar_product					= 'pd'.time().'.png';
 			$config['file_name']			= $gambar_product;
			$config['upload_path']   		= './assets/img/product';
        	$config['allowed_types'] 		= 'jpg|jpeg|png';
        	$config['overwrite']			= true;
	    	$config['max_size']             = 1024;

	    	$this->upload->initialize($config);
	    	$this->upload->do_upload('gambar');
	    	$this->upload->data();
		} else {
			$gambar_product = $this->input->post('gambar_lama');
		}

		$product_data = array(
			'id_katalog' 		=> $this->input->post('id_katalog'),
			'nama_barang'		=> $this->input->post('nama_product'),
			'keterangan' 		=> $this->input->post('keterangan'),
			'gambar'			=> $gambar_product,
			'harga'				=> $this->input->post('harga'),
			'stok'				=> $this->input->post('stok'),
			'status' 			=> 'aktif'
		);

		$this->db->where('id_barang', $id_barang);
		$this->db->update('barang', $product_data);
	}

	//fungsi mengubah data menjadi tidak aktif
 	public function status_product_inactive($id)
 	{
 		$data = array(
					'status' => 'inactive'
			);

		$this->db->where('id_barang', $id);
		$this->db->update('barang', $data);
 	}

 	//fungsi mengubah data menjadi aktif
  	public function status_product_active($id)
 	{
 		$data = array(
					'status' => 'aktif'
			);

		$this->db->where('id_barang', $id);
		$this->db->update('barang', $data);
 	}


	//******************* CATEGORY *************//

	//fungsi load seluruh data katalog
	public function category()
	{
		$this->db->select('*');
		$this->db->from('katalog');

		$query = $this->db->get();
		return $query->result();
	}

	//fungsi menyimpan data tambah katalog
	public function add_category()
	{
		$category_data = array(
			'jenis_katalog'		=> $this->input->post('nama_kategori'),
			'status'			=> 'aktif'
		);

		$this->db->insert('katalog', $category_data);
	}

	//fungsi mengambil data katalog berdasarkan ID
 	public function getByIdCategory($id)
 	{
 		$this->db->select('*');
 		$this->db->from('katalog');
 		$this->db->where('id_katalog', $id);

 		$query = $this->db->get();
		return $query->result();
 	}

 	//fungsi menyimpan data edit katalog
 	public function edit_category()
 	{
 		$id_category = $this->input->post('id_kategori');

		$category_data = array(
			'jenis_katalog'		=> $this->input->post('nama_kategori')
		);

		$this->db->where('id_katalog', $id_category);
		$this->db->update('katalog', $category_data);
 	}

 	//fungsi mengubah data menjadi tidak aktif
 	public function status_category_inactive($id)
 	{
 		$data = array(
					'status' => 'inactive'
			);

		$this->db->where('id_katalog', $id);
		$this->db->update('katalog', $data);
 	}

 	//fungsi mengubah data menjadi aktif
  	public function status_category_active($id)
 	{
 		$data = array(
					'status' => 'aktif'
			);

		$this->db->where('id_katalog', $id);
		$this->db->update('katalog', $data);
 	}

// akhir dari model
}