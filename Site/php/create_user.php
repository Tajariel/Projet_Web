<?php
    /// Include - Require
    require '../include/part.php';
?>

<?php
    session_start();
    page_head('Se connecter','main.css');
?>


<body>
    <?php page_header();
    if(isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
    ?>

    <div id="center_square">
        <form action="../include/manage_user.php" method="post">
            <p><label for="pseudo">Pseudo :</label></br>
                <input type="text" name="pseudo" placeholder="Pseudo" required></p>

            <p><label for="email">E-mail :</label></br>
                <input type="text" name="email" placeholder="E-mail" required></p>

            <p><label for="password">Mot de passe :</label></br>
                <input type="password" name="password" placeholder="Mot de passe" required></p>

            <p><label for="passwordbis">Rentrez votre mot de passe une seconde fois :</label></br>
                <input type="password" name="passwordbis" placeholder="Mot de passe" required></p>

            <p><label for="conditions">Acceptez les conditions d'utilisations : </label><input type="checkbox" name="conditions" required></p>

            <p><input type="submit" name="action" id="soumettre" value="creation"></p>
        </form>
    </div>
</body>

