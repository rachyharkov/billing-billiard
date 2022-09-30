<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Dashboard extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        is_login();
		// check_admin();
		$this->load->model('Meja_model');
		$this->load->model('Paket_model');
    }

	public function index()
	{
		$meja_list = $this->Meja_model->get_all();
		$paket_list = $this->Paket_model->get_all();
		$data = array(
			'meja_list' => $meja_list,
			'paket_list' => $paket_list,
		);

		$this->template->load('template', 'dashboard', $data);
	}

	public function start_billing() {
		$id_meja = $this->input->post('id_meja');
		$paket_choice = $this->input->post('paket_choice');

		$getmenitbypaketchoice = $this->Paket_model->get_by_id($paket_choice)->menit;

		$total_jam_tambah = $getmenitbypaketchoice.' Minutes';

		$start_main = date('Y-m-d H:i:s');

		$end_main = date('Y-m-d H:i:s', strtotime($start_main . ' + ' . $total_jam_tambah));

		$total_hours = (strtotime($end_main) - strtotime($start_main)) / 3600;
		$total_minutes = ($total_hours - floor($total_hours)) * 60;
		$total_seconds = ($total_minutes - floor($total_minutes)) * 60;

		$datenow = date('Y-m-d H:i:s');

		$total_hours_until_now = (strtotime($datenow) - strtotime($start_main)) / 3600;
		$total_minutes_until_now = ($total_hours_until_now - floor($total_hours_until_now)) * 60;
		$total_seconds_until_now = ($total_minutes_until_now - floor($total_minutes_until_now)) * 60;

		// get duration of billing
		$durasi_total = floor($total_hours_until_now) . ' Jam ' . floor($total_minutes_until_now) . ' Menit ' . floor($total_seconds_until_now) . ' Detik';
		
		$total_hours_left = (strtotime($end_main) - strtotime($datenow)) / 3600;
		$total_minutes_left = ($total_hours_left - floor($total_hours_left)) * 60;
		$total_seconds_left = ($total_minutes_left - floor($total_minutes_left)) * 60;

		$time_left = floor($total_hours_left) . ' Jam ' . floor($total_minutes_left) . ' Menit ' . floor($total_seconds_left) . ' Detik';

		$this->load->helper('fungsi');
		$arr_data_transaksi = array(
			'billing_id' => generateBillingId(),
			'paket' => $paket_choice,
			'start' => $start_main,
			'durasi' => $durasi_total,
			'meja_id' => $id_meja,
			'billiard_play_price' => 50000,
			'additional_item' => json_encode(array()),
			'grand_total' => 50000,
			'payment_status' => 0
		);

		$this->load->model('Transaksi_model');
		$this->Transaksi_model->insert($arr_data_transaksi);

		$update_datameja = array(
			'in_use' => 1,
			'billing_id' => $arr_data_transaksi['billing_id'],
		);
		$this->load->model('Meja_model');
		$this->Meja_model->update($id_meja, $update_datameja);

		$arr = array(
			'bill_id' => $arr_data_transaksi['billing_id'],
			'start_time' => $start_main,
			'duration' => $durasi_total,
			'left_time' => $time_left,
			'end_time' => $end_main,
			'status' => '1',
		);

		echo json_encode($arr);
	}

}
