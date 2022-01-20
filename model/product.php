<?php
class Product
{
        private $id;
        private $name;
        private $description;
        private $image_path;
        private $price;
        private $dimension;
        private $amount;
        private $discount;
        private $seller;
        private $category;
        private $addition_date;

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
                $this->id = $id;
                $this->price = $price;
                $this->dimension = $dimension;
                $this->parts = $parts;
                $this->addition_date = $addition_date;
        }


        public function getParts()
        {
                return $this->parts;
        }
}

class CustomItem extends Product
{
        public function __construct($id, $price, $image_path, $seller, $name, $addition_date, $layer)
        {
                $this->id = $id;
                $this->price = $price;
                $this->image_path = $image_path;
                $this->layer = $layer;
                $this->seller = $seller;
                $this->name = $name;
                $this->addition_date = $addition_date;
        }

        public function getLayer()
        {
                return $this->layer;
        }
}
