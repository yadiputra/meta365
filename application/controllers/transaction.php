<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaction extends CI_Controller {

    function __construct() {
        parent::__construct();
		$this->load->model('Transaction_model');
        $this->load->library('form_validation');
        chek_session();
    }
	
	public function view(){
        $product = $this->Transaction_model->get_all();

        $data = array(
            'product_id' => $product
        );

        $this->template->display('transaction/transaction_list', $data);
    }

    public function delete($id) {
        $row = $this->Transaction_model->get_by_id($id);

        if ($row) {
            $this->Pulsa_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('transaction'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaction'));
        }
    }
	
	public function transaction() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('transaction/transaction_view'),
            'transaction_id' => set_value('transaction_id'),
            'tgl1' => set_value('tgl_awal'),
            'tgl2' => set_value('tgl_akhir'),
            'limit' => set_value('limit'),
            'uid' => $this->session->userdata('user_id'),
        );
        $this->template->display('transaction/transaction_form', $data);
    }
	
	public function transaction_view($id) {
	$row = $this->Transaction_model->get_by_id($id);
	if ($row) {
    $request_data = array(
		'method'    =>'rajabiller.datatransaksi',
		'uid'       =>'123',
		'pin'       =>'230',
		'tgl1'       =>$this->input->post('tgl_awal', TRUE),
		'tgl2'       =>$this->input->post('tgl_akhir', TRUE),
		'id_transaksi'=> $row->transaction_id,
		'id_produk' => $row->product_id,
		'idpel' => $this->input->post('idpel', TRUE),
		'limit' => $this->input->post('limit', TRUE),,
	);
	$data 		= $this->send($request_data);
    $this->session->set_flashdata('message', 'Record succes');
    redirect(site_url('transaction'));
    } else {
    $this->session->set_flashdata('message', 'Record Not Found');
    redirect(site_url('transaction'));
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