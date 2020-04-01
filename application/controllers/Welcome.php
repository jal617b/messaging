<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Manila');
	}
	
	public function index()
	{
		$this->load->view('welcome_message');
	}

 
}
