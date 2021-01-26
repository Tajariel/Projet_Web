<?php

include_once '../models/ModelUser.php';

class ControllerManageUser
{
    private static $_modelUser;
    private static $_viewCreateUser;


    public static function init()
    {
        self::$_modelUser = new ModelUser();
    }

    public function AccountCreation()
    {
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

            $result = self::$_modelUser->getUser($pseudo);

            if ($result && password_verify($password, self::$_modelUser->getHashedPassword($result->getIdUser()))) {
                $_SESSION['user'] = new User($result);

            } else {
                $_SESSION['message'] = 'Mauvais identifiants';
            }
        } catch (Exception $e) {
            $_SESSION['message'] = 'Erreur : '. $e->getMessage(). PHP_EOL;

            $_POST['redirection'] = 'acceuil';
            header('Location: ../controllers/Routeur.php');
            return;
        }

        $_POST['acceuil'];
        header('Location: ../controllers/Routeur.php');

    }

    public static function creation($pseudo, $email, $password, $passwordbis){
        try {

            if ($password != $passwordbis) {
                $_SESSION['message'] = 'Les mot de passe ne correspondent pas';

                $_POST['redirection'] = 'creation';
                header('Location: ../controllers/Routeur.php');
                return;
            }

            if (getUser($_POST['pseudo'])->rowCount() != 0) {
                $_SESSION['message'] = 'Pseudo déjà utilisé';

                $_POST['redirection'] = 'creation';
                header('Location: ../controllers/Routeur.php');
                return;
            }

            self::$_modelUser->createUser($pseudo, $email, $password);

        } catch (Exception $e) {
            $_SESSION['message'] = 'Erreur : '. $e->getMessage(). PHP_EOL;
            $_POST['redirection'] = 'creation';
            header('Location: ../controllers/Routeur.php');
            return;
        }
        $_POST['redirection'] = 'acceuil';
        header('Location: ../controllers/Routeur.php');
    }
}

ControllerManageUser::init();

if($_POST['action'] == 'deconnexion'){
    unset( $_SESSION['connexion']);

    $_POST['redirection'] = 'acceuil';
    header('Location: ../controllers/Routeur.php');
}


elseif ($_POST['action'] == 'connexion'){
    ControllerManageUser::connection($_POST['pseudo'],$_POST['password']);
}


elseif ($_POST['action'] == 'creation'){
    ControllerManageUser::creation($_POST['pseudo'],$_POST['password'], $_POST['passwordbis']);

}

else
{
    echo 'Action non traitée';
}

?>