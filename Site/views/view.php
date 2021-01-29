<?php

/**
 * Class view
 *
 * Abstract class that all views will inherit
 * Has function common to all views
 *
 * @author Gaëtan PUPET
 * @author Manuel FURTER-ALPHAND
 */
abstract class view
{
    /**
     * @function echoHead
     *
     * Echo the head of an html page
     * Setup the stylesheet, the title, the icon and the charset
     *
     * @param $title
     */
    public function echoHead($title)
    {
        echo '<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>'.$title.'</title>
        <link rel="stylesheet" type="text/css" href="views/main.css">
        <link rel="icon" type="image/png" href="ressource/logo.png"/>
        <meta charset="UTF-8"/>
    </head>
    <body>';
    }

    /**
     * @function echoHeader
     *
     * Echo the header of an html page
     * Display the banner of the page, allowing the user to connect, create an acount, acces his parameters, or disconnect.
     */
    public function echoHeader()
    {
        echo '
            <!-- Start of the header -->
            <header>
            
                <!-- Start of the left side of the banner -->
                <div class="left">
                    <div id="logo_site">
                        <form class="redirect" method="post">
                            <button class="redirection" type="submit" name="action" value="acceuil"><img id="logo" src="ressource/logo.png" alt="Logo"></button>
                        </form>
                    </div>
                    <div id="dons">
                        <form class="redirect" method="post"><button class="button" type="submit" name="action" value="Dons">Dons</button></form>
                    </div>
                    <div id="search">
                        <input type="text" id="search_bar" name="search_bar" placeholder="Rechercher un tag">
                        <button class="button">Rechercher</button>
                    </div>
                    
                </div>
                <!-- End of the left side of the banner -->
                
                <div>
                    <h1>VANESTARRE</h1>
                </div>
                
                <!-- Start of the right side of the banner -->
                <div class="right">
                    <!-- Start of the div reserved for the user account -->
                    <div id="connect">';

        // Check if the user is connected, if not, then create a space so he can do so, if yes, create a space to acces his parameters or a button to disconnect
        if(!isset($_SESSION['user'])) // if user is not connected
        {
            echo '
                        <!-- Entry field for a pseudo and a password, and a button to confirm the connexion -->
                        <form method="post">
                            <input class="intext" type="text" id="pseudo" name="pseudo" placeholder="Pseudo" required>
                            <input class="intext" type="password" id="password" name="password" placeholder="Mot de passe" required>
                            <input class="button" type="submit" name="action" id="connecter" value="Connexion">
                        </form>
                        
                        <!-- Button to go to the creation page -->
                        <form method="post"><input class="button" type="submit" name="action" value="Création de compte"></form>
            ';
        }
        else // if user is connected
        {
            echo '
                        <!-- Shows the user s name, and two button, one to go to the parameter page, the other to disconnect -->
                        <label>Bonjour, '.$_SESSION['user']['pseudo'].'</label>
                        <form method="post"><button class="button" type="submit" name="action" value="Paramètre">Paramètre</button></form>
                        <form method="post"><input class="button" type="submit" name="action" value="Déconnexion"></form>
            ';
        }
        echo '
                    </div>
                    <!-- End of the div reserved for the user account -->
                </div>
                <!-- End of the left side of the banner -->
        
            </header>
            <!-- End of the header -->
        ';
    }

    /**
     * @function customCheckBox
     *
     * Echo a custom checkbox
     * You can specify the name of it, and with $bool, if it's required or not
     *
     * @param $name
     * @param $bool
     */
    function customCheckBox($name,$bool) {
        echo '
            <label class="container"><input class="incheck" type="checkbox" name="'.$name.'" ';

        if($bool)
            echo 'required';

        echo '>
            <span class="checkmark"></span></label>
        ';
    }


    /**
     * @function echoTail
     *
     * Close the page
     */
    public function echoTail()
    {
        echo '
            </body>
        </html>';

    }

    /**
     * @function echoStartPage
     *
     * Start the main container of every page
     */
    public function echoStartPage()
    {
        echo '
            <div id="page">
        ';
    }


    /**
     * @function echoEndPage
     *
     * End the main container of every page
     */
    public function echoEndPage()
    {
        
        echo '
            </div>
        ';
    }
}

?>