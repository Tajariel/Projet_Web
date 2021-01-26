<?php

class ControllerAcceuil
{
    private static $_modelUser;
    private static $_viewCreateUser;

    public function AccountCreation()
    {
        self::$_modelUser = new ModelUser();
        $this->_viewCreateUser = new viewCreateUser();

        $this->_view = new viewCreateUser();
        $this->_view->echoHead();
        $this->_view->echoHeader();
        $this->_view->echoCreateForm();
        $this->_view->echoTail();
    }

    public static function deconnection(){
        unset($_SESSION['user']);
    }

    public static function connection($pseudo, $password){

        try {

            $result = self::_modelUser(getUser($pseudo));

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

    public static function creation($pseudo, $email, $password, $passwordbis){
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

            self::$_modelUser->createUser($pseudo, $email, $password);

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
    ControllerAcceuil::connection($_POST['pseudo'],$_POST['password']);
}


elseif ($_POST['action'] == 'creation'){
    ControllerAcceuil::creation($_POST['pseudo'],$_POST['password'], $_POST['passwordbis']);

}

else
{
    echo 'Action non traitée';
}

?>