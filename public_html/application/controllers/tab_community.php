<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tab_community extends CI_Controller {

    public function index() {
        require_once('../engine/starter/config.php');
        require_once(ENGINE_PATH.'class/post.class.php');
        require_once(ENGINE_PATH.'class/config.class.php');

        $post = new Post();
        $config = new Config();
        $timestamp = (int)$this->input->get('timestamp');
        $result = $post->getAllPosts($timestamp);

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
          , 'date_end' => $date_end
        );

        $this->load->view('tab_community', $data);
    }

}