<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Billing extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
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
		$id_billing = $id;

		// get data billing
		$this->load->model('Transaksi_model');
		$billing_data = $this->Transaksi_model->get_by_billing_id($id_billing);

		$paketyangdimaenindaridatabilling = json_decode($billing_data->paket, TRUE);
		$additionalitemdaridatabilling = json_decode($billing_data->additional_item, TRUE);
		$menittotal = 0;

		foreach ($paketyangdimaenindaridatabilling as $q => $v) {
			$menittotal += intval($v['menit']);
		}

		// convert menittotal to hours and minutes and seconds
		$hours = floor($menittotal / 60);
		$minutes = ($menittotal % 60);
		$seconds = 0;

		$durasinya = $hours.':'.$minutes.':'.$seconds;

		$arrdata = array(
			'billing_id' => $id_billing,
			'start_time' => $billing_data->start,
			'total_durasi' => $durasinya.' ('.$menittotal.' Menit)',
			'paketlist' => $paketyangdimaenindaridatabilling,
			'itemlist' => $additionalitemdaridatabilling,
			'title_pdf' => 'Billing #'.$id_billing,
		);

		$this->load->library('pdfgenerator');
        
        // filename dari pdf ketika didownload
        $file_pdf = 'Invoice Billing #'.$id_billing;
        // setting paper
        $paper = array(0,0,204,650);
        //orientasi paper potrait / landscape
        $orientation = "portrait";
        
		$html = $this->load->view('transaksi/billing_invoice_cetak',$arrdata, true);	    
        
        // run dompdf
        $this->pdfgenerator->generate_pdf_for_thermal($html, $file_pdf,$paper,$orientation);
    }
}