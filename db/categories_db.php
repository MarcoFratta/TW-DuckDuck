<?php
require_once  __DIR__."/../model/category.php";
class CategoriesHelper{

    private $db;
    private $ID = "id_category";
    private $NAME = "name";
    private $IMAGE = "image";

    function __construct($db){
        $this->db = $db;
    }

    public function getCategories(){
        $query = "SELECT *
        FROM categories";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        return $this->toCategory($result->fetch_all(MYSQLI_ASSOC));
    }

    public function getCategoryById($idcategory){
        $query = "SELECT *
        FROM categories
        WHERE id_category = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $idcategory);
        $stmt->execute();
        $result = $stmt->get_result();
        return $this->toCategory($result->fetch_all(MYSQLI_ASSOC))->current();
    }

    

    public function getCategoryProductsNumber($idcategory){
        $query = "SELECT count(*) as sum_prod
        FROM normal_products
        WHERE id_category = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $idcategory);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC)[0]["sum_prod"];
    }


    private function toCategory($categories){
        foreach($categories as $category){
            yield new Category(
                $category[$this->ID],
                $category[$this->NAME],
                $category[$this->IMAGE]
            );
        }
    }

}
?>