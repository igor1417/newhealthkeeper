<?php
/**
 * Description of Mobile_api
 *
 * @author Игорь
 */
class Mobile_api {
    
    const RESPONSE_STATUS_SUCCESS = true;
    const RESPONSE_STATUS_ERROR = false;

    protected $answer = array();

    protected $config;
    protected $user_id = 0;
    protected $request = array();

    public function __construct($request = array()) {
        $this->request = $request;
        define('USER_ID', $this->getReqParam('user_id', true, 0));
        $this->config = new Config();
    }
    
    public function jsonOut() {
        $answer = $this->answer;
        if (is_array($answer)) {
            if (count($answer) == 0) {
                $answer['result'] = self::RESPONSE_STATUS_ERROR;
                $answer['error'] = 'Invalid request.';
            } else {
                if (array_key_exists('result', $answer)) {
                    if ($answer['result'] === 0) {
                        $answer['result'] = self::RESPONSE_STATUS_ERROR;
                        if (!array_key_exists('error', $answer)) {
                            $answer['error'] = 'There is an error in response to the request or an empty response.';
                        }
                    } elseif (is_int($answer['result'])) {
                        $answer['result'] = self::RESPONSE_STATUS_SUCCESS;
                    }
                } else {
                    $answer['result'] = self::RESPONSE_STATUS_ERROR;
                    $answer['error'] = 'There is an error in response to the request.';
                }
            }
        }
        echo json_encode($answer);
        exit;
    }

    protected function getReqParam($param_name, $is_int = true, $default = null) {
        if (isset($this->request[$param_name]) && is_string($this->request[$param_name])) {
            $param = trim($this->request[$param_name]);
            if ($is_int) {
                $param = (int)$param;
                if ($param > 0) {
                    return $param;
                }
            } else {
                if (strlen($param) > 0) {
                    return $param;
                }
            }
        } elseif (!is_null($default)) {
            if ($is_int) {
                return (int)$default;
            } else {
                return $default;
            }
        }
        $this->answer['result'] = Mobile_api::RESPONSE_STATUS_ERROR;
        $error_part = $is_int ? ' integer and' : '';
        $this->answer['error'] = 'Parameter '.$param_name.' is'.$error_part.' requered';
        $this->jsonOut();
    }
}
