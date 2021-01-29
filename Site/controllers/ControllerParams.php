<?php


class ControllerParams
{
    private $_modelUser;
    private $_view;

    public function __construct()
    {
        $this->_modelUser = new ModelUser();
        switch ($_POST['action']){
            case 'Paramètre':
                $this->Params();
                break;
            case 'pseudo':
                $this->_modelUser->changeParam($_SESSION['user']['id_user'],'pseudo',$_POST['new_pseudo'],$_POST['old_password']);
                $_SESSION['user']['pseudo'] = $_POST['new_pseudo'];
                $this->Params();
                break;
            case 'email':
                $this->_modelUser->changeParam($_SESSION['user']['id_user'],'email',$_POST['new_email'],$_POST['old_password']);
                $_SESSION['user']['email'] = $_POST['new_email'];
                $this->Params();
                break;
        }
    }

    public function Params()
    {
        $this->_modelUser = new ModelUser();


        $this->_view = new viewParams();

        $this->_view->modifyElements();

        $titre = 'Paramètre';

        $this->_view->echoHead($titre);
        $this->_view->echoHeader();
        $this->_view->echoParams();
        $this->_view->echoTail();
    }
}