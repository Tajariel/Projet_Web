<?php
include_once 'controllers/ControllerAcceuil.php';

class Router{

    private $_ctrl;

    public function routeReq()
    {

        try{
            //CHARGEMENT AUTOMATIQUE DES CLASSES
            spl_autoload_register(function ($class_name) {
                echo $class_name . ' ' .PHP_EOL;
                echo 'view/'.$class_name .'.php'.PHP_EOL;
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




            if(isset($_POST['redirection']))
            {


                switch ($_POST['redirection']) {
                    case 'acceuil':
                        $this->_ctrl = new ControllerAcceuil();
                        break;
                    case 'connexion':
                        $this->_ctrl = new ControllerAcceuil();
                        break;
                    case 'deconnexion':
                        $this->_ctrl = new ControllerAcceuil();
                        break;


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