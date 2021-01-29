<?php

/**
 * Class ControllerAcceuil
 *
 * Controller for Acceuil page
 *
 * @author Gaetan PUPET
 * @author Manuel FURTER-ALPHAND
 * @author Ugo LARSONNEUR
 */
class ControllerAcceuil
{
    /**
     * @var ModelMessage
     */
    private $_modelMessage;
    /**
     * @var View
     */
    private $_view;

    /**
     * ControllerAcceuil constructor.
     */
    public function __construct()
    {
        $this->_modelMessage = new ModelMessage();

        if(isset($_POST['action']) && $_POST['action'] == 'changeEmoji' && isset($_SESSION['user']))
        {
                $this->_modelMessage->changeEmoji($_POST['emoji'], $_SESSION['user']['id_user'], $_POST['id_message']);
        }



        $this->Acceuil();
    }

    /**
     * @function sendPost
     *
     * send a message
     */
    private function sendPost() {
        if(isset($_POST['Envoyer']) && isset($_SESSION['user']['type']) && $_SESSION['user']['type'] == "SUPER_ADMIN")
        {
            $this->_modelMessage->sendMessage($_POST['vanessa_post']);

            header('Location:'.$_SERVER['HTTP_REFERER']);
        }

    }

    /**
     * @function Acceuil
     *
     * display visual thing
     */
    public function Acceuil()
    {


        $this->_view = new viewAcceuil($this->_modelMessage);
        $titre = 'Acceuil';
        $this->sendPost();
        $this->_view->echoHead($titre);
        $this->_view->echoHeader();
        $this->_view->echoStartPage();
        $this->_view->echoNav();
        $this->_view->echoStartMainContent();
        $this->_view->echoMessagePost();
        $this->_view->echoArticles();

        $this->_view->echoEndMainContent();
        $this->_view->echoVanessa();
        $this->_view->echoEndPage();
        $this->_view->echoTail();
    }
}