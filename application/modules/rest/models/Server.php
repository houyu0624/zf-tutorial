<?php

class Rest_Model_Server
{
    public function getInfo()
    {
        $server = new Zend_Rest_Server();
        $server->setClass('Rest_Model_Test');
        $server->handle();

        exit;
    }
}
