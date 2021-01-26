<?php


abstract class view
{
    public function echoHead()
    {
        echo '<!DOCTYPE html>
<html>
    <head>
        <title>VANESTARRE</title>
        <link rel="stylesheet" type="text/css" href="views/main.css">
        <meta charset="UTF-8"/>
    </head>
    <body>';
    }

    public function echoHeader()
    {
        echo '    
    <header>
        <div class="right">
            <div id="logo_site">
                <img id="logo" src="../resource/logo.png" alt="Logo">
            </div>
            <div id="dons">
                <a href="dons.php"><button class="button">Dons</button></a>
            </div>
            <div id="search">
                <input type="text" id="search_bar" name="search_bar" placeholder="Rechercher un tag">
                <button class="button">Rechercher</button>
            </div>
        </div>
        <div class="left">
            <div id="connect">';
        if(isset($_SESSION['user'])) // si déconnecté
    {
        echo '
            <form action="../include/manage_user.php" method="post">
                            <input class="intext" type="text" id="pseudo" name="pseudo" placeholder="Pseudo" required>
                            <input class="intext" type="password" id="password" name="password" placeholder="Mot de passe" required>
                            <input class="button" type="submit" name="action" id="connecter" value="connexion">
                        </form>
                        <a href="../php/create_user.php"><button class="button">Créer un compte</button></a>
    ';
    }
    else
    {
        echo '
                        <a href="parametre.php"><button class="button">Parametre</button></a>
                        <label>Pseudo</label>
                        <button class="button">Se déconnecter</button>
    ';
    }
    echo '
                    </div>
                </div>
        
        
            </header>
    ';
    }


    public function echoTail()
    {
        echo '
    </body>
</html>';

    }
}