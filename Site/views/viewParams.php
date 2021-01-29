<?php


/**
 * Class viewParams
 *
 * Class extended from view
 * Used to display the Parametre page
 *
 * @author Gaëtan PUPET
 * @author Marc AMBAUD
 */
class viewParams extends view
{


    /**
     * @function echoParams
     *
     * Echo the content of the parametre page
     * This page is used to change a user's information, like his pseudo, his email, or his password
     * If the user is a super_admin, he can also change how much message will be displayed on the acceuil page
     */
    public function echoParams()
    {

        echo '
            <!-- Start of the center_square div, used to contain everything-->
            <div id="center_square">
                <!-- In this form, the user can choose wich information he wishes to change, but must enter his password to do so -->
                <form method="post">
                    <!-- Where the user can enter his new pseudo -->
                    <p><label for="pseudo">Pseudo : '.$_SESSION['user']['pseudo'].' | <input class="button" type="submit" name="action" value="pseudo"></label></br>
                        <input class="intext" type="text" name="new_pseudo" placeholder="Changer le pseudo"></p>
    
                    <!-- Where the user can enter his new email -->
                    <p><label for="email">E-mail : '.$_SESSION['user']['email'].' | <input class="button" type="submit" name="action" value="email"></label></br>
                        <input class="intext" type="text" name="new_email" placeholder="E-mail"></p>
                        
                    <!-- Where the user can enter his new password, and twice to be sure -->
                    <br/>
                    <h2>Changer votre mot de passe ?  <input class="button" type="submit" name="change_password" value="modifier"></h2>
                    <p><label for="password">Nouveau mot de passe</label></br>
                        <input class="intext" type="password" name="new_password" placeholder="Mot de passe"></p>
    
                    <p><label for="passwordbis">Rentrez votre nouveau mot de passe une seconde fois</label></br>
                        <input class="intext" type="password" name="new_passwordbis" placeholder="Mot de passe"></p>
                    
                    
                    <!-- Where the user must enter his actual password -->
                    <br/>
                    <p><label for="passwordbis">Mot de passe actuel :</label></br>
                        <input class="intext" type="password" name="old_password" placeholder="Mot de passe" required></p>
                </form>';


        // If the user is a super_admin, display a textbox so that he can change the number of message on the acceuil page
        if(isset($_SESSION['user']['type']) && $_SESSION['user']['type'] == "SUPER_ADMIN")
            echo '
            <form method="post">
                <p><label for="passwordbis">Changer nombre de message à l\'écran :<input class="intext" type="text" name="nbElement" placeholder="Nombre d\'éléments"><button class="button" type="submit" name="action" value="Paramètre">Submit</button></label></p>
            </form>
            
        ';

        echo '
                
            </div>
            <!-- End of the center_square div -->';
    }
}

?>