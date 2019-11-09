<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller
{

    /**
     * Logout controller
     * 
     * @Maps http://website/logout
     */
    public function index ()
    {
        $this->session->set_userdata('uid', null);
        redirect('');
    }

}