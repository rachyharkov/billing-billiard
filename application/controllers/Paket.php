<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Paket extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // is_login();
        $this->load->model('Paket_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $paket = $this->Paket_model->get_all();
        $data = array(
            'paket_data' => $paket,
        );
        $this->template->load('template','paket/paket_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Paket_model->get_by_id(decrypt_url($id));
        if ($row) {
            $data = array(
		'paket_id' => $row->paket_id,
		'nama_paket' => $row->nama_paket,
		'harga' => $row->harga,
		'menit' => $row->menit,
		'keterangan' => $row->keterangan,
	    );
            $this->template->load('template','paket/paket_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('paket'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('paket/create_action'),
	    'paket_id' => set_value('paket_id'),
	    'nama_paket' => set_value('nama_paket'),
	    'harga' => set_value('harga'),
	    'menit' => set_value('menit'),
	    'keterangan' => set_value('keterangan'),
	);
        $this->template->load('template','paket/paket_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_paket' => $this->input->post('nama_paket',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'menit' => $this->input->post('menit',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Paket_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('paket'));
        }
    }
    
    public function update($id) 
    {

        if($id == 'loss' || $id == 0){
            $data_paket_personal = $this->Paket_model->get_by_id(0);
            $data = array(
                'button' => 'Update',
                'jenis_paket' => 'bawaan',
                'action' => site_url('paket/update_action'),
                'paket_id' => set_value('paket_id', 'loss'),
                'nama_paket' => set_value('nama_paket', 'Loss'),
                'menit' => set_value('menit', $data_paket_personal->menit),
                'harga' => set_value('harga', $data_paket_personal->harga),
            );
            $this->template->load('template','paket/paket_form', $data);
        } else {
            $row = $this->Paket_model->get_by_id(decrypt_url($id));
    
            if ($row) {
                $data = array(
                    'button' => 'Update',
                    'jenis_paket' => 'custom',
                    'action' => site_url('paket/update_action'),
                    'paket_id' => set_value('paket_id', $row->paket_id),
                    'nama_paket' => set_value('nama_paket', $row->nama_paket),
                    'harga' => set_value('harga', $row->harga),
                    'menit' => set_value('menit', $row->menit),
                    'keterangan' => set_value('keterangan', $row->keterangan),
                );
                $this->template->load('template','paket/paket_form', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('paket'));
            }
        }
    }
    
    public function update_action() 
    {
        $id_paket = $this->input->post('paket_id', TRUE);

        $message = '';

        if($id_paket == 'loss') {
            $this->_rules_loss();

            if ($this->form_validation->run() == FALSE) {
                $this->update('loss');
            } else {
                
                $data = array(
                    'harga' => $this->input->post('harga',TRUE),
                    'menit' => $this->input->post('menit',TRUE),
                );
    
                $this->Paket_model->update(0, $data);
                $message = 'Paket Loss telah diupdate!';
            }
        } else {
            $this->_rules();

            if ($this->form_validation->run() == FALSE) {
                $this->update(encrypt_url($this->input->post('paket_id', TRUE)));
            } else {
                
                $data = array(
                    'nama_paket' => $this->input->post('nama_paket',TRUE),
                    'harga' => $this->input->post('harga',TRUE),
                    'menit' => $this->input->post('menit',TRUE),
                    'keterangan' => $this->input->post('keterangan',TRUE),
                );
    
                $this->Paket_model->update($id_paket, $data);
                $message =  $data['nama_paket'] + ' Loss telah diupdate!';
            }
        }
        $this->session->set_flashdata('message', $message);
        redirect(site_url('paket'));
    }
    
    public function delete($id) 
    {
        $row = $this->Paket_model->get_by_id(decrypt_url($id));

        if ($row) {
            $this->Paket_model->delete(decrypt_url($id));
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('paket'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('paket'));
        }
    }

    public function _rules() 
    {
        $this->form_validation->set_rules('nama_paket', 'nama paket', 'trim|required');
        $this->form_validation->set_rules('harga', 'harga', 'trim|required');
        $this->form_validation->set_rules('menit', 'menit', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

        $this->form_validation->set_rules('paket_id', 'paket_id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function _rules_loss() 
    {
        $this->form_validation->set_rules('harga', 'harga', 'trim|required');
        $this->form_validation->set_rules('menit', 'menit', 'trim|required');
     
        $this->form_validation->set_rules('paket_id', 'paket_id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Paket.php */
/* Location: ./application/controllers/Paket.php */
/* Please DO NOT modify this information : */