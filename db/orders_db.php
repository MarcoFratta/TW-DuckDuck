<?php
    require_once  __DIR__."/../model/order.php";
    class OrderHelper{
    private $db;
    private $ID = "id_order";
    private $DATE =  "creation_date";
    private $STATUS = "status";
    private $DESTINATION  = "id_address";
    private $ID_CARD = "id_card";
    private $ID_CLIENT =  "id_client";
    private $PRICE = "price";
    private $ID_NORMAL_PRODUCT = "id_normal_product";
    private $ID_CUSTOM_PRODUCT = "id_custom_product";
    public function __construct($db){
        $this->db = $db;
    }

    public function addNewOrder($order){
        $query = 'INSERT INTO orders ('.$this->DATE.','.$this->STATUS.','.$this->DESTINATION.','.$this->ID_CARD.','.$this->ID_CLIENT.') values (?,?,?,?,?)';
        $stmt = $this->db->prepare($query);
        $date = $order->getDate();
        $status = $order->getStatus();
        $dest = $order->getDestination();
        $id_card = $order->getId_Card();
        $id_client = $order->getId_Client();
        $stmt->bind_param('siiii', $date, $status, $dest, $id_card, $id_client);
        $stmt->execute();
        $result = $stmt->insert_id;
        return $result;
    }

    public function addNormalProductToOrder($product, $order){
        $query = 'INSERT INTO normal_order_products('.$this->PRICE.','.$this->ID_NORMAL_PRODUCT.','.$this->ID.') values (?,?,?)';
        $stmt = $this->db->prepare($query);
        $price = $product->getDiscount()== 0 ? $product->getPrice() : $product->getPrice() - ($product->getPrice()*100/$product->getDiscount());
        $id_product = $product->getId();
        $id_order = $order->getId();
        $stmt->bind_param('iii', $price, $id_product, $id_order);
        $stmt->execute();
        $result = $stmt->insert_id;
        return $result;
    }

    public function addCustomProductToOrder($product, $order){
        $query = 'INSERT INTO custom_order_products('.$this->PRICE.','.$this->ID_CUSTOM_PRODUCT.',
        '.$this->ID.') values (?,?,?)';
        $stmt = $this->db->prepare($query);
        $price = $product->getPrice();
        $id_product = $product->getId();
        $id_order = $order->getId();
        $stmt->bind_param('iii', $price, $id_product, $id_order);
        $stmt->execute();
        $result = $stmt->insert_id;
        return $result;
    }

    public function getOrderById($id_order, $withProducts=false){
        $query = "SELECT *
        FROM orders WHERE $this->ID=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id_order);
        $stmt->execute();
        $result = $stmt->get_result();
        return $this->toOrder($result->fetch_all(MYSQLI_ASSOC),$withProducts)->current();
    }


    private function toOrder($orders, $withProducts=false){
        foreach ($orders as $order){
            $n_products = [];
            $c_products = [];
            if($withProducts){
                foreach($this->getOrderNormalProduct($order[$this->ID]) as $product){
                    array_push($n_products, 
                    Product::createOrderProduct($product['id_normal_product'],
                    $product['price']));
                }
                foreach($this->getOrderCustomProduct($order[$this->ID]) as $product){
                    array_push($c_products, 
                    Product::createOrderProduct($product['id_custom_product'],
                    $product['price']));
                }
            }
        yield new Order($order[$this->ID],$order[$this->DATE],
        $order[$this->DESTINATION],$order[$this->STATUS],
        $order[$this->ID_CARD],$order[$this->ID_CLIENT],$n_products,$c_products);
        }
    }

    private function getOrderNormalProduct($id_order){
        $query = "SELECT id_normal_product, price
        FROM orders WHERE id_order=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id_order);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    private function getOrderCustomProduct($id_order){
        $query = "SELECT id_custom_product, price
        FROM orders WHERE id_order=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id_order);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    public function getOrdersByClient($id_client){
        $query = "SELECT * FROM orders WHERE id_client=$id_client";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        return $this->toOrder($result->fetch_all(MYSQLI_ASSOC));
    }

}
?>