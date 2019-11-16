<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagination_dashboard_model extends CI_Model
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
            'full_tag_open' => '<ul class="pagination">',
            'full_tag_close' => '</ul>',
            // first tags
            'first_tag_open' => '<li class="paginate_button page-item"><span class="page-link">',
            'first_tag_close' => '</span></li>',
            // last tags
            'last_tag_open' => '<li class="paginate_button page-item"><span class="page-link">',
            'last_tag_close' => '</span></li>',
            // next tags
            'next_tag_open' => '<li class="paginate_button page-item"><span class="page-link">',
            'next_tag_close' => '</span></li>',
            'next_link' => '<span class="fa fa-arrow-right" style="position:relative;top:2.5px;"></span> Next',
            // previous tags
            'prev_tag_open' => '<li class="paginate_button page-item"><span class="page-link">',
            'prev_tag_close' => '</span></li>',
            'prev_link' => '<span class="fa fa-arrow-left" style="position:relative;top:2.5px;"></span> Back',
            // page numbers tags
            'num_tag_open' => '<li class="paginate_button page-item"><span class="page-link">',
            'num_tag_close' => '</span></li>',
            // current page tag
            'cur_tag_open' => '<li class="paginate_button page-item active"><span class="page-link">',
            'cur_tag_close' => '</span></li>'
        ];
    }
    
}
