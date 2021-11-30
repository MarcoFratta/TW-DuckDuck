<?php

require_once "products_db.php";
require_once "categories_db.php";
class DbHelper{
    private $db;
    private $products;
    private $categories;

    public function __construct($servername, $username, $password, $dbname){
        $this->db = new mysqli($servername, $username, $password, $dbname);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }        

        $this->products = new ProductsHelper($this->db);
        $this->categories = new CategoriesHelper($this->db);
    }

    public function products(){
        return $this->products;
    }
    public function categories(){
        return $this->categories;
    }
}
?>