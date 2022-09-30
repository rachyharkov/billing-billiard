<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Barang extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('Barang_model');
		$this->load->library('form_validation');
		$this->load->model('Jenis_barang_model');
	}

	public function index()
	{
		$barang = $this->Barang_model->get_all();
		$data = array(
			'barang_data' => $barang,
		);
		$this->template->load('template', 'barang/barang_list', $data);
	}

	public function print($id)
	{
		echo $id . 'PRINTED';
    }
}