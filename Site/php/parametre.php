<html>
    <?php
    /// Include - Require
    require '../include/part.php';
    session_start();

    if(isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }

    ?>

    <?php page_head('Parametre','main.css'); ?>

    <body>
        <?php page_header();

        if (isset($_SESSION['connexion']['id_user']))
        {
            echo 'Bonjour, '.$_SESSION['connexion']['pseudo'];
        }
        ?>

        <div id="page">
            <div id="center_square">
                <form action="../include/manage_user.php" method="post">

                    <form method="post">
                        <p><label for="pseudo">Modifier le pseudo ? <input class="button" type="submit" name="action" class="soumettre" value="modif_pseudo"></label></br>
                            <input class="intext" type="text" name="pseudo" placeholder="Pseudo" required></p>
                    </form>

                    <form method="post">
                        <p><label for="email">Modifier l'E-mail ? <input class="button" type="submit" name="action" class="soumettre" value="modif_email"></label></br>
                            <input class="intext" type="text" name="email" placeholder="E-mail" required></p>
                    </form>

                    <form method="post">
                        </br>
                        <p><label for="email">Modifier le mot de passe ? <input class="button" type="submit" name="action" class="soumettre" value="modif_mdp"></label></br></p>

                        <p><label for="password">Nouveau mot de passe</label></br>
                            <input class="intext" type="password" name="password" placeholder="Mot de passe" required></p>

                        <p><label for="passwordbis">Nouveau mot de passe une seconde fois</label></br>
                            <input class="intext" type="password" name="passwordbis" placeholder="Mot de passe" required></p>
                    </form>







                    </br>
                    <p><label for="passwordbis">Ancien mot passe</label></br>
                        <input class="intext" type="password" name="oldpassword" placeholder="Mot de passe" required></p>

                    <p><input class="button" type="submit" name="action" id="soumettre" value="creation"></p>
                </form>
            </div>
        </div>
    </body>
</html>