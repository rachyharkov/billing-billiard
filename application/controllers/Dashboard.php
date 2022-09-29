<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Dashboard extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        is_login();
		// check_admin();
    }

	public function index()
	{
		$this->load->model('Meja_model');
		$this->load->model('Paket_model');
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

		$total_jam_tambah = '5 Hours';

		$start_main = '2022-09-29 19:32:00';

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


		$arr = array(
			'bill_id' => rand(100000, 999999),
			'start_time' => '2022-09-29 16:00:00',
			'duration' => $durasi_total,
			'left_time' => $time_left,
			'end_time' => $end_main,
			'status' => '1',
		);

		echo json_encode($arr);
	}

}
