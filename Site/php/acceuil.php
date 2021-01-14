<?php

    session_start();

    echo '<h1>Acceuil</h1></br>';

    if(!isset($_SESSION['suid'])){
        echo 'pas connecté </br>';
        echo '<a href="connexion.php"><button type="button"> connexion</button></a>';
    } else {
        echo 'Bonjour, '. $_SESSION['pseudo'].'</br>';
        echo '<button type="button"> <a href="pass_verify.php">deconnexion</a></button>';
    }


?>

<head>
    <title>Vannestar</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <meta charset="UTF-8"/>
</head>
<body>

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
            <div id="connect">
                <input type="text" id="pseudo" name="pseudo" placeholder="Pseudo">
                <input type="text" id="password" name="password" placeholder="Mot de passe">
                <button>Se connecter</button>
                <a href="create_user.php"><button>Créer un compte</button></a>
                || OU ||
                <a href="parametre.php"><button>Parametre</button></a>
                <label>Pseudo</label>
                <button>Se déconnecter</button>
            </div>
        </div>


    </header>

    <div id="page">
        <nav>
            <p>#swag</p>
        </nav>

        <section id="main_content">
            <article>
                <p>Aujourd'hui j'ai swaggé</p>
            </article>
        </section>

        <div id="vanessa">
            <p>Vanessa</p>
        </div>
    </div>



</body>
