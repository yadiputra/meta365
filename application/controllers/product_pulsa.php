<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product_pulsa extends CI_Controller {

    function __construct() {
        parent::__construct();
		$this->load->model(array('Pulsa_model', 'Transaction_model'));
        $this->load->library('form_validation');
        chek_session();
    }
	
	public function index() {
        $data = array(
            'button' => 'Buy',
            'action' => site_url('product_pulsa/create_action'),
            'product_id' => set_value('product'),
            'phone' => set_value('phone'),
            'uid' => $this->session->userdata('user_id'),
        );
        $this->template->display('voucher-pulsa', $data);
    }

    public function create_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
			$uid = $this->session->userdata('user_id');
            $data = array(
                'product_id' => $this->input->post('product', TRUE),
                'phone' => $this->input->post('phone', TRUE),
				'transaction_id' => $this->Pulsa_model->kdotomatis(),
                'uid' => $uid,
            );
           $this->Pulsa_model->insert($data);
           $this->session->set_flashdata('message', 'Create Record Success');
           redirect(site_url('product_pulsa'));
        }
    }

	 public function view($id) {
        $row = $this->Pulsa_model->get_by_id($id);
        if ($row) {
            $data = array(
                'product_id' => $row->product_id,
                'phone' => $row->phone,
                'transaction_id' => $row->transaction_id,
            );
			$data['date_transaction'] = $this->db->get_where('transaction', array('transaction_id' => $row->transaction_id))->row_array();
			$data['product_name'] = $this->db->get_where('product', array('product_id' => $row->product_id))->row_array();
			$data['product_type'] = $this->db->get_where('product', array('product_id' => $row->product_id))->row_array();
            $this->template->display('pulsa/pulsa_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('product_pulsa'));
        }
    }
	
	public function cek_harga($id) {
	$row = $this->Product_model->get_by_id($id);
	if ($row) {
		$request_data = array(
			'method'    =>'rajabiller.harga',
			'uid'       =>'123',
			'pin'       =>'230',
			'produk' => $row->product_name,
		);
		$data 		= $this->send($request_data);
		$this->template->display('harga-pulsa', $data);
		$this->session->set_flashdata('message', 'Update Record Success');
    }
	}

    public function delete($id) {
        $row = $this->Pulsa_model->get_by($id);

        if ($row) {
            $this->Pulsa_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('product_pulsa'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('product_pulsa'));
        }
    }
	
	public function checkout_pulsa($id) {
	$row = $this->Pulsa_model->get_by($id);
	if ($row) {
    $request_data = array(
		'method'    =>'rajabiller.pulsa',
		'uid'       =>'123',
		'pin'       =>'230',
		'no_hp'=> $row->phone,
		'kode_produk' => $row->product_id,
		'ref1' => '',
	);
	$data 		= $this->send($request_data);
	$data  = $row->transaction_id;
	$data = $this->session->userdata('user_id');
	$this->Transaction_model->insert($data);
	$this->session->set_flashdata('message', 'Delete Record Success');
    redirect(site_url('product_pulsa/view'));
    }
	}
	
    public function _rules() {
        $this->form_validation->set_rules('product', 'product', 'trim|required');
        $this->form_validation->set_rules('nominal', 'nominal', 'trim|required');
        $this->form_validation->set_rules('phone', 'phone', 'trim|required');
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