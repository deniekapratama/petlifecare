<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdaycare extends CI_Model {

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

	//******************* SERVICE *************//

	//fungsi load seluruh data order penitipan selesai
	public function daycare()
	{
		$this->db->select('*');
		$this->db->from('order_penitipan');
		$this->db->where('status_order_penitipan','2');

		$query = $this->db->get();
		return $query->result();
	}

	//fungsi load data berdasarkan filter tanggal
	public function filter($table, $start_date, $end_date){
        /*$this->db->where('tgl_pemesanan >=',$start_date); 
        $this->db->where('tgl_pemesanan <=',$end_date);*/
        $this->db->where('status_order_penitipan','2');
        $this->db->where("tgl_penitipan BETWEEN '$start_date' AND '$end_date'");
        return $this->db->get($table)->result();
    }

	//fungsi load seluruh data order penitipan konfirmasi
	public function data_confirm()
	{
		$this->db->select('*');
		$this->db->from('order_penitipan');
		$this->db->where('status_order_penitipan','1');

		$query = $this->db->get();
		return $query->result();
	}

	// KONFIRMASI DATA
	public function confirm_update($id)
	{
		$data = array(
				'status_order_penitipan' => 2
			);

		$this->db->where('id_order_penitipan', $id);
		$this->db->update('order_penitipan', $data);
	}

	// TOLAK DATA
	public function tolak_update($id)
	{
		$data = array(
				'status_order_penitipan' => 9
			);

		$this->db->where('id_order_penitipan', $id);
		$this->db->update('order_penitipan', $data);
	}


	//fungsi load seluruh data order penitipan gagal
	public function daycare_fail()
	{
		$this->db->select('*');
		$this->db->from('order_penitipan');
		$this->db->where('status_order_penitipan','9');

		$query = $this->db->get();
		return $query->result();
	}
// akhir dari model
}