<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daycare extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		// load helper

		// load model
		$this->load->model('admin/msales');
		$this->load->model('admin/mcare');
		$this->load->model('admin/mdaycare');
	}

	public function index()
	{
		$data['title'] = 'Admin | Order Daycare Accepted';
		$data['daycare_data'] = $this->mdaycare->daycare();
		$data['confirm_data_index']		= count($this->msales->data_confirm());
		$data['confirm_data_care_index']		= count($this->mcare->data_confirm());
		$data['confirm_data_daycare_index']		= count($this->mdaycare->data_confirm());
		$total_notif = $data['confirm_data_index'] + $data['confirm_data_daycare_index'] + $data['confirm_data_care_index'];
		$data['total_notif']	= $total_notif;
		$total_penjualan	= count($this->msales->sales());
		$total_care	= count($this->mcare->care());
		$total_daycare	= count($this->mdaycare->daycare());
		$total = $total_penjualan + $total_care + $total_daycare;
		$data['order_selesai_data_index']		= $total;

		$data['notif_order_data']		= $this->msales->data_confirm();
		$data['notif_order_care_data']		= $this->mcare->data_confirm();
		$data['notif_order_daycare_data']		= $this->mdaycare->data_confirm();
		
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('templates_admin/navbar', $data);
		$this->load->view('admin/daycare/daycare', $data);
		$this->load->view('templates_admin/footer');

	}

	public function daycare_fail()
	{
		$data['title'] = 'Admin | Order Daycare Cancelled';
		$data['daycare_fail_data'] = $this->mdaycare->daycare_fail();
		$data['confirm_data_index']		= count($this->msales->data_confirm());
		$data['confirm_data_care_index']		= count($this->mcare->data_confirm());
		$data['confirm_data_daycare_index']		= count($this->mdaycare->data_confirm());
		$total_notif = $data['confirm_data_index'] + $data['confirm_data_daycare_index'] + $data['confirm_data_care_index'];
		$data['total_notif']	= $total_notif;
		$total_penjualan	= count($this->msales->sales());
		$total_care	= count($this->mcare->care());
		$total_daycare	= count($this->mdaycare->daycare());
		$total = $total_penjualan + $total_care + $total_daycare;
		$data['order_selesai_data_index']		= $total;

		$data['notif_order_data']		= $this->msales->data_confirm();
		$data['notif_order_care_data']		= $this->mcare->data_confirm();
		$data['notif_order_daycare_data']		= $this->mdaycare->data_confirm();
		
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('templates_admin/navbar', $data);
		$this->load->view('admin/daycare/daycare_fail', $data);
		$this->load->view('templates_admin/footer');

	}

	public function search(){
		$input = $this->input->post(NULL, TRUE);
		$dat1 = $this->mdaycare->filter("order_penitipan",$input["start_date"], $input["end_date"]);
		foreach ($dat1 as $rows){
			$data[] = array(
            'id_order_penitipan' => $rows->id_order_penitipan,
            'tipe_pet' => $rows->tipe_pet,
            'nama_penerima' => $rows->nama_penerima,
            'lama_penitipan' => $rows->lama_penitipan,
            'total' => 'Rp. '.rpCurrency($rows->total),
            'no_telp' => $rows->no_telp,
            'alamat' => $rows->alamat,
            'tgl_penitipan' => exDate($rows->tgl_penitipan),
            'bukti_transfer' => "<img class='someClass' src='".base_url()."assets/img/bukti_transfer/".$rows->bukti_transfer."' alt='".$rows->bukti_transfer."' style='width:84px; height:59px;'>"
        );
		}
		if(count($dat1) > 0){
			return $this->response([
			'data'      => array_values($data)
		]);
		}else{
			return $this->response([
			'data'      => array_values($dat1)
		]);
		}
	}

	public function response($data)
    {
        $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        exit();
    }

	public function confirm_order()
	{
		$data['title'] = 'Admin | Confirm Order Daycare';
		$data['confirm_data'] = $this->mdaycare->data_confirm();
		$data['confirm_data_index']		= count($this->msales->data_confirm());
		$data['confirm_data_care_index']		= count($this->mcare->data_confirm());
		$data['confirm_data_daycare_index']		= count($this->mdaycare->data_confirm());
		$total_notif = $data['confirm_data_index'] + $data['confirm_data_daycare_index'] + $data['confirm_data_care_index'];
		$data['total_notif']	= $total_notif;
		$total_penjualan	= count($this->msales->sales());
		$total_care	= count($this->mcare->care());
		$total_daycare	= count($this->mdaycare->daycare());
		$total = $total_penjualan + $total_care + $total_daycare;
		$data['order_selesai_data_index']		= $total;

		$data['notif_order_data']		= $this->msales->data_confirm();
		$data['notif_order_care_data']		= $this->mcare->data_confirm();
		$data['notif_order_daycare_data']		= $this->mdaycare->data_confirm();
		
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('templates_admin/navbar', $data);
		$this->load->view('admin/daycare/confirm_daycare', $data);
		$this->load->view('templates_admin/footer');

	}

	public function confirm($id)
	{
		$this->mdaycare->confirm_update($id);
		redirect('confirm_order_daycare');
	}

	public function tolak($id)
	{
		$this->mdaycare->tolak_update($id);
		redirect('confirm_order_daycare');
	}
}
