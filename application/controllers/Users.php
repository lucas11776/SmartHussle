<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller
{

    /**
     * Delete user controller
     */
    public function delete ()
    {
        // authorization guest
        $this->auth->administrator();

        $this->form_validation->set_rules('id', 'user id', 'required|integer');

        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('form_error', $this->form_validation->error_array()['id']);
            redirect($this->input->post('redirect'));
        }

        // user account
        $user = ['uid' => $this->input->post('id')];

        if ($this->users->delete($user) === false) {
            $this->session->set_flashdata('form_error', 'Something went wrong when tring to connect to database.');
            redirect($this->input->post('redirect'));
        }

        $this->session->set_flashdata('form_success', 'User account has been deleted successfully.');
        redirect($this->input->post('redirect'));
    }

}