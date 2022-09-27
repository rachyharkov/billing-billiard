<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Unit extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // is_login();
        $this->load->model('Unit_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $unit = $this->Unit_model->get_all();
        $data = array(
            'unit_data' => $unit,
        );
        $this->template->load('template','unit/unit_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Unit_model->get_by_id(decrypt_url($id));
        if ($row) {
            $data = array(
		'unit_id' => $row->unit_id,
		'nama_unit' => $row->nama_unit,
	    );
            $this->template->load('template','unit/unit_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('unit'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('unit/create_action'),
	    'unit_id' => set_value('unit_id'),
	    'nama_unit' => set_value('nama_unit'),
	);
        $this->template->load('template','unit/unit_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_unit' => $this->input->post('nama_unit',TRUE),
	    );

            $this->Unit_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('unit'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Unit_model->get_by_id(decrypt_url($id));

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('unit/update_action'),
		'unit_id' => set_value('unit_id', $row->unit_id),
		'nama_unit' => set_value('nama_unit', $row->nama_unit),
	    );
            $this->template->load('template','unit/unit_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('unit'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update(encrypt_url($this->input->post('unit_id', TRUE)));
        } else {
            $data = array(
		'nama_unit' => $this->input->post('nama_unit',TRUE),
	    );

            $this->Unit_model->update($this->input->post('unit_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('unit'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Unit_model->get_by_id(decrypt_url($id));

        if ($row) {
            $this->Unit_model->delete(decrypt_url($id));
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('unit'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('unit'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_unit', 'nama unit', 'trim|required');

	$this->form_validation->set_rules('unit_id', 'unit_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Unit.php */
/* Location: ./application/controllers/Unit.php */
/* Please DO NOT modify this information : */