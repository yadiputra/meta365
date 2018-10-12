<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaction_model extends CI_Model {

    public $table = 'transaction';
    public $id = 'transaction_id';
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

	function insert($data){
			foreach ( $data as $value) {
				$hasil=array(
					'product_id' => $value->kode_product,
					'transaction_id' => $value->kode_product,
					'date_transaction' => $value->waktu,
					'status' => $value->status,
					'saldo' => $value->saldo,
					'debit' => $value->terpotong,
					'uid' => $value->user_id,
					);
		 	}
		$save = $this->db->insert($this->table, $data);
	return $save;
	}
	
	function kd($id){
        $query = $this->db->query("SELECT product_name as ID FROM transaction WHERE product_id='$id'");
        $data = $query->row_array();
        $id = $data['ID'];
        return $id;
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