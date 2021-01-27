<?php

session_start();
include_once 'controllers/Router.php';

if (!isset($_POST['redirection'])) {
    $router = new Router();
}
//echo $_POST['action'];
//echo $_POST['pseudo'];
//echo $_POST['password'];

$router->routeReq();





?>