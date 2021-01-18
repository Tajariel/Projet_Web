<?php

    session_start();

    $dbLink = mysqli_connect('localhost' , 'root')
    or die('Erreur dans la connexion a mysqli : '. mysqli_error($dbLink));

    mysqli_select_db($dbLink , 'simp-land_db')
    or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink));



    if($_POST['action'] == 'deconnexion'){
        unset( $_SESSION['suid']);
        unset( $_SESSION['pseudo']);
        header('Location: acceuil.php');
    }
    elseif($_POST['action'] == 'connexion'){

        $query = 'SELECT * FROM user WHERE pseudo = \''.$_POST['pseudo'].'\' AND mdp = \''.$_POST['password'].'\'';

        if(! $dbResult = mysqli_query($dbLink, $query)) {
            $_SESSION['message'] = 'Erreur : ' . mysqli_error($dbLink);
            header('Location: acceuil.php');
            return;
        }

        elseif (mysqli_num_rows($dbResult) > 0){

            $_SESSION['suid'] = session_id();
            $_SESSION['pseudo'] = $_POST['pseudo'];
            header('Location: acceuil.php');
            return;
        }
        else {
            $_SESSION['message'] = 'Mauvais identifiants';
            header('Location: acceuil.php');
            return;
        }
    }
    elseif ($_POST['action'] == 'creation'){

        if($_POST['password'] != $_POST['passwordbis']){
            $_SESSION['message'] = 'Les mot de passe ne correspondent pas';
            header('Location: create_user.php');
            return;
        }

        //TODO: vérif si email valide

        $query = 'SELECT * FROM user WHERE pseudo = \''.$_POST['pseudo'].'\'';

        if(!($dbResult = mysqli_query($dbLink, $query))) {
            $_SESSION['message'] = 'Erreur : ' . mysqli_error($dbLink);
            header('Location: create_user.php');
            return;
        }

        if(mysqli_num_rows($dbResult) != 0){
            $_SESSION['message'] = 'Pseudo déjà utilisé';
            header('Location: create_user.php');
            return;
        }

        $query = 'INSERT INTO user (pseudo, email, mdp, role)
                  VALUES (\''.$_POST['pseudo'].'\', \''.$_POST['email'].'\', \''.$_POST['password'].'\', \'MEMBER\')';

        if(!mysqli_query($dbLink, $query)) {
            $_SESSION['message'] = 'Erreur : ' . $query;
            header('Location: create_user.php');
            return;
        }

        header('Location: acceuil.php');
    } else {
        echo 'Action non traitée';
    }
?>