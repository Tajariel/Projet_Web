<?php


/**
 * Class ControllerDons
 *
 * Controller for the Dons page.
 *
 * @author Manuel FURTER-ALPHAND
 */
class ControllerDons
{

    /**
     * @var view
     */
    private $_view;

    /**
     * ControllerDons constructor.
     */
    public function __contruct()
    {
        $this->Dons();
    }

    /**
     * @function Dons
     *
     * Display the Dons page.
     */
    private function Dons()
    {
        $this->_view = new viewDons();
        $titre = 'Dons';

        $this->_view->echoHead($titre);
        $this->_view->echoHeader();
        $this->_view->echoStartPage();
        $this->_view->echoPaypal();
        $this->_view->echoEndPage();
        $this->_view->echoTail();
    }
}