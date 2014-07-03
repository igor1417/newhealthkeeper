<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tab_articles extends CI_Controller {

    public function index() {
        require_once('../engine/starter/config.php');
        if(USER_ID == 0) {
			header('Location:'.WEB_URL.'login');
        }
        require_once(ENGINE_PATH.'class/post.class.php');
        require_once(ENGINE_PATH.'class/config.class.php');

        $postClass = new Post();
        $configClass = new Config();
        $pageNum = (int)$this->input->get('pageNum');
        if ($pageNum) {
            $pageNum = (int)$pageNum;
        }
        if ($pageNum == 0) {
            $pageNum = 1;
        }
        $limit = 10;
        $resPosts = $postClass->getFeedPosts($pageNum,'recent','news');
        unset($resPosts['result']);
        $postCount = $postClass->getAllPostsCount('news');
        if ($postCount['result']) {
            $postCount = $postCount[0]['postCount'];
        } else {
            $postCount = 0;
        }

        foreach ($resPosts as $key => $val) {
            $resPosts[$key]['date_post'] = $configClass->ago(strtotime($resPosts[$key]['date_post']));
            if ($resPosts[$key]['comments_post'] > 0) {
                    $postComments = $postClass->getAllPostComments($resPosts[$key]['id_post'], 0);
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
          , 'pageNum' => $pageNum
          , 'pageCount' => ceil($postCount / $limit)
          , 'pagerVisibleSigns' => 2
        );

        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('tab_articles', $data);
        $this->load->view('footer');
    }

}