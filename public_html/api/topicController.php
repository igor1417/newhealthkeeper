<?php
/**
 * Description of User
 *
 * @author Игорь
 */
class topicController extends Mobile_api {

    private $_topic;
    
    public function __construct($request = array()) {
        parent::__construct($request);
        $this->getReqParam('user_id');
        
        require_once(ENGINE_PATH.'class/topic.class.php');
        $this->_topic = new Topic();
    }
    
    public function getUserTopics() {
        $this->answer = $this->_topic->getUserTopics($this->getReqParam('timestamp', true, 0));
    }
}
