<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_order');
	}

	public function index()
	{
		$this->load->view('tampilan_order');
	}

	public function register()
	{
		
	}

}

/* End of file order.php */
/* Location: ./application/controllers/order.php */