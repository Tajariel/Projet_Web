<?php

class Message{
    private $_id;
    private $_msg;
    private $_photo;
    private $_date;

    //CONSTRUCTEUR
    public function __construct(array $data){
    $this->hydrate($data);
    }

    //HYDRATATION
    public function hydrate(array $data)
    {
        foreach ($data as $key => $value){

            $method = 'set'.ucfirst($key);

            if(method_exists($this, $method))
                $this->$method(value);

    }
    }

    //SETTER
    public function setId($id){
        $id = (int) $id;
        if ($id > 0)
            $this->_id = $id;
    }

    public function setMsg($msg){
        if(is_string($msg))
            $this->_msg = $msg;
    }


    public function setPhoto($photo)
    {
        if(is_string($photo))
            $this->_photo = $photo;
    }

    public function setDate($date)
    {
        $this->_date = $date;
    }

    //GETTER

    public function getId()
    {
        return $this->_id;
    }

    public function getMsg()
    {
        return $this->_msg;
    }

    public function getPhoto()
    {
        return $this->_photo;
    }

    public function getDate()
    {
        return $this->_date;
    }
}
