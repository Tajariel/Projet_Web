<?php

class viewAcceuil extends view{

private $_messages;


    public function __construct($messages) {

            $this->_messages = $messages;
    }

    public function getContenu()
    {
        foreach ($this->_messages as $message) {
            echo $message->getContenu();
        }
    }

}
