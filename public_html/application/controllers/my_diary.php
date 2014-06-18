<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_diary extends CI_Controller {

    public function index() {
        $this->load->view('my_diary');
    }

}