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

    function getProductById($id_product)
    {
        $query = "SELECT $this->ID, $this->NAME, $this->DESC, $this->AMOUNT
        $this->IMG_PATH, $this->PRICE, $this->DISCOUNT
         FROM normal_products WHERE idarticolo=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id_product);
        $stmt->execute();
        $result = $stmt->get_result();
        return $this->toProducts($result->fetch_all(MYSQLI_ASSOC));
    }

    public function getRandomProducts($n)
    {
        $query = "SELECT $this->ID, $this->NAME, $this->DESC, 
        $this->IMG_PATH, $this->PRICE, $this->DISCOUNT 
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
        $query = "SELECT 
        {$this->ID}, {$this->NAME}, {$this->DESC}, 
        {$this->IMG_PATH}, {$this->PRICE}, {$this->DISCOUNT} 
         FROM normal_products WHERE id_category=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $idcategory);
        $stmt->execute();
        $result = $stmt->get_result();
        return $this->toProducts($result->fetch_all(MYSQLI_ASSOC));
    }


    private function toProducts($result)
    {
        $products = [];
        foreach ($result as $product) :
            array_push(
                $products,
                ProductBuilder::create()
                    ->setId($product['id_normal_product'])
                    ->setName($product['name'])
                    ->setDescription($product['description'])
                    ->setImage_path($product['image'])
                    ->setPrice($product['price'])
                    ->setDiscount($product['discount'])
                    ->build()
            );
        endforeach;
        return $products;
    }
}
