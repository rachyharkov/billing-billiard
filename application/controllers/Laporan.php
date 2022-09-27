<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Laporan extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        is_login();
		check_admin();
    }

	public function index()
	{
		$data = array(
		);

		$this->template->load('template', 'laporan/index', $data);
	}

}
