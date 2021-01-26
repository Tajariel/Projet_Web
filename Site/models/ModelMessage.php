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
}