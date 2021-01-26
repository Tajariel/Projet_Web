<?php

define ('URL', str_replace("index.php","",(isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));
require_once ('controllers/Router.php');

$router= new Router();
$router->routeReq();

    echo'<h1>Bonj</h1>';
    echo'<a href="php/acceuil.php">Page d\'acceuil</a></br>
    <a href="php/connexion.php">Page de connexion</a></br>
    <a href="php/create_user.php">Page de création de compte</a></br>
    <a href="php/test1.php">Test</a></br>
    ';
?>