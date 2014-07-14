<?php
class Notification extends Base {

    private $config_Class;

    private $user_id_array = array();

    function __construct()
    {
        $this->config_Class=new Config();

    }

    public function pushNotification($device_token, $type_notification) {

        if(!isset($device_token)) {
            return 'Device token is empty';
        }
        if(!isset($type_notification)) {
            return 'Type notification is empty';
        }
        // Adjust to your timezone
        date_default_timezone_set('Europe/Kiev');

        // Report all PHP errors
        error_reporting(-1);

        // Using Autoload all classes are loaded on-demand
        require_once ENGINE_PATH.'class/ApnsPHP/Autoload.php';

        // Instantiate a new ApnsPHP_Push object
        $push = new ApnsPHP_Push(
            ApnsPHP_Abstract::ENVIRONMENT_SANDBOX,
            ENGINE_PATH.'class/ApnsPHP/certificates/server_certificates_bundle_sandbox.pem'
        );

        // Set the Provider Certificate passphrase
        //$push->setProviderCertificatePassphrase('test');

        // Set the Root Certificate Autority to verify the Apple remote peer
        $push->setRootCertificationAuthority(ENGINE_PATH.'class/ApnsPHP/certificates/entrust_root_certification_authority.pem');

        // Connect to the Apple Push Notification Service
        $push->connect();

        // Instantiate a new Message with a single recipient
        //$message = new ApnsPHP_Message('2fa889482a24b5cf4601b674c8eb9feb4eabab9f81b007fd0fda9be02d3dc6a4');
        $message = new ApnsPHP_Message($device_token);

        // Set a custom identifier. To get back this identifier use the getCustomIdentifier() method
        // over a ApnsPHP_Message object retrieved with the getErrors() message.
        //$message->setCustomIdentifier("Message-Badge-3");

        // Set badge icon to "3"
        //$message->setBadge(3);

        // Set a simple welcome text
        $message->setText('You have new message!');

        // Play the default sound
        $message->setSound();

        // Set a custom property
        $message->setCustomProperty('type', $type_notification);

        // Set another custom property
        //$message->setCustomProperty('acme3', array('bing', 'bong'));

        // Set the expiry value to 30 seconds
        $message->setExpiry(30);

        // Add the message to the message queue
        $push->add($message);

        // Send all messages in the message queue
        $push->send();

        // Disconnect from the Apple Push Notification Service
        $push->disconnect();

        // Examine the error message container
        $aErrorQueue = $push->getErrors();
/*        if (!empty($aErrorQueue)) {
            var_dump($aErrorQueue);
        }*/

        /*return $aErrorQueue;*/
    }
}