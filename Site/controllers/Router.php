<?php
include_once 'ControllerAcceuil.php';

class Router{

    private $_ctrl;

    public function routeReq()
    {

        try{
            //CHARGEMENT AUTOMATIQUE DES CLASSES
            spl_autoload_register(function ($class_name) {

                if(file_exists('models/'.$class_name .'.php'))
                {
                    include_once 'models/' . $class_name . '.php';
                }
                else if (file_exists('views/'.$class_name .'.php'))
                {

                    include_once 'views/'.$class_name .'.php';

                }
                else
                {
                    include_once 'controllers/'.$class_name .'.php';
                }

            });



            if(isset($_POST['action']))
            {


                switch ($_POST['action']) {
                    case 'acceuil':
                        $this->_ctrl = new ControllerAcceuil();
                        break;
                    case 'connexion':

                        $this->_ctrl = new ControllerManageUser();
                        break;
                    case 'deconnexion':
                        $this->_ctrl = new ControllerManageUser();
                        break;
                    case 'creationPage':
                        $this->_ctrl = new ControllerAcceuil();
                        break;
                    default:
                        $this->_ctrl = new ControllerAcceuil();

                }
            }
            else
            {
                $this->_ctrl = new ControllerAcceuil();
            }
        }
            //GESTION DES ERREURS
        catch (Exception $e)
        {
            echo 'Exception reçue : ',  $e->getMessage(), "\n";

        }
    }
}