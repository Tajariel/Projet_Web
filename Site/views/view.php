<?php


abstract class view
{
    public function echoHead()
    {
        echo '
                <head>
                    <title>VANESTARRE</title>
                    <link rel="stylesheet" type="text/css" href="../css/">
                    <meta charset="UTF-8"/>
                 </head>
                ';
    }

    public function page_header()
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

    }
}