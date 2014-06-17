<?php
/**
 * Description of User
 *
 * @author Игорь
 */
class profileController extends Mobile_api {

    private $_profile;
    
    public function __construct($request = array()) {
        parent::__construct($request);
        $this->getReqParam('user_id');
        
        require_once(ENGINE_PATH.'class/profile.class.php');
        $this->_profile = new Profile();
    }
    
    public function getProfile() {
        $this->answer = $this->_profile->getById($this->getReqParam('user_id'));
    }
}
