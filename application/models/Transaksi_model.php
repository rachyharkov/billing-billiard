<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{

    public $table = 'transaction';
    public $id = 'transaction_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_last_id(){
        $this->db->select_max('transaction_id');
        $query = $this->db->get('transaction');
        return $query->row();
    }

    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    function update_by_billing_id($id, $data)
    {
        $this->db->where('billing_id', $id);
        $this->db->update($this->table, $data);
    }

    function get_by_billing_id($id)
    {
        $this->db->where('billing_id', $id);
        return $this->db->get($this->table)->row();
    }


}
