<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {


    public function index() {
        require_once('../engine/starter/config.php');
        require_once(ENGINE_PATH . 'class/post.class.php');
        require_once(ENGINE_PATH . 'class/config.class.php');
        require_once(ENGINE_PATH . 'class/user.class.php');

        $token=sha1(microtime(true).mt_rand(10000,90000));
		$_SESSION['token']=$token;
		
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$errorMsg = '';
		if(isset($email, $password) && !empty($email) && !empty($password)) {
			$userClass = new User();
			$res = $userClass->doLogin($email, $password);
// 			print_r($res); die;
			if($res['result']) {
				//renew mixpanel info
				$_SESSION["mx_name_tag"]=0;
				
				require_once(ENGINE_PATH.'class/profile.class.php');
				$profileClass=new Profile();
				$resProfile=$profileClass->getById($_SESSION["user_id"]);
				if($resProfile["result"]) {
// 					if($gotoParam!="" && $goto!="") {
// 						header("Location:".WEB_URL.$goto);
// 					}
// 					else {
						header("Location:" . WEB_URL);
// 					}
					
				}
			}
			else {
				if(isset($res["error"])) {
/*					if($res["error"]=="email"){
// 					header("Location:".WEB_URL."login?email".$gotoParam);
					echo 'error1';
					exit;
					}
					else if($res["error"]=="password"){
	// 					header("Location:".WEB_URL."login?password".$gotoParam);
						echo 'error2';
						exit;
					}
					else{
	// 					header("Location:".WEB_URL."login?refresh".$gotoParam);
						echo 'error3';
						exit;
					}*/
					$errorMsg = $res["error"];
				}
				
			}
		}
		
        
        $this->load->helper('form');
        $this->load->view('login_header');
        $this->load->view('login', array('errorMsg' => $errorMsg));
        $this->load->view('footer');
    }

}
