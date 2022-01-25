<?php

require_once __DIR__."/products_db.php";
require_once __DIR__."/categories_db.php";
require_once __DIR__."/orders_db.php";
require_once __DIR__."/addresses_db.php";
require_once __DIR__."/cards_db.php";
require_once __DIR__."/users_db.php";
require_once __DIR__."/notification_db.php";
class DbHelper{
    private $db;
    private $products;
    private $categories;
    private $orders;
    private $addresses;
    private $cards;
    private $users;
    private $notifications;

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
        $this->notifications = new NotificationHelper($this->db);
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
    public function notifications()
    {
        return $this->notifications;
    }
}
?>