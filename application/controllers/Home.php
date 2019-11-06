<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

	/**
	 * Request database limit
	 */
	protected const LIMIT = 6;

	/**
	 * Home Controller
	 * 
	 * @map - http://website/
	 */
	public function index()
	{
		$page = [
			'categories' => $this->categories->get(),
			'products' => $this->products->get(null, self::LIMIT),
		];
		$this->load->view('home', $page);
	}
}
