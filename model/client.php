<?php
class Client{
    private $id;
    private $name;
    private $email;
    private $password;
    private $phone;
    private $sex;

    function __construct($id,$name,$email,$password,$phone,$sex){
        $this->id= $id;
        $this->name = $name;
        $this->phone = $phone;
        $this->sex = $sex;
        $this->email = $email;
        $this->password = $password;
    }

    static function createSeller($id,$name,$email,$password){
        return new Self($id,$name,$email,$password,null,null);
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