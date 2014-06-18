<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tab_articles extends CI_Controller {

    public function index() {
        $this->load->view('tab_articles');
    }

}