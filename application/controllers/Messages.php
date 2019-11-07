<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends CI_Controller
{
    
    /**
     * Contact controller
     * 
     * @Maps http://website/contact
     */
    public function index ()
    {
        $this->form_validation->set_rules('name', 'name', 'required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('surname', 'surname', 'required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('subject', 'subject', 'required|min_length[10]|max_length[100]');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('phone_number', 'phone number', 'min_length[10]|max_length[15]');
        $this->form_validation->set_rules('message', 'message', 'required|min_length[10]|max_length[2000]');

        if ($this->form_validation->run() === false) {
            $this->form_validation->set_error_delimiters('<p class="text-danger mt-1 small">', '</p>');
            return $this->load->view('contact');
        }

        // message data
        $message_data = [
            'name' => $this->input->post('name'),
            'surname' => $this->input->post('surname'),
            'subject' => $this->input->post('subject'),
            'email' => $this->input->post('email') ?? '',
            'phone_number' => $this->input->post('phone_number'),
            'message' => $this->input->post('message')
        ];

        if ($this->messages->insert($message_data) === false) {
            $this->session->set_flashdata('form_error', 'Something went wrong when tring to connect to database.');
            return $this->load->view('contact');
        }

        $this->session->set_flashdata('form_success', 'Message has been successfully sent SmartHussle will get back to you soon..');
        redirect(uri_string());
    }

    /**
     * Delete message controller
     * 
     * @Maps http://website/dashboard/messages/delete
     */
    public function delete ()
    {
        // authorization administrator
        $this->auth->administrator();
        
        $this->form_validation->set_rules('id', 'message id', 'required|integer');

        if ($this->form_validation->run() === false) {
            redirect($this->input->post('redirect') ?? '');
        }

        // delete message data
        $message_data = ['mid' => $this->input->post('id')];

        if ($this->messages->delete($message_data) === false) {
            $this->session->set_flashdata('form_error', 'Something went wrong when tring to connect to database.');
            redirect($this->input->post('redirect') ?? '');
        }

        $this->session->set_flashdata('form_success', 'Message Has Been Deleted Successfully.');
        redirect($this->input->post('redirect') ?? '');
    }

}
