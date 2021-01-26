<?php

class ModelMessage extends Model
{

    public function getMessage()
    {
        $this->getDB();
        return $this->getAll('message', 'Message');
    }

    function get2Messages($id = NULL)
    {

        $sql = 'SELECT contenu, photo FROM message WHERE id_Message >= :id LIMIT = 2';

        $stmt = self::$_db->prepare($sql);
        $stmt->bindValue('id', $id);
        $stmt->execute();

        return $stmt;
    }
}