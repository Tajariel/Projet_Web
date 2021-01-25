<?php

class ModelMessage extends Model
{

    public function getMessage()
    {
          return $this->getAll('message', 'Message');
    }
}