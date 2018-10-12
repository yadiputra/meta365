<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product extends CI_Controller {

    function __construct() {
        parent::__construct();
		$this->load->model('Product_model');
        $this->load->library('form_validation');
        chek_session();
    }
	
    public function index() {
        $product = $this->Product_model->get_all();

        $data = array(
            'product_name' => $product
        );

        $this->template->display('product/product_list', $data);
    }

    public function read($id) {
        $row = $this->Product_model->get_by_id($id);
        if ($row) {
            $data = array(
                'product_id' => $row->product_id,
                'product_name' => $row->product_name,
                'product_type' => $row->product_type,
            );
            $this->template->display('product/product_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('product'));
        }
    }

    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('product/create_action'),
            'product_id' => set_value('product_id'),
            'product_name' => set_value('product_name'),
            'product_type' => set_value('product_type'),
        );
        $this->template->display('product/product_form', $data);
    }

    public function create_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'product_id' => $this->input->post('product_id', TRUE),
                'product_name' => $this->input->post('product_name', TRUE),
                'product_type' => $this->input->post('product_type', TRUE),
            );

            $this->Product_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('product'));
        }

    }

    public function update($id) {
        $row = $this->Product_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('Product_model/update_action'),
                'product_id' => set_value('product_id', $row->product_id),
                'product_name' => set_value('product_name', $row->product_name),
                'product_type' => set_value('product_type', $row->product_type),
            );
            $this->template->display('Product/product_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Product'));
        }
    }

    public function update_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_product', TRUE));
        } else {
            $data = array(
                'product_id' => $this->input->post('product_id', TRUE),
                'product_name' => $this->input->post('product_name', TRUE),
                'product_type' => $this->input->post('product_type', TRUE),
            );

            $this->Product_model->update($this->input->post('product_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('Product'));
        }
    }

    public function delete($id) {
        $row = $this->Product_model->get_by_id($id);

        if ($row) {
            $this->Product_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('Product_model'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Product'));
        }
    }
	
	public function request_product($id) {
	$id = $this->Product_model->get_by_id($id);
    $request_data = array(
		'method'    =>'rajabiller.info_produk',
		'uid'       =>'123',
		'pin'       =>'230',
		'kode_produk' => $id,
	);
	$data 		= $this->send($request_data);
	$this->template->display('product/info_product', $data);
    $this->session->set_flashdata('message', 'Record Success');
    redirect(site_url('product'));
    }
	
	public function view_product($id) {
	$product_id = $this->Product_model->view($id);
    $request_data = array(
		'method'    =>'rajabiller.info_produk',
		'uid'       =>'123',
		'pin'       =>'230',
		'kode_produk' => $product_id,
	);
	$data 		= $this->send($request_data);
	$this->template->display('product/info_product', $data);
    $this->session->set_flashdata('message', 'Record Success');
    redirect(site_url('product'));
    }
	
    public function _rules() {
        $this->form_validation->set_rules('product_id', 'product_id', 'trim|required');
        $this->form_validation->set_rules('product_name', 'product_name', 'trim|required');
        $this->form_validation->set_rules('product_type', 'product_type', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-red">', '</span>');
    }
	
	function send($data){
    $api_url = "https://202.43.173.234/transaksi/json.php";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $api_url);
    curl_setopt($ch, CURLOPT_TIMEOUT, 0);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 500);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $result = curl_exec($ch);
    return $result;
	}

}