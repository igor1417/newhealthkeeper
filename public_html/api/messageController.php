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
    }
    
    public function getConversationMessages() {
        $to_user_id = $this->getReqParam('to_user_id', true);
        $this->answer = $this->_post->getConvMessages($to_user_id, $this->getReqParam('timestamp', true, 0));
    }    
    
    
    
   
    
}