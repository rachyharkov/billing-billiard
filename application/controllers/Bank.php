<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bank extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Bank_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $bank = $this->Bank_model->get_all();
        $data = array(
            'bank_data' => $bank,
        );
        $this->template->load('template','bank/bank_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Bank_model->get_by_id(decrypt_url($id));
        if ($row) {
            $data = array(
		'bank_id' => $row->bank_id,
		'nama_bank' => $row->nama_bank,
	    );
            $this->template->load('template','bank/bank_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bank'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('bank/create_action'),
	    'bank_id' => set_value('bank_id'),
	    'nama_bank' => set_value('nama_bank'),
	);
        $this->template->load('template','bank/bank_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_bank' => $this->input->post('nama_bank',TRUE),
	    );

            $this->Bank_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('bank'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Bank_model->get_by_id(decrypt_url($id));

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('bank/update_action'),
		'bank_id' => set_value('bank_id', $row->bank_id),
		'nama_bank' => set_value('nama_bank', $row->nama_bank),
	    );
            $this->template->load('template','bank/bank_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bank'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update(encrypt_url($this->input->post('bank_id', TRUE)));
        } else {
            $data = array(
		'nama_bank' => $this->input->post('nama_bank',TRUE),
	    );

            $this->Bank_model->update($this->input->post('bank_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('bank'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Bank_model->get_by_id(decrypt_url($id));

        if ($row) {
            $this->Bank_model->delete(decrypt_url($id));
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('bank'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bank'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_bank', 'nama bank', 'trim|required');

	$this->form_validation->set_rules('bank_id', 'bank_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Bank.php */
/* Location: ./application/controllers/Bank.php */
/* Please DO NOT modify this information : */
