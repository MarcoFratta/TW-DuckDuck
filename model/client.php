<?php
class Client{
    private $id;
    private $name;
    private $email;
    private $phone;
    private $sex;

    function __construct($id,$name,$email,$phone,$sex){
        $this->id= $id;
        $this->name = $name;
        $this->phone = $phone;
        $this->sex = $sex;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the value of phone
     */ 
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Get the value of sex
     */ 
    public function getSex()
    {
        return $this->sex;
    }
}


?>