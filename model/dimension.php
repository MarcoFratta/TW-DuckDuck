<?php
    class Dimension implements JsonSerializable{
        private $id;
        private $width;
        private $height;
        private $depth;
        private $price;
        private $size;
        private $name;
        
        public function __construct($id,$width,$height,$depth,$price,$size,$name){
            $this->id= $id;
            $this->width = $width;
            $this->height = $height;
            $this->depth = $depth;
            $this->price = $price;
            $this->size = $size;
            $this->name = $name;
        }

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Get the value of width
         */ 
        public function getWidth()
        {
                return $this->width;
        }

        /**
         * Get the value of height
         */ 
        public function getHeight()
        {
                return $this->height;
        }

        /**
         * Get the value of depth
         */ 
        public function getDepth()
        {
                return $this->depth;
        }

        /**
         * Get the value of price
         */ 
        public function getPrice()
        {
                return $this->price;
        }

        /**
         * Get the value of size
         */ 
        public function getSize()
        {
                return $this->size;
        }

        /**
         * Get the value of name
         */ 
        public function getName()
        {
                return $this->name;
        }
        public function jsonSerialize() {
                return (object) get_object_vars($this);
        }
    }
?>