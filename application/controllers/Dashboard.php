<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    /**
     * Dashboard controller
     * 
     * @Maps http://website/dashboard
     */
    public function index ()
    {
        // authorization administrator
        $this->auth->administrator();
        $page = [
            'number_products' => $this->products->count(),
            'number_messages' => $this->messages->count(),
            'number_users' => $this->users->count(),
            'number_orders' => $this->orders->count()
        ];
        $this->load->view('dashboard/index', $page);
    }

    /**
     * Products controller
     * 
     * @Maps http://website/dashboard/products
     */
    public function products ()
    {
        // authorization administrator
        $this->auth->administrator();
        $limit = 9;
        $page = [
            'products' => $this->products->get(
                [],
                $limit,
                is_numeric($this->input->get('page')) ? $this->input->get('page') : 0
            ),
            'number_messages' => $this->messages->count(),
            'number_orders' => $this->orders->count()
        ];
        $this->pagination_dashboard->init([
            'per_page' => $limit,
            'total_rows' => $this->products->count()
        ]);
        $this->load->view('dashboard/products', $page);
    }

    /**
     * Orders Controller
     * 
     * @Maps http://website/dashboard/orders
     */
    public function orders ()
    { 
        // authorization administrator
        $this->auth->administrator();
        $limit = 9;
        $page = [
            'orders' => $this->orders->get(
                [],
                $limit,
                is_numeric($this->input->get('page')) ? $this->input->get('page') : 0
            ),
            'number_messages' => $this->messages->count(),
            'number_orders' => $this->orders->count()
        ];
        $this->pagination_dashboard->init([
            'per_page' => $limit,
            'total_rows' => 200//$this->orders->count()
        ]);
        $this->load->view('dashboard/orders', $page);
    }

    /**
     * Message controller
     * 
     * @Maps http://website/dashboard/messages
     */
    public function messages ()
    {
        // authorization administrator
        $this->auth->administrator();
        $limit = 12;
        $page = [
            'messages' => $this->messages->get(
                [],
                $limit,
                is_numeric($this->input->get('page')) ? $this->input->get('page') : 0
            ),
            'number_messages' => $this->messages->count(),
            'number_orders' => $this->orders->count()
        ];
        $this->pagination_dashboard->init([
            'per_page' => $limit,
            'total_rows' => $this->messages->count()
        ]);
        $this->load->view('dashboard/messages', $page);
    }

    /**
     * Orders controller
     * 
     * @Maps http://website/dashboard/orders
     */
    public function users ()
    {
        // authorization administrator
        
        $this->auth->administrator();
        $limit = 20;
        $page = [
            'users' => $this->users->get(
                [],
                $limit,
                is_numeric($this->input->get('page')) ? $this->input->get('page') : 0
            ),
            'number_messages' => $this->messages->count(),
            'number_orders' => $this->orders->count()
        ];
        $this->pagination_dashboard->init([
            'per_page' => $limit,
            'total_rows' => $this->users->count()
        ]);
        $this->load->view('dashboard/users', $page);
    }

}
