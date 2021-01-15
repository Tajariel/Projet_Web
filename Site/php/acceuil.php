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
