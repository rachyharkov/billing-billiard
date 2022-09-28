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

}
