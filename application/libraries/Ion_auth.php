<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Name:  Ion Auth
 *
 * Version: 2.5.2
 *
 * Author: Ben Edmunds
 * 		  ben.edmunds@gmail.com
 *         @benedmunds
 *
 * Added Awesomeness: Phil Sturgeon
 *
 * Location: http://github.com/benedmunds/CodeIgniter-Ion-Auth
 *
 * Created:  10.01.2009
 *
 * Description:  Modified auth system based on redux_auth with extensive customization.  This is basically what Redux Auth 2 should be.
 * Original Author name has been kept but that does not mean that the method has not been modified.
 *
 * Requirements: PHP5 or above
 *
 */
class Ion_auth {


    public $_cache_user_in_group;

    public function __construct() {
        $this->load->config('ion_auth', TRUE);
        $this->load->library(array('email'));
        $this->lang->load('ion_auth');
        $this->load->helper(array('cookie', 'language', 'url'));

        $this->load->library('session');

        $this->load->model('ion_auth_model');

        $this->_cache_user_in_group = & $this->ion_auth_model->_cache_user_in_group;

        if (!$this->logged_in() && get_cookie($this->config->item('identity_cookie_name', 'ion_auth')) && get_cookie($this->config->item('remember_cookie_name', 'ion_auth'))) {
            $this->ion_auth_model->login_remembered_user();
        }

        $email_config = $this->config->item('email_config', 'ion_auth');

        if ($this->config->item('use_ci_email', 'ion_auth') && isset($email_config) && is_array($email_config)) {
            $this->email->initialize($email_config);
        }

        $this->ion_auth_model->trigger_events('library_constructor');
    }


    public function __call($method, $arguments) {
        if (!method_exists($this->ion_auth_model, $method)) {
            throw new Exception('Undefined method Ion_auth::' . $method . '() called');
        }
        return call_user_func_array(array($this->ion_auth_model, $method), $arguments);
    }

    public function __get($var) {
        return get_instance()->$var;
    }

    public function logout() {
        $this->ion_auth_model->trigger_events('logout');

        $identity = $this->config->item('identity', 'ion_auth');

        if (substr(CI_VERSION, 0, 1) == '2') {
            $this->session->unset_userdata(array($identity => '', 'id' => '', 'user_id' => ''));
        } else {
            $this->session->unset_userdata(array($identity, 'id', 'user_id'));
        }

        if (get_cookie($this->config->item('identity_cookie_name', 'ion_auth'))) {
            delete_cookie($this->config->item('identity_cookie_name', 'ion_auth'));
        }
        if (get_cookie($this->config->item('remember_cookie_name', 'ion_auth'))) {
            delete_cookie($this->config->item('remember_cookie_name', 'ion_auth'));
        }

        $this->session->sess_destroy();

        if (substr(CI_VERSION, 0, 1) == '2') {
            $this->session->sess_create();
        } else {
            if (version_compare(PHP_VERSION, '7.0.0') >= 0) {
                session_start();
            }
            $this->session->sess_regenerate(TRUE);
        }

        $this->set_message('logout_successful');
        return TRUE;
    }


    public function logged_in() {
        $this->ion_auth_model->trigger_events('logged_in');

        return (bool) $this->session->userdata('identity');
    }

 
    public function get_user_id() {
        $user_id = $this->session->userdata('user_id');
        if (!empty($user_id)) {
            return $user_id;
        }
        return null;
    }


}
