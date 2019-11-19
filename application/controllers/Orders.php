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
            $this->form_validation->set_error_delimiters('<p class="text-danger mt-1 small">', '</p>');
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
            $this->session->set_flashdata('form_error', 'Something went wrong when tring to connect to database.');
            $page = [
                'product' => $this->products->get(['pid' => $pid])[0],
                'categories' => $this->categories->get()
            ];
            return $this->load->view('order', $page);
        }

        // merge order data and product data
        $order_details = array_merge(
            $order_data, $this->products->get(['pid' => $pid])[0] ?? []
        );

        // get all administrator account
        $administrator_accounts = $this->users->get(['role' => $this->auth::ROLE['administrator']]);

        // send notification mail to all administrators
        for ($i = 0; $i < count($administrator_accounts); $i++) {
           
        }

        die();

        $this->session->set_flashdata('form_success', 'Thank you for your order we will get back to you.');
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
