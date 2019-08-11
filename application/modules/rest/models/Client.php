<?php

class Rest_Model_Client
{
    public function getInfo()
    {
        $client = new Zend_Rest_Client('http://www.canadayu.com/index/rests');

        $result = $client->sayHello('Davey')->get();

        if ($result->isSuccess()) {
            echo $result; // "Hello Davey, Good Day"
        }
    }

    public function getInfoXml() {
        $client = new Zend_Rest_Client('http://www.canadayu.com');

        $options['method'] = 'sayHello';
        $options['argument'] = 'Davey';
        $response = $client->restGet('/index/rests', $options);

        echo htmlspecialchars($response->getBody());
    }
}
