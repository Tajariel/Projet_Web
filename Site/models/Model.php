<?php

/**
 * Class Model
 *
 * Class to connect to the data base
 *
 * @author Manuel FURTER-ALPHAND
 */
abstract class Model
{

    /**
     * @var db
     */
    protected static $_db;


    // INSTANCIE CONNEXION DB

    /**
     * @function setDB
     *
     * Setup the connection to the data base
     */
    private function setDB()
    {
        $dsn = 'mysql:host=localhost;dbname=simp-land_db';
        self::$_db = new PDO($dsn, 'root', '');


        self::$_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }


    //RECUP CONNEXION DB

    /**
     * @function getDB
     *
     * @return $db
     *
     * Return the set data base if connected successfully
     */
    protected function getDB(){
        if(self::$_db == null)
            $this->setDB();
        return self::$_db;

    }


    /**
     * @function getOne
     *
     * @param $table
     * @param $id
     * @return $que->fetch(PDO::FETCH_ASSOC)
     *
     * Return the tuple of the corresponding id from the database
     */
    protected function getOne ($table, $id){

        $que = $this->getDB()->prepare('SELECT * FROM '.$table.' WHERE id_Message = :id');
        $que->bindValue('id', $id);
        $que->execute();
        $data = $que->fetch(PDO::FETCH_ASSOC);

        return $data;
    }






}