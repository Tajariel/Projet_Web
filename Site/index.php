<?php


include_once 'controllers/Router.php';

if (!isset($_POST['redirection']))
{
    $router = new Router();
}

$router->routeReq();





?>