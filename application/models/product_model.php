<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product_model extends CI_Model {

    public $table = 'product';
    public $id = 'product_id';
    public $order = 'DESC';

    function __construct() {
        parent::__construct();
    }

    // get all
    function get_all() {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
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

	function view($id){
        $query = $this->db->query("SELECT product_id as ID FROM product WHERE product_name='$id'");
        $data = $query->row_array();
        $id = $data['ID'];
        return $id;
	}
	
    // insert data
    function insert($data) {
        $this->db->insert($this->table, $data);
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