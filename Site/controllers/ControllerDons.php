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
    }
}