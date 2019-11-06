<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller
{

    /**
     * Order Controller
     * 
     * @param   integer
     * @return  void
     * 
     * @Maps http://website/order/product/(:pid)
     */
    public function index ($pid)
    {
        // check if product id exist
        if ($this->products->product_exist($pid) === false) {
            redirect($this->input->post('redirect') ?? '');
        }
        
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('surname', 'surname', 'required');
        $this->form_validation->set_rules('email', 'email address', 'required');
        $this->form_validation->set_rules('phone_number', 'phone number', 'required');

        if ($this->form_validation->run() === false) {
            $page = [
                'product' => $this->products->get(['pid' => $pid])[0],
                'categories' => $this->categories->get()
            ];
            return $this->load->view('order', $page);
        }

        // order data
        $order_data = [
            'pid' => $pid,
            'name' => $this->input->post('name'),
            'surname' => $this->input->post('surname'),
            'email' => $this->input->post('email'),
            'phone_number' => $this->input->post('phone_number')
        ];

        if ($this->orders->insert($order_data) === false) {
            $this->form_validation->set_rules('form_error', 'Something went wrong when tring to connect to database.');
            $page = [
                'product' => $this->products->get(['pid' => $pid])[0],
                'categories' => $this->categories->get()
            ];
            return $this->load->view('order', $page);
        }

        $this->session->set_flashdata('form_success', 'Your order has been sent SmartHussle will get back to you.');
        redirect(uri_string());
    }

    /**
     * Delete product controller
     * 
     * @Maps http://website/dashboard/orders/delete
     */
    public function delete ()
    {
        // authorization administrator
        $this->auth->administrator();
        
        $this->form_validation->set_rules('id', 'order id', 'required|integer');

        if ($this->form_validation->run() === false) {
            redirect($this->input->post('redirect'));
        }

        // Delete order data
        $order_data = ['oid' => $this->input->post('id')];

        if ($this->orders->delete($order_data) === false) {
            redirect($this->input->post('redirect'));
        }

        redirect($this->input->post('redirect'));
    }

}
