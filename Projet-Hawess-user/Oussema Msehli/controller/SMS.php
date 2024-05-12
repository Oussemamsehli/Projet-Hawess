<?php

require_once 'C:\wamp64\www\Oussema Msehli\vendor\autoload.php';

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
            'Authorization' => 'App 755dec901d2392a37ac2777ccd741afe-3633c50e-a524-4db2-8a50-47c214616dca',
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ));
        $request->setBody('{"messages":[{"destinations":[{"to":"21628657499"}],"from":"ServiceSMS","text":"'.$msg.'"}]}');
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