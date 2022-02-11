<?php
class Category{
    private $id;
    private $name;
    private $image;

    function __construct($id, $name, $image){
        $this->id = $id;
        $this->name = $name;
        $this->image = $image;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }
}

?>