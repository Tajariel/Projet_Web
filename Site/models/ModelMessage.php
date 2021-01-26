<?php

class ModelMessage extends Model
{

    public function getMessage()
    {
        $this->getDB();
        return $this->getAll('message', 'Message');
    }

    public function get2Messages($id = NULL)
    {

        $this->getDB();
        if ($id == NULL)
            $id == 1;

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