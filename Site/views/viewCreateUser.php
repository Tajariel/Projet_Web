<?php

class viewCreateUser extends view
{


    public function echoCreateForm()
    {

        echo '
    <div id="page">
        <div id="center_square">
            <form method="post">
                <p><label for="pseudo">Pseudo</label></br>
                    <input class="intext" type="text" name="pseudo" placeholder="Pseudo" required></p>

                <p><label for="email">E-mail</label></br>
                    <input class="intext" type="text" name="email" placeholder="E-mail" required></p>

                <p><label for="password">Mot de passe</label></br>
                    <input class="intext" type="password" name="password" placeholder="Mot de passe" required></p>

                <p><label for="passwordbis">Rentrez votre mot de passe une seconde fois</label></br>
                    <input class="intext" type="password" name="passwordbis" placeholder="Mot de passe" required></p>
                <p><label for="conditions">Acceptez les conditions d\'utilisations :';

        $this->customCheckBox("conditions",true);

                echo '</label></p>

            <p><input class="button" type="submit" name="action" id="soumettre" value="creation"></p>
            </form>
        </div>
    </div>';
    }

}

?>
