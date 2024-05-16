<?php
class Camping
{
    private $idCamping;
    private $titre;
    private $description;
    private $adresse;
    private $date_debut;
    private $date_fin;
    private $prix;
    private $place;
    private $image;

    public function __construct($titre, $description, $adresse, $date_debut, $date_fin, $prix, $place, $image)
    {
        $this->titre = $titre;
        $this->description = $description;
        $this->adresse = $adresse;
        $this->date_debut = $date_debut;
        $this->date_fin = $date_fin;
        $this->prix = $prix;
        $this->place = $place;
        $this->image = $image;
    }

    public function getIdCamping()
    {
        return $this->idCamping;
    }
    public function getTitre()
    {
        return $this->titre;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getAdresse()
    {
        return $this->adresse;
    }
    public function getDateDebut()
    {
        return $this->date_debut;
    }
    public function getDateFin()
    {
        return $this->date_fin;
    }
    public function getPrix()
    {
        return $this->prix;
    }
    public function getPlace()
    {
        return $this->place;
    }
    public function getImage()
    {
        return $this->image;
    }
   
}
?>