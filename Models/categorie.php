<?php
class categorie{
    private $id;
    private $nom_categorie;
    
   
    

    public function __construct($nom_categorie)
    
    {
      
      $this->nom_categorie=$nom_categorie;      
    }
   
    public function getID()
    {
        return $this->id;
    }
   
    public function getnom_categorie()
    {
        return $this->nom_categorie;
    }
  
    public function setnom_categorie ($n)
    {
         $this->nom_categorie =$n;
    }
   
    public function setID($id)
    {
         $this->id=$id;
    }
   
    
}


?>