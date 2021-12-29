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
        $query = 'INSERT INTO clients ('.$this->PASSWORD.','.
        $this->EMAIL.','. $this->NAME.') values (?,?,?)';
        $stmt = $this->db->prepare($query);
        $pass = $client->getPassword();
        $email = $client->getEmail();
        $name = $client->getName();
        $stmt->bind_param('sss',$pass,$email,$name);
        $stmt->execute();
        $result = $stmt->insert_id;
        return $result;
    }

    public function insertSeller($client){
        $query = 'INSERT INTO sellers ('.$this->PASSWORD.','.
        $this->EMAIL.','. $this->NAME.') values (?,?,?)';
        $stmt = $this->db->prepare($query);
        $pass = $client->getPassword();
        $email = $client->getEmail();
        $name = $client->getName();
        $stmt->bind_param('sss',$pass,$email,$name);
        $stmt->execute();
        $result = $stmt->insert_id;
        return $result;
    }

    public function getClientByEmail($email){
        $query = "SELECT $this->ID_CLIENT as id, $this->PASSWORD, $this->NAME 
         FROM clients WHERE $this->EMAIL=?";
         if($stmt = $this->db->prepare($query)) { // assuming $mysqli is the connection
            $stmt->bind_param('s',$email);
            $stmt->execute();
            // any additional code you need would go here.
        } else {
            $error = $this->db->errno . ' ' . $this->db->error;
            echo $error; // 1054 Unknown column 'foo' in 'field list'
            return false;
        }
         
        $result = $stmt->get_result();
        $result = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        if (sizeof($result) > 0)
            return $result[0];
        return false;
    }

    public function getClientById($id){
        $query = "SELECT *
         FROM clients WHERE $this->ID_CLIENT=?";
         if($stmt = $this->db->prepare($query)) { 
            $stmt->bind_param('i',$id);
            $stmt->execute();
        } else {
            $error = $this->db->errno . ' ' . $this->db->error;
            echo $error; 
            return false;
        }
         
        $res = $stmt->get_result();
        $res = $res->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        if (sizeof($res) > 0){
            $res = $res[0];
            return new Client($id,$res['name'],$res['email'],
            $res['password'],$res['phone'],$res['sex']);
        }
        return false;
    }

    public function getSellerByEmail($email){
        $query = "SELECT $this->ID_SELLER as id, $this->PASSWORD, $this->NAME 
        FROM sellers WHERE $this->EMAIL=?";
        if($stmt = $this->db->prepare($query)) { // assuming $mysqli is the connection
           $stmt->bind_param('s',$email);
           $stmt->execute();
           // any additional code you need would go here.
       } else {
           $error = $this->db->errno . ' ' . $this->db->error;
           echo $error; // 1054 Unknown column 'foo' in 'field list'
           return false;
       }
        
       $result = $stmt->get_result();
       $result = $result->fetch_all(MYSQLI_ASSOC);
       $stmt->close();
       if (sizeof($result) > 0)
           return $result[0];
       return false;
    }
 }
?>