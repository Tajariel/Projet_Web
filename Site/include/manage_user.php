<?php
require '../include/base.php';
    session_start();

    //VALEUR DE CONNEXION;
        $dbHost = 'localhost';
        $dbName = 'simp-land_db';
        $dbLogin = 'root';
        $dbPass = '';


    // CONNEXION A LA BASE
        $pdo = connectDb($dbHost,$dbName, $dbLogin, $dbPass,true);

    //ACTION DECONNEXION
        if($_POST['action'] == 'deconnexion'){
            unset( $_SESSION['connexion']);
            header('Location: ../php/acceuil.php');
        }

    //ACTION CONNEXION
        elseif($_POST['action'] == 'connexion') {


            $sql = 'SELECT id_user, pseudo, email, type FROM user WHERE pseudo = :psd AND mdp = :psswd';

            $stmt = $pdo->prepare($sql);

            $stmt->bindValue('psd', $_POST['pseudo'], PDO::PARAM_STR);
            $stmt->bindValue('psswd', $_POST['password'], PDO::PARAM_STR);

            try {
                $stmt->execute();

                $stmt->setFetchMode(PDO::FETCH_ASSOC);

                if ($stmt->rowCount() == 1) {
                    $result = $stmt->fetch();
                    $_SESSION['connexion'] = $result;
                    header('Location: ../php/acceuil.php');
                } else {
                    $_SESSION['message'] = 'Mauvais identifiants';
                    header('Location: ../php/acceuil.php');
                }

            } catch (PDOException $e) {
                $_SESSION['message'] = 'Erreur : '. $e->getMessage(). PHP_EOL;
                $_SESSION['message'] = $_SESSION['message'] .'Requête : '. $sql;
                header('Location: ../php/acceuil.php');
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
                    $stmt->bindValue('password', $_POST['password'], PDO::PARAM_STR);

                    $pdo->beginTransaction();
                    $stmt->execute();
                    $pdo->commit();

                }
                catch (Exception $e) {
                    $pdo->rollBack();
                    $_SESSION['message'] = "Failed: " . $e->getMessage();
                    header('Location: ../php/create_user.php');
                }

                header('Location: ../php/acceuil.php');
            }
        else
        {
            echo 'Action non traitée';
        }
?>