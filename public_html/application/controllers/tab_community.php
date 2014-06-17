<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tab_community extends CI_Controller {

	public function index()
	{
        
       require_once('../engine/starter/config.php');
        require_once(ENGINE_PATH.'class/post.class.php');
        require_once(ENGINE_PATH.'class/config.class.php');
        
        $post = new Post();
        $config = new Config();
        $result = $post->getAllPosts(0);
        array_pop($result);
        
//         $resPosts = $post->getNewPosts();
//         echo "<pre>";
// 		print_r($resPosts);
// 		die();
        
        foreach($result as $key => $val) {
			$result[$key]['date_post'] = $config->ago( strtotime( $result[$key]['date_post'] ) );
        }
        $data = array(
			'post' => $result
		);
		
		$this->load->view('tab_community', $data);
	}
	
}