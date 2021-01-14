<?php

    session_start();

    $dbLink = mysqli_connect('localhost' , 'root')
    or die('Erreur dans la connexion a mysqli : '. mysqli_error($dbLink));

    mysqli_select_db($dbLink , 'simp-land_db')
    or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink));

    $query = 'SELECT * FROM user WHERE pseudo = \''.$_POST['pseudo'].'\' AND mdp = \''.$_POST['mdp'].'\'';

    if(!($dbResult = mysqli_query($dbLink, $query))) {
        echo 'Erreur dans requête<br />';
        // Affiche le type d'erreur.
        echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
        // Affiche la requête envoyée.
        echo 'Requête : ' . $query . '<br/>';
        exit();
    } elseif (mysqli_num_rows($dbResult) > 0){

        $_SESSION['suid'] = session_id();
        $_SESSION['pseudo'] = $_POST['pseudo'];
        header('Location: acceuil.php');
    }
    else {
        $_SESSION['mauvais_id'] = true;
        header('Location: connexion.php');
    }

?>