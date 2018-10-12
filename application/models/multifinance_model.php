<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class multifinance_model extends CI_Model {

    public $table = 'multifinance';
    public $id1 = 'transaction_id';
    public $id = 'product_id';
    public $order = 'DESC';

    function __construct() {
        parent::__construct();
    }

    // get all
    function get_all() {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get_where($this->table, array('uid' => $this->session->userdata('user_id')))->result();
    }

    function get_rows() {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get_where($this->table, array('uid' => $this->session->userdata('user_id')))->num_rows();
    }

    // get data by id
    function get_by_id($id) {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

	function get_by($id) {
        $this->db->where($this->id1, $id);
        return $this->db->get($this->table)->row();
    }
	
    // insert data
    function insert($data) {
        $this->db->insert($this->table, $data);
    }
	
	function kdotomatis($id) {
        $jenis = 'Ml'.date('ym');
        $query = $this->db->query("SELECT max(transaction_id) as maxID FROM transaction WHERE transaction_id LIKE '$jenis%'");
        $data = $query->row_array();
        $idMax = $data['maxID'];
        $noUrut = (int) substr($idMax, 6, 3);
        $noUrut++;
        $newID = $jenis . sprintf("%03s", $noUrut);
        return $newID;
    }
	
	function tgl() {
        $tgl = date('Y-d-m');
        return $tgl;
    }
	
    // update data
    function update($id, $data) {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id) {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}