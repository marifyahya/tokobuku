<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public $data = array();

	public function __construct()
	{
		parent::__construct();
		
		$this->data['css'] = '';
		$this->data['js']  = '';
	}

	public function index()
	{
		$this->render();
	}

	public function render($view = '')
	{
		if ($view == '') {
			$view = $this->router->fetch_class();
		}

		$this->data['content'] = $view;

		$this->load->view('v_template', $this->data);
	}
	
}
