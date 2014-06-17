<?php
/**
 * Description of User
 *
 * @author Игорь
 */
class userController extends Mobile_api {
    
    private $_social_types = array(
        1 => 'facebook_id'
      , 2 => 'twitter_id'
      , 3 => 'google_id'
    );
    private $_user;
    
    public function __construct($request = array()) {
        parent::__construct($request);
        
        require_once(ENGINE_PATH.'class/user.class.php');
        $this->_user = new User();
    }

    public function registration() {
        $ar_email = explode('@', $this->getReqParam('email'));
        $username = $ar_email[0];
        $gender = 'm';
        $this->answer = $this->_user->addNew($username, $this->getReqParam('email', false), $this->getReqParam('password', false), $gender);
    }
    
    public function login() {
        $this->answer = $this->_user->doLogin($this->getReqParam('email', false), $this->getReqParam('password', false));
    }
    
    public function socialAuth() {
        $social_id = $this->getReqParam('social_id');
        $social_type = $this->getReqParam('social_type');
        if (strlen($social_id) < 10 || !$this->validateSocialType($social_type)) {
            $this->answer['result'] = Mobile_api::RESPONSE_STATUS_ERROR;
            $this->answer['error'] = 'Wrong parameter values.';
        } else {
            $field_name = $this->_social_types[$social_type];
            $sql = 'select * from user where '.$field_name.'=:social_id limit 1';
            $res = $this->config->query($sql, array(':social_id' => $social_id));
            if ($res['result']) {
                $this->answer['result'] = Mobile_api::RESPONSE_STATUS_SUCCESS;
                $this->answer['user_id'] = $res[0]['id_user'];
                $this->answer['new'] = false;
            } else {
                $this->answer = $this->_user->addNewSocial($social_id,$field_name);
            }
         }
    }
    
    private function validateSocialType($type) {
        $type_keys = array_keys($this->_social_types);
        if (in_array($type, $type_keys)) {
            return true;
        } else {
            return false;
        }
    }
    
    public function forgotPassword() {
        $result = $this->_user->requestPassword($this->getReqParam('user_id'));
        if ($result == 'ok') {
            $this->answer['result'] = Mobile_api::RESPONSE_STATUS_SUCCESS;
        } elseif ($result == 'time') {
            $this->answer['result'] = Mobile_api::RESPONSE_STATUS_ERROR;
            $this->answer['error'] = 'try 10 minutes later';
        } else {
            $this->answer['result'] = Mobile_api::RESPONSE_STATUS_ERROR;
            $this->answer['error'] = $result;
        }
    }
}
