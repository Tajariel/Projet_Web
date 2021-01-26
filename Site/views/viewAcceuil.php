<?php

class viewAcceuil extends view{

private $_messages;


    public function __construct($messages) {

            $this->_messages = $messages;
    }

    public function echoContenu()
    {

        foreach ($this->_messages as $message) {
            echo $message->getContenu();
            echo $message->getContenu();
            echo $message->getContenu();
        }
    }

}
