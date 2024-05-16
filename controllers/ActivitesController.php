<?php
require_once ('C:\wamp64\www\Oussema Msehli\config.php');
include('C:\wamp64\www\Oussema Msehli\model\Activite');

class ActivitesController{
public function showActivities()
{
    $sql="SELECT * FROM activites";
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
       $e->getMessage();
    }
}
public function deleteActivities($id){
    $sql="DELETE FROM activites WHERE idActivite = :id";
    $db = config::getConnexion();
    $req = $db->prepare($sql);
    $req->bindValue(':id' , $id);
    try{
        $req->execute();
    }
    catch(Exception $e){
        $e->getMessage();
    }
}
public function addActivities($activite){
    $sql = "INSERT INTO activites (titre,description,heure_debut,heure_fin,place,image,camping)
    VALUES (:titre, :description, :heure_debut, :heure_fin, :place, :image, :camping)";
    $db = config::getConnexion();
    try{
        $query = $db->prepare($sql);
        $query->execute([
        'titre'=> $activite->getTitre(),
        'description'=> $activite->getDescription(),
        'heure_debut'=> $activite->getHeureDebut(),
        'heure_fin' => $activite->getHeureFin(),
        'place'=> $activite->getPlace(),
        'image'=> $activite->getImage(),
        'camping' => $activite->getCamping(),
        ]);
    } catch (Exception $e){
        $e->getMessage();
    }
}
public function getActivities($id){
    $sql="SELECT * from activites where idActivite = :id";
    $db = config::getConnexion();
    try{
        $query = $db->prepare($sql);
        $query->bindValue(':id' , $id);
        $query->execute();
        $activite=$query->fetch();
        return $activite;
    }catch (Exception $e){
        $e->getMessage();
    }
}
public function updateActivities($id,$activite){
    try{
        $db = config::getConnexion();
        $query = $db->prepare('UPDATE activites SET titre = :titre, description = :description, heure_debut = :heure_debut, heure_fin = :heure_fin, place = :place, image = :image WHERE idActivite = :id');
        $query->execute([
            'titre'=> $activite->getTitre(),
            'description'=> $activite->getDescription(),
            'heure_debut'=> $activite->getHeureDebut(),
            'heure_fin' => $activite->getHeureFin(),
            'place'=> $activite->getPlace(),
            'image'=> $activite->getImage(),
            'id'=> $id
        ]);
    } catch (Exception $e){
        $e->getMessage();
}
}
public function joinCamping($id)
{
   try{
    $db = config::getConnexion();
    $sql = "SELECT a.*, c.titre AS ctitre FROM activites AS a INNER JOIN campings AS c ON a.camping = c.idCamping WHERE c.idCamping = :id";
    $query = $db->prepare($sql);
    $query->bindValue(':id',$id);
    $query->execute();
    $activities = $query->fetchAll();
    return $activities;
   }catch(Exception $e){
    $e->getMessage();
   } 
}
}
?>