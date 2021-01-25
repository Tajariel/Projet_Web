<?php
session_start();
require '../include/part.php';


    if(isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }

?>
    <html>
    <?php page_head('Vannestarre','main.css'); ?>
    <body>

    <?php page_header();

    if (isset($_SESSION['connexion']['id_user']))
    {
        echo 'Bonjour, '.$_SESSION['connexion']['pseudo'];
    }
    ?>

        <div id="page">

            <nav>
                <p>#swag</p>
            </nav>

            <section id="main_content">
                <article>

                    <?php
                    if (isset($_SESSION['connexion']['id_user']) && $_SESSION['connexion']['type'] == 'SUPER_ADMIN')
                    {
                        echo '
                            <form action="../include/message.php" method="post">
                            <input class="intext" type="text" id="tag" name="tag" placeholder="β...">
                            <input class="intext" type="text" id="msg" name="msg" placeholder="Je suis trop swagée..." required>
                            <input class="button" type="submit" name="action" id="envoi" value="Envoyer">
                        </form>';

                    }
                    ?>



                </article>
            </section>

            <div id="vanessa">
                <p>Vanessa</p>
            </div>
        </div>

    </body>
</html>