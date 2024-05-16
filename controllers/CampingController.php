<?php
require_once ('C:\wamp64\www\Oussema Msehli\config.php');
include ('C:\wamp64\www\Oussema Msehli\model\Camping');

class CampingController
{
    public function showCampings()
    {
        $sql = "SELECT * FROM campings";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            $e->getMessage();
        }
    }
    public function deleteCamping($id)
    {
        $sql = "DELETE FROM campings WHERE idCamping = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        try {
            $req->execute();
        } catch (Exception $e) {
            $e->getMessage();
        }
    }
    public function addCamping($camping, $lang, $lat, $user_id)
    {
        $sql = "INSERT INTO campings (titre,description,adresse,date_debut,date_fin,place,prix,image,lang,lat,user_id)
    VALUES (:titre, :description, :adresse, :date_debut, :date_fin, :place,:prix,:image,:lang,:lat,:user_id)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'titre' => $camping->getTitre(),
                'description' => $camping->getDescription(),
                'adresse' => $camping->getAdresse(),
                'date_debut' => $camping->getDateDebut(),
                'date_fin' => $camping->getDateFin(),
                'place' => $camping->getPlace(),
                'prix' => $camping->getPrix(),
                'image' => $camping->getImage(),
                'user_id' => $user_id, // $camping->getUserId(),
                'lang' => $lang,
                'lat' => $lat,
            ]);
        } catch (Exception $e) {
            $e->getMessage();
        }
    }
    public function getCamping($id)
    {
        $sql = "SELECT * from campings where idCamping = :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id);
            $query->execute();
            $camping = $query->fetch();
            return $camping;
        } catch (Exception $e) {
            $e->getMessage();
        }
    }
    public function updateCamping($id, $camping)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare('UPDATE campings SET titre = :titre, description = :description, adresse = :adresse, date_debut = :date_debut, date_fin = :date_fin, place = :place, prix=:prix, image = :image WHERE idCamping = :id');
            $query->execute([
                'titre' => $camping->getTitre(),
                'description' => $camping->getDescription(),
                'adresse' => $camping->getAdresse(),
                'date_debut' => $camping->getDateDebut(),
                'date_fin' => $camping->getDateFin(),
                'place' => $camping->getPlace(),
                'prix' => $camping->getPrix(),
                'image' => $camping->getImage(),
                'id' => $id
            ]);
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    function searchCamping($rech)
    {
        $sql = "SELECT * FROM campings where titre like '%$rech%' OR adresse like '%$rech%'";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function sortCamping($sort)
    {


        $sql = "SELECT * FROM campings ORDER BY prix $sort";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

}
?>