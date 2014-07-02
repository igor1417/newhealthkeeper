<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {


    public function index() {
        require_once('../engine/starter/config.php');
        require_once(ENGINE_PATH . 'class/post.class.php');
        require_once(ENGINE_PATH . 'class/config.class.php');

       
        $this->load->helper('form');
//         $this->load->library('breadcrumbs');
//         $this->breadcrumbs->push('Articles', '/tab_articles');
//         $this->breadcrumbs->push($Post['title_post'], '/article?id='.$Post['id_post']);
//         $this->breadcrumbs->unshift('Home', '/');
        $this->load->view('login_header');
        $this->load->view('login');
        $this->load->view('footer');
    }

}
