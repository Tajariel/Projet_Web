<?php
require '../include/dtb.php';
require '../include/config.php';

session_start();



$info_conn = get_info_conn();


$pdo = connectDb($info_conn['dbHost'],$info_conn['dbName'], $info_conn['dbLogin'], $info_conn['dbPass'],false);


try
{
    $sql = 'INSERT INTO message (tag, contenu, date) 
                            VALUES (:tag, :msg, NOW())';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue('tag', $_POST['tag'], PDO::PARAM_STR);
    $stmt->bindValue('msg', $_POST['msg'], PDO::PARAM_STR);
    //$stmt->bindValue('date', date('l jS \of F Y h:i:s A'),PDO::PARAM_STR);


    $pdo->beginTransaction();
    $stmt->execute();
    $pdo->commit();
    header('Location: ../php/acceuil.php');

}
catch (Exception $e) {
    $pdo->rollBack();
    $_SESSION['message'] = "Failed: " . $e->getMessage();

    return;
}


?>