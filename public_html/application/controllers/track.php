<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Track extends CI_Controller {

    public function index() {
        
        require_once('../engine/starter/config.php');
        if(USER_ID == 0) {
			header('Location:'.WEB_URL.'login');
        }
        
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('tab_tracking');
        $this->load->view('footer');
    }

}