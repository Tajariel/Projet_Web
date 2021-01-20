<?php

//VALEUR DE CONNEXION;

function get_info_conn()
{

    $info_conn = array (
        "dbHost" => 'mysql',
        "dbName" => 'simp-land_db',
        "dbLogin" => 'root',
        "dbPass" => 'mdp_root'
        );

        return $info_conn;

}
