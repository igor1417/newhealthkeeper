<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posts extends CI_Controller {
    
    public function getComments($post_id, $last=0){
        require_once(ENGINE_PATH.'class/post.class.php');
        require_once(ENGINE_PATH.'class/config.class.php');

        $post = new Post();
        $comments = $post->getAllPostComments($post_id, 0);
        if(isset($comments['result']) && $comments['result']>0){
                unset($comments['result']);
                foreach($comments as $key => $comment){
                    $time=strtotime($comment['date_pc']);
                    $comments[$key]['timeAgo'] = Config::ago($time);
                }
            }else{
                $comments = array();
            }
            if($last == 0){
                return $comments;
            }else{
                $result = array();
                foreach($comments as $key => $comment){
                    if($comment['id_pc'] == $last){
                        $result = $comment;
                        break;
                    }                }
                return $result;
            }
    }
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
            /**************GETTING timeAgo*************/
            $time=strtotime($result['date_post']);
            $result['timeAgo'] = Config::ago($time);
            /*************GETTING VOTING**************/
            $result['already_voted']=$post->alreadyVoted($post_id);
            $result['already_voted']=$result['already_voted']['result'];
             /************GETTING TOPICS*************/
            $result['topics'] = $post->getPostTopics($post_id);
            if(isset($result['topics']['result']) && $result['topics']['result']>0){
                unset($result['topics']['result']);
            }else{
                $result['topics'] = array();
            }
            /************GETTING COMMENTS*************/
            $result['comments'] = $this->getComments($post_id); 
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

    public function addComment(){
        require_once('../engine/starter/config.php');
        if(USER_ID == 0) {
            header('Location:'.WEB_URL.'login');
        }
        require_once(ENGINE_PATH.'class/post.class.php');
        require_once(ENGINE_PATH.'class/config.class.php');
        $post = new Post();
        $config = new Config();
        
        if(isset($_POST['id']) && isset($_POST['text']) && $_POST['id'] !='' && strlen(trim($_POST['text'])) > 2){
            $id = $_POST['id'];
            $text = trim($_POST['text']);
            $lastComm = $post->addComment($id, $text);
            $lastCommID = $lastComm[0]['id_pc'];
            $addedComment = $this->getComments($id, $lastCommID);
            $addedComment = serialize($addedComment);
            echo $addedComment;
         }else{
            echo false;
        }
    }
    
    public function delPost(){
        require_once('../engine/starter/config.php');
        require_once(ENGINE_PATH.'class/post.class.php');
        require_once(ENGINE_PATH.'class/config.class.php');
        require_once(ENGINE_PATH.'class/profile.class.php');
        if(!isset($_POST["id_post"])){
            go404();
        }
        $id=(int)$_POST["id_post"];
        if($id==0){
            go404();
        }
        $postClass=new Post();
        $profileClass=new Profile();
        $res=$postClass->deletePost($id);
        if($res){
            $profileClass->updateBadge("sharing",USER_ID);
            echo "ok";
        }else{
            echo "error";
        }
    }
    
    public function delPostComment(){
        require_once('../engine/starter/config.php');
        require_once(ENGINE_PATH.'class/post.class.php');
        require_once(ENGINE_PATH.'class/config.class.php');
        require_once(ENGINE_PATH.'class/profile.class.php');
        if(!isset($_POST["id_pc"])){
            go404();
        }
        $id=(int)$_POST["id_pc"];
        if($id==0){
            go404();
        }
        $postClass=new Post();
        $profileClass=new Profile();
        $res=$postClass->deleteComment($id);
        $profileClass->updateBadge("helpful",USER_ID);
        if($res){
                echo "ok";
        }else{
                echo "error";
        }
    }
}
