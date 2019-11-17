<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller
{

    /**
	 * Request database limit
	 */
	protected const LIMIT = 6;

    /**
     * Products controller
     * 
     * @Maps http://website/store
     */
    public function index ()
    {

        $page = [
            'categories' => $this->categories->get(),
            'products' => $this->products->get(
                [], // where
                self::LIMIT, // limit
                is_numeric($this->input->get('page')) ? $this->input->get('page') : 0 // offset
            )
        ];
		$this->pagination_home->init([
            'per_page' => $this::LIMIT,
            'total_rows' => $this->products->count()
        ]);
        $this->load->view('store', $page);
    }

    /**
     * Category controller
     * 
     * @param   string
     * @return  void
     * 
     * @Maps http://website/category/(:category)
     */
    public function category ($category)
    {
        $page = [
            'categories' => $this->categories->get(),
            'products' => $this->products->get(['category' => $category])
        ];
        $this->pagination_home->init([
            'per_page' => $this::LIMIT,
            'total_rows' => $this->products->count(['category' => $category])
        ]);
        $this->load->view('store', $page);
    }

    /**
     * Edit product controller
     * 
     * @Maps http://website/dashboard/edit/product/:pid
     */
    public function edit (int $pid)
    {
        // authorization administrator
        $this->auth->administrator();

        // get product from database
        $product = $this->products->get(['pid' => $pid])[0] ?? [];

        // check if product exist
        if (count($product) === 0) {
            redirect('dashboard/products');
        }

        $this->form_validation->set_rules('category', 'category', 'required|callback_category_exist');
        $this->form_validation->set_rules('price', 'price', 'required|numeric');
        $this->form_validation->set_rules('description', 'description', 'required');

        if ($this->form_validation->run() === false) {
            $page = [
                'product' => $product,
                'categories' => $this->categories->get(),
                'number_orders' => $this->orders->count(),
                'number_messages' => $this->messages->count()
            ];
            $this->load->view('products/edit', $page);
            return;
        }

        // edit product data
        $edit_data = [
            'category' => $this->input->post('category'),
            'price' => $this->input->post('price'),
            'description' => $this->input->post('description')
        ];
        
        if ($this->products->update(['pid' => $pid], $edit_data) === false) {
            $this->session->set_flashdata('form_error', 'Something went wrong when tring to connect to database.');
            $page = [
                'product' => $product,
                'categories' => $this->categories->get(),
                'number_orders' => $this->orders->count(),
                'number_messages' => $this->messages->count()
            ];
            $this->load->view('products/edit', $page);
            return;
        }

        $this->session->set_flashdata('form_success', 'Product has been edited successfully.');
        $page = [
            'product' => array_merge($product, $edit_data),
            'categories' => $this->categories->get(),
            'number_orders' => $this->orders->count(),
            'number_messages' => $this->messages->count()
        ];
        $this->load->view('products/edit', $page);
    }

    /**
     * Delete product controller
     * 
     * @Maps http://website/dashboard/delete/product
     */
    public function delete ()
    {
        // authorization administrator
        $this->auth->administrator();
        
        $this->form_validation->set_rules('id', 'product id', 'required|integer');

        if ($this->form_validation->run() === false) {
            redirect($this->input->post('redirect') ?? '');
        }
        
        // product data (id)
        $product_data = ['pid' => $this->input->post('id')];

        // get product from database
        $product = $this->products->get($product_data)[0] ?? [];

        if (count($product) === 0) {
            redirect($this->input->post('redirect') ?? '');
        }

        // delete product from database
        if ($this->products->delete($product_data) === false) {
            redirect($this->input->post('redirect') ?? '');
        }

        // delete product picture
        if (is_file($product['picture'])) {
            unlink($product['picture']);
        }

        redirect($this->input->post('redirect'));
    }

    /**
     * Check if product category exist
     * 
     * @param   string
     * @return boolean
     */
    public function category_exist ($category)
    {
        if ($this->categories->category_exist($category) === false) {
            $this->form_validation->set_message('category_exist', 'The {field} does not exist in SmartHussle database.');
            return false;
        }
        return true;
    }

}
