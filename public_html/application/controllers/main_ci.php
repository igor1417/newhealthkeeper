<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_ci extends CI_Controller {

    public function index() {
        $this->load->view('header');
        $this->load->view('container');
        $this->load->view('footer');
    }
}