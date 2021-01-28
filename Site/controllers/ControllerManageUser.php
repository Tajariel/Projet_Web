<?php

class ControllerManageUser
{
    private $_modelUser;
    private $_viewCreateUser;

    public function __construct()
    {

        $this ->_modelUser = new ModelUser();

        if($_POST['action'] == 'Déconnexion'){
            unset($_SESSION['user']);

            $_POST['action'] = 'acceuil';
            header('Location: /');
        }

        elseif ($_POST['action'] == 'Connexion'){
            $this->connection($_POST['pseudo'],$_POST['password']);
        }

        elseif ($_POST['action'] == 'Création'){
            $this->creation($_POST['pseudo'],$_POST['email'],$_POST['password'], $_POST['passwordbis']);
        }
        elseif ($_POST['action'] == 'Création de compte'){
            $this->AccountCreationPage();
        }

        else
        {
            echo 'Action non traitée';
        }
    }

    public function AccountCreationPage()
    {

        $this->_view = new viewCreateUser();
        $this->_view->echoHead('Creation de compte');
        $this->_view->echoHeader();
        $this->_view->echoCreateForm();
        $this->_view->echoTail();
    }

    public function connection($pseudo, $password){

        try {

            $result = $this->_modelUser->getUser($pseudo);

            if ($result && $this->_modelUser->checkPassword($result['id_user'], $password)) {
                $_SESSION['user'] = $result;

            } else {
                $_SESSION['message'] = 'Mauvais identifiants';
            }
        } catch (Exception $e) {
            $_SESSION['message'] = 'Erreur : '. $e->getMessage(). PHP_EOL;

            $_POST['action'] = 'acceuil';
            header('Location: index.php');
            return;
        }

        $_POST['action'] = 'acceuil';
        header('Location: index.php');

    }

    public function creation($pseudo, $email, $password, $passwordbis){
        try {

            if ($password != $passwordbis) {
                $_SESSION['message'] = 'Les mot de passe ne correspondent pas';

                $_POST['action'] = 'creation';
                header('Location: /');
                return;
            }

            if ($this->_modelUser->getUser($pseudo)) {
                $_SESSION['message'] = 'Pseudo déjà utilisé';

                $_POST['action'] = 'creation';
                header('Location: /');
                return;
            }

            $this->_modelUser->createUser($pseudo, $email, $password);

        } catch (Exception $e) {
            $_SESSION['message'] = 'Erreur : '. $e->getMessage(). PHP_EOL;
            $_POST['action'] = 'creation';
            header('Location: /');
            return;
        }
        $_POST['action'] = 'acceuil';
        header('Location: /');
    }
}

?>