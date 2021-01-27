<?php

class viewParams extends view
{


    public function echoParams()
    {

        echo '
        <div id="page">
            <div id="center_square">
                <form action="" method="post">
                    <p><label for="pseudo">Pseudo : '.$_SESSION['user']['pseudo'].' | <input class="button" type="submit" name="change_pseudo" value="modifier"></label></br>
                        <input class="intext" type="text" name="pseudo" placeholder="Changer le pseudo"></p>
    
                    <p><label for="email">E-mail : '.$_SESSION['user']['email'].' | <input class="button" type="submit" name="change_email" value="modifier"></label></br>
                        <input class="intext" type="text" name="email" placeholder="E-mail"></p>
                        
                    <br/>
                    <h2>Changer votre mot de passe ?  <input class="button" type="submit" name="change_password" value="modifier"></h2>
                    <p><label for="password">Nouveau mot de passe</label></br>
                        <input class="intext" type="password" name="password" placeholder="Mot de passe"></p>
    
                    <p><label for="passwordbis">Rentrez votre nouveau mot de passe une seconde fois</label></br>
                        <input class="intext" type="password" name="passwordbis" placeholder="Mot de passe"></p>
                    
                    <br/>
                    <p><label for="passwordbis">Mot de passe actuel :</label></br>
                        <input class="intext" type="password" name="passwordold" placeholder="Mot de passe" required></p>
    
                <p></p>
                </form>
            </div>
        </div>';
    }
}

?>