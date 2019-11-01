<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Home Controller Route
	 * 
	 * @map - http://website/
	 */
	public function index()
	{
		$this->load->view('home');
	}
}
