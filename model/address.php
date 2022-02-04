<?php
class Address{
    private $id;
    private $city;
    private $street;
    private $housenumber;
    private $details;

    function __construct($id,$city,$street,$housenumber,$details){
        $this->id=$id;
        $this->city=$city;
        $this->street=$street;
        $this->housenumber=$housenumber;
        $this->details = $details;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of city
     */ 
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Get the value of street
     */ 
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Get the value of housenumber
     */ 
    public function getHousenumber()
    {
        return $this->housenumber;
    }

    /**
     * Get the value of details
     */ 
    public function getDetails()
    {
        return $this->details;
    }

    public function toPrint()
    {
        return $this->city.", ".$this->street." n.".$this->housenumber.", ".$this->details;
    }
}

?>