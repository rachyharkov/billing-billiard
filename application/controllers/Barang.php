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

	public function read($id)
	{
		$row = $this->Barang_model->get_by_id(decrypt_url($id));
		if ($row) {
			$data = array(
				'barang_id' => $row->barang_id,
				'kode_barang' => $row->kode_barang,
				'nama_barang' => $row->nama_barang,
				'detail_kondisi' => $row->detail_kondisi,
			);
			$this->template->load('template', 'barang/barang_read', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('barang'));
		}
	}

	public function create()
	{
		$data = array(
			'button' => 'Create',
			'jenis_barang' => $this->Jenis_barang_model->get_all(),
			'autoNo' => $this->Barang_model->AutoNumbering(),
			'action' => site_url('barang/create_action'),
			'barang_id' => set_value('barang_id'),
			'jenis_barang_id' => set_value('jenis_barang_id'),
			'kode_barang' => set_value('kode_barang'),
			'nama_barang' => set_value('nama_barang'),
			'detail_kondisi' => set_value('detail_kondisi'),
		);
		$this->template->load('template', 'barang/barang_form', $data);
	}

	public function create_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'kode_barang' => $this->input->post('kode_barang', TRUE),
				'nama_barang' => $this->input->post('nama_barang', TRUE),
				'jenis_barang_id' => $this->input->post('jenis_barang_id', TRUE),
				'detail_kondisi' => $this->input->post('detail_kondisi', TRUE),
			);
			$this->Barang_model->insert($data);
			$lastId = $this->db->insert_id();
			$checklist_barang = $this->input->post('checklist_barang');
			if ($checklist_barang) {
				$jumlah_data = count($checklist_barang);
				for ($i = 0; $i < $jumlah_data; $i++) {
					$barang_acc['barang_id'] = $lastId;
					$barang_acc['nama_acc'] = $checklist_barang[$i];
					$this->db->insert('barang_acc', $barang_acc);
				}
			}
			// gambar 1
			$this->insertPicGambar($lastId, 'gambar1');
			// gambar 2
			$this->insertPicGambar($lastId, 'gambar2');
			// gambar 3
			$this->insertPicGambar($lastId, 'gambar3');
			// gambar 4
			$this->insertPicGambar($lastId, 'gambar4');
			// gambar 5
			$this->insertPicGambar($lastId, 'gambar5');
			// gambar 6
			$this->insertPicGambar($lastId, 'gambar6');
			// gambar 7
			$this->insertPicGambar($lastId, 'gambar7');
			// gambar 8
			$this->insertPicGambar($lastId, 'gambar8');

			$this->session->set_flashdata('message', 'Create Record Success');
			redirect(site_url('barang'));
		}
	}

	private function insertPicGambar($lastId, $remark)
	{
		$config['upload_path']      = './temp/barang';
		$config['allowed_types']    = 'jpg|png|jpeg|webp';
		$config['max_size']         = 10048;
		$config['file_name']        = 'File-' . date('ymd') . '-' . substr(sha1(rand()), 0, 10);
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ($this->upload->do_upload($remark)) {
			$data_ktp = $this->upload->data();
			$photo = $data_ktp['file_name'];
			$data = array(
				'photo' => $photo,
				'remark' => $remark,
				'barang_id' => $lastId,
			);
			$this->Barang_model->insertPhoto($data);
		}
	}

	public function update($id)
	{
		$row = $this->Barang_model->get_by_id(decrypt_url($id));

		if ($row) {
			$data = array(
				'button' => 'Update',
				'jenis_barang' => $this->Jenis_barang_model->get_all(),
				'action' => site_url('barang/update_action'),
				'barang_id' => set_value('barang_id', $row->barang_id),
				'kode_barang' => set_value('kode_barang', $row->kode_barang),
				'jenis_barang_id' => set_value('jenis_barang_id', $row->jenis_barang_id),
				'nama_barang' => set_value('nama_barang', $row->nama_barang),
				'detail_kondisi' => set_value('detail_kondisi', $row->detail_kondisi),
			);
			$this->template->load('template', 'barang/barang_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('barang'));
		}
	}

	public function update_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update(encrypt_url($this->input->post('barang_id', TRUE)));
		} else {
			$barang_id = $this->input->post('barang_id');
			$data = array(
				'kode_barang' => $this->input->post('kode_barang', TRUE),
				'nama_barang' => $this->input->post('nama_barang', TRUE),
				'detail_kondisi' => $this->input->post('detail_kondisi', TRUE),
				'jenis_barang_id' => $this->input->post('jenis_barang_id', TRUE),
			);
			$this->Barang_model->update($this->input->post('barang_id', TRUE), $data);
			$this->db->query("DELETE FROM barang_acc where barang_id='$barang_id'");
			$checklist_barang = $this->input->post('checklist_barang');
			if ($checklist_barang) {
				$jumlah_data = count($checklist_barang);
				for ($i = 0; $i < $jumlah_data; $i++) {
					$barang_acc['barang_id'] = $barang_id;
					$barang_acc['nama_acc'] = $checklist_barang[$i];
					$this->db->insert('barang_acc', $barang_acc);
				}
			}
			// gambar 1
			$this->updatePicGambar($barang_id, 'gambar1');
			// gambar 2
			$this->updatePicGambar($barang_id, 'gambar2');
			// gambar 3
			$this->updatePicGambar($barang_id, 'gambar3');
			// gambar 4
			$this->updatePicGambar($barang_id, 'gambar4');
			// gambar 5
			$this->updatePicGambar($barang_id, 'gambar5');
			// gambar 6
			$this->updatePicGambar($barang_id, 'gambar6');
			// gambar 7
			$this->updatePicGambar($barang_id, 'gambar7');
			// gambar 8
			$this->updatePicGambar($barang_id, 'gambar8');
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('barang'));
		}
	}

	private function updatePicGambar($barang_id, $remark)
	{
		$config['upload_path']      = './temp/barang';
		$config['allowed_types']    = 'jpg|png|jpeg';
		$config['max_size']         = 10048;
		$config['file_name']        = 'File-' . date('ymd') . '-' . substr(sha1(rand()), 0, 10);
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ($this->upload->do_upload($remark)) {
			$value = $this->db->query("SELECT * from barang_pic where barang_id='$barang_id' and remark='$remark'");
			if ($value->num_rows() > 0) {
				$data = $value->row();
				$target_file = './temp/barang/' . $data->photo;
				unlink($target_file);
				$photo = $this->upload->data();
				$gambar1 = $photo['file_name'];
				$this->db->query("UPDATE barang_pic SET photo = '$gambar1' WHERE barang_id='$barang_id' and remark='$remark'");
			} else {
				$photo = $this->upload->data();
				$gambar1 = $photo['file_name'];
				$data = array(
					'photo' => $gambar1,
					'remark' => $remark,
					'barang_id' => $barang_id,
				);
				$this->Barang_model->insertPhoto($data);
			}
		}
	}


	public function delete($id)
	{
		$row = $this->Barang_model->get_by_id(decrypt_url($id));

		if ($row) {

			$barang_id = $row->barang_id;
			$pic = $this->db->query("SELECT * from barang_pic where barang_id='$barang_id'")->result();

			foreach ($pic as $value) {
				$target_file = './temp/barang/' . $value->photo;
				unlink($target_file);
				$this->db->query("DELETE FROM barang_pic WHERE photo = '$value->photo'");
			}

			$this->Barang_model->delete(decrypt_url($id));

			$barang_id = $row->barang_id;
			$acc = $this->db->query("SELECT * from barang_acc where barang_id='$barang_id'")->result();

			foreach ($acc as $value) {
				$this->db->query("DELETE FROM barang_acc WHERE barang_acc_id  = '$value->barang_acc_id'");
			}


			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('barang'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('barang'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('kode_barang', 'kode barang', 'trim|required');
		$this->form_validation->set_rules('nama_barang', 'nama barang', 'trim|required');
		$this->form_validation->set_rules('detail_kondisi', 'detail kondisi', 'trim|required');
		$this->form_validation->set_rules('jenis_barang_id', 'Jenis Barang', 'trim|required');

		$this->form_validation->set_rules('barang_id', 'barang_id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}

/* End of file Barang.php */
/* Location: ./application/controllers/Barang.php */
/* Please DO NOT modify this information : */
