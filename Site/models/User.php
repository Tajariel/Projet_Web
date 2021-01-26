<?php

class User{


    private $_id_user;
    private $_pseudo;
    private $_email;

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

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->_id_user;
    }

    /**
     * @param mixed $id_user
     */
    public function setIdUser($id_user)
    {
        $this->_id_user = $id_user;
    }

    /**
     * @return mixed
     */
    public function getPseudo()
    {
        return $this->_pseudo;
    }

    /**
     * @param mixed $pseudo
     */
    public function setPseudo($pseudo)
    {
        $this->_pseudo = $pseudo;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->_email = $email;
    }

}


