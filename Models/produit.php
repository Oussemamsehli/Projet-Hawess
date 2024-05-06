<?php
// include 'C:\xampp\htdocs\Boutique_en_ligne\Ressources\CodeQR\phpqrcode-2010100721_1.1.4\phpqrcode\qrlib.php';
class Produit{
    private $id=null;
    private $nom;
    private $prix;
    private $description;
    private $image_path;
    private $categorie;
 

    public function __construct(/*$id=null,*/$nom,$prix,$description,$image_path,$categorie)
    
    {
      $this->image_path=$image_path;
      $this->nom=$nom;
      $this->prix=$prix;
      $this->description=$description;
      $this->categorie=$categorie;

    }

   /* public function genererQRcode() {
        
        // Contenu du code QR (par exemple, l'URL pour consulter les détails du produit)
        $contenuQR = "http://localhost/Boutique_en_ligne/Views/ListProduit.php" . $this->id;

        // Générer le code QR et le sauvegarder dans un fichier
        QRcode::png($contenuQR, 'C:\xampp\htdocs\Boutique_en_ligne\Ressources\images'.$this->id.'.png', QR_ECLEVEL_L, 10);
    }*/


    public function getNom()
    {
        return $this->nom;
    }

    public function getImage_P()
    {
        return $this->image_path;
    }

    public function getCategorie()
    {
        return $this->categorie;
    }
   
    public function getID()
    {
        return $this->id;
    }
   
   
    public function getPrix()
    {
        return $this->prix;
    }
    public function getDescript()
    {
        return $this->description;
    }
    public function setNom($n)
    {
         $this->nom=$n;
    }
    public function setImage_P($n)
    {
         $this->image_path=$n;
    }

    public function setCategorie($d)
    {
         $this->categorie=$d;
    }
   
    public function setID($id)
    {
         $this->id=$id;
    }
   
    public function setPrix($d)
    {
         $this->prix=$d;
    }
    
    public function setDescript($d)
    {
         $this->description=$d;
    }
    
}

?>