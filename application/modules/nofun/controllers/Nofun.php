<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nofun extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		echo "working";// $this->load->view('index');
	}

	public function sayhello($name){
		echo $name;
	}
}
