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
            'number_orders' => $this->orders->count(),
            'number_users' => $this->users->count()
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

        $page = [
            'products' => $this->products->get(),
            'number_messages' => $this->messages->count(),
            'number_orders' => $this->orders->count()
        ];
        $this->load->view('dashboard/products', $page);
    }

    /**
     * Orders Controller
     * 
     * @Maps http://website/dashboard/orders
     */
    public function orders ()
    {
        $page = [
            'orders' => $this->orders->get(),
            'number_messages' => $this->messages->count(),
            'number_orders' => $this->orders->count()
        ];
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

        $page = [
            'messages' => $this->messages->get(),
            'number_messages' => $this->messages->count(),
            'number_orders' => $this->orders->count()
        ];
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
        
        $page = [
            'users' => $this->users->get(),
            'number_messages' => $this->messages->count(),
            'number_orders' => $this->orders->count()
        ];
        $this->load->view('dashboard/users', $page);
    }

}