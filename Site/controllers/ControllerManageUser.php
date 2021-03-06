<?php

/**
 * Class ControllerManageUser
 *
 * Controller for user action.
 * @author Ugo LARSONNEUR
 * @author Manuel FURTER-ALPHAND
 *
 *
 */
class ControllerManageUser
{
    /**
     * @var ModelUser
     */
    private $_modelUser;


    /**
     * ControllerManageUser constructor.
     */
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

    /**
     * @function AccountCreationPage
     *
     * Display the account creation page.
     */
    public function AccountCreationPage()
    {

        $this->_view = new viewCreateUser();
        $this->_view->echoHead('Création de compte');
        $this->_view->echoHeader();
        $this->_view->echoStartPage();
        $this->_view->echoCreateForm();
        $this->_view->echoEndPage();
        $this->_view->echoTail();
    }

    /**
     * @function connetion
     *
     * Initiate the user connection.
     * @param $pseudo
     * @param $password
     */
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

    /**
     * @function creation
     *
     * Initiate the account creation.
     *
     * @param $pseudo
     * @param $email
     * @param $password
     * @param $passwordbis
     */
    public function creation($pseudo, $email, $password, $passwordbis){
        try {


            if ($password != $passwordbis) {
                $_SESSION['message'] = 'Les mot de passe ne correspondent pas';

                $_POST['action'] = 'Création de compte';
                header('Location: /');
                return;
            }

            if ($this->_modelUser->getUser($pseudo)) {
                $_SESSION['message'] = 'Pseudo déjà utilisé';

                $_POST['action'] = 'Création de compte';
                header('Location: /');
                return;
            }

            $this->_modelUser->createUser($pseudo, $email, $password);

        } catch (Exception $e) {

            $_SESSION['message'] = 'Erreur : '. $e->getMessage(). PHP_EOL;
            $_POST['action'] = 'Création de compte';
            header('Location: /');
            return;
        }
        $_POST['action'] = 'acceuil';
        header('Location: /');
    }
}

?>