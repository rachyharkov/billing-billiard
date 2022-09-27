<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Barang_model extends CI_Model
{

	public $table = 'barang';
	public $table2 = 'barang_pic';
	public $id = 'barang_id';
	public $order = 'DESC';

	function __construct()
	{
		parent::__construct();
	}

	// get all
	function get_all()
	{
		$this->db->join('jenis_barang', 'jenis_barang.jenis_barang_id = barang.jenis_barang_id', 'left');
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
		$this->db->like('barang_id', $q);
		$this->db->or_like('kode_barang', $q);
		$this->db->or_like('nama_barang', $q);
		$this->db->or_like('detail_kondisi', $q);
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}


	// insert data
	function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	function insertPhoto($data)
	{
		$this->db->insert($this->table2, $data);
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

	function AutoNumbering()
	{
		$today = date('Ymd');
		$data = $this->db->query("SELECT MAX(kode_barang) AS last FROM $this->table ")->row_array();
		$lastNoFaktur = $data['last'];
		$lastNoUrut   = substr($lastNoFaktur, 11, 3);
		$nextNoUrut   = (int)$lastNoUrut + 1;
		$nextNoTransaksi = 'GE-' . $today . sprintf('%03s', $nextNoUrut);
		return $nextNoTransaksi;
	}
}
