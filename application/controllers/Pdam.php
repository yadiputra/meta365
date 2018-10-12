<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pdam extends CI_Controller {

    function __construct() {
        parent::__construct();
		$this->load->model('Pdam_model');
        $this->load->library('form_validation');
        chek_session();
    }
	
     public function index() {
        $data = array(
            'button' => 'Check',
            'action' => site_url('pdam/create_action'),
            'product_id' => set_value('product'),
            'idpel1' => set_value('idpel1'),
            'idpel2' => set_value('idpel2'),
            'uid' => $this->session->userdata('user_id'),
        );
        $this->template->display('ppob', $data);
    }

    public function create_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = array(
				'button' => 'Buy',
				'action' => site_url('payment/request_pdam'),
                'product_id' => $this->input->post('product', TRUE),
                'idpel1' => $this->input->post('idpel1', TRUE),
                'idpel2' => $this->input->post('idpel2', TRUE),
				'transaction_id' => $this->Pulsa_model->kdotomatis(),
                'uid' => $this->session->userdata('user_id'),
            );

            $this->Pdam_model->insert($data);
			$this->template->display('pdam/read_pdam', $data);
            $this->session->set_flashdata('message', 'Create Record Success');
        }
    }
	
    public function view_pdam($id) {
        $row = $this->Pdam_model->get_by_id($id);
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
            $this->template->display('pdam/view_pdam', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pdam'));
        }
    }

	  public function read($id) {
        $row = $this->$this->Pdam_model->get_by($id);
        if ($row) {
            $data = array(
				'button' => 'checkout',
				'action' => site_url('payment/checkout_pdam'),
				'product_id' => $row->product_id,
                'transaction_id' => $row->transaction_id,
                'idpel1' => $row->idpel1,
                'idpel2' => $row->idpel2,
                'nominal' => $row->nominal,
                'nominal' => $row->kode,
            );
            $this->template->display('pdam/read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pdam'));
        }
    }
	
    public function delete($id) {
        $row = $this->$this->pdam_model->get_by($id);

        if ($row) {
            $this->pdam_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pdam'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pdam'));
        }
    }
	
    public function _rules() {
        $this->form_validation->set_rules('product', 'product', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-red">', '</span>');
    }

}