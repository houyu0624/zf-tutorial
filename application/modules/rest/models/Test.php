<?php

class Rest_Model_Test
{
    /**
     * Write to a file
     *
     * @param string $string
     * @return string Some return message
     */

    public function sayHello($name)
    {
        $message = 'Hello '.$name;
        return $message;
    }
}
