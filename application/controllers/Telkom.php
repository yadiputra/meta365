<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Telkom extends CI_Controller {

    function __construct() {
        parent::__construct();
		$this->load->model('telkom_model');
        $this->load->library('form_validation');
        chek_session();
    }
	
     public function index() {
        $data = array(
            'button' => 'Check',
            'action' => site_url('pln/create_action'),
            'product_id' => set_value('product'),
            'idpel1' => set_value('kd_area'),
            'idpel2' => set_value('no_phone'),
            'uid' => $this->session->userdata('user_id'),
        );
		$this->load->view('voucher-pulsa', $data);
    }

    public function create_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = array(
				'button' => 'Buy',
				'action' => site_url('payment/request_telkom'),
                'product_id' => $this->input->post('product', TRUE),
                'idpel1' => $this->input->post('kd_area', TRUE),
                'idpel2' => $this->input->post('no_phone', TRUE),
				'transaction_id' => $this->telkom_model->kdotomatis(),
                'uid' => $this->session->userdata('user_id'),
            );

            $this->telkom_model->insert($data);
			$this->template->display('telkom/read_telkom', $data);
            $this->session->set_flashdata('message', 'Create Record Success');
        }
    }
	
	 public function read($id) {
        $row = $this->$this->telkom_model->get_by($id);
        if ($row) {
            $data = array(
				'button' => 'checkout',
				'action' => site_url('payment/checkout_telkom'),
				'product_id' => $row->product_id,
                'transaction_id' => $row->transaction_id,
                'idpel1' => $row->idpel1,
                'idpel2' => $row->idpel2,
                'nominal' => $row->nominal,
                'kode' => $row->kode,
            );
            $this->template->display('telkom/read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('telkom'));
        }
    }
	
    public function view_telkom($id) {
        $row = $this->telkom_model->get_by_id($id);
        if ($row) {
            $data = array(
				'product_id' => $row->product_id,
                'transaction_id' => $row->transaction_id,
                'idpel1' => $row->idpel1,
                'idpel2' => $row->idpel2,
            );
			$data['date_transaction'] = $this->db->get_where('transaction', array('transaction_id' => $row->transaction_id))->row_array();
			$data['product_name'] = $this->db->get_where('product', array('product_id' => $row->product_id))->row_array();
			$data['product_type'] = $this->db->get_where('product', array('product_id' => $row->product_id))->row_array();
            $this->template->display('telkom/view_telkom', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('telkom'));
        }
    }

    public function delete($id) {
        $row = $this->$this->telkom_model->get_by($id);

        if ($row) {
            $this->telkom_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('telkom'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('telkom'));
        }
    }
	
    public function _rules() {
        $this->form_validation->set_rules('product', 'product', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-red">', '</span>');
    }

}