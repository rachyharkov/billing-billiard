<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Nasabah_model extends CI_Model
{

	public $table = 'nasabah';
	public $id = 'nasabah_id';
	public $order = 'DESC';

	function __construct()
	{
		parent::__construct();
	}

	// get all
	function get_all_aktif()
	{
		$this->db->join('bank', 'bank.bank_id = nasabah.bank_id', 'left');
		$this->db->where('status_nasabah', 'Aktif');
		$this->db->order_by($this->id, $this->order);
		return $this->db->get($this->table)->result();
	}

	function get_all_blacklist()
	{
		$this->db->join('bank', 'bank.bank_id = nasabah.bank_id', 'left');
		$this->db->where('status_nasabah','Blacklist');
		$this->db->order_by($this->id, $this->order);
		return $this->db->get($this->table)->result();
	}

	// get data by id
	function get_by_id($id)
	{
		$this->db->where($this->id, $id);
		return $this->db->get($this->table)->row();
	}

	// get total rows
	function total_rows($q = NULL)
	{
		$this->db->like('nasabah_id', $q);
		$this->db->or_like('no_ktp', $q);
		$this->db->or_like('nama_nasabah', $q);
		$this->db->or_like('jenis_kelamin', $q);
		$this->db->or_like('no_hp', $q);
		$this->db->or_like('email', $q);
		$this->db->or_like('alamat_ktp', $q);
		$this->db->or_like('alamat_domisili', $q);
		$this->db->or_like('bank_id', $q);
		$this->db->or_like('no_rekening', $q);
		$this->db->or_like('photo_ktp', $q);
		$this->db->or_like('photo_diri', $q);
		$this->db->or_like('photo_kk', $q);
		$this->db->or_like('photo_sim', $q);
		$this->db->or_like('status_nasabah', $q);
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}


	// insert data
	function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	// update data
	function update($id, $data)
	{
		$this->db->where($this->id, $id);
		$this->db->update($this->table, $data);
	}

	// delete data
	function delete($id)
	{
		$this->db->where($this->id, $id);
		$this->db->delete($this->table);
	}
}
