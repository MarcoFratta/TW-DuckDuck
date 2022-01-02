<?php
require_once "model/product.php";
require_once "model/dimension.php";
class ProductsHelper
{
    private $db;
    private $NORMAL_ID = "id_normal_product";
    private $CUSTOM_ID = "id_custom_product";
    private $ITEM_ID = "id_custom_item";
    private $NAME =  "name";
    private $DESC  = "description";
    private $IMG_PATH = "image";
    private $AMOUNT = "amount";
    private $DISCOUNT = "discount";
    private $PRICE =  "price";
    private $LAYER =  "layer";
    private $DATE = "addition_date";
    private $DIMENSION = "id_dimension";
    private $SELLER = "id_seller";
    private $CATEGORY = "id_category";


    function __construct($db)
    {
        $this->db = $db;
    }

   

    public function getNormalProductById($id_product)
    {
        $query = "SELECT *
        FROM normal_products WHERE $this->NORMAL_ID=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id_product);
        $stmt->execute();
        $result = $stmt->get_result();
        try{    
            return $this->toProducts($result->fetch_all(MYSQLI_ASSOC))->current();
        }catch(Exception $e){
            return false;
        }    
    }

    public function getCustomProductById($id_product)
    {
        $query = "SELECT *
        FROM custom_products WHERE $this->NORMAL_ID=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id_product);
        $stmt->execute();
        $result = $stmt->get_result();
        try{    
            return $this->toProducts($result->fetch_all(MYSQLI_ASSOC))->current();
        }catch(Exception $e){
            return false;
        }    
    }

    public function getRandomNormalProducts($n)
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

    public function getProductByCategory($id_category)
    {
        $query = "SELECT *
         FROM normal_products WHERE $this->CATEGORY=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $id_category);
        $stmt->execute();
        $result = $stmt->get_result();
        return $this->toProducts($result->fetch_all(MYSQLI_ASSOC));
    }



    public function insertCustomProduct($product){
        if($product->getParts() == []){
            return null;
        }
        $query = "INSERT INTO custom_products ($this->PRICE,$this->DATE,
        $this->DIMENSION) values (?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$product->getPrice());
        $stmt->bind_param('d',$product->getAdditionDate());
        $stmt->bind_param('i',$product->getDimension());
        $stmt->execute();
        $result = $stmt->insert_id;
        foreach($product->getParts() as $part){
            $query = "INSERT INTO custom_products_custom_items 
            ($this->ITEM_ID, $this->CUSTOM_ID) values (?,?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('i',$part);
            $stmt->bind_param('i',$result);
            $stmt->execute();
        }
        return $result;
    }

    public function insertNormalProduct($product){
        $query = "INSERT INTO normal_product($this->NAME,$this->DESC,
        $this->IMG_PATH,$this->AMOUNT,$this->DISCOUNT,$this->PRICE,$this->DATE,
        $this->SELLER,$this->DIMENSION,$this->CATEGORY) values (?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$product->getName());
        $stmt->bind_param('s',$product->getDescription());
        $stmt->bind_param('s',$product->getImage());
        $stmt->bind_param('i',$product->getAmount());
        $stmt->bind_param('i',$product->getDiscount());
        $stmt->bind_param('i',$product->getPrice());
        $stmt->bind_param('d',$product->getAdditionDate());
        $stmt->bind_param('i',$product->getSeller());
        $stmt->bind_param('i',$product->getDimension());      
        $stmt->bind_param('i',$product->getCategory());
        $stmt->execute();
        $result = $stmt->insert_id;
        return $result;
    }

    public function insertCustomItem($item){
        $query = "INSERT INTO custom_item($this->NAME,
        $this->IMG_PATH,$this->PRICE,$this->DATE,$this->SELLER, $this->LAYER) 
         values (?,?,?,?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$item->getName());
        $stmt->bind_param('s',$item->getImage());
        $stmt->bind_param('i',$item->getPrice());
        $stmt->bind_param('d',$item->getAdditionDate());
        $stmt->bind_param('i',$item->getSeller());
        $stmt->bind_param('i',$item->getLayer());
        $stmt->execute();
        $result = $stmt->insert_id;
        return $result;
    }

    public function getCustomItems(){
        $query = "SELECT *
        FROM custom_items";
        $result = $this->db->query($query);
        return $this->toItems($result->fetch_all(MYSQLI_ASSOC));
    }

    public function getDimensionDetails($id){
        $query = "SELECT *
        FROM dimension where id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id); 
        $stmt->execute();
        $result = $stmt->get_result();   
        try{    
            return $this->toDimension($result->fetch_all(MYSQLI_ASSOC))->current();
        }catch(Exception $e){
            return false;
        }   
    }

    public function getCustomItemById($id){
        $query = "SELECT *
        FROM custom_items WHERE ID=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id); 
        $stmt->execute();
        $result = $stmt->get_result();   
        try{    
            return $this->toItems($result->fetch_all(MYSQLI_ASSOC))->current();
        }catch(Exception $e){
            return false;
        }    
    }

    private function toItems($result){
        foreach ($result as $product) :
            yield new CustomItem($product[$this->ID],
            $product[$this->PRICE],$product[$this->IMG_PATH],
            $product[$this->SELLER],$product[$this->NAME],
            $product[$this->DATE],$product[$this->LAYER]);
         endforeach;
    }

    private function toDimension($result){
        foreach ($result as $dim):
            yield new Dimension($dim['id'],
            $dim['width'],$dim['height'],$dim['depth'],$dim['price'],$dim['size']);
        endforeach;
    }

    private function toProducts($result)
    {
        foreach ($result as $product) :
           yield new Product($product[$this->NORMAL_ID],$product[$this->NAME],
           $product[$this->DESC],$product[$this->IMG_PATH],
           $product[$this->PRICE],$product[$this->DIMENSION],$product[$this->AMOUNT],
           $product[$this->DISCOUNT],$product[$this->SELLER],$product[$this->CATEGORY],
           $product[$this->DATE]);
        endforeach;
    }
}
