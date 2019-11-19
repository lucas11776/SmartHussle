<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller
{

    /**
     * Change account password controller
     * 
     * @Maps - http://website/account
     */
    public function change_password ()
    {
        // authorization user
        $this->auth->user();

        $this->form_validation->set_rules('old_password', 'old password', 'required|callback_password_matches');
        $this->form_validation->set_rules('new_password', 'new password', 'required|min_length[6]|max_length[20]');
        $this->form_validation->set_rules('confirm_password', 'confirm password', 'required|matches[new_password]');

        if ($this->form_validation->run() === false) {
            $this->form_validation->set_error_delimiters('<p class="text-danger pt-2">','</p>');
            $this->load->view('account/change-password');
            return;
        }

        // account password edit
        $password_data = [
            'password' => $this->encryption->encrypt($this->input->post('new_password'))
        ];

        if ($this->users->update(['uid' => $this->auth->account('uid')], $password_data) === false) {
            $this->session->set_flashdata('form_error', 'Something went wrong when tring to connect to database.');
            $this->load->view('account/change-password');
            return;
        }

        $this->session->set_flashdata('form_success', 'Account password has been changed successfully.');
        redirect('account');
    }

    /**
     * Check if password matches account password
     * 
     * @param   string
     * @return  boolean 
     */
    public function password_matches ($password)
    {
        $account_password = $this->encryption->decrypt($this->auth->account('password'));
        if ($password != $account_password) {
            $this->form_validation->set_message('password_matches', 'The {field} does not match account password.');
            return false;
        }
        return true;
    }

}
