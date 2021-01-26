<?php

class Message{
    private $_id_Message;
    private $_date;
    private $_contenu;
    private $_photo;
    private $_tag;


    //CONSTRUCTEUR
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
        foreach ($data as $key => $value)
        {
            $method = 'set'.ucfirst($key);

            if(method_exists($this, $method))
                $this->$method($value);
        }
    }



    //GETTER
    /**
     * @return string
     */
    public function getIdMessage()
    {
        return $this->_id_Message;
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->_date;
    }

    /**
     * @return string
     */
    public function getContenu()
    {
        return $this->_contenu;
    }

    /**
     * @return string
     */
    public function getPhoto()
    {
        return $this->_photo;
    }
    /**
     * @return string
     */
    public function getTag()
    {
        return $this->_tag;
    }

    //SETTER
    /**
     * @param string $id_Message
     */
    public function setIdMessage($id_Message)
    {
        $this->_id_Message = $id_Message;
    }

    /**
     * @param string $date
     */
    public function setDate($date)
    {
        $this->_date = $date;
    }

    /**
     * @param string $contenu
     */
    public function setContenu($contenu)
    {
        $this->_contenu = $contenu;
    }

    /**
     * @param string $photo
     */
    public function setPhoto($photo)
    {
        $this->_photo = $photo;
    }

    /**
     * @param string $tag
     */
    public function setTag($tag)
    {
        $this->_tag = $tag;
    }
}
