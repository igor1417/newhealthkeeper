<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tab_tracking extends CI_Controller {

    public function index() {
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('tab_tracking');
        $this->load->view('footer');
    }

}