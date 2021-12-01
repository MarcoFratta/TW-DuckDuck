<?php
class Card{
    private $id;
    private $number;
    private $expire_date;
    private $cvv;

    function __construct($id,$number,$cvv,$expire_date){
        $this->id=$id;
        $this->number=$number;
        $this->cvv=$cvv;
        $this->expire_date=$expire_date;
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
}

?>