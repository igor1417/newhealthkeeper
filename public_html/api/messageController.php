<?php
/**
 * Description of User
 *
 * @author Игорь
 */
class messageController extends Mobile_api {

    private $_post;
    private $_message_topic = 0;

    public function __construct($request = array()) {
        parent::__construct($request);
        $this->getReqParam('user_id');
        
        require_once(ENGINE_PATH.'class/post.class.php');
        $this->_post = new Post();
    }
    
    public function sendMessage() {
        $message = $this->getReqParam('message', false);
        $to_user_id = $this->getReqParam('to_user_id', true);
        
        $this->answer = $this->_post->addNewV2Post($message, 'image', $this->_message_topic, $to_user_id);
    }
    
    public function getConversations() {
        $this->answer = $this->_post->getAllConversations($this->getReqParam('timestamp', true, 0));
        $this->getDateAgoLastPost();
    }

    public function getConversationMessages() {
        $to_user_id = $this->getReqParam('to_user_id', true);
        $this->answer = $this->_post->getConvMessages($to_user_id, $this->getReqParam('timestamp', true, 0));
        $this->afterMessageFind();
    }

    private function afterMessageFind() {
        if (count($this->answer) > 0) {
            foreach ($this->answer as $key=>$post) {
                if ($key !== 'result') {
                   $timestamp = strtotime($this->answer[$key]['date_post']);
                    $this->answer[$key]['time_ago'] = $this->config->ago($timestamp);
                }
            }
        }
    }

    private function afterConversationFind() {
        if (count($this->answer) > 0) {
            foreach ($this->answer as $key=>$post) {
                if ($key !== 'result') {
                    if (isset($this->answer[$key]['date_post'])) {
                        $timestamp = strtotime($this->answer[$key]['date_post']);
                        $this->answer[$key]['time_ago'] = $this->config->ago($timestamp);
                    }
                }
            }
        }
    }

    private function getDateAgoLastPost() {
        if (count($this->answer) > 0) {
            foreach ($this->answer as $key=>$post) {
                if ($key !== 'result') {
                    $last_post = $this->_post->getConvMessages($this->answer[$key]['id_profile'], $this->getReqParam('timestamp', true, 1));
                    foreach ($last_post as $key2=>$lp) {
                        if($key2 !== 'result' ) {
                            $this->answer[$key]['date_post'] = $last_post[0]['date_post'];
                           // $this->answer[$key]['test'] = $last_post;
                            $this->afterConversationFind();
                        }

                    }
                }

                if ($key != 'result' && !isset($this->answer[$key]['date_post'])) {
                    unset($this->answer[$key]);
                }
            }
        }
    }

}