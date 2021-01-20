<?php
    session_start();

    if(isset($_SESSION['connexion']['id_user'])){
        unset($_SESSION['connexion']['id_user']);
        unset($_SESSION['connexion']['pseudo']);
        header('Location: acceuil.php');
    } elseif (isset($_SESSION['erreur'])){
        echo $_SESSION['erreur'];
        unset ($_SESSION['erreur']);
    }
?>

<form action="manage_user.php" method="post">
    Pseudo: <input type="text" name="pseudo"><br>
    Mot de Passe :<input type="password" name="password"><br>
    <input type="submit" name ="action" value="connexion">
</form>