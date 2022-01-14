<?php

require_once "products_db.php";
require_once "categories_db.php";
require_once "orders_db.php";
require_once "addresses_db.php";
require_once "cards_db.php";
require_once "users_db.php";
class DbHelper{
    private $db;
    private $products;
    private $categories;
    private $orders;
    private $addresses;
    private $cards;
    private $users;

    public function __construct($servername, $username, $password, $dbname){
        $this->db = new mysqli($servername, $username, $password, $dbname);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }        

        $this->products = new ProductsHelper($this->db);
        $this->categories = new CategoriesHelper($this->db);
        $this->orders = new OrderHelper($this->db);
        $this->addresses = new AddressHelper($this->db);
        $this->cards = new CardHelper($this->db);
        $this->users = new UsersHelper($this->db);
    }

    public function products(){
        return $this->products;
    }
    public function categories(){
        return $this->categories;
    }
    public function orders()
    {
        return $this->orders;
    }
    public function addresses()
    {
        return $this->addresses;
    }
    public function cards()
    {
        return $this->cards;
    }
    public function users()
    {
        return $this->users;
    }
}
?>