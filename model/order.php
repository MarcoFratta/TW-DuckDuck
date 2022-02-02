<?php
        class Order{
        private $id;
        private $id_client;
        private $id_card;
        private $date;
        private $destination;
        private $status;
        private $normal_products = [];
        private $custom_products = [];


        function __construct($id, $date, $destination, $status, $id_card, $id_client, $normal_products, $custom_products){
                $this->id = $id;
                $this->date = $date;
                $this->destination = $destination;
                $this->status = $status;
                $this->id_card = $id_card;
                $this->id_client = $id_client;
                $this->normal_products = $normal_products;
                $this->custom_products = $custom_products;
        }

        static function newOrder($date, $destination, $status, $id_card, $id_client){
                return new Self(null, $date, $destination, $status, $id_card, $id_client, [], []);
        }

        public function addNormalProduct($product){
                if(empty($normal_products)){
                        $normal_products[0] = $product;
                } else {
                        array_push($normal_products, $product);
                }
        }

        public function addCustomProduct($product){
                if(empty($custom_products)){
                        $custom_products[0] = $product;
                } else {
                        array_push($custom_products, $product);
                }
        }

        public function getNormalProducts(){
                return $this->normal_products;
        }

        public function getCustomProducts(){
                return $this->custom_products;
        }
        
        

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Get the value of id_client
         */ 
        public function getId_client()
        {
                return $this->id_client;
        }

        /**
         * Get the value of id_card
         */ 
        public function getId_card()
        {
                return $this->id_card;
        }

        /**
         * Get the value of date
         */ 
        public function getDate()
        {
                return $this->date;
        }

        /**
         * Get the value of destination
         */ 
        public function getDestination()
        {
                return $this->destination;
        }

        /**
         * Get the value of status
         */ 
        public function getStatus()
        {
                return $this->status;
        }

        /**
         * Get the value of normal_products
         */ 
        public function getNormal_products()
        {
                return $this->normal_products;
        }

        /**
         * Get the value of custom_proucts
         */ 
        public function getCustom_products()
        {
                return $this->custom_products;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function withId($id)
        {
                $this->id = $id;
                return $this;
        }
}
?>