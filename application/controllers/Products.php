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
            'products' => $this->products->get([], 9)
        ];
		$this->pagination_home->init([
            'per_page' => $this::LIMIT,
            'total_rows' => 12
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
        $this->load->view('store', $page);
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

}
