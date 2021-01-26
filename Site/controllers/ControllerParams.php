<?php


class ControllerParams
{
    private $_modelUser;
    private $_view;

    public function __construct()
    {
        $this->Params();
    }

    public function Params()
    {
        $this->_modelUser = new ModelUser();

        $titre = 'Paramètre';

        $this->_view->echoHead($titre);
        $this->_view->echoHeader();
        $this->_view->echoParams();
        $this->_view->echoTail();
    }
}