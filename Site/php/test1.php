<?php
require '../include/dtb.php';
require '../include/config.php';
session_start();

//VALEUR DE CONNEXION;

$info_conn = get_info_conn();

// CONNEXION A LA BASE
$pdo = connectDb($info_conn['dbHost'],$info_conn['dbName'], $info_conn['dbLogin'], $info_conn['dbPass'],true);
?>