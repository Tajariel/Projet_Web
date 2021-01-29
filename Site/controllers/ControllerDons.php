<?php


class ControllerDons
{

    private $_view;

    public function __contruct()
    {
        $this->Dons();
    }

    private function Dons()
    {
        $this->_view = new viewDons();
        $titre = 'Dons';

        $this->_view->echoHead($titre);
        $this->_view->echoHeader();
        $this->_view->echoPaypal();
        $this->_view->echoTail();
    }
}