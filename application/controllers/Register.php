<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller
{
    
    /**
     * Register Controller
     * 
     * @Maps http://website/register
     */
    public function index ()
    {
        // authorization guest
        $this->auth->guest();

        $this->form_validation->set_rules('username', 'username', 'required|min_length[3]|max_length[30]|callback_username_exist');
        $this->form_validation->set_rules('email', 'email address', 'required|valid_email|callback_email_exist');
        $this->form_validation->set_rules('password', 'password', 'required|min_length[6]|max_length[20]');
        $this->form_validation->set_rules('confirm_password', 'confirm password', 'required|matches[password]');

        if ($this->form_validation->run() === false) {
            $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
            return $this->load->view('register');
        }

        // encrypt password
        $password = $this->encryption->encrypt($this->input->post('password'));

        // user account data
        $user_data = [
            'role' => $this->auth::ROLE['user'],
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => $password
        ];

        // insert user data in users table
        if ($this->users->insert($user_data) === false) {
            $this->session->set_flashdata('form_error', 'Something went wrong when tring to connect to database');
            return $this->load->view('register');
        }

        $this->session->set_flashdata('registered', 'You are registerd to SmartHussle.');
        redirect('login');
    }

    /**
     * Checks if username exist in users table
     * 
     * @param   string
     * @return  boolean
     */
    public function username_exist ($username)
    {
        if ($this->users->username_exist($username ?? '')) {
            $this->form_validation->set_message('username_exist', 'The {field} already exist please try new one.');
            return false;
        }
        return true;
    }

    /**
     * Checks if email exist in users table
     * 
     * @param   string
     * @return  boolean
     */
    public function email_exist ($email)
    {
        if ($this->users->email_exist($email ?? '')) {
            $this->form_validation->set_message('email_exist', 'The {field} already exist in database.');
            return false;
        }
        return true;
    }
}