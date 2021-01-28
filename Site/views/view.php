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
                        <form class="redirect" method="post">
                            <button class="redirection" type="submit" name="action" value="create"><img id="logo" src="ressource/logo.png" alt="Logo"></button>
                        </form>
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

        if(!isset($_SESSION['user']))
        {
            echo '
                        <form method="post">
                            <input class="intext" type="text" id="pseudo" name="pseudo" placeholder="Pseudo" required>
                            <input class="intext" type="password" id="password" name="password" placeholder="Mot de passe" required>
                            <input class="button" type="submit" name="action" id="connecter" value="Connexion">
                        </form>
                        <form method="post"><input class="button" type="submit" name="action" value="Création de compte"></form>
            ';
        }
        else
        {
            echo '
                        <form method="post"><button class="button" type="submit" name="action" value="parametre">Parametre</button></form>
                        <label>'.$_SESSION['user']['pseudo'].'</label>
                        <form method="post"><input class="button" type="submit" name="action" value="Déconnexion"></form>
            ';
        }
        echo '
                    </div>
                </div>
        
        
            </header>
        ';
    }

    function customCheckBox($name,$bool) {
        echo '
            <label class="container"><input class="incheck" type="checkbox" name="'.$name.'" ';

        if($bool)
            echo 'required';

        echo '>
            <span class="checkmark"></span></label>
        ';
    }


    public function echoTail()
    {
        echo '
            </body>
        </html>';

    }

    public function echoStartPage()
    {
        echo '
            <div id="page">
        ';
    }

    public function echoEndPage()
    {
        echo '
            </div>
        ';
    }
}

?>