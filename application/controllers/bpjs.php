<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bpjs extends CI_Controller {

    function __construct() {
        parent::__construct();
		$this->load->model('bpjs_model');
        $this->load->library('form_validation');
        chek_session();
    }
	
     public function index() {
        $data = array(
            'button' => 'Check',
            'action' => site_url('bpjs/create_action'),
            'product_id' => set_value('product'),
            'periode' => set_value('priode'),
            'ref2' => set_value('bulan'),
            'idpel' => set_value('idpel'),
            'no_hp' => set_value('no_hp'),
            'nominal' => set_value('nominal'),
            'uid' => $this->session->userdata('user_id'),
        );
        $this->template->display('bpjs', $data);
    }

    public function create_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = array(
				'button' => 'Buy',
				'action' => site_url('bpjs_kesehatan/request_pembayaran'),
                'product_id' => $this->input->post('product', TRUE),
                'priode' => $this->input->post('periode', TRUE),
                'ref2' => $this->input->post('bulan', TRUE),
                'idpel' => $this->input->post('idpel', TRUE),
                'no_hp' => $this->input->post('no_hp', TRUE),
                'nominal' => $this->input->post('nominal', TRUE),
				'transaction_id' => $this->Pulsa_model->kdotomatis(),
                'uid' => $this->session->userdata('user_id'),
            );

            $this->bpjs_model->insert($data);
			$this->template->display('bpjs/bpjs_form_cek', $data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('bpjs'));
        }
    }
	
    public function view_bpjs($id) {
        $row = $this->bpjs_model->get_by_id($id);
        if ($row) {
             $data = array(
				'product_id' => $row->product_id,
                'transaction_id' => $row->transaction_id,
                'idpel1' => $row->idpel1,
                'no_hp' => $row->no_hp,
            );
			$data['date_transaction'] = $this->db->get_where('transaction', array('transaction_id' => $row->transaction_id))->row_array();
			$data['product_name'] = $this->db->get_where('product', array('product_id' => $row->product_id))->row_array();
			$data['product_type'] = $this->db->get_where('product', array('product_id' => $row->product_id))->row_array();
            $this->template->display('bpjs/view_bpjs', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bpjs'));
        }
    }

	  public function read($id) {
        $row = $this->$this->bpjs_model->get_by($id);
        if ($row) {
            $data = array(
				'button' => 'checkout',
				'action' => site_url('Bpjs_kesehatan/checkout'),
				'product_id' => $row->product_id,
                'transaction_id' => $row->transaction_id,
                'idpel1' => $row->idpel1,
                'idpel2' => $row->idpel2,
                'nominal' => $row->nominal,
                'kode' => $row->kode,
            );
            $this->template->display('bpjs/read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bpjs'));
        }
    }
	
    public function delete($id) {
        $row = $this->$this->Pulsa_model->get_by($id);

        if ($row) {
            $this->Pulsa_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('bpjs'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bpjs'));
        }
    }
	
    public function _rules() {
        $this->form_validation->set_rules('product', 'product', 'trim|required');
        $this->form_validation->set_rules('idpel', 'idpel', 'trim|required');
        $this->form_validation->set_rules('periode', 'periode', 'trim|required');
        $this->form_validation->set_rules('bulan', 'bulan', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-red">', '</span>');
    }

}