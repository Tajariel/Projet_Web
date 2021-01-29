<?php

/**
 * Class ModelUser
 *
 * Class to manage the users in the database
 *
 * @author Ugo LARSONNEUR
 */
class ModelUser extends Model
{

    /**
     * @function getUser
     *
     * Return the id, the pseudo, and the email of a user from the database with a pseudo.
     *
     * @param $pseudo
     * @return $stmt->fetch()
     */
    public function getUser($pseudo)
    {
        $querry = 'SELECT id_user, pseudo, email, type FROM user WHERE pseudo = :psd';

        $stmt = $this->getDB()->prepare($querry);

        $stmt->bindValue('psd', $pseudo, PDO::PARAM_STR);

        $stmt->execute();

        if($stmt->rowCount() == 0) return false;

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        return $stmt->fetch();
    }

    /**
     * @function checkPassword
     *
     * Return true or false if the given password correspond to the password in the database.
     *
     * @param $id
     * @param $password
     * @return bool
     */
    public function checkPassword($id, $password)
    {
        $querry = 'SELECT mdp FROM user WHERE id_user = :psd';

        $stmt = $this->getDB()->prepare($querry);

        $stmt->bindValue('psd', $id, PDO::PARAM_STR);


        $stmt->execute();

        if($stmt->rowCount() == 0) return false;

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        return password_verify($password, $stmt->fetch()['mdp']);
    }

    /**
     * @function changeParam
     *
     * Change a user's value like its pseudo, its email, or its password, if the right password is given.
     *
     * @param $id
     * @param $column
     * @param $val
     * @param $password
     */
    public function changeParam($id, $column, $val, $password)
    {
        if(!$this->checkPassword($id, $password)){
            $_SESSION['message'] = 'Mot de passe invalide.';
            $_POST['action'] = 'param';
            header('Location: index.php');
        }

        $querry = 'UPDATE user SET '.$column.' = :val WHERE id_user = '.$id;

        $stmt = $this->getDB()->prepare($querry);

        $stmt->bindValue('val', $val, PDO::PARAM_STR);

        $this->getDB()->beginTransaction();
        $stmt->execute();
        $this->getDB()->commit();
    }


    /**
     * @function createUser
     *
     * With a pseudo, an email, and a password, create a user in the database.
     *
     * @param $pseudo
     * @param $email
     * @param $password
     */
    public function createUser($pseudo, $email, $password)
    {

        $querry = 'INSERT INTO user (pseudo, email, mdp, type)  VALUES (:pseudo, :email, :password, \'MEMBER\')';
        $stmt = $this->getDB()->prepare($querry);

        $stmt->bindValue('pseudo', $pseudo, PDO::PARAM_STR);
        $stmt->bindValue('email', $email, PDO::PARAM_STR);

        $hashedPass = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bindValue('password', $hashedPass, PDO::PARAM_STR);

        $this->getDB()->beginTransaction();
        $stmt->execute();
        $this->getDB()->commit();

    }

}


?>