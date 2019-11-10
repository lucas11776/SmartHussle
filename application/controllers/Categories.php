<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller
{

    /**
     * Categories contoller
     * 
     * @Maps http://website/dashboard/categories
     */
    public function index ()
    {
        // authorization administrator
        $this->auth->administrator();

        $page = [
            'categories' => $this->categories->get(),
                'number_orders' => $this->orders->count(),
                'number_messages' => $this->messages->count()
        ];
        $this->load->view('categories/index', $page);
    }

    /**
     * Add categories contoller
     * 
     * @Maps http://website/dashboard/categories/add
     */
    public function add ()
    {
        // authorization administrator
        $this->auth->administrator();

        $this->form_validation->set_rules('name', 'category', 'required|callback_product_exist');

        if ($this->form_validation->run() === false) {
            $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
            $page = [
                'categories' => $this->categories->get(),
                'number_orders' => $this->orders->count(),
                'number_messages' => $this->messages->count()
            ];
            return $this->load->view('categories/index', $page);
        }

        $category_data = [
            'slug' => url_title(strtolower($this->input->post('name'))),
            'name' => strtolower($this->input->post('name'))
        ];

        if ($this->categories->insert($category_data) === false) {
            $this->session->set_flashdata('form_error', 'Something went wrong when tring to connec to database');
            $page = [
                'categories' => $this->categories->get(),
                'number_orders' => $this->orders->count(),
                'number_messages' => $this->messages->count()
            ];
            return $this->load->view('categories/index', $page);
        }

        $this->session->set_flashdata('form_success', 'Category has been inserted in database.');
        $page = [
            'categories' => $this->categories->get(),
                'number_orders' => $this->orders->count(),
                'number_messages' => $this->messages->count()
        ];
        return $this->load->view('categories/index', $page);
    }
    
    /**
     * Delete categories contoller
     * 
     * @maps http://website/dashboard/categories/delete
     */
    public function delete ()
    {
        // authorization administrator
        $this->auth->administrator();
        
        $this->form_validation->set_rules('id', 'category id', 'required|integer');

        if ($this->form_validation->run() === false) {
            $page = [
                'categories' => $this->categories->get(),
                'number_orders' => $this->orders->count(),
                'number_messages' => $this->messages->count()
            ];
            return $this->load->view('categories/index', $page);
        }

        // delete data
        $delete_data = ['cid' => $this->input->post('id')];

        if ($this->categories->delete($delete_data) === false) {
            $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
            $this->session->set_flashdata('form_error', 'Something went wrong when tring to connec to database');
            $page = [
                'categories' => $this->categories->get(),
                'number_orders' => $this->orders->count(),
                'number_messages' => $this->messages->count()
            ];
            return $this->load->view('categories/index', $page);
        }

        $this->session->set_flashdata('form_success', 'Category has been deleted successfully.');
        $page = [
            'categories' => $this->categories->get(),
            'number_orders' => $this->orders->count(),
            'number_messages' => $this->messages->count()
        ];
        $this->load->view('categories/index', $page);
    }

    /**
     * Check if product exist in database
     * 
     * @param   string
     * @return  boolean
     */
    public function product_exist ($product)
    {
        if ($this->categories->category_exist(strtolower($product))) {
            $this->form_validation->set_message('product_exist', 'The {field} already exist in database.');
            return false;
        }
        return true;
    }

}
