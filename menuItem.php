<?php

class Menuitem{ 

    private $itemName;
    private $description;
    private $price;
    
// populate the properties

    public function getItemName(){
        return $this -> itemName;
    }
    
    public function setItemName($itemName){
        $this -> itemName = $itemName;
    }
    
    public function getDescription(){
        return $this -> description;
    }
    
    public function setDescription($description){
        $this -> description = $description;
    }
    
    public function getPrice(){
        return $this -> price;
    }
    
    public function setPrice($price){
        $this -> price = $price;
    }
    
    function __constructor($itemName, $description, $price){
        $this -> setItemName($itemName);
        $this -> setDescription($description);
        $this -> setPrice($price);
    }

}
?>

