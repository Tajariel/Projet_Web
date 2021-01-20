<?php
require '../include/base.php';
require '../include/config.php';
session_start();

    //VALEUR DE CONNEXION;

        $info_conn = get_info_conn();

    // CONNEXION A LA BASE
        $pdo = connectDb($info_conn['dbHost'],$info_conn['dbName'], $info_conn['dbLogin'], $info_conn['dbPass'],true);

    //ACTION DECONNEXION
        if($_POST['action'] == 'deconnexion'){
            unset( $_SESSION['connexion']);
            header('Location: ../php/acceuil.php');
        }

    //ACTION CONNEXION
        elseif($_POST['action'] == 'connexion') {

            $sql = 'SELECT id_user, pseudo, email, mdp type FROM user WHERE pseudo = :psd';

            $stmt = $pdo->prepare($sql);

            $stmt->bindValue('psd', $_POST['pseudo'], PDO::PARAM_STR);

            try {
                $stmt->execute();

                $stmt->setFetchMode(PDO::FETCH_ASSOC);

                if ($stmt->rowCount() == 1 && password_verify($_POST['password'], $stmt->fetch()['mdp'])) {

                    $result = $stmt->fetch();
                    unset($result['password']);
                    $_SESSION['connexion'] = $result;
                } else {
                    $_SESSION['message'] = 'Mauvais identifiants';
                }

            } catch (PDOException $e) {
                $_SESSION['message'] = 'Erreur : '. $e->getMessage(). PHP_EOL;
                $_SESSION['message'] = $_SESSION['message'] .'Requête : '. $sql;
            }

            header('Location: ../php/acceuil.php');
        }

    //ACTION CREATION DE COMPTE
        elseif ($_POST['action'] == 'creation'){
                try
                {
                    $sql = 'SELECT pseudo FROM user WHERE pseudo = :pseudo';
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindValue('pseudo', $_POST['pseudo'], PDO::PARAM_STR);
                    $stmt->execute();
                    $stmt->setFetchMode(PDO::FETCH_ASSOC);
                }
                catch(Exception $e)
                {
                    $_SESSION['message'] = 'Erreur : '. $e->getMessage(). PHP_EOL;
                    $_SESSION['message'] = $_SESSION['message'] . 'Requête : '. $sql;
                    header('Location: ../php/create_user.php');
                    return;
                }

                if($_POST['password'] != $_POST['passwordbis'])
                {
                    $_SESSION['message'] = 'Les mot de passe ne correspondent pas';
                    header('Location: ../php/create_user.php');
                    return;
                }

                if ($stmt->rowCount() != 0)
                {
                    $_SESSION['message'] = 'Pseudo déjà utilisé';
                    header('Location: ../php/create_user.php');
                    return;
                }

                try
                {
                    $sql = 'INSERT INTO user (pseudo, email, mdp, type) 
                            VALUES (:pseudo, :email, :password, \'MEMBER\')';
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindValue('pseudo', $_POST['pseudo'], PDO::PARAM_STR);
                    $stmt->bindValue('email', $_POST['email'], PDO::PARAM_STR);
                    $stmt->bindValue('password', password_hash($_POST['password'], PASSWORD_DEFAULT), PDO::PARAM_STR);

                    //a supprimer
                    $_SESSION['message'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

                    $pdo->beginTransaction();
                    $stmt->execute();
                    $pdo->commit();

                }
                catch (Exception $e) {
                    $pdo->rollBack();
                    $_SESSION['message'] = "Failed: " . $e->getMessage();
                    header('Location: ../php/create_user.php');
                    return;
                }

                header('Location: ../php/acceuil.php');
            }
        else
        {
            echo 'Action non traitée';
        }
?>