<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenis_barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Jenis_barang_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $jenis_barang = $this->Jenis_barang_model->get_all();
        $data = array(
            'jenis_barang_data' => $jenis_barang,
        );
        $this->template->load('template','jenis_barang/jenis_barang_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Jenis_barang_model->get_by_id(decrypt_url($id));
        if ($row) {
            $data = array(
		'jenis_barang_id' => $row->jenis_barang_id,
		'kode_jenis_barang' => $row->kode_jenis_barang,
		'nama_jenis_barang' => $row->nama_jenis_barang,
	    );
            $this->template->load('template','jenis_barang/jenis_barang_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_barang'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jenis_barang/create_action'),
	    'jenis_barang_id' => set_value('jenis_barang_id'),
	    'kode_jenis_barang' => set_value('kode_jenis_barang'),
	    'nama_jenis_barang' => set_value('nama_jenis_barang'),
	);
        $this->template->load('template','jenis_barang/jenis_barang_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode_jenis_barang' => $this->input->post('kode_jenis_barang',TRUE),
		'nama_jenis_barang' => $this->input->post('nama_jenis_barang',TRUE),
	    );

            $this->Jenis_barang_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenis_barang'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Jenis_barang_model->get_by_id(decrypt_url($id));

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jenis_barang/update_action'),
		'jenis_barang_id' => set_value('jenis_barang_id', $row->jenis_barang_id),
		'kode_jenis_barang' => set_value('kode_jenis_barang', $row->kode_jenis_barang),
		'nama_jenis_barang' => set_value('nama_jenis_barang', $row->nama_jenis_barang),
	    );
            $this->template->load('template','jenis_barang/jenis_barang_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_barang'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update(encrypt_url($this->input->post('jenis_barang_id', TRUE)));
        } else {
            $data = array(
		'kode_jenis_barang' => $this->input->post('kode_jenis_barang',TRUE),
		'nama_jenis_barang' => $this->input->post('nama_jenis_barang',TRUE),
	    );

            $this->Jenis_barang_model->update($this->input->post('jenis_barang_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenis_barang'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jenis_barang_model->get_by_id(decrypt_url($id));

        if ($row) {
            $this->Jenis_barang_model->delete(decrypt_url($id));
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenis_barang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_barang'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_jenis_barang', 'kode jenis barang', 'trim|required');
	$this->form_validation->set_rules('nama_jenis_barang', 'nama jenis barang', 'trim|required');

	$this->form_validation->set_rules('jenis_barang_id', 'jenis_barang_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Jenis_barang.php */
/* Location: ./application/controllers/Jenis_barang.php */
/* Please DO NOT modify this information : */
