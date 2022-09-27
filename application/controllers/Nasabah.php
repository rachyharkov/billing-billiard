<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Nasabah extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('Nasabah_model');
		$this->load->model('Bank_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$nasabah = $this->Nasabah_model->get_all_aktif();
		$data = array(
			'nasabah_data' => $nasabah,
		);
		$this->template->load('template', 'nasabah/nasabah_list', $data);
	}

	public function non()
	{
		$nasabah = $this->Nasabah_model->get_all_blacklist();
		$data = array(
			'nasabah_data' => $nasabah,
		);
		$this->template->load('template', 'nasabah/nasabah_blacklist_list', $data);
	}

	public function read($id)
	{
		$row = $this->Nasabah_model->get_by_id(decrypt_url($id));
		if ($row) {
			$data = array(
				'nasabah_id' => $row->nasabah_id,
				'no_ktp' => $row->no_ktp,
				'nama_nasabah' => $row->nama_nasabah,
				'jenis_kelamin' => $row->jenis_kelamin,
				'no_hp' => $row->no_hp,
				'email' => $row->email,
				'alamat_ktp' => $row->alamat_ktp,
				'alamat_domisili' => $row->alamat_domisili,
				'bank_id' => $row->bank_id,
				'no_rekening' => $row->no_rekening,
				'photo_ktp' => $row->photo_ktp,
				'photo_diri' => $row->photo_diri,
				'photo_kk' => $row->photo_kk,
				'photo_sim' => $row->photo_sim,
				'status_nasabah' => $row->status_nasabah,
			);
			$this->template->load('template', 'nasabah/nasabah_read', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('nasabah'));
		}
	}

	public function create()
	{
		$data = array(
			'button' => 'Create',
			'bank' => $this->Bank_model->get_all(),
			'action' => site_url('nasabah/create_action'),
			'nasabah_id' => set_value('nasabah_id'),
			'no_ktp' => set_value('no_ktp'),
			'nama_nasabah' => set_value('nama_nasabah'),
			'jenis_kelamin' => set_value('jenis_kelamin'),
			'no_hp' => set_value('no_hp'),
			'email' => set_value('email'),
			'alamat_ktp' => set_value('alamat_ktp'),
			'alamat_domisili' => set_value('alamat_domisili'),
			'bank_id' => set_value('bank_id'),
			'no_rekening' => set_value('no_rekening'),
			'photo_ktp' => set_value('photo_ktp'),
			'photo_diri' => set_value('photo_diri'),
			'photo_kk' => set_value('photo_kk'),
			'photo_sim' => set_value('photo_sim'),
			'status_nasabah' => set_value('status_nasabah'),
		);
		$this->template->load('template', 'nasabah/nasabah_form', $data);
	}

	public function create_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			// upload ktp
			$config['upload_path']      = './temp/nasabah';
			$config['allowed_types']    = 'jpg|png|jpeg|webp';
			$config['max_size']         = 10048;
			$config['file_name']        = 'File-' . date('ymd') . '-' . substr(sha1(rand()), 0, 10);
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if ($this->upload->do_upload("photo_ktp")) {
				$data_ktp = $this->upload->data();
				$photo_ktp = $data_ktp['file_name'];
			}
			// photo diri
			$config['upload_path']      = './temp/nasabah';
			$config['allowed_types']    = 'jpg|png|jpeg|webp';
			$config['max_size']         = 10048;
			$config['file_name']        = 'File-' . date('ymd') . '-' . substr(sha1(rand()), 0, 10);
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if ($this->upload->do_upload("photo_diri")) {
				$data_diri = $this->upload->data();
				$photo_diri = $data_diri['file_name'];
			}

			// photo KK
			$config['upload_path']      = './temp/nasabah';
			$config['allowed_types']    = 'jpg|png|jpeg|webp';
			$config['max_size']         = 10048;
			$config['file_name']        = 'File-' . date('ymd') . '-' . substr(sha1(rand()), 0, 10);
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if ($this->upload->do_upload("photo_kk")) {
				$data_kk = $this->upload->data();
				$photo_kk = $data_kk['file_name'];
			}

			// photo SIM
			$config['upload_path']      = './temp/nasabah';
			$config['allowed_types']    = 'jpg|png|jpeg|webp';
			$config['max_size']         = 10048;
			$config['file_name']        = 'File-' . date('ymd') . '-' . substr(sha1(rand()), 0, 10);
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if ($this->upload->do_upload("photo_sim")) {
				$data_sim = $this->upload->data();
				$photo_sim = $data_sim['file_name'];
			}

			$data = array(
				'no_ktp' => $this->input->post('no_ktp', TRUE),
				'nama_nasabah' => $this->input->post('nama_nasabah', TRUE),
				'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
				'no_hp' => $this->input->post('no_hp', TRUE),
				'email' => $this->input->post('email', TRUE),
				'alamat_ktp' => $this->input->post('alamat_ktp', TRUE),
				'alamat_domisili' => $this->input->post('alamat_domisili', TRUE),
				'bank_id' => $this->input->post('bank_id', TRUE),
				'no_rekening' => $this->input->post('no_rekening', TRUE),
				'photo_ktp' => $photo_ktp,
				'photo_diri' => $photo_diri,
				'photo_kk' => $photo_kk,
				'photo_sim' => $photo_sim,
				'status_nasabah' => $this->input->post('status_nasabah', TRUE),
			);

			$this->Nasabah_model->insert($data);
			$this->session->set_flashdata('message', 'Create Record Success');
			redirect(site_url('nasabah'));
		}
	}

	public function update($id)
	{
		$row = $this->Nasabah_model->get_by_id(decrypt_url($id));

		if ($row) {
			$data = array(
				'button' => 'Update',
				'bank' => $this->Bank_model->get_all(),
				'action' => site_url('nasabah/update_action'),
				'nasabah_id' => set_value('nasabah_id', $row->nasabah_id),
				'no_ktp' => set_value('no_ktp', $row->no_ktp),
				'nama_nasabah' => set_value('nama_nasabah', $row->nama_nasabah),
				'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
				'no_hp' => set_value('no_hp', $row->no_hp),
				'email' => set_value('email', $row->email),
				'alamat_ktp' => set_value('alamat_ktp', $row->alamat_ktp),
				'alamat_domisili' => set_value('alamat_domisili', $row->alamat_domisili),
				'bank_id' => set_value('bank_id', $row->bank_id),
				'no_rekening' => set_value('no_rekening', $row->no_rekening),
				'photo_ktp' => set_value('photo_ktp', $row->photo_ktp),
				'photo_diri' => set_value('photo_diri', $row->photo_diri),
				'photo_kk' => set_value('photo_kk', $row->photo_kk),
				'photo_sim' => set_value('photo_sim', $row->photo_sim),
				'status_nasabah' => set_value('status_nasabah', $row->status_nasabah),
			);
			$this->template->load('template', 'nasabah/nasabah_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('nasabah'));
		}
	}

	public function update_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update(encrypt_url($this->input->post('nasabah_id', TRUE)));
		} else {
			$row = $this->Nasabah_model->get_by_id($this->input->post('nasabah_id'));
			// upload ktp
			$config['upload_path']      = './temp/nasabah';
			$config['allowed_types']    = 'jpg|png|jpeg|webp';
			$config['max_size']         = 10048;
			$config['file_name']        = 'File-' . date('ymd') . '-' . substr(sha1(rand()), 0, 10);
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if ($this->upload->do_upload("photo_ktp")) {
				$data_ktp = $this->upload->data();
				$photo_ktp = $data_ktp['file_name'];
				if ($row->photo_ktp == null || $row->photo_ktp == '') {
				} else {
					$target_file = './temp/nasabah/' . $row->photo_ktp;
					unlink($target_file);
				}
			} else {
				$photo_ktp = $row->photo_ktp;
			}
			// photo diri
			$config['upload_path']      = './temp/nasabah';
			$config['allowed_types']    = 'jpg|png|jpeg|webp';
			$config['max_size']         = 10048;
			$config['file_name']        = 'File-' . date('ymd') . '-' . substr(sha1(rand()), 0, 10);
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if ($this->upload->do_upload("photo_diri")) {
				$data_diri = $this->upload->data();
				$photo_diri = $data_diri['file_name'];
				if ($row->photo_diri == null || $row->photo_diri == '') {
				} else {
					$target_file = './temp/nasabah/' . $row->photo_diri;
					unlink($target_file);
				}
			} else {
				$photo_diri = $row->photo_diri;
			}

			// photo KK
			$config['upload_path']      = './temp/nasabah';
			$config['allowed_types']    = 'jpg|png|jpeg|webp';
			$config['max_size']         = 10048;
			$config['file_name']        = 'File-' . date('ymd') . '-' . substr(sha1(rand()), 0, 10);
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if ($this->upload->do_upload("photo_kk")) {
				$data_kk = $this->upload->data();
				$photo_kk = $data_kk['file_name'];
				if ($row->photo_kk == null || $row->photo_kk == '') {
				} else {
					$target_file = './temp/nasabah/' . $row->photo_kk;
					unlink($target_file);
				}
			} else {
				$photo_kk = $row->photo_kk;
			}

			// photo SIM
			$config['upload_path']      = './temp/nasabah';
			$config['allowed_types']    = 'jpg|png|jpeg|webp';
			$config['max_size']         = 10048;
			$config['file_name']        = 'File-' . date('ymd') . '-' . substr(sha1(rand()), 0, 10);
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if ($this->upload->do_upload("photo_sim")) {
				$data_sim = $this->upload->data();
				$photo_sim = $data_sim['file_name'];
				if ($row->photo_sim == null || $row->photo_sim == '') {
				} else {
					$target_file = './temp/nasabah/' . $row->photo_sim;
					unlink($target_file);
				}
			} else {
				$photo_sim = $row->photo_kk;
			}


			$data = array(
				'no_ktp' => $this->input->post('no_ktp', TRUE),
				'nama_nasabah' => $this->input->post('nama_nasabah', TRUE),
				'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
				'no_hp' => $this->input->post('no_hp', TRUE),
				'email' => $this->input->post('email', TRUE),
				'alamat_ktp' => $this->input->post('alamat_ktp', TRUE),
				'alamat_domisili' => $this->input->post('alamat_domisili', TRUE),
				'bank_id' => $this->input->post('bank_id', TRUE),
				'no_rekening' => $this->input->post('no_rekening', TRUE),
				'photo_ktp' => $photo_ktp,
				'photo_diri' => $photo_diri,
				'photo_kk' => $photo_kk,
				'photo_sim' => $photo_sim,
				'status_nasabah' => $this->input->post('status_nasabah', TRUE),
			);

			$this->Nasabah_model->update($this->input->post('nasabah_id', TRUE), $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('nasabah'));
		}
	}

	public function delete($id)
	{
		$row = $this->Nasabah_model->get_by_id(decrypt_url($id));

		if ($row) {

			if ($row->photo_ktp == null || $row->photo_ktp == '') {
			} else {
				$target_file = './temp/nasabah/' . $row->photo_ktp;
				unlink($target_file);
			}

			if ($row->photo_diri == null || $row->photo_diri == '') {
			} else {
				$target_file = './temp/nasabah/' . $row->photo_diri;
				unlink($target_file);
			}

			if ($row->photo_kk == null || $row->photo_kk == '') {
			} else {
				$target_file = './temp/nasabah/' . $row->photo_kk;
				unlink($target_file);
			}

			if ($row->photo_sim == null || $row->photo_sim == '') {
			} else {
				$target_file = './temp/nasabah/' . $row->photo_sim;
				unlink($target_file);
			}


			$this->Nasabah_model->delete(decrypt_url($id));
			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('nasabah'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('nasabah'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('no_ktp', 'no ktp', 'trim|required');
		$this->form_validation->set_rules('nama_nasabah', 'nama nasabah', 'trim|required');
		$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
		$this->form_validation->set_rules('no_hp', 'no hp', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('alamat_ktp', 'alamat ktp', 'trim|required');
		$this->form_validation->set_rules('alamat_domisili', 'alamat domisili', 'trim|required');
		$this->form_validation->set_rules('bank_id', 'bank id', 'trim|required');
		$this->form_validation->set_rules('no_rekening', 'no rekening', 'trim|required');
		$this->form_validation->set_rules('photo_ktp', 'photo ktp', 'trim');
		$this->form_validation->set_rules('photo_diri', 'photo diri', 'trim');
		$this->form_validation->set_rules('photo_kk', 'photo kk', 'trim');
		$this->form_validation->set_rules('photo_sim', 'photo sim', 'trim');
		$this->form_validation->set_rules('status_nasabah', 'status nasabah', 'trim|required');

		$this->form_validation->set_rules('nasabah_id', 'nasabah_id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}

/* End of file Nasabah.php */
/* Location: ./application/controllers/Nasabah.php */
/* Please DO NOT modify this information : */
