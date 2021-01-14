<?php

    session_start();

    echo '<h1>Acceuil</h1></br>';

    if(!isset($_SESSION['suid'])){
        echo 'pas connecté </br>';
        echo '<button type="button"> <a href="connexion.php">connexion</a></button>';
    } else {
        echo 'Bonjour, '. $_SESSION['pseudo'].'</br>';
        echo '<button type="button"> <a href="pass_verify.php">deconnexion</a></button>';
    }


?>