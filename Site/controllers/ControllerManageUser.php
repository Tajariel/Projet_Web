<?php

class ControllerAcceuil
{
    private $_modelUser;
    private $_viewCreateUser;

    public function AccountCreation()
    {
        $this->_modelUser = new ModelUser();

        $this->_view = new viewCreateUser();
        $this->_view->echoHead();
        $this->_view->echoHeader();
        $this->_view->echoCreateForm();
        $this->_view->echoTail();
    }

    public function deconnection(){
        unset($_SESSION['user']);
    }

    public function connection($pseudo, $password){

        try {

            $result = $this->_modelUser(getUser($pseudo));

            if ($result && password_verify($password, $result->getMdp())) {
                $_SESSION['user'] = new User($result);

            } else {
                $_SESSION['message'] = 'Mauvais identifiants';
            }
        } catch (Exception $e) {
            $_SESSION['message'] = 'Erreur : '. $e->getMessage(). PHP_EOL;
            header('Location: ../php/acceuil.php');
            return;
        }

    }

    public function creation($pseudo, $email, $password, $passwordbis){
        try {

            if ($password != $passwordbis) {
                $_SESSION['message'] = 'Les mot de passe ne correspondent pas';
                header('Location: ../php/create_user.php');
                return;
            }

            if (getUser($_POST['pseudo'])->rowCount() != 0) {
                $_SESSION['message'] = 'Pseudo déjà utilisé';
                header('Location: ../php/create_user.php');
                return;
            }

            $this->_modelUser->createUser($pseudo, $email, $password);

        } catch (Exception $e) {
            $_SESSION['message'] = 'Erreur : '. $e->getMessage(). PHP_EOL;
            header('Location: ../php/create_user.php');
            return;
        }

        header('Location: ../php/acceuil.php');
    }
}

if($_POST['action'] == 'deconnexion'){
    unset( $_SESSION['connexion']);
    header('Location: ../php/acceuil.php');
}


elseif ($_POST['action'] == 'connexion'){

}


elseif ($_POST['action'] == 'creation'){


}

else
{
    echo 'Action non traitée';
}

?>