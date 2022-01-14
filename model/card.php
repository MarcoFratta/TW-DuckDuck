<?php
class Card{
    private $id;
    private $number;
    private $expire_date;
    private $cvv;
    private $client;

    function __construct($id, $number, $expire_date, $cvv, $client){
        $this->id=$id;
        $this->number=$number;
        $this->cvv=$cvv;
        $this->expire_date=$expire_date;
        $this->client = $client;
    }

    static function newCard($number, $expire_date, $cvv, $client){
        return new Self(null, $number, $expire_date, $cvv, $client);
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of number
     */ 
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Get the value of expire_date
     */ 
    public function getExpire_date()
    {
        return $this->expire_date;
    }

    /**
     * Get the value of cvv
     */ 
    public function getCvv()
    {
        return $this->cvv;
    }

    /**
     * Get the value of client
     */ 
    public function getClient()
    {
        return $this->client;
    }
}

?>