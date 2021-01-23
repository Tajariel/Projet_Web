<?php

require '../php/model.php';

session_start();

    //ACTION DECONNEXION
        if($_POST['action'] == 'deconnexion'){
            unset( $_SESSION['connexion']);
            header('Location: ../php/acceuil.php');
        }



        //ACTION CONNEXION
        if ($_POST['action'] == 'connexion'){
            try {

                $stmt = getUser($_POST['pseudo']);
                $result = $stmt->fetch();

                if ($stmt->rowCount() == 1 && password_verify($_POST['password'], $result['mdp'])) {

                    //unset($result['password']);
                    $_SESSION['connexion'] = $result;
                } else {
                    $_SESSION['message'] = 'Mauvais identifiants';
                }
            } catch (Exception $e) {
                $_SESSION['message'] = 'Erreur : '. $e->getMessage(). PHP_EOL;
                header('Location: ../php/acceuil.php');
                return;
            }

            header('Location: ../php/acceuil.php');
        }

            //ACTION CREATION DE COMPTE
        elseif ($_POST['action'] == 'creation'){

            try {

                if ($_POST['password'] != $_POST['passwordbis']) {
                    $_SESSION['message'] = 'Les mot de passe ne correspondent pas';
                    header('Location: ../php/create_user.php');
                    return;
                }

                $stmt = getUser($_POST['pseudo']);

                if ($stmt->rowCount() != 0) {
                    $_SESSION['message'] = 'Pseudo déjà utilisé';
                    header('Location: ../php/create_user.php');
                    return;
                }

                createUser($_POST['pseudo'], $_POST['email'], $_POST['password']);

            } catch (Exception $e) {
                $_SESSION['message'] = 'Erreur : '. $e->getMessage(). PHP_EOL;
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