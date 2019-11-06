<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_product extends CI_Controller
{

    /**
     * Upload picture controller
     * 
     * @Maps http://website/dashboard/upload/picture
     */
    public function index ()
    {
        // authorization administrator
        $this->auth->administrator();
        
        $this->form_validation->set_rules('picture', 'picture', 'callback_picture_upload');
        $this->form_validation->set_rules('category', 'category', 'required|callback_category_exist');
        $this->form_validation->set_rules('name', 'product', 'required|callback_product_exist');
        $this->form_validation->set_rules('price', 'price', 'required');
        $this->form_validation->set_rules('decription', 'decription', '');

        if ($this->form_validation->run() === false) {
            // delete product picture
            $this->picture_delete();
            $page = [
                'categories' => $this->categories->get()
            ];
            return $this->load->view('products/upload', $page);
        }

        // upload product data
        $product_data = [
            'picture' => $this->products::PICTURE_PATH . $this->upload->data('file_name'),
            'slug' => url_title(strtolower($this->input->post('name'))),
            'name' => strtolower($this->input->post('name')),
            'category' => $this->input->post('category'),
            'price' => $this->input->post('price'),
            'description' => $this->input->post('description')
        ];

        // insert product in database
        if ($this->products->insert($product_data) === false) {
            // delete product picture
            $this->picture_delete();
            $this->session->set_flashdata('form_error', 'Something went wrong when tring to connect to database');
            return $this->load->view('products/upload');
        }

        $this->session->set_flashdata('form_success', 'Product has been uploaded to SmartHussle database.');
        $page = [
            'categories' => $this->categories->get()
        ];
        redirect(uri_string());
    }

    /**
     * Upload product picture
     * 
     * @return  boolean
     */
    public function picture_upload ()
    {
        // upload picture configuration
        $upload_picture_config = [
            'upload_path' => $this->products::PICTURE_PATH,
            'allowed_types' => $this->products::PICTURE_EXTENSION,
            'max_size' => $this->products::MAX_PICTURE_SIZE,
            'min_width' => $this->products::MIN_PICTURE_WIDTH,
            'min_hieght' => $this->products::MIN_PICTURE_HEIGHT,
            'file_name' => $this->input->post('name') ?? 'Delete-' . uniqid()
        ];
        $this->upload->initialize($upload_picture_config);
        // upload picture
        if($this->upload->do_upload('picture') === false) {
            $this->form_validation->set_message('picture_upload', $this->upload->display_errors('',''));
            return false;
        }
        return true;
    }

    /**
     * Check if product exist in database
     * 
     * @param   string
     * @return  boolean
     */
    public function product_exist ($product)
    {
        if ($this->products->product_exist($product)) {
            $this->form_validation->set_message('product_exist', 'The {field} already exist in database.');
            return false;
        }
        return true;
    }

    /**
     * Check if category is valid or exist in database
     * 
     * @param   string
     * @return  boolean
     */
    public function category_exist ($category)
    {
        if ($this->categories->category_exist($category) === false) {
            $this->form_validation->set_message('category_exist', 'The {field} already exist in database.');
            return false;
        }
        return true;
    }

    /**
     * Delete uploaded product picture
     * 
     * @return void
     */
    public function picture_delete ()
    {
        $picture =  $this->products::PICTURE_PATH . $this->upload->data('file_name') ?? '';
        if (is_file($picture)) unlink ($picture);
    }

}
