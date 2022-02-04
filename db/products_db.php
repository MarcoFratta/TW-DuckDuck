<?php
require_once __DIR__."\..\model\product.php";
require_once __DIR__."\..\model\dimension.php";
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

    public function getSellerById($id_product)
    {
        $query = "SELECT id_seller FROM `normal_products`
        WHERE id_normal_product = $id_product";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $result = $result->fetch_array();
        $quantity = intval($result[0]);
        return $quantity;
    }

    public function getNormalProductById($id_product)
    {
        $query = "SELECT *
        FROM normal_products WHERE $this->NORMAL_ID=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $id_product);
        $stmt->execute();
        $result = $stmt->get_result();
        try {
            return $this->toProducts($result->fetch_all(MYSQLI_ASSOC))->current();
        } catch (Exception $e) {
            return false;
        }
    }

    public function getCustomProductById($id_product)
    {
        $query = "SELECT *
        FROM custom_products WHERE $this->CUSTOM_ID=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $id_product);
        $stmt->execute();
        $result = $stmt->get_result();
        try {
            return $this->toCustomProducts($result->fetch_all(MYSQLI_ASSOC))->current();
        } catch (Exception $e) {
            return false;
        }
    }

    public function getRandomNormalProducts($n=500)
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

    public function getLastNormalProducts($n=50)
    {
        $query = "SELECT * 
                FROM normal_products 
                ORDER BY $this->DATE DESC
                LIMIT ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $n);
        $stmt->execute();
        $result = $stmt->get_result();
        return $this->toProducts($result->fetch_all(MYSQLI_ASSOC));
    }

    public function getNormalProductsWithDiscount($n=50)
    {
        $query = "SELECT * 
                FROM normal_products 
                WHERE discount != 0
                LIMIT ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $n);
        $stmt->execute();
        $result = $stmt->get_result();
        return $this->toProducts($result->fetch_all(MYSQLI_ASSOC));
    }

    public function updateNormalProduct($product){
        $query = 'UPDATE normal_products SET ' . $this->NAME . '=?,' . $this->DESC . '=?,  
        ' . $this->IMG_PATH . '=?,' . $this->AMOUNT . '=?,' . $this->DISCOUNT . '=?,  
        ' . $this->PRICE . '=?,' . $this->DIMENSION . '=?,  
        ' . $this->CATEGORY . '=? WHERE '.$this->NORMAL_ID.'=?';
        if ($stmt = $this->db->prepare($query)) {
            $n = $product->getName();
            $d = $product->getDescription();
            $i = $product->getImagePath() !== null ?$product->getImagePath(): "NULL" ;
            $a = $product->getAmount();
            $di = $product->getDiscount();
            $p = $product->getPrice();
            $dim = $product->getDimension();
            $c = $product->getCategory();
            $id = $product->getId();
            $stmt->bind_param('sssiiiiii', $n, $d, $i, $a, $di, $p, $dim, $c,$id);
            $stmt->execute();
            return true;
    } else {
        $error = $this->db->errno . ' ' . $this->db->error;
        echo $error; // 1054 Unknown column 'foo' in 'field list'
        return false;
    }
}


    public function getProductsByCategory($id_category)
    {
        $query = "SELECT *
         FROM normal_products WHERE $this->CATEGORY=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $id_category);
        $stmt->execute();
        $result = $stmt->get_result();
        return $this->toProducts($result->fetch_all(MYSQLI_ASSOC));
    }

    public function getProductsBySeller($id_seller)
    {
        $query = "SELECT *
         FROM normal_products WHERE $this->SELLER=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $id_seller);
        $stmt->execute();
        $result = $stmt->get_result();
        return $this->toProducts($result->fetch_all(MYSQLI_ASSOC));
    }



    public function insertCustomProduct($product)
    {
        if ($product->getParts() == []) {
            return false;
        }
        $query = 'INSERT INTO custom_products(' . $this->PRICE . ',' . $this->DATE . ',
        ' . $this->DIMENSION . ') values (?,CURDATE(),?)';
        if ($stmt = $this->db->prepare($query)) {
            $p = $product->getPrice();
            $dim = $product->getDimension();
            $stmt->bind_param('ii', $p, $dim);
            $stmt->execute();
            $result = $stmt->insert_id;
            foreach ($product->getParts() as $part) {
                $query = 'INSERT INTO custom_products_custom_items(' . $this->CUSTOM_ID . ',' . $this->ITEM_ID . ') 
                values (?,?)';
                if ($stmt = $this->db->prepare($query)) {
                    $p = $part;
                    $stmt->bind_param('ii', $result, $p);
                    $stmt->execute();
                }else {
                        $error = $this->db->errno . ' ' . $this->db->error;
                        echo $error; // 1054 Unknown column 'foo' in 'field list'
                        return false;
                }   
            }     
        return $result;
        } else {
            $error = $this->db->errno . ' ' . $this->db->error;
            echo $error; // 1054 Unknown column 'foo' in 'field list'
            return false;
        }   
    }

    public function insertNormalProduct($product)
    {
        $query = 'INSERT INTO normal_products(' . $this->NAME . ',' . $this->DESC . ',
        ' . $this->IMG_PATH . ',' . $this->AMOUNT . ',' . $this->DISCOUNT . ',' . $this->PRICE . ',' . $this->DATE . ',
        ' . $this->SELLER . ',' . $this->DIMENSION . ',' . $this->CATEGORY . ') values (?,?,?,?,?,?,CURDATE(),?,?,?)';
        if ($stmt = $this->db->prepare($query)) {
            $n = $product->getName();
            $d = $product->getDescription();
            $i = $product->getImagePath() !== null ?$product->getImagePath(): "NULL" ;
            $a = $product->getAmount();
            $di = $product->getDiscount();
            $p = $product->getPrice();
            $s = $product->getSeller();
            $dim = $product->getDimension();
            $c = $product->getCategory();
            $stmt->bind_param('sssiiiiii', $n, $d, $i, $a, $di, $p, $s, $dim, $c);
            $stmt->execute();
            $result = $stmt->insert_id;
            return $result;
        } else {
            $error = $this->db->errno . ' ' . $this->db->error;
            echo $error; // 1054 Unknown column 'foo' in 'field list'
            return false;
        }
    }

    public function insertCustomItem($item)
    {
         $query = 'INSERT INTO custom_items(' . $this->NAME .',
        ' . $this->IMG_PATH . ',' . $this->PRICE . ',' . $this->DATE . ',
        ' . $this->SELLER . ',' . $this->LAYER .') values (?,?,?,CURDATE(),?,?)';
        if ($stmt = $this->db->prepare($query)) {
            $n = $item->getName();
            $i = $item->getImagePath();
            $p = $item->getPrice();
            $s = $item->getSeller();
            $l = $item->getLayer();
            $stmt->bind_param('ssiii', $n, $i, $p, $s, $l);
            $stmt->execute();
            $result = $stmt->insert_id;
            return $result;
        } else {
            $error = $this->db->errno . ' ' . $this->db->error;
            echo $error; // 1054 Unknown column 'foo' in 'field list'
            return $error;
        }
    }

    public function getCustomItems()
    {
        $query = "SELECT *
        FROM custom_items";
        $result = $this->db->query($query);
        return $this->toItems($result->fetch_all(MYSQLI_ASSOC));
    }

    public function getDimensionById($id)
    {
        $query = "SELECT *
        FROM dimensions where id_dimension = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        try {
            return $this->toDimension($result->fetch_all(MYSQLI_ASSOC))->current();
        } catch (Exception $e) {
            return false;
        }
    }

    public function getDimensions()
    {
        $query = "SELECT *
        FROM dimensions ORDER BY size ASC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        try {
            return $this->toDimension($result->fetch_all(MYSQLI_ASSOC));
        } catch (Exception $e) {
            return false;
        }
    }

    public function getDimensionBySize($size)
    {
        $query = "SELECT *
        FROM dimensions where size = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $size);
        $stmt->execute();
        $result = $stmt->get_result();
        try {
            return $this->toDimension($result->fetch_all(MYSQLI_ASSOC))->current();
        } catch (Exception $e) {
            return false;
        }
    }

    public function getCustomItemById($id)
    {
        $query = 'SELECT *
        FROM custom_items WHERE '.$this->ITEM_ID.'=?';
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        try {
            return $this->toItems($result->fetch_all(MYSQLI_ASSOC))->current();
        } catch (Exception $e) {
            return false;
        }
    }

    public function getCustomItemByLayer($layer)
    {
        $query = "SELECT *
        FROM custom_items WHERE LAYER=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $layer);
        $stmt->execute();
        $result = $stmt->get_result();
        try {
            return $this->toItems($result->fetch_all(MYSQLI_ASSOC));
        } catch (Exception $e) {
            return false;
        }
    }

    private function toItems($result)
    {
        foreach ($result as $product) :
            yield new CustomItem(
                $product[$this->ITEM_ID],
                $product[$this->PRICE],
                $product[$this->IMG_PATH],
                $product[$this->SELLER],
                $product[$this->NAME],
                $product[$this->DATE],
                $product[$this->LAYER]
            );
        endforeach;
    }

    private function toDimension($result)
    {
        foreach ($result as $dim) :
            yield new Dimension(
                $dim['id_dimension'],
                $dim['width'],
                $dim['height'],
                $dim['depth'],
                $dim['price'],
                $dim['size'],
                $dim['name']
            );
        endforeach;
    }

    private function toProducts($result)
    {
        foreach ($result as $product) :
            yield new Product(
                $product[$this->NORMAL_ID],
                $product[$this->NAME],
                $product[$this->DESC],
                $product[$this->IMG_PATH],
                $product[$this->PRICE],
                $product[$this->DIMENSION],
                $product[$this->AMOUNT],
                $product[$this->DISCOUNT],
                $product[$this->SELLER],
                $product[$this->CATEGORY],
                $product[$this->DATE]
            );
        endforeach;
    }

    private function toCustomProducts($result)
    {
        foreach ($result as $product) :
            yield new Product(
                $product[$this->CUSTOM_ID],
                null,
                null,
                null,
                $product[$this->PRICE],
                $product[$this->DIMENSION],
                null,
                null,
                null,
                null,
                $product[$this->DATE]
            );
        endforeach;
    }
}
