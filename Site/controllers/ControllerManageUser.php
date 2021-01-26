<?php

class ControllerManageUser
{
    private $_modelUser;
    private $_viewCreateUser;

    public function __construct()
    {

        $this ->_modelUser = new ModelUser();

        if($_POST['action'] == 'deconnexion'){
            unset( $_SESSION['connexion']);

            $_POST['redirection'] = 'acceuil';
            header('Location: ../controllers/Routeur.php');
        }

        elseif ($_POST['action'] == 'connexion'){
            $this->connection($_POST['pseudo'],$_POST['password']);
        }

        elseif ($_POST['action'] == 'creation'){
            $this->creation($_POST['pseudo'],$_POST['password'], $_POST['passwordbis']);
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
        $this->_view->echoHead();
        $this->_view->echoHeader();
        $this->_view->echoCreateForm();
        $this->_view->echoTail();
    }

    public function connection($pseudo, $password){

        try {

            $result = $this->_modelUser->getUser($pseudo);

            if ($result && $this->_modelUser->checkPassword()) {
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

    public function creation($pseudo, $email, $password, $passwordbis){
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

            $this->_modelUser->createUser($pseudo, $email, $password);

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

?>