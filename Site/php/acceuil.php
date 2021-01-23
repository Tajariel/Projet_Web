<html>
    <?php
    /// Include - Require
    require '../include/part.php';
    session_start();

    if(isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }

?>

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
</html>