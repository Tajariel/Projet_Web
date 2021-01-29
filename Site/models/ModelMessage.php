<?php

/**
 * Class ModelMessage
 *
 * @author Ugo LARSONNEUR
 * @author Gaëtan PUPET
 */
class ModelMessage extends Model
{

    /**
     * @function getMaxID
     *
     * Return the highest ID.
     *
     * @return stmt fetch
     */
    public function getMaxID(){

        $querry = 'SELECT MAX(id_Message) FROM message';

        $stmt = $this->getDB()->prepare($querry);

        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        return $stmt->fetch()['MAX(id_Message)'];

    }

    /**
     * @function message
     *
     * Insert a message in the dataBase.
     *
     * @param $message
     * @return result or false
     */
    public function sendMessage($message) {

        if(strlen($message) > 50){
            return false;
        }

        else
        {
            $this->getDB()->beginTransaction();

            $querry = 'INSERT INTO message(date,contenu) VALUES (CURRENT_DATE, :message)';

            $stmt = $this->getDB()->prepare($querry);

            $stmt->bindvalue('message', $message);

            $result = $stmt->execute();

            $this->getDB()->commit();

            return $result;
        }
    }

    /**
     * @function exist
     *
     * Verify if the message exist.
     *
     * @param $ID
     * @return bool
     */
    public function exist($ID) {
        $querry = 'SELECT id_Message FROM message WHERE id_Message = :id';
        $stmt = $this->getDB()->prepare($querry);
        $stmt->bindValue('id', $ID);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        if ($stmt->fetch()['id_Message'] != '')
            return true;
        else
            return false;
    }


    /**
     * @function getFromID
     *
     * Get a message with an precise ID.
     *
     * @param $id
     * @return the result of getOne
     */
    public function getFromID($id){
        $this->getDB();
        return $this->getOne('message',$id);
    }

    /**
     *@function getEmojiCount
     *
     * Get the number of emoji for one message.
     *
     * @param $id
     * @param $emoji
     * @return stmt fetch
     */
    public function getEmojiCount($id, $emoji)
    {

        $querry = 'SELECT quantite FROM emoji_count WHERE emoji_name = :emoji AND id_message = :id';

        $stmt = $this->getDB()->prepare($querry);

        $stmt->bindValue('emoji', $emoji, PDO::PARAM_STR);
        $stmt->bindValue('id', $id, PDO::PARAM_INT);

        $stmt->execute();

        if($stmt->rowcount() == 0 ) return 0;

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        return $stmt->fetch()['quantite'];

    }

    /**
     * @function getEmojiCount
     *
     * Increment the Emoji count on one messages
     *
     * @param $emoji
     * @param $id_message
     * @param $ammount
     */
    private function incrementEmojiCount($emoji, $id_message, $ammount)
    {
        $querry = 'SELECT * FROM emoji_count
                WHERE id_message = '.$id_message.' 
                AND emoji_name =\''.$emoji.'\'' ;

        $stmt = $this->getDB()->prepare($querry);

        $stmt->execute();

        if($stmt->rowcount() ==0){
            $querry = 'INSERT INTO emoji_count VALUES 
                ('.$id_message.',\''.$emoji .'\',1)';

            $stmt = $this->getDB()->prepare($querry);

            $stmt->execute();

        } else {

        $querry = 'UPDATE emoji_count 
                SET quantite = quantite +('.$ammount.') 
                WHERE id_message = '.$id_message.' 
                AND emoji_name =\''.$emoji.'\'' ;

        $stmt = $this->getDB()->prepare($querry);

        $stmt->execute();

        }
    }

    /**
     * @function changeEmoji
     *
     * Switch the emoji uped.
     *
     * @param $emoji
     * @param $user_id
     * @param $id_message
     */
    public function changeEmoji($emoji, $user_id, $id_message)
    {
        $this->getDB()->beginTransaction();

        $adding = !$this->hasUsed($id_message, $user_id, $emoji);

        $querry = 'SELECT emoji_name FROM emoji 
            WHERE id_message = '.$id_message.'
            AND id_user ='.$user_id;

        $stmt = $this->getDB()->prepare($querry);

        $stmt->execute();

        if(!$stmt->rowcount() == 0){
            $this->incrementEmojiCount($stmt->fetch()['emoji_name'], $id_message, -1);
        }

        $querry = 'DELETE FROM emoji 
            WHERE id_message = '.$id_message.' 
            AND id_user ='.$user_id;

        $stmt = $this->getDB()->prepare($querry);

        $stmt->execute();

        if($adding) {
            $querry = 'INSERT INTO emoji VALUES 
                (' . $user_id . ',' . $id_message . ',\'' . $emoji . '\')';

            $stmt = $this->getDB()->prepare($querry);

            $stmt->execute();

            $this->incrementEmojiCount($emoji, $id_message, 1);
        }

        $this->getDB()->commit();

    }

    /**
     * @function hasUsed
     *
     * Verify if an emoji is used.
     *
     * @param $id_message
     * @param $id_user
     * @param $emoji
     * @return bool
     */
    public function hasUsed($id_message, $id_user, $emoji)
    {

        $querry = 'SELECT * FROM emoji 
                    WHERE emoji_name = \''.$emoji.'\'  AND id_message ='.$id_message.' AND id_user ='.$id_user;

        $stmt = $this->getDB()->prepare($querry);

        $stmt->execute();

        return $stmt->rowcount() > 0;

    }
}