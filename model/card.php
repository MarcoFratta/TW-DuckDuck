<?php
class Card{
    private $id;
    private $number;
    private $expire_date;
    private $cvv;
    private $client_id;

    function __construct($id, $number, $expire_date, $cvv, $client_id){
        $this->id=$id;
        $this->number=$number;
        $this->cvv=$cvv;
        $this->expire_date=$expire_date;
        $this->client_id = $client_id;
    }

    static function newCard($number, $expire_date, $cvv, $client_id){
        return new Self(null, $number, $expire_date, $cvv, $client_id);
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
    public function getClientId()
    {
        return $this->client_id;
    }
}

?>