<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Muser extends CI_Model
{

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

	//******************* USER *************//

	//fungsi load seluruh data user
	public function user()
	{
		$this->db->select('*');
		$this->db->from('user');

		$query = $this->db->get();
		return $query->result();
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

	//fungsi mengubah level user
	public function change_level($id)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id_user', $id);

		$query = $this->db->get();
		$level = $query->row()->level;

		if ($level == 'customer') {
			$data = array(
				'level' => 'admin'
			);
		} else {
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

	// akhir dari model
}
