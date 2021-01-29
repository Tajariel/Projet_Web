<?php

abstract class Model
{

    protected static $_db;

    // INSTANCIE CONNEXION DB
    private function setDB()
    {
        $dsn = 'mysql:host=mysql-mfa.alwaysdata.net;dbname=mfa_simp-land_db';
        self::$_db = new PDO($dsn, 'mfa', 'mdp_dtb');


        self::$_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    //RECUP CONNEXION DB
    protected function getDB(){
        if(self::$_db == null)
            $this->setDB();
        return self::$_db;

    }



    protected function getOne ($table, $id){

        $var = [];
        $que = $this->getDB()->prepare('SELECT * FROM '.$table.' WHERE id_Message = :id');
        $que->bindValue('id', $id);
        $que->execute();
        $data = $que->fetch(PDO::FETCH_ASSOC);
        //$var[] = new $obj($data);
        return $data;
    }






}