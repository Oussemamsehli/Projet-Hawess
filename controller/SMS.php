<?php

require_once 'C:\xampp\htdocs\Oussema Msehli\vendor\autoload.php';

class Sms{
    public function __construct(){

    }
    
    public function sendSms($msg){
        $request = new HTTP_Request2();
        $request->setUrl('https://n89252.api.infobip.com/sms/2/text/advanced');
        $request->setMethod(HTTP_Request2::METHOD_POST);
        $request->setConfig(array(
            'follow_redirects' => TRUE
        ));
        $request->setHeader(array(
            'Authorization' => 'App adac923e648a46110102aa7a42ce72ae-d0ace92f-0d09-4529-a0fc-05a0a2dbbea1',
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ));
        $request->setBody('{"messages":[{"destinations":[{"to":"21696726127"}],"from":"ServiceSMS","text":"'.$msg.'"}]}');
        try {
            $response = $request->send();
            if ($response->getStatus() == 200) {
                echo $response->getBody();
            }
            else {
                echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
                $response->getReasonPhrase();
            }
        }
        catch(HTTP_Request2_Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
?>