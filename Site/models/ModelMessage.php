<?php

class ModelMessage extends Model
{

    public function getMaxID(){

        $querry = 'SELECT MAX(id_Message) FROM message';

        $stmt = $this->getDB()->prepare($querry);

        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        return $stmt->fetch()['MAX(id_Message)'];

    }

    public function sendMessage($message) {
        if(strlen($message) > 50)
            return false;

        else
        {
            $querry = 'INSERT INTO message(date,contenu) VALUES (CURRENT_DATE,\''.$message.'\')';

            $stmt = $this->getDB()->prepare($querry);

            return $stmt->execute();
        }
    }

    public function exist($ID) {
        $querry = 'SELECT id_Message FROM message WHERE id_Message = '.$ID.'';

        $stmt = $this->getDB()->prepare($querry);

        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        if ($stmt->fetch()['id_Message'] != '')
            return true;
        else
            return false;
    }

    public function getMessage()
    {
        $this->getDB();
        return $this->getAll('message', 'Message');
    }

    public function get2Messages($id = NULL)
    {

        $this->getDB();
        if ($id == NULL)
            $id = 1;

        return $this->getOne('message','Message',$id);

    }

    public function getFromID($id){
        $this->getDB();
        return $this->getOne('message','Message',$id);
    }

    public function getEmojiCount($id, $emoji)
    {

        $querry = 'SELECT quantite FROM emoji_count WHERE nom_emoji = '.$emoji.' AND id_message ='.$id;

        $stmt = $this->getDB()->prepare($querry);

        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        return $stmt->fetch()['quantite'];

    }

    public function hasUsed($id_message, $id_user, $emoji)
    {

        $querry = 'SELECT quantite FROM emoji
                    WHERE emoji_name = '.$emoji.' AND id_message ='.$id_message.' AND id_user ='.$id_user;

        $stmt = $this->getDB()->prepare($querry);

        $stmt->execute();

        return $stmt->rowcount() > 0;

    }
}