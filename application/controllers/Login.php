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
        // authorization guest
        $this->auth->guest();

        $this->form_validation->set_rules('username', 'username/email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() === false) {
            $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
            return $this->load->view('login');
        }

        // get account by username/email
        $account = $this->users->user($this->input->post('username'));

        if (count($account) === 0) {
            $this->session->set_flashdata('form_error', 'Invalid username/email or password.');
            return $this->load->view('login');
        }

        // decrypt account password
        $password = $this->encryption->decrypt($account['password']);

        if ($this->input->post('password') != $password) {
            $this->session->set_flashdata('form_error', 'Invalid username or password please enter correct one.');
            return $this->load->view('login');
        }

        $this->session->set_userdata('uid', $account['uid']);

        // if user is administrator redirect to dashboard
        if ($account['role'] == $this->auth::ROLE['administrator']) {
            redirect($this->input->post('redirect') ? $this->input->post('redirect') : 'dashboard');
        }

        redirect($this->input->post('redirect'));
    }
}