<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pulsa extends CI_Controller {

	public function index()
	{
		$data['module'] = "pulsa";
		
		$this->load->view('include/layout', $data);
	}
}
