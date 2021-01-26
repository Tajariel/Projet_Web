<?php

class ControllerAcceuil
{
    private $_modelMessage;
    private $_view;

    public function __construct()
    {


        $this->Acceuil();
    }

   public function Acceuil()
    {
        $this->_modelMessage = new ModelMessage();
        $messages = $this->_modelMessage->getMessage();

        $this->_view = new viewAcceuil($messages);
        $titre = 'Acceuil';
        $this->_view->echoHead($titre);
        $this->_view->echoHeader();
        $this->_view->echoStartPage();
        $this->_view->echoNav();
        $this->_view->echoStartMainContent();

        $this->_view->echoArticles();

        $this->_view->echoEndMainContent();
        $this->_view->echoVanessa();
        $this->_view->echoEndPage();
        $this->_view->echoTail();
    }
}