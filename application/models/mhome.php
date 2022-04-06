<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mhome extends CI_Model {

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

	//******************* HOME *************//

	//fungsi load seluruh data katalog
	public function category()
	{
		$this->db->select('*');
		$this->db->from('katalog');
		$this->db->where('status', 'aktif');

		$query = $this->db->get();
		return $query->result();
	}

	//fungsi load seluruh data product
	public function product()
	{
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->where('status', 'aktif');

		$query = $this->db->get();
		return $query->result();
	}

	//fungsi mengambil data product single berdasarkan ID
 	public function getByIdProduct($id)
 	{
 		$this->db->select('*');
 		$this->db->from('barang');
 		$this->db->where('id_barang', $id);

 		$query = $this->db->get();
		return $query->result();
 	}

 	//fungsi mengambil data katalog berdasarkan ID
 	public function getByIdCategory($id)
 	{
 		$this->db->select('*');
 		$this->db->from('katalog');
 		$this->db->where('id_katalog', $id);
 		$this->db->where('status', 'aktif');

 		$query = $this->db->get()->row()->jenis_katalog;
		return $query;
	}

	//fungsi mengambil seluruh data berdasarkan katalog
 	public function product_katalog_rows($id)
 	{
 		$this->db->select('b.id_barang, b.id_katalog, k.jenis_katalog, b.nama_barang, b.keterangan, b.gambar, b.harga, b.stok, b.status');
		$this->db->from('barang b');
		$this->db->join('katalog k', 'k.id_katalog = b.id_katalog');
		$this->db->where('b.id_katalog', $id);
		$this->db->where('b.status', 'aktif');

 		$query = $this->db->get();
		return $query->result();
 	}

 	//fungsi mengambil seluruh data berdasarkan katalog
 	public function product_katalog($id,$limit,$start)
 	{
 		$this->db->select('b.id_barang, b.id_katalog, k.jenis_katalog, b.nama_barang, b.keterangan, b.gambar, b.harga, b.stok, b.status');
		$this->db->from('barang b');
		$this->db->join('katalog k', 'k.id_katalog = b.id_katalog');
		$this->db->where('b.id_katalog', $id);
		$this->db->where('b.status', 'aktif');
		$this->db->limit($limit, $start);

 		$query = $this->db->get();
		return $query->result();
 	}

 	//fungsi mengubah level user
 	public function change_level($id)
 	{
 		$this->db->select('*');
 		$this->db->from('user');
 		$this->db->where('id_user', $id);

 		$query = $this->db->get();
 		$level = $query->row()->level;

 		if($level == 'customer'){
 			$data = array(
					'level' => 'admin'
			);
 		}else{
 			$data = array(
					'level' => 'customer'
			);
 		}

		$this->db->where('id_user', $id);
		$this->db->update('user', $data);
 	}

 	//fungsi mengubah data menjadi tidak aktif
 	public function status_user_inactive($id)
 	{
 		$data = array(
					'status' => 'inactive'
			);

		$this->db->where('id_user', $id);
		$this->db->update('user', $data);
 	}

 	//fungsi mengubah data menjadi aktif
  	public function status_user_active($id)
 	{
 		$data = array(
					'status' => 'aktif'
			);

		$this->db->where('id_user', $id);
		$this->db->update('user', $data);
 	}

 	//fungsi menampilkan seluruh penjualan
 	public function all_sales()
 	{
 		$this->db->select('*');
 		$this->db->from('pesanan_barang');
 		$query = $this->db->get();

 		return $query->result();
 	}

 	//fungsi menampilkan seluruh customer
 	public function all_customer()
 	{
 		$this->db->select('*');
 		$this->db->from('user');
 		$this->db->where('level', 'customer');
 		$query = $this->db->get();

 		return $query->result();
 	}

// akhir dari model
}