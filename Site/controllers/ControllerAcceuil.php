<?php

class ControllerAcceuil
{
    private $_modelMessage;
    private $_view;

    public function __construct()
    {

        if($_POST['action'] == 'emoji')
        {
                $this->_modelMessage->changeEmoji($_POST['emoji'], $_POST['user']['id_user'], $_POST['id_message']);
        }

        $this->Acceuil();
    }

   public function Acceuil()
    {
        $this->_modelMessage = new ModelMessage();

        $this->_view = new viewAcceuil($this->_modelMessage);
        $titre = 'Acceuil';
        $this->_view->echoHead($titre);
        $this->_view->echoHeader();
        $this->_view->echoStartPage();
        $this->_view->echoNav();
        $this->_view->echoStartMainContent();
        echo $_SESSION['user']['type'];
        $this->_view->echoMessagePost();
        $this->_view->echoArticles();

        $this->_view->echoEndMainContent();
        $this->_view->echoVanessa();
        $this->_view->echoEndPage();
        $this->_view->echoTail();
    }
}