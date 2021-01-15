<?php

    function connectDb($dsHost, $dbLogin, $dbPass)
    {
        $dbLink = mysqli_connect($dsHost, $dbLogin, $dbPass)
        or die('Erreur dans la sélection de la base : '.mysqli_connect_error());

        return $dbLink;
    }

    function selectDb($dbLink, $dbBd)
    {
        mysqli_select_db($dbLink, $dbBd)
        or die('Erreur lors de la sélection de la base :'.mysqli_error($dbLink));
    }

    function queryDb($dbLink, $query)
    {
        if(!($dbResult = mysqli_query($dbLink, $query))) {
            echo 'Erreur de requête<br/>'; // Affiche le type d'erreur. echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>'; // Affiche la requête envoyée.
            echo 'Requête : ' . $query . '<br/>';
            exit();
        }

        return $dbResult;
    }

    function fetchResult($dbResult)
    {
        return mysqli_fetch_assoc($dbResult);
    }



    ?>