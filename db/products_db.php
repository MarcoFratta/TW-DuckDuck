<?php
class ProductsHelper
{
    private $db;
    private $ID = "id_normal_product";
    private $NAME =  "name";
    private $DIMENSION = "id_dimension";
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
        FROM normal_products WHERE $this->ID=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id_product);
        $stmt->execute();
        $result = $stmt->get_result();
        return $this->toProducts($result->fetch_all(MYSQLI_ASSOC))->current();
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

    public function createCustomProduct(){
        
    }



    private function toProducts($result)
    {
        foreach ($result as $product) :
           yield new Product($product[$this->ID],$product[$this->NAME],
           $product[$this->DESC],$product[$this->IMG_PATH],
           $product[$this->PRICE],$product[$this->DIMENSION],
           $product[$this->DISCOUNT],$product[$this->AMOUNT]);
        endforeach;
    }


}
