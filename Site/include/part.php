<?php

function page_head($titre,$css) {
    echo '
        <head>
            <title>'.$titre.'</title>
            <link rel="stylesheet" type="text/css" href="../css/'.$css.'">
            <meta charset="UTF-8"/>
        </head>
        ';
}

function page_header() {
    echo '
            <header>
                <div class="left">
                    <div id="logo_site">
                        <a id="logo" href="../php/acceuil.php"><img  src="../resource/logo.png" alt="Logo"></a>
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

    if(!isset($_SESSION['connexion']['id_user']))  // si déconnec
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
                          <form  action="../include/manage_user.php" method="post" >
                            <input class="button" type="submit" name="action" id="déconnecter" value="deconnexion">
                          </form>
                          
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
?>