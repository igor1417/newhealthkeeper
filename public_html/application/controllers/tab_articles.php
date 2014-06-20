<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tab_articles extends CI_Controller {

    public function index() {
        require_once('../engine/starter/config.php');
        require_once(ENGINE_PATH.'class/post.class.php');
        require_once(ENGINE_PATH.'class/config.class.php');
        
        $postClass = new Post();
        $configClass = new Config();

        $resPosts = $postClass->getFeedPosts(1,'recent','news');		//   was     $resPosts = $postClass->getFeedPosts(1,'recent',$_SESSION["pfilter"]["feed"]);
//         print_r($resPosts);  die;
        
        unset($resPosts['result']);
        foreach ($resPosts as $key => $val) {
			$resPosts[$key]['date_post'] = $configClass->ago(strtotime($resPosts[$key]['date_post']));
			if ($resPosts[$key]['comments_post'] > 0) {
                    $postComments = $post->getAllPostComments($resPosts[$key]['id_post'], 0);
                    if($postComments['result'] != 0) {
                        $postLastCommentDate = $postComments[$postComments['result'] - 1]['date_pc'];
                    } else {
                        $postLastCommentDate = null;
                    }
                    $resPosts[$key]['postLastCommentDate'] = $configClass->ago(strtotime($postLastCommentDate));
                } else {
                    $resPosts[$key]['postLastCommentDate'] = '&nbsp;';
                }
		}
        
        $data = array(
            'posts' => $resPosts
//           , 'pageNum' => $pageNum
//           , 'pageCount' => ceil($postCount / $limit)
//           , 'pagerVisibleSigns' => 2
        );
        $this->load->view('tab_articles', $data);
    }

}