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
    protected $_gender = array(
        1 => 'm'
      , 2 => 'f'
    );
    private $_user;
    
    public function __construct($request = array()) {
        parent::__construct($request);
        
        require_once(ENGINE_PATH.'class/user.class.php');
        $this->_user = new User();
    }

    public function registration() {
        $ar_email = explode('@', $this->getReqParam('email', false));
        $username = $ar_email[0];
        $gender = $this->getReqParam('gender', false);
        $gender = $this->rangeValidator($gender, 'gender');
        $this->answer = $this->_user->addNew($username, $this->getReqParam('email', false), $this->getReqParam('password', false), $gender);
    }
    
    public function login() {
        $this->answer = $this->_user->doLogin($this->getReqParam('email', false), $this->getReqParam('password', false));
    }
    
    public function socialAuth() {
        $social_id = $this->getReqParam('social_id', false);
        $social_type = $this->getReqParam('social_type');
        $gender = $this->getReqParam('gender', false);
        $gender = $this->rangeValidator($gender, 'gender');
        if (strlen($social_id) < 10) {
            $this->answer['result'] = Mobile_api::RESPONSE_STATUS_ERROR;
            $this->answer['error'] = 'Wrong social_id parameter value.';
        } elseif (!$this->validateSocialType($social_type)) {
            $this->answer['result'] = Mobile_api::RESPONSE_STATUS_ERROR;
            $this->answer['error'] = 'Wrong social_type parameter value.';
        } else {
            $field_name = $this->_social_types[$social_type];
            $sql = 'select * from user where '.$field_name.'=:social_id limit 1';
            $res = $this->config->query($sql, array(':social_id' => $social_id));
            if ($res['result']) {
                $this->answer['result'] = Mobile_api::RESPONSE_STATUS_SUCCESS;
                $this->answer['user_id'] = $res[0]['id_user'];
                $this->answer['new'] = false;
            } else {
                $this->answer = $this->_user->addNewSocial($social_id, $field_name, $gender);
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
        $user_result = $this->_user->getByEmail($this->getReqParam('email', false));
        if ($user_result['result']) {
            $result = $this->_user->requestPassword($user_result[0]['id_user']);
            if ($result == 'ok') {
                $this->answer['result'] = Mobile_api::RESPONSE_STATUS_SUCCESS;
            } elseif ($result == 'time') {
                $this->answer['result'] = Mobile_api::RESPONSE_STATUS_ERROR;
                $this->answer['error'] = 'Try 10 minutes later, please.';
            } else {
                $this->answer['result'] = Mobile_api::RESPONSE_STATUS_ERROR;
                $this->answer['error'] = 'Error password recovery.';
            }
        } else {
            $this->answer['result'] = Mobile_api::RESPONSE_STATUS_ERROR;
            $this->answer['error'] = 'User with this email doesn`t exist.';
        }
         
    }
}
