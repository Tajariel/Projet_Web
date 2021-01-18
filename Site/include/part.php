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
                <div class="right">
                    <div id="logo_site">
                        <img src="../source/temporary.png" alt="Logo">
                    </div>
                    <div id="dons">
                        <a href="dons.php"><button>Dons</button></a>
                    </div>
                    <div id="search">
                        <input type="text" id="search_bar" name="search_bar" placeholder="Rechercher un tag">
                        <button>rechercher</button>
                    </div>
                </div>
                <div class="left">
                    <div id="connect">';

        if(true) // si déconnecter
        {
            echo '
                        <form action="../php/pass_verify.php" method="post">
                            <input class="intext" type="text" id="pseudo" name="pseudo" placeholder="Pseudo" required>
                            <input class="intext" type="password" id="password" name="password" placeholder="Mot de passe" required>
                            <input type="submit" name="action" id="connecter" value="connexion">
                        </form>
                        <a href="../php/create_user.php"><button>Créer un compte</button></a>
            ';
        }
        else
        {
            echo '
                        <a href="parametre.php"><button>Parametre</button></a>
                        <label>Pseudo</label>
                        <button>Se déconnecter</button>
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