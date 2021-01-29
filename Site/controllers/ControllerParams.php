<?php


/**
 * Class ControllerParams
 *
 * Controller for Parametre page.
 *
 * @author Gaetan PUPET
 * @author Marc AMBAUD
 */
class ControllerParams
{
    /**
     * @var ModelUser
     */
    private $_modelUser;
    /**
     * @var view
     */
    private $_view;

    /**
     * ControllerParams constructor.
     */
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

    /**
     * @function modifyElements
     *
     * Change the number of post in the acceuil page if asked.
     */
    private function modifyElements() {
        if(isset($_SESSION['user']['type']) && $_SESSION['user']['type'] == "SUPER_ADMIN" && isset($_POST['nbElement']))
        {
            $file = 'ressource/nbarticle';

            $file = fopen($file,"w");
            fwrite($file,$_POST['nbElement']);
            fclose($file);
        }
    }

    /**
     * @funtion Params
     *
     * Display the parametre page.
     */
    public function Params()
    {
        $this->modifyElements();
        $this->_modelUser = new ModelUser();


        $this->_view = new viewParams();

        $titre = 'Paramètre';

        $this->_view->echoHead($titre);
        $this->_view->echoHeader();
        $this->_view->echoParams();
        $this->_view->echoTail();
    }
}