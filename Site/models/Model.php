<?php

abstract class Model
{

    protected static $_db;

    // INSTANCIE CONNEXION DB
    private static function setDB()
    {
        $dsn = 'mysql:host=localhost;dbname=simp-land_db';
        self::$_db = new PDO($dsn, 'root', '');
        self::$_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    //RECUP CONNEXION DB
    protected function getDB(){
        if(self::$_db == null)
            $this->setDB();
        return self::$_db;
    }

    protected function getAll ($table, $obj){
        $var = [];
        $que = self::$_db->prepare('SELECT * FROM '.$table.' ORDER BY id_Message desc');
        $que->execute();
        while($data = $que->fetch(PDO::FETCH_ASSOC))
        {
            $var[] = new $obj($data);

        }

        return $var;
        $$que->closeCursor();
    }

}