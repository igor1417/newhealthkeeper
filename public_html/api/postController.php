<?php
/**
 * Description of User
 *
 * @author Игорь
 */
class postController extends Mobile_api {

    private $_post;
    private $_default_vote = 1; //Add one point to total amount post or comment points.

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
    
    public function addPost() {
        $title = $this->getReqParam('title', false);
        $content = $this->getReqParam('content', false);
        $image = $this->checkImage('image', true);

        $this->answer = $this->_post->addNewNoTopic($content, $title, $image);
    }
    
    public function addComment() {
        $comment = $this->getReqParam('comment', false);
        $post_id = $this->getReqParam('post_id');
        $this->answer = $this->_post->addComment($post_id, $comment, 'image');
    }
    
    public function postLike() {
        $answer = $this->_post->addVote($this->getReqParam('post_id'), $this->_default_vote);
        $this->afterLike($answer);
    }
    
    public function commentLike() {
        $answer = $this->_post->addCommentVote($this->getReqParam('comment_id'), $this->_default_vote);
        $this->afterLike($answer);
    }
    
    private function afterLike($answer) {
        if ($answer === true) {
            $this->answer['result'] = Mobile_api::RESPONSE_STATUS_SUCCESS;
            $this->answer['liked'] = Mobile_api::RESPONSE_STATUS_SUCCESS;
        } elseif ($answer === false) {
            $this->answer['result'] = Mobile_api::RESPONSE_STATUS_SUCCESS;
            $this->answer['liked'] = Mobile_api::RESPONSE_STATUS_ERROR;
        }
    }
}