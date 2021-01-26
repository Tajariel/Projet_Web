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


        $this->_modelMessage = new ModelMessage();
        $this->messages();
    }

   public function messages()
    {
        $messages = $this->_modelMessage->getMessage();
        $this->_view = new viewAcceuil($messages);
        $this->_view->echo_content();
    }
}