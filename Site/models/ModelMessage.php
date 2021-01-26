<?php

class ModelMessage extends Model
{

    public function getMessage()
    {
        $this->getDB();
        return $this->getAll('message', 'Message');
    }
}