<?php

session_start();

include_once 'controllers/Router.php';

if (!isset($_POST['action'])) {
    $router = new Router();
}



$router->routeReq();

?>