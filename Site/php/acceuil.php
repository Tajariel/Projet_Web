<?php
    /// Include - Require
    require '../include/part.php';
    session_start();

    var_dump($_SESSION);
    echo '<h1>Acceuil</h1></br>';

    if(!isset($_SESSION['connexion']['id_user'])){
        echo 'Pas connecté </br>';
        echo '<form action="connexion.php" method="post"><input type="submit" name="action" value="connexion"/></form>';
    } else {
        echo 'Bonjour, '. $_SESSION['connexion']['pseudo'].'</br>';
        echo '<form action="../include/manage_user.php" method="post"><input type="submit" name ="action" value="deconnexion"/></form>';
    }

    if(isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
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

                <?php
                if (isset($_SESSION['connexion']['id_user']) && $_SESSION['connexion']['type'] == 'SUPER_ADMIN')
                {
                    echo '<form action= "../include/message.php" method="post"><input type="submit" name ="action" value="Send"/></form>';
                }
                ?>


            </article>
        </section>

        <div id="vanessa">
            <p>Vanessa</p>
        </div>
    </div>



</body>
