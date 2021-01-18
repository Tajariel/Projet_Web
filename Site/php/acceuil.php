<?php

    session_start();

    echo '<h1>Acceuil</h1></br>';

    if(!isset($_SESSION['suid'])){
        echo 'pas connecté </br>';
        echo '<form action="connexion.php" method="post"><input type="submit" name="action" value="connexion"/></form>';
    } else {
        echo 'Bonjour, '. $_SESSION['pseudo'].'</br>';
        echo '<form action="manage_user.php" method="post"><input type="submit" name ="action" value="deconnexion"/></form>';
    }

    if(isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
?>

<?php
    /// Include - Require
    require '../include/part.php';
?>

<?php page_head('Vannestar','main.css'); ?>

<body>

    <?php page_header(); ?>

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
