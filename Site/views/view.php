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
                        <img id="logo" src="ressource/logo.png" alt="Logo">
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

        if(true) // si déconnecter
        {
            echo '
                        <form action="../controllers/Router.php" method="post">
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

    function customCheckBox($name,$bool) {
        echo '
            <label class="container"><input class="incheck" type="checkbox" name="'.$name.'" ';

        if($bool==true)
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