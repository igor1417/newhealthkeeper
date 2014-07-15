<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class toVote extends CI_Controller {
    
    public function index() {
        $post_id = $_GET['post_id'];    //to add some revision
        $vote = 1;
        require_once('../engine/starter/config.php');
        require_once(ENGINE_PATH.'class/post.class.php');
        $res= new Post;
        $result = $res->postLike($post_id,$vote);
        echo $result['like'];
    }
    
   

}

