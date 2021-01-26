<?php
class Router{
    private $_ctrl;
    private $_view;

    public function routeReq()
    {

       try{
           //CHARGEMENT AUTOMATIQUE DES CLASSES
           spl_autoload_register(function ($class_name) {
               if(file_exists('models/'.$class_name .'.php'))
                   include 'models/'.$class_name .'.php';

               else
               {
                   if(file_exists('views/'.$class_name .'.php'))
                       include 'views/'.$class_name .'.php';

               }

           });

           $url = '';
            // CONTROLLER INCLU SELON ACTION DE USER

           if(isset($_GET['url']))
           {

               $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));

               $controller = ucfirst(strtolower($url[0]));
               $controllerClass = "Controller" . $controller;
               $controllerFile = "Controllers/" . $controllerClass . '.php';

               if (file_exists($controllerFile))
               {
                   require_once($controllerFile);
                   $this->_ctrl = new $controllerClass($url);
               }
               else
                   throw  new Exception('Page introuvable');
           }
           else
               {

               require_once ('controllers/ControllerAcceuil.php');
               $this->_ctrl = new ControllerAcceuil($url);


           }
       }
       //GESTION DES ERREURS
       catch (Exception $e)
       {
        $errorMsg = $e->getMessage();
            require_once ('views/viewError.php');
       }
    }
}