<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mcare extends CI_Model {

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

	//******************* SALES *************//

	//fungsi load seluruh data order perawatan selesai
	public function care()
	{
		$this->db->select('*');
		$this->db->from('order_perawatan');
		$this->db->where('status_order','2');

		$query = $this->db->get();
		return $query->result();
	}

	//fungsi load data berdasarkan filter tanggal
	public function filter($table, $start_date, $end_date){
        /*$this->db->where('tgl_pemesanan >=',$start_date); 
        $this->db->where('tgl_pemesanan <=',$end_date);*/
        $this->db->where('status_order','2');
        $this->db->where("tgl_order BETWEEN '$start_date' AND '$end_date'");
        return $this->db->get($table)->result();
    }

	//fungsi load seluruh data order perawatan konfirmasi
	public function data_confirm()
	{
		$this->db->select('*');
		$this->db->from('order_perawatan');
		$this->db->where('status_order','1');

		$query = $this->db->get();
		return $query->result();
	}

	// KONFIRMASI DATA
	public function confirm_update($id)
	{
		$data = array(
				'status_order' => 2
			);

		$this->db->where('id_order', $id);
		$this->db->update('order_perawatan', $data);
	}

	// TOLAK DATA
	public function tolak_update($id)
	{
		$data = array(
				'status_order' => 9
			);

		$this->db->where('id_order', $id);
		$this->db->update('order_perawatan', $data);
	}


	//fungsi load seluruh data order perawatan gagal
	public function care_fail()
	{
		$this->db->select('*');
		$this->db->from('order_perawatan');
		$this->db->where('status_order','9');

		$query = $this->db->get();
		return $query->result();
	}
// akhir dari model
}