<?php

session_start();

include_once 'controllers/Router.php';


    $router = new Router();


//unset($_SESSION['user']);

$router->routeReq();

?>