<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_ci extends CI_Controller {

	public function index()
	{
		
		require_once('../engine/starter/config.php');
        require_once(ENGINE_PATH.'class/post.class.php');
        require_once(ENGINE_PATH.'class/config.class.php');
        
        $post = new Post();
        $config = new Config();
        $result = $post->getAllPosts(0);
        array_pop($result);
        
//         $postComments = $post->getAllPostComments(5540, 0);	//	id_post
//         if($postComments['result'] != 0) {
// 			$postLastCommentDate = $postComments[ $postComments['result'] - 1 ]['date_pc'];
//         }
//         else
// 			$postLastCommentDate = null;
			
//         echo "<pre>";
// 		print_r($postLastCommentDate);
// 		die();
        
        foreach($result as $key => $val) {
			//print_r($result[$key]);
			$result[$key]['date_post'] = $config->ago( strtotime( $result[$key]['date_post'] ) );
			
			if ($result[$key]['comments_post'] > 0) {
				$postComments = $post->getAllPostComments($result[$key]['id_post'], 0);	
				if($postComments['result'] != 0) {
					$postLastCommentDate = $postComments[ $postComments['result'] - 1 ]['date_pc'];
				} else {
				    $postLastCommentDate = null;
				}
				$result[$key]['postLastCommentDate'] = $config->ago( strtotime( $postLastCommentDate ) );
			} else {
                $result[$key]['postLastCommentDate'] = '&nbsp;';
            }
		}
		$data = array(
			'post' => $result
		);
//        $sql="select * from post as p, profile as pro where pro.id_profile=p.id_profile_post order by date_post desc limit 10";
//        $this->config_Class->query($sql);
//		$res = $this->db->query($sql)->result_array();
// 		echo "<pre>";
// 		print_r($result);
		
		$this->load->view('header');
		$this->load->view('container', $data);
		$this->load->view('footer');
	}
}