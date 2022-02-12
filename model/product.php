<?php
class Product
{
        protected $id;
        protected $name;
        protected $description;
        protected $image_path;
        protected $price;
        protected $dimension;
        protected $amount;
        protected $discount;
        protected $seller;
        protected $category;
        protected $addition_date;

        public function __construct(
                $id,
                $name,
                $description,
                $image_path,
                $price,
                $dimension,
                $amount,
                $discount,
                $seller,
                $category,
                $addition_date
        ) {
                $this->id = $id;
                $this->name = $name;
                $this->image_path = $image_path;
                $this->description = $description;
                $this->price = $price;
                $this->amount = $amount;
                $this->dimension = $dimension;
                $this->discount = $discount;
                $this->seller = $seller;
                $this->category = $category;
                $this->addition_date = $addition_date;
        }
        static public function deletedProduct($id,$product){
                return new self($id,"Prodotto eliminato","","../img/mix/error_duck.php.png",$product,1,null,null,null,null,null);
        }

        static public function createOrderProduct($id, $price)
        {
                return new self(
                        $id,
                        null,
                        null,
                        null,
                        $price,
                        null,
                        null,
                        null,
                        null,
                        null,
                        null
                );
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
        public function getImagePath()
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

        /**
         * Get the value of seller
         */
        public function getSeller()
        {
                return $this->seller;
        }

        /**
         * Get the value of category
         */
        public function getCategory()
        {
                return $this->category;
        }

        /**
         * Get the value of addition_date
         */
        public function getAdditionDate()
        {
                return $this->addition_date;
        }
}

class CustomProduct extends Product
{
        private $parts = [];

        public function __construct($id, $price, $dimension, $addition_date, $parts)
        {
                parent::__construct($id,null,null,null,$price,$dimension,null,null,null,null,$addition_date);
                $this->parts = $parts;
        }


        public function getParts()
        {
                return $this->parts;
        }

        public function withId($id){
                $this->id = $id;
        }
}

class CustomItem extends Product implements JsonSerializable {
        
        private $layer;
        public function __construct($id, $price, $image_path, $seller, $name, $addition_date, $layer)
        {
                parent::__construct($id,$name,null,$image_path,$price,null,null,null,$seller,null,$addition_date);
                $this->layer = $layer;
        }

        public function getLayer()
        {
                return $this->layer;
        }
        public function jsonSerialize() {
                return (object) get_object_vars($this);
        }
}
