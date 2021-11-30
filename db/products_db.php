<?php
require_once "model/products_builder.php";
class ProductsHelper
{
    private $db;
    private $ID = "id_normal_product";
    private $NAME =  "name";
    private $DESC  = "description";
    private $IMG_PATH = "image";
    private $PRICE =  "price";
    private $DISCOUNT = "discount";
    private $AMOUNT = "amount";


    function __construct($db)
    {
        $this->db = $db;
    }

    public function getProductById($id_product)
    {
        $query = "SELECT *
        FROM normal_products WHERE idarticolo=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id_product);
        $stmt->execute();
        $result = $stmt->get_result();
        return $this->toProducts($result->fetch_all(MYSQLI_ASSOC));
    }

    public function getRandomProducts($n)
    {
        $query = "SELECT * 
                FROM normal_products 
                ORDER BY RAND() 
                LIMIT ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $n);
        $stmt->execute();
        $result = $stmt->get_result();
        return $this->toProducts($result->fetch_all(MYSQLI_ASSOC));
    }

    public function getProductByCategory($idcategory)
    {
        $query = "SELECT *
         FROM normal_products WHERE id_category=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $idcategory);
        $stmt->execute();
        $result = $stmt->get_result();
        return $this->toProducts($result->fetch_all(MYSQLI_ASSOC));
    }


    private function toProducts($result)
    {
        foreach ($result as $product) :
           yield ProductBuilder::create()
                    ->setId($product[$this->ID])
                    ->setName($product[$this->NAME])
                    ->setDescription($product[$this->DESC])
                    ->setImage_path($product[$this->IMG_PATH])
                    ->setPrice($product[$this->PRICE])
                    ->setDiscount($product[$this->DISCOUNT])
                    ->setAmount($product[$this->AMOUNT])
                    ->build();
        endforeach;
    }
}
