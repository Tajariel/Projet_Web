<?php

class ModelUser extends Model
{

    public function getUsers()
    {
        $this->getDB();
        return $this->getAll('user', 'User');
    }

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

    public function checkPassword($id, $password)
    {
        $querry = 'SELECT mdp FROM user WHERE id_user = :psd';

        $stmt = self::$_db->prepare($querry);

        $stmt->bindValue('psd', $id, PDO::PARAM_STR);

        $stmt->execute();

        if($stmt->rowCount() == 0) return false;

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        return password_verify($password, $stmt->fetch()['mdp']);
    }



    public function createUser($pseudo, $email, $password)
    {
        $querry = 'INSERT INTO user (pseudo, email, mdp, type)  VALUES (:pseudo, :email, :password, \'MEMBER\')';
        $stmt = self::$_db->prepare($querry);

        $stmt->bindValue('pseudo', $pseudo, PDO::PARAM_STR);
        $stmt->bindValue('email', $email, PDO::PARAM_STR);
        $hashedPass = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bindValue('password', $hashedPass, PDO::PARAM_STR);

        self::$_db->beginTransaction();
        $stmt->execute();
        self::$_db->commit();
    }

}


?>