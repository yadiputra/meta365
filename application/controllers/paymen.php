<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class paymen extends CI_Controller {
	
	function __construct() {
        parent::__construct();
		$this->load->model(array('Pdam_model', 'Transaction_model', 'telkom_model' , 'pln_model' , 'multifinance_model'));
        $this->load->library('form_validation');
        chek_session();
    }
	
	public function request_multifinance($id) {
	$row = $this->multifinance_model->get_by($id);
        if ($row) {
        $data_reques = array(
			
				'method'    =>'rajabiller.ing',
				'uid'       =>'123',
				'pin'       =>'230',
				'idpel1'       =>'idpel1',
				'idpel2'       =>'idpel2',
				'idpel3'       =>'idpel',
				'product_id' => $row->product_id,
                'ref1' => '',
            );
            $data 		= $this->send($data_reques);
			$this->multifinance_model->update($data);
			$this->session->set_flashdata('message', 'Record succes');
			redirect(site_url('multifinance'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('multifinance'));
        }
	}
	
	public function request_pdam($id) {
	$row = $this->pdam_model->get_by($id);
        if ($row) {
        $data_reques = array(
			
				'method'    =>'rajabiller.ing',
				'uid'       =>'123',
				'pin'       =>'230',
				'idpel1'       =>'idpel1',
				'idpel2'       =>'idpel2',
				'idpel3'       =>'idpel',
				'product_id' => $row->product_id,
                'ref1' => '',
            );
            $data 		= $this->send($data_reques);
			$this->pdam_model->update($data);
			$this->session->set_flashdata('message', 'Record succes');
			redirect(site_url('pdam'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pdam'));
        }
	}
    
	public function request_telkom($id) {
	$row = $this->telkom_model->get_by($id);
        if ($row) {
        $data_reques = array(
			
				'method'    =>'rajabiller.ing',
				'uid'       =>'123',
				'pin'       =>'230',
				'idpel1'       =>'idpel1',
				'idpel2'       =>'idpel2',
				'idpel3'       =>'idpel',
				'product_id' => $row->product_id,
                'ref1' => '',
            );
            $data 		= $this->send($data_reques);
			$this->telkom_model->update($data);
			$this->session->set_flashdata('message', 'Record succes');
			redirect(site_url('product_pulsa'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('paymen'));
        }
	}
	
	public function request_pln($id) {
	$row = $this->pln_model->get_by($id);
        if ($row) {
        $data_reques = array(
			
				'method'    =>'rajabiller.ing',
				'uid'       =>'123',
				'pin'       =>'230',
				'idpel1'       =>'idpel1',
				'idpel2'       =>'idpel2',
				'idpel3'       =>'idpel',
				'product_id' => $row->product_id,
                'ref1' => '',
            );
            $data 		= $this->send($data_reques);
			$this->pln_model->update($data);
			$this->session->set_flashdata('message', 'Record succes');
			redirect(site_url('pln'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pln'));
        }
	}
	
	function checkout_multi($id) {
		$row = $this->multifinance_model->get_by($id);
        if ($row) {
        $data_reques = array(
			
				'method'    =>'rajabiller.paydetail',
				'uid'       =>'123',
				'pin'       =>'230',
				'idpel1'       =>'idpel1',
				'idpel2'       =>'idpel2',
				'idpel3'       =>'idpel',
				'product_id' => $row->product_id,
                'ref1' => '',
				'ref2' => $row->kode,
				'nominal' => $row->nominal,
				'ref3' => '',
            );
            $data 		= $this->send($data);
			$data  = $row->transaction_id;
			$data = $this->session->userdata('user_id');
			$this->transaction_model->insert($data);
			$this->session->set_flashdata('message', 'Record succes');
			redirect(site_url('multifinance'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('multifinance'));
        }
    }
	
	function checkout_pdam($id) {
		$row = $this->pdam_model->get_by($id);
        if ($row) {
        $data_reques = array(
			
				'method'    =>'rajabiller.paydetail',
				'uid'       =>'123',
				'pin'       =>'230',
				'idpel1'       =>'idpel1',
				'idpel2'       =>'idpel2',
				'idpel3'       =>'idpel',
				'product_id' => $row->product_id,
                'ref1' => '',
				'ref2' => $row->kode,
				'nominal' => $row->nominal,
				'ref3' => '',
            );
            $data 		= $this->send($data);
			$data  = $row->transaction_id;
			$data = $this->session->userdata('user_id');
			$this->transaction_model->insert($data);
			$this->session->set_flashdata('message', 'Record succes');
			redirect(site_url('pdam'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pdam'));
        }
    }
	
	function checkout_telkom($id) {
		$row = $this->telkom_model->get_by($id);
        if ($row) {
        $data_reques = array(
			
				'method'    =>'rajabiller.paydetail',
				'uid'       =>'123',
				'pin'       =>'230',
				'idpel1'       =>'idpel1',
				'idpel2'       =>'idpel2',
				'idpel3'       =>'idpel',
				'product_id' => $row->product_id,
                'ref1' => '',
				'ref2' => $row->kode,
				'nominal' => $row->nominal,
				'ref3' => '',
            );
            $data 		= $this->send($data);
			$data  = $row->transaction_id;
			$data = $this->session->userdata('user_id');
			$this->transaction_model->insert($data);
			$this->session->set_flashdata('message', 'Record succes');
			redirect(site_url('telkom'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('telkom'));
        }
    }
	
	function checkout_pln($id) {
		$row = $this->pln_model->get_by($id);
        if ($row) {
        $data_reques = array(
			
				'method'    =>'rajabiller.paydetail',
				'uid'       =>'123',
				'pin'       =>'230',
				'idpel1'       =>'idpel1',
				'idpel2'       =>'idpel2',
				'idpel3'       =>'idpel',
				'product_id' => $row->product_id,
                'ref1' => '',
				'ref2' => $row->kode,
				'nominal' => $row->nominal,
				'ref3' => '',
            );
            $data 		= $this->send($data);
			$data  = $row->transaction_id;
			$data = $this->session->userdata('user_id');
			$this->transaction_model->insert($data);
			$this->session->set_flashdata('message', 'Record succes');
			redirect(site_url('pln'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pln'));
        }
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