<?php
require_once  __DIR__."/../model/address.php";
class AddressHelper{

    private $db;
    private $ID = "id_address";
    private $CITY = "city";
    private $STREET = "street";
    private $HOUSENUMBER = "housenumber";
    private $DETAILS = "details";

    function __construct($db){
        $this->db = $db;
    }

    public function getAddresses(){
        $query = "SELECT * FROM addresses";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        return $this->toAddresses($result->fetch_all(MYSQLI_ASSOC));
    }

    private function toAddresses($addresses){
        foreach($addresses as $address){
            yield new Address($address[$this->ID], $address[$this->CITY], $address[$this->STREET], $address[$this->HOUSENUMBER], $address[$this->DETAILS]);
        }
    }
}