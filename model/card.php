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

    public function getId()
    {
        return $this->id;
    }
    public function getNumber()
    {
        return $this->number;
    }
    public function getExpire_date()
    {
        return $this->expire_date;
    }
    public function getCvv()
    {
        return $this->cvv;
    }
    public function getClient()
    {
        return $this->client;
    }
}

?>