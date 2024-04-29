<?php 

class commentaire{

    private $idcommentaire;
    private $idarticle;
    private $contenu_;

    private $likee;
    
    public $userAttributeCount=5;

    function getidcommentaire(){
        return $this->idcommentaire;
    }
    function getidarticle(){
        return $this->idarticle;
    }
    function getcontenu_(){
        return $this->contenu_;
    }

    function getlike(){
        return $this->likee;
    }
    function setlike($like){
         $this->likee = $like;
    }

    function __construct($idarticle,$contenu_,$likee){
        $this->idarticle = $idarticle;
        $this->contenu_ = $contenu_;
        $this->likee=$likee;
    }
    

    function affichage(){  
    
      // LOCATION DEPENDS ON THE WHERE THE COLLEE AND CALLED FILE ARE NoT DEPENDED ON THE CLASS FILE IS POSITION
     //require_once "showUser.html";
        
    
    } 


   

}
?>


