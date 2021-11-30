<?php

require_once "products_db.php";
class DbHelper{
    private $db;
    private $products;

    public function __construct($servername, $username, $password, $dbname){
        $this->db = new mysqli($servername, $username, $password, $dbname);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }        

        $this->products = new ProductsHelper($this->db);
    }

    public function products(){
        return $this->products;
    }
}
?>