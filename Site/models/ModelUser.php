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
        $sql = 'SELECT id_user, pseudo, email, mdp, type FROM user WHERE pseudo = :psd';

        $stmt = self::$_db->prepare($sql);

        $stmt->bindValue('psd', $pseudo, PDO::PARAM_STR);

        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        return $stmt;
    }

    public function createUser($pseudo, $email, $password)
    {

        $sql = 'INSERT INTO user (pseudo, email, mdp, type)  VALUES (:pseudo, :email, :password, \'MEMBER\')';
        $stmt = self::$_db->prepare($sql);

        $stmt->bindValue('pseudo', $pseudo, PDO::PARAM_STR);
        $stmt->bindValue('email', $email, PDO::PARAM_STR);
        $hashedPass = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bindValue('password', $hashedPass, PDO::PARAM_STR);

        self::$_db->beginTransaction();
        $stmt->execute();
        self::$_db->commit();
    }


}