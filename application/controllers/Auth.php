<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('url', 'language'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
    }

    function index() {

        if (!$this->ion_auth->logged_in()) {
            redirect('login', 'refresh');
        } else{
            redirect ('Dashboard');
        }
    }
    function login() {
        $this->data['title'] = $this->lang->line('login_heading');
        $this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required');
        $this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');

        if ($this->form_validation->run() == true) {
            $remember = (bool) $this->input->post('remember');

            if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember)) {
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect('Dashboard', 'refresh');
            } else {
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect('login', 'refresh'); 
			}
        } else {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            $this->data['identity'] = array('name' => 'identity',
                'id' => 'identity',
                'type' => 'text',
                'value' => $this->form_validation->set_value('identity'),
            );
            $this->data['password'] = array('name' => 'password',
                'id' => 'password',
                'type' => 'password',
            );

            $this->_render_page('login', $this->data);
        }
    }

    function logout() {
        $this->data['title'] = "Logout";

        $logout = $this->ion_auth->logout();
        $this->session->set_flashdata('message', $this->ion_auth->messages());
        redirect('login', 'refresh');
    }


    function _render_page($view, $data = null, $returnhtml = false) {
        $this->viewdata = (empty($data)) ? $this->data : $data;

        $view_html = $this->load->view($view, $this->viewdata, $returnhtml);

        if ($returnhtml)
            return $view_html;
    }
}
