<?php
    session_start();

    if(isset($_SESSION['suid'])){
        unset($_SESSION['suid']);
        unset($_SESSION['pseudo']);
        header('Location: acceuil.php');
    } elseif (isset($_SESSION['mauvais_id']) && $_SESSION['mauvais_id']){
        echo 'mauvais identifiants';
        $_SESSION['mauvais_id'] = false;
    }
?>

<form action="manage_user.php" method="post">
    Pseudo: <input type="text" name="pseudo"><br>
    Mot de Passe :<input type="mdp" name="mdp" "><br>
    <input type="submit" name ="action" value="Connexion">
</form>