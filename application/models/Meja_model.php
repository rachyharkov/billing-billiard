<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Meja_model extends CI_Model
{

    public $table = 'meja';
    public $id = 'meja_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, 'ASC');
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('meja_id', $q);
	$this->db->or_like('nama_meja', $q);
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

    function getMejaStatusTimer() {
        $this->db->select('*');
        $this->db->from('meja');
        $this->db->where('in_use', 1);
        $this->db->order_by('meja_id', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }
}