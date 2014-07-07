<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {


    public function index() {
        require_once('../engine/starter/config.php');
        require_once(ENGINE_PATH . 'class/post.class.php');
        require_once(ENGINE_PATH . 'class/config.class.php');
        require_once(ENGINE_PATH . 'class/user.class.php');

        $userClass = new User();
        if(USER_ID!=0){							//check out this part later
			if(isset($_GET["logout"])){
				$userClass->doLogout();
			}else{
				header("Location:" . WEB_URL);
				exit;
			}
		}else if(isset($_GET["logout"])){
			//in case the session has expired still can logout
			$userClass->doLogout();
		}
        
        $token=sha1(microtime(true).mt_rand(10000,90000));
		$_SESSION['token']=$token;
		
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$errorMsg = '';
		if(isset($email, $password) && !empty($email) && !empty($password)) {
// 			$userClass = new User();
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
					exit;
					}
					else if($res["error"]=="password"){
	// 					header("Location:".WEB_URL."login?password".$gotoParam);
						exit;
					}
					else{
	// 					header("Location:".WEB_URL."login?refresh".$gotoParam);
						exit;
					}*/
					$errorMsg = $res["error"];
				}
				
			}
		}
		
        $data = array(
			'token' => $token,
			'errorMsg' => $errorMsg
        );
        
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->view('login_header');
        $this->load->view('login', $data);
        $this->load->view('footer');
    }
    
    public function logout() {											//		temporary
		require_once('../engine/starter/config.php');
		header("Location:".WEB_URL."login?logout");
// 		echo "<pre>";
// 		print_r(get_defined_constants(true)); die;
    }
    
    public function register() {
	
	$errorMsg = '';
	
	if(isset($_POST) && !empty($_POST)) {
			require_once('../engine/starter/config.php');
			require_once(ENGINE_PATH . 'class/user.class.php');

			$userClass = new User();
			$username=trim($_POST["username"]);
			$email=trim($_POST["email"]);
			$password=$_POST["password"];
			$gender=$_POST["gender"];
	// 		$token=$_POST["token"];
	// 		$_SESSION["token"]=$token;

			$res=$userClass->addNew($username,$email,$password,$gender);
	// 		print_r($res); die;
			
			if(isset($res["error"])) {
				$errorMsg =  $res["error"];
			}
			elseif($res["result"]) {
				header("Location:".WEB_URL."tab_community");
			}
	}    
		
		
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->view('login_header');
		$this->load->view('register_form', array('errorMsg' => $errorMsg));
		$this->load->view('footer');
    }

}
