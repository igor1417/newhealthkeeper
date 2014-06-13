<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		$this->load->view('header');
		$this->load->view('container');
		$this->load->view('footer');
	}
	

}