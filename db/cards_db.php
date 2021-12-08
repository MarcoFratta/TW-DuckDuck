<?php
require_once "model/card.php";
class CardHelper{

    private $db;
    private $ID = "id_card";
    private $NUMBER = "number";
    private $CVV = "cvv";
    private $DATE = "expire_date";
    private $CLIENT = "id_client";

    function __construct($db){
        $this->db = $db;
    }


    public function getClientCards($id_client){
        $query = "SELECT *
        FROM cards WHERE $this->CLIENT=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id_client);
        $stmt->execute();
        $result = $stmt->get_result();
        return $this->toCards($result->fetch_all(MYSQLI_ASSOC));
    }

    public function insertCard($card){
        $query = "INSERT INTO cards($this->NUMBER,$this->CVV,
        $this->DATE,$this->CLIENT) values (?,?,?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$card->getNumber());
        $stmt->bind_param('i',$card->getCvv());
        $stmt->bind_param('i',$card->getDate());
        $stmt->bind_param('i',$card->getClient());
        $stmt->execute();
        $result = $stmt->insert_id;
        return $result;
    }

    private function toCards($cards){
        foreach($cards as $card){
            yield new Card($card[$this->ID], 
            $card[$this->NUMBER],$card[$this->CVV],$card[$this->DATE],
            $card[$this->CLIENT]);
        }
    }
}