<?php


abstract class view
{
    public function echoHead($title)
    {
        echo '<!DOCTYPE html>
<html>
    <head>
        <title>'.$title.'</title>
        <link rel="stylesheet" type="text/css" href="views/main.css">
        <meta charset="UTF-8"/>
    </head>
    <body>';
    }

    public function echoHeader()
    {
        echo '    
        <header>
            <div class="left">
                <div id="logo_site">
                    <a href="viewAcceuil.php"><img id="logo" src="ressource/logo.png" alt="Logo"></a>
                </div>
                <div id="dons">
                    <a href="dons.php"><button class="button">Dons</button></a>
                </div>
                <div id="search">
                    <input type="text" id="search_bar" name="search_bar" placeholder="Rechercher un tag">
                    <button class="button">Rechercher</button>
                </div>
            </div>
            <div class="right">
                <div id="connect">';
        if(!isset($_SESSION['user'])) // si déconnecté
        {
            echo '
                    <form action="../include/manage_user.php" method="post">
                        <input class="intext" type="text" id="pseudo" name="pseudo" placeholder="Pseudo" required>
                        <input class="intext" type="password" id="password" name="password" placeholder="Mot de passe" required>
                        <input class="button" type="submit" name="action" id="connecter" value="connexion">
                    </form>
                    <a href="views/viewCreateUser.php"><button class="button">Créer un compte</button></a>
        ';
        }
        else
        {
            echo '
                    <a href="views/viewParametre.php"><button class="button">Parametre</button></a>
                    <label>$_SESSION[\'user\']</label>
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

    public function echoStartPage() {
        echo '
            <div id="page">
        ';
    }

    public function echoEndPage() {
        echo '
            </div>
        ';
    }
}