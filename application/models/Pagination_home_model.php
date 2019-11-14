<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagination_home_model extends CI_Model
{
    /**
     * Initialize pagination
     * 
     * @param   array
     * @return  void
     */
    public function init (array $config)
    {
        $this->load->library('pagination');
        $this->pagination->initialize(
            array_merge($this->settings(), $this->html(), $config)
        );
    }
    
    /**
     * Pagination settings
     * 
     * @return  array
     */
    private function settings () {
        return [
            'base_url' => current_url(),
            'page_query_string' => true,
            'query_string_segment' => 'page',
            'reuse_query_string' => true
        ];
    }

    /**
     * Pagination html
     * 
     * @return boolean
     */
    private function html () {
        return [
            // pagination tags
            'full_tag_open' => '<ul class="d-flex flex-row align-items-start justify-content-center">',
            'full_tag_close' => '</ul>',
            // first tags
            'first_tag_open' => '<li>',
            'first_tag_close' => '</li>',
            // last tags
            'last_tag_open' => '<li>',
            'last_tag_close' => '</li>',
            // next tags
            'next_tag_open' => '<li>',
            'next_tag_close' => '</li>',
            'next_link' => 'Next',
            // previous tags
            'prev_tag_open' => '<li>',
            'prev_tag_close' => '</li>',
            'prev_link' => 'Back',
            // page numbers tags
            'num_tag_open' => '<li>',
            'num_tag_close' => '</li>',
            // current page tag
            'cur_tag_open' => '<li class="active"',
            'cur_tag_close' => '</li>'
        ];
    }
    
}
