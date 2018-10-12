<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bpjs_kesehatan extends CI_Controller {
	function __construct() {
        parent::__construct();
		$this->load->model(array('bpjs_model', 'Transaction_model'));
        $this->load->library('form_validation');
        chek_session();
    }
	
	public function request_pembayaran_bpjs($id) {
	$row = $this->Transaction_model->get_by_id($id);
	if ($row) {
    $request_data = array(
		'method'    =>'rajabiller.bpjsing',
		'uid'       =>'123',
		'pin'       =>'230',
		'kode_produk'  =>'ASRBPJSKS',
		'periode'       =>$row->periode,
		'ref1' => '',
	);
	$data 		= $this->send($request_data);
	$this->session->set_flashdata('message', 'Record succes');
    redirect(site_url('pembayaran'));
    } else {
    $this->session->set_flashdata('message', 'Record Not Found');
    redirect(site_url('pembayaran'));
     }
    }
	
	public function checkout($id) {
	$row = $this->bpjs_model->get_by_id($id);
	if ($row) {
    $request_data = array(
		'method'    =>'rajabiller.bpjspay',
		'uid'       =>'123',
		'pin'       =>'230',
		'kode_produk'  =>'ASRBPJSKS',
		'periode'       =>$row->periode,
		'ref1' => '',
		'ref2' => $row->ref2,
		'nominal' => $row->nominal,
		'no_hp' => $row->no_hp,
		'ref3' => '',
	);
	$data 		= $this->send($request_data);
	$this->session->set_flashdata('message', 'Record succes');
    redirect(site_url('product_pulsa'));
	 } else {
    $this->session->set_flashdata('message', 'Record Not Found');
    redirect(site_url('pembayaran'));
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