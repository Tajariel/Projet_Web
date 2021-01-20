<html>
    <?php
    /// Include - Require
    require '../include/part.php';
    ?>

    <?php page_head('Vannestarre','main.css'); ?>
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
</html>