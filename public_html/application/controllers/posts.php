<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posts extends CI_Controller {
    
    public function index($post_id) {
        require_once('../engine/starter/config.php');
        if(USER_ID == 0) {
			header('Location:'.WEB_URL.'login');
        }
        require_once(ENGINE_PATH.'class/post.class.php');
        require_once(ENGINE_PATH.'class/config.class.php');
        
        $post = new Post();
        $config = new Config();
        $result = $post->getPostById($post_id);

         /**********GETTING DATA****************/
        if (isset($result['result']) && $result['result'] > 0) {
            $result = $result[0];
            
            $time=strtotime($result['date_post']);
            $result['timeAgo'] = Config::ago($time);
            /************GETTING TOPICS*************/
            $result['topics'] = $post->getPostTopics($post_id);
            if(isset($result['topics']['result']) && $result['topics']['result']>0){
                unset($result['topics']['result']);
            }else{
                $result['topics'] = array();
            }
            /************GETTING COMMENTS*************/
            $result['comments'] = $post->getAllPostComments($post_id, 0);
            if(isset($result['comments']['result']) && $result['comments']['result']>0){
                unset($result['comments']['result']);
                foreach($result['comments'] as $key => $comment){
                    $time=strtotime($comment['date_pc']);
                    $result['comments'][$key]['timeAgo'] = Config::ago($time);
                }
            }else{
                $result['comments'] = array();
            }           
        }else{
            $result = false;
        }
        $data = array(
            'post' => $result
        );

        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('post', $data);
        $this->load->view('footer');
    }

}

