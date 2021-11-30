<?php
    class Product {
        private $id;
        private $name;
        private $description;
        private $image_path;
        private $price;
        private $dimension;
        private $amount;
        private $discount;

        public function __construct($id,$name , $description, $image_path, $price,$dimension, $amount, $discount){
            $this->id = $id;
            $this->name = $name;
            $this->image_path = $image_path;
            $this->description = $description;
            $this->price = $price;
            $this->amount = $amount;
            $this->dimension = $dimension;
            $this->discount = $discount;
        }      
         /**
         * Get the value of description
         */ 
        public function getDescription()
        {
                return $this->description;
        }

        /**
         * Get the value of image_path
         */ 
        public function getImage_path()
        {
                return $this->image_path;
        }

        /**
         * Get the value of price
         */ 
        public function getPrice()
        {
                return $this->price;
        }

        /**
         * Get the value of dimension
         */ 
        public function getDimension()
        {
                return $this->dimension;
        }

        /**
         * Get the value of amount
         */ 
        public function getAmount()
        {
                return $this->amount;
        }

        /**
         * Get the value of name
         */ 
        public function getName()
        {
                return $this->name;
        }

        /**
         * Get the value of discount
         */ 
        public function getDiscount()
        {
                return $this->discount;
        }

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }
    }

?>