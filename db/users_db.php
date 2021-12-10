<?php
 class UsersHelper {
    private $db;
    private $ID_CLIENT = "id_client";
    private $SEX =  "sex";
    private $EMAIL = "email";
    private $PHONE  = "phone";
    private $PASSWORD = "password";
    private $NAME = "name";
    private $ID_SELLER =  "id_seller";

    function __construct($db){
        $this->db = $db;
    }


    public function insertUser($client){
        $query = "INSERT INTO clients ($this->PASSWORD,
        $this->EMAIL, $this->NAME) values (?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$client->getPassword());
        $stmt->bind_param('d',$client->getEmail());
        $stmt->bind_param('d',$client->getName());
        $stmt->execute();
        $result = $stmt->insert_id;
        return $result;
    }

    public function insertSeller($client){
        $query = "INSERT INTO sellers ($this->PASSWORD,
        $this->EMAIL, $this->NAME) values (?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$client->getPassword());
        $stmt->bind_param('d',$client->getEmail());
        $stmt->bind_param('d',$client->getName());
        $stmt->execute();
        $result = $stmt->insert_id;
        return $result;
    }

    public function getClientByEmail($email){
        $query = "SELECT $this->ID_CLIENT, $this->PASSWORD, $this->NAME
        FROM clients WHERE $this->EMAIL=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$email);
        $stmt->execute();
        $stmt->store_results();
        $stmt->close();
        return $stmt;
    }
 }
?>