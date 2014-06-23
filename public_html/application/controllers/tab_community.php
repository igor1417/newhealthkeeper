<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tab_community extends CI_Controller {

    public function index() {
        require_once('../engine/starter/config.php');
        require_once(ENGINE_PATH.'class/post.class.php');
        require_once(ENGINE_PATH.'class/config.class.php');

        $post = new Post();
        $config = new Config();
        $pageNum = (int)$this->input->get('pageNum');
        if ($pageNum) {
            $pageNum = (int)$pageNum;
        }
        if ($pageNum == 0) {
            $pageNum = 1;
        }
        $limit = 10;
        $result = $post->getAllPostsPaged($limit * ($pageNum - 1), $limit);
        $postCount = $post->getAllPostsCount('exp');
        if ($postCount['result']) {
            $postCount = $postCount[0]['postCount'];
        } else {
            $postCount = 0;
        }

        if (isset($result['result']) && $result['result'] > 0) {
            $date_end = strtotime($result[$result['result'] - 1]['date_post']);
            unset($result['result']);
            foreach ($result as $key => $val) {
                $result[$key]['date_post'] = $config->ago(strtotime($result[$key]['date_post']));

                if ($result[$key]['comments_post'] > 0) {
                    $postComments = $post->getAllPostComments($result[$key]['id_post'], 0);
                    if($postComments['result'] != 0) {
                        $postLastCommentDate = $postComments[$postComments['result'] - 1]['date_pc'];
                    } else {
                        $postLastCommentDate = null;
                    }
                    $result[$key]['postLastCommentDate'] = $config->ago(strtotime($postLastCommentDate));
                } else {
                    $result[$key]['postLastCommentDate'] = '&nbsp;';
                }
            }
        } else {
            $result = array();
        }
        $data = array(
            'post' => $result
          , 'pageNum' => $pageNum
          , 'pageCount' => ceil($postCount / $limit)
          , 'pagerVisibleSigns' => 2
        );

        $this->load->view('tab_community', $data);
    }

}