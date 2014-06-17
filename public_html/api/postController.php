<?php
/**
 * Description of User
 *
 * @author Игорь
 */
class postController extends Mobile_api {

    private $_post;

    public function __construct($request = array()) {
        parent::__construct($request);
        $this->getReqParam('user_id');
        
        require_once(ENGINE_PATH.'class/post.class.php');
        $this->_post = new Post();
    }
    
    public function allPosts() {
        $this->answer = $this->_post->getAllPosts($this->getReqParam('timestamp', true, 0));
    }
    
    public function userPosts() {
        $this->answer = $this->_post->getAllPosts($this->getReqParam('timestamp', true, 0), $this->getReqParam('author_id'));
    }
    
    public function getPostComments() {
        $this->answer = $this->_post->getAllPostComments($this->getReqParam('post_id'), $this->getReqParam('timestamp', true, 0));
    }
}
