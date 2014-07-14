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
        $this->afterPostFind();
    }
    
    public function userPosts() {
        $this->answer = $this->_post->getAllPosts($this->getReqParam('timestamp', true, 0), $this->getReqParam('author_id'));
        $this->afterPostFind();        
    }
    
    public function topicPosts() {
        $this->answer = $this->_post->getPostsByTopicId($this->getReqParam('id_topic'), $this->getReqParam('timestamp', true, 0));
        $this->afterPostFind();        
    }
    
    public function keywordPosts() {
        $this->answer = $this->_post->getPostsByKeyword($this->getReqParam('keyword', false), $this->getReqParam('timestamp', true, 0));
        $this->afterPostFind();
    }
    
    public function getPostComments() {
        $this->answer = $this->_post->getAllPostComments($this->getReqParam('post_id'), $this->getReqParam('timestamp', true, 0));
        $this->afterCommentFind();        
    }
    
    public function addPost() {
        $title = $this->getReqParam('title', false);
        $content = $this->getReqParam('content', false);

        $this->answer = $this->_post->addNewNoTopic($content, $title, 'image');
    }

    public function updatePost() {
        $post_id = $this->getReq2Param('post_id');
        $title = $this->getParam('title');
        $content = $this->getParam('content');

        $this->answer = $this->_post->updatePostModel($post_id, $content, $title, 'image');
    }
    
    public function addComment() {
        $comment = $this->getReqParam('comment', false);
        $post_id = $this->getReqParam('post_id');
        $video_web_url = $this->getReqParam('video_url_pc', false, "");
        $this->answer = $this->_post->addComment($post_id, $comment, 'image', $video_web_url);
    }

    public function updateComment() {
        $comment_id = $this->getReq2Param('comment_id');
        $comment = $this->getParam('comment');
        $video_web_url = $this->getParam('video_url_pc');

        $this->answer = $this->_post->updateCommentModel($comment_id, $comment, 'image', $video_web_url);
    }
    
    public function postLike() {
        $this->answer = $this->_post->postLike($this->getReqParam('post_id'), $this->_default_vote);
    }

    public function commentLike() {
        $this->answer = $this->_post->commentLike($this->getReqParam('comment_id'), $this->_default_vote);
    }
    
    private function afterPostFind() {
        if (count($this->answer) > 0) {
            foreach ($this->answer as $key=>$post) {
                if ($key !== 'result') {
                    $timestamp = strtotime($this->answer[$key]['date_post']);
                    $this->answer[$key]['time_ago'] = $this->config->ago($timestamp);
                    $this->answer[$key]['post_topics'] = $this->_post->getPostTopics($post['id_post']);
                }
            }
        }
    }
    
    private function afterCommentFind() {
        if (count($this->answer) > 0) {
            foreach ($this->answer as $key=>$post) {
                if ($key !== 'result') {
                    $timestamp = strtotime($this->answer[$key]['date_pc']);
                    $this->answer[$key]['time_ago'] = $this->config->ago($timestamp);
                }
            }
        }
    }
    
}