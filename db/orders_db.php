<?php
    class OrderHelper{
    private $db;
    private $ID = "id_order";
    private $DATE =  "creation_date";
    private $STATUS = "status";
    private $DESTINATION  = "id_address";
    private $ID_CARD = "id_card";
    private $ID_CLIENT =  "id_client";
    public function __construct($db){
        $this->db = $db;
    }

    public function addNewOrder($order){
        $query = "INSERT INTO orders ('creation_date','status','id_address',
        'id_card','id_client') values (?,?,?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('d',$order->getDate());
        $stmt->bind_param('i',$order->getStatus());
        $stmt->bind_param('s',$order->getDestination());
        $stmt->bind_param('i',$order->getId_Card());
        $stmt->bind_param('i',$order->getId_Client());
        $stmt->execute();
        $result = $stmt->insert_id;
        foreach($order->getNormalProduct() as $product){
            $this->addNormalProductToOrder($product,$result);
        }
        foreach($order->getCustomProduct() as $product){
            $this->addCustomProductToOrder($product,$result);
        }
        return $result;
    }

    private function addNormalProductToOrder($product, $order){
        $query = "INSERT INTO normal_product_orders('price','id_normal_product',
        'id_order') values (?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$product->getDiscount()== 0 ? $product->getPrice() :
        $product->getPrice() - ($product->getPrice()*100/$product->getDiscount()));
        $stmt->bind_param('i',$product->getId());
        $stmt->bind_param('i',$order->getId());
        $stmt->execute();
        $result = $stmt->insert_id;
        return $result;
    }

    private function addCustomProductToOrder($product, $order){
        $query = "INSERT INTO custom_product_orders('price','id_custom_product',
        'id_order') values (?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$product->getPrice());
        $stmt->bind_param('i',$product->getId());
        $stmt->bind_param('i',$order->getId());
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