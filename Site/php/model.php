<?php

require '../include/config.php';

function createPDO()
{
    $info_conn = get_info_conn();

// CONNEXION A LA BASE
    return connectDb($info_conn['dbHost'],$info_conn['dbName'], $info_conn['dbLogin'], $info_conn['dbPass'],true);
}

function connectDb($dbHost,$dbName, $dbLogin, $dbPass, $persist = false)
{
    try{
        // Connexion à la base de données.
        $dsn = 'mysql:host='.$dbHost.';dbname='.$dbName;


        if($persist = false)
        {
            $pdo = new PDO($dsn, $dbLogin,$dbPass);
        }
        else
        {
            $pdo = new PDO($dsn, $dbLogin,$dbPass,array(PDO::ATTR_PERSISTENT => true));
        }


        // Codage de caractères.
        $pdo->exec('SET CHARACTER SET utf8');

        // Gestion des erreurs sous forme d'exceptions.
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    catch(PDOException$e)
    {
        // Affichage de l'erreur.
        die('Erreur: ' . $e->getMessage());
    }

}

function closeDb($pdo)
{
    $pdo = null;
}

function getUser($pseudo)
{
    $pdo = createPDO();

    $sql = 'SELECT id_user, pseudo, email, mdp, type FROM user WHERE pseudo = :psd';

    $stmt = $pdo->prepare($sql);

    $stmt->bindValue('psd', $pseudo, PDO::PARAM_STR);


    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt;
}

function createUser($pseudo, $email, $password)
{
    $pdo = createPDO();

    $sql = 'INSERT INTO user (pseudo, email, mdp, type)  VALUES (:pseudo, :email, :password, \'MEMBER\')';
    $stmt = $pdo->prepare($sql);

    $stmt->bindValue('pseudo', $pseudo, PDO::PARAM_STR);
    $stmt->bindValue('email', $email, PDO::PARAM_STR);
    $hashedPass = password_hash($password, PASSWORD_DEFAULT);
    $stmt->bindValue('password', $hashedPass, PDO::PARAM_STR);

    $pdo->beginTransaction();
    $stmt->execute();
    $pdo->commit();
}

function get2Messages($id = NULL)
{
    $pdo = createPDO();

    $sql = 'SELECT contenu, photo FROM message WHERE id_Message >= :id LIMIT = 2';

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue('id', $id);
    $stmt->execute();

    return $stmt;
}

?>