<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Game extends CI_Controller {

    function __construct() {
        parent::__construct();
		$this->load->model(array('Pulsa_model', 'Transaction_model'));
        $this->load->library('form_validation');
        chek_session();
    }
	
     public function index() {
        $data = array(
            'button' => 'Check',
            'action' => site_url('game/create_action'),
            'product_id' => set_value('product'),
            'phone' => set_value('phone'),
            'uid' => $this->session->userdata('user_id'),
        );
        $this->template->display('voucher-game', $data);
    }

    public function create_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = array(
                'product_id' => $this->input->post('product', TRUE),
                'phone' => $this->input->post('phone', TRUE),
				'transaction_id' => $this->Pulsa_model->kdotomatis(),
                'uid' => $this->session->userdata('user_id'),
            );

            $this->game_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('game'));
        }
    }
	
    public function view_game($id) {
        $row = $this->game_model->get_by_id($id);
        if ($row) {
            $data = array(
                'product_id' => $row->product_id,
                'phone' => $row->phone,
                'transaction_id' => $row->transaction_id,
             );
			$data['date_transaction'] = $this->db->get_where('transaction', array('transaction_id' => $row->transaction_id))->row_array();
			$data['product_name'] = $this->db->get_where('product', array('product_id' => $row->product_id))->row_array();
			$data['product_type'] = $this->db->get_where('product', array('product_id' => $row->product_id))->row_array();
            $this->template->display('game/view_game', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('game'));
        }
    }

	 public function read($id) {
        $row = $this->$this->game_model->get_by($id);
        if ($row) {
            $data = array(
				'button' => 'Checkout',
				'action' => site_url('game/request_game'),
                'product_id' => $row->product_id,
                'phone' => $row->phone,
                'transaction_id' => $row->transaction_id,
            );
            $this->template->display('game/game_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('game'));
        }
    }
	
    public function delete($id) {
        $row = $this->$this->game_model->get_by($id);

        if ($row) {
            $this->game_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('game'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('game'));
        }
    }
	
	public function request_game($id) {
	$row = $this->game_model->get_by($id);
    if ($row) {
    $data = array(
		'method'    =>'rajabiller.game',
		'uid'       =>'123',
		'pin'       =>'230',
		'no_hp'=> $row->phone,
		'kode_produk' => $row->product_id,
		'ref1' => '',
	);
	$data 		= $this->send($data);
	$data  = $row->transaction_id;
	$data = $this->session->userdata('user_id');
	$this->Transaction_model->insert($data);
    $this->session->set_flashdata('message', 'Record succes');
    redirect(site_url('product_pulsa'));
    } else {
    $this->session->set_flashdata('message', 'Record Not Found');
    redirect(site_url('game'));
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
	
    public function _rules() {
        $this->form_validation->set_rules('product', 'product', 'trim|required');
        $this->form_validation->set_rules('phone', 'phone', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-red">', '</span>');
    }

}