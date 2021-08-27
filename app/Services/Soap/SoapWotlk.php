<?php


namespace App\Services\Soap;

use SoapClient;
use SoapFault;
use SoapParam;

class SoapWotlk
{

    private $messages = array();
    private $soap;

    public function __construct() {
        try {
            $this -> connect();
        }
        catch (\Exception $e) {
            $this->addMessage($e->getMessage());
        }
    }

    public function connect() {
        try {
            $this->soap = new SoapClient(NULL, array(
                'location' => 'http://185.71.65.236:7878/',
                'uri' => 'urn:TC',
                'style' => SOAP_RPC,
                'login' => 'dont4u',
                'password' => '8jw6X4CG0',
                'trace' => true,
                'keep_alive' => true,
                'connection_timeout' => 5000,
                'cache_wsdl' => WSDL_CACHE_NONE,
                'compression'   => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE,

            ));
        }
        catch (SoapFault $e) {
            $this->addMessage($e->getMessage());
        }
    }

    public function cmd($command) {
        $result = $this->soap->executeCommand(new SoapParam($command, 'command'));
        $this->addMessage($result);
    }

    public function addMessage($message) {
        $this->messages[] = $message;
    }

    public function getMessages() {
        return $this->messages;
    }
}
