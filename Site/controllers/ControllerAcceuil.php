<?php

class ControllerAcceuil
{
    private $_modelMessage;
    private $_view;

    public function __construct($url)
    {

        if (isset($url) /*&& count($url) > 1*/ && 1 == 0)
            throw new Exception('Page introuvable');
        else



        $this->messages();
    }

    private function messages()
    {

        $this->_modelMessage = new ModelMessage;
        $messages = $this->_modelMessage->getMessage();

        require_once('views/viewAcceuil.php');
    }
}