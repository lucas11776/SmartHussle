<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{

    /**
     * Login Controller
     * 
     * @Maps http://website/login
     */
    public function index ()
    {
        $this->form_validation->set_rules('username', 'username/email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() === false) {
            return $this->load->view('login');
        }

        // get account by username/email
        $account = $this->users->user($this->input->post('username'));

        if (count($account) === 0) {
            $this->session->set_flashdata('form_error', 'Invalid username/email or password please try again.');
            return $this->load->view('login');
        }

        // decrypt account password
        $password = $this->encryption->decrypt($account['password']);

        if ($this->input->post('password') != $password) {
            $this->session->set_flashdata('form-error', 'Invalid username or password please enter correct one.');
            return $this->load->view('login');
        }

        $this->session->set_userdata('uid', $account['uid']);
        redirect('');
    }
}