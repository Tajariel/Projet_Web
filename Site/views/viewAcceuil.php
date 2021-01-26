<?php

class viewAcceuil{

private $_message;


    public function __construct($message) {

            $this->_message = $message;
    }

    public function echo_content()
    {
        foreach ($this->_message as $_message) {
            echo $_message->getContenu();
        }
    }


}
