<?php
    require_once "product.php";
    class ProductBuilder {
        private $id;
        private $name;
        private $description;
        private $image_path;
        private $price;
        private $dimension;
        private $amount;
        private $discount;

        private function __construct(){

        }      
         
        public static function create(){
            return new self();
        }

        /**
         * Set the value of discount
         *
         * @return  self
         */ 
        public function setDiscount($discount)
        {
                $this->discount = $discount;

                return $this;
        }

        /**
         * Set the value of amount
         *
         * @return  self
         */ 
        public function setAmount($amount)
        {
                $this->amount = $amount;

                return $this;
        }

        /**
         * Set the value of dimension
         *
         * @return  self
         */ 
        public function setDimension($dimension)
        {
                $this->dimension = $dimension;

                return $this;
        }

        /**
         * Set the value of price
         *
         * @return  self
         */ 
        public function setPrice($price)
        {
                $this->price = $price;

                return $this;
        }

        /**
         * Set the value of image_path
         *
         * @return  self
         */ 
        public function setImage_path($image_path)
        {
                $this->image_path = $image_path;

                return $this;
        }

        /**
         * Set the value of description
         *
         * @return  self
         */ 
        public function setDescription($description)
        {
                $this->description = $description;

                return $this;
        }

        /**
         * Set the value of name
         *
         * @return  self
         */ 
        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }
        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        public function build(){
            return new Product($this->id,
            $this->name,
            $this->description,
            $this->image_path,
            $this->price,
            $this->dimension,
             $this->amount,
            $this->discount);
        }

        
    }

?>