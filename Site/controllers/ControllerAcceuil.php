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
        $messages = $this->_modelMessage->getMessage();
        $this->_view = new viewAcceuil($messages);
        $this->_view->echoHead();
        $this->_view->page_header();
        $this->_view->getContenu();
    }
}