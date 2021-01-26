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

        $this->Acceuil();
    }

   public function Acceuil()
    {
        $this->_modelMessage = new ModelMessage();
        $messages = $this->_modelMessage->get2Messages(1);

        $this->_view = new viewAcceuil($messages);
        $this->_view->echoHead('Acceuil');
        $this->_view->echoHeader();
        $this->_view->getContenu();
        $this->_view->echoTail();
    }
}