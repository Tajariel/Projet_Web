<?php

/**
 * Class viewCreateUser
 *
 * Class extended from view
 * Used to display the creationAccount page
 *
 * @author Gaëtan PUPET
 */
class viewCreateUser extends view
{


    /**
     * @function echoCreateForm
     *
     * Echo the content of the Creation page
     * This page is used to create one's account, with a pseudo, an email, and a password, while accepting to our policy
     */
    public function echoCreateForm()
    {
        echo '
        <!-- Start of the center_square div, used to contain everything-->
        <div id="center_square">
            <!-- In this form, the user must enter his pseudo, an email, and twice his password, before accepting our policy, then he can create an account -->
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

        $this->customCheckBox("conditions",true); // A custom checkbox wich is nicer looking

                echo '</label></p>

            <!-- submit button -->
            <p><button class="redirection" type="submit" name="action" value="Création">Création</button></p>
            
            </form>
        </div>
        <!-- End of the center_square div -->';
    }

}

?>
