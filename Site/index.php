<?php

session_start();

include_once 'controllers/Router.php';

if (!isset($_POST['action'])) {
    $router = new Router();
}

//unset($_SESSION['user']);

$router->routeReq();

?>