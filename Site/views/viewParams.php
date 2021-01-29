<?php

class viewParams extends view
{
    public function modifyElements() {
        if(isset($_SESSION['user']['type']) && $_SESSION['user']['type'] == "SUPER_ADMIN" && isset($_POST['nbElement']))
        {
            $file = 'ressource/nbarticle';

            $file = fopen($file,"w");
            fwrite($file,$_POST['nbElement']);
            fclose($file);
        }
    }

    public function echoParams()
    {

        echo '
        <div id="page">
            <div id="center_square">
                <form method="post">
                    <p><label for="pseudo">Pseudo : '.$_SESSION['user']['pseudo'].' | <input class="button" type="submit" name="action" value="pseudo"></label></br>
                        <input class="intext" type="text" name="new_pseudo" placeholder="Changer le pseudo"></p>
    
                    <p><label for="email">E-mail : '.$_SESSION['user']['email'].' | <input class="button" type="submit" name="action" value="email"></label></br>
                        <input class="intext" type="text" name="new_email" placeholder="E-mail"></p>
                        
                    <br/>
                    <h2>Changer votre mot de passe ?  <input class="button" type="submit" name="change_password" value="modifier"></h2>
                    <p><label for="password">Nouveau mot de passe</label></br>
                        <input class="intext" type="password" name="new_password" placeholder="Mot de passe"></p>
    
                    <p><label for="passwordbis">Rentrez votre nouveau mot de passe une seconde fois</label></br>
                        <input class="intext" type="password" name="new_passwordbis" placeholder="Mot de passe"></p>
                    
                    <br/>
                    <p><label for="passwordbis">Mot de passe actuel :</label></br>
                        <input class="intext" type="password" name="old_password" placeholder="Mot de passe" required></p>
                </form>';

        if(isset($_SESSION['user']['type']) && $_SESSION['user']['type'] == "SUPER_ADMIN")
            echo '
            <form method="post">
                <p><label for="passwordbis">Changer nombre de message à l\'écran :<input class="intext" type="text" name="nbElement" placeholder="Nombre d\'éléments"><button class="button" type="submit" name="action" value="Paramètre">Submit</button></label></p>
            </form>
            
        ';

        echo '
                
            </div>
        </div>';
    }
}

?>