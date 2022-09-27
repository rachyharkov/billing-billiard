<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Meja extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // is_login();
        $this->load->model('Meja_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $meja = $this->Meja_model->get_all();
        $data = array(
            'meja_data' => $meja,
        );
        $this->template->load('template','meja/meja_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Meja_model->get_by_id(decrypt_url($id));
        if ($row) {
            $data = array(
		'meja_id' => $row->meja_id,
		'nama_meja' => $row->nama_meja,
	    );
            $this->template->load('template','meja/meja_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('meja'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('meja/create_action'),
	    'meja_id' => set_value('meja_id'),
	    'nama_meja' => set_value('nama_meja'),
	);
        $this->template->load('template','meja/meja_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_meja' => $this->input->post('nama_meja',TRUE),
	    );

            $this->Meja_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('meja'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Meja_model->get_by_id(decrypt_url($id));

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('meja/update_action'),
		'meja_id' => set_value('meja_id', $row->meja_id),
		'nama_meja' => set_value('nama_meja', $row->nama_meja),
	    );
            $this->template->load('template','meja/meja_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('meja'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update(encrypt_url($this->input->post('meja_id', TRUE)));
        } else {
            $data = array(
		'nama_meja' => $this->input->post('nama_meja',TRUE),
	    );

            $this->Meja_model->update($this->input->post('meja_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('meja'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Meja_model->get_by_id(decrypt_url($id));

        if ($row) {
            $this->Meja_model->delete(decrypt_url($id));
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('meja'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('meja'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_meja', 'nama meja', 'trim|required');

	$this->form_validation->set_rules('meja_id', 'meja_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Meja.php */
/* Location: ./application/controllers/Meja.php */
/* Please DO NOT modify this information : */