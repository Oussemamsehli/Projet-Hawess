<?php
include('C:/xampp/htdocs/Boutique_en_ligne/Models/produit.php');
//include '../Models/reservation.php';
include('C:/xampp/htdocs/Boutique_en_ligne/config.php');
//include 'C:\xampp\htdocs\Boutique_en_ligne\Ressources\CodeQR\phpqrcode-2010100721_1.1.4\phpqrcode\qrlib.php';
class ProduitC
{
    public function listProduit()
    {
        $sql ="SELECT *FROM boutique";
        $db=config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }catch (Exception $e){
            die('Error:'.$e->getMessage());
        }
    }

public function deleteProduit($id){
    $sql="DELETE FROM boutique where id= :id";
    $db=config::getConnexion();
    $req=$db->prepare($sql);
    $req->bindvalue(':id',$id);
    try
    {
        $req->execute();

    }
    catch(Exception $e)
    {
        die('Error:' .$e->getMessage());
    }
}
function addProduit($produit){
    $sql = "INSERT INTO boutique(id,nom,prix,description,image_path,categorie)
            VALUES (null, :nom, :prix, :description, :image_path, :categorie)";
   // $sql="INSERT INTO boutique VALUES (NULL,:nom,:prix,:description,:image_path)";  
    $db=config::getConnexion();
   try{
   // print_r($produit->getdate()->format("Y-m-d"));
    $query=$db->prepare($sql);
    $query->execute([
        'nom'=> $produit->getNom(),
        'prix'=> $produit->getPrix(),
        'description'=> $produit->getDescript(),
       // 'Evaluation'=> $produit->getEval(),
        'image_path'=> $produit->getImage_P(),
        'categorie'=>$produit->getCategorie(),
    ]);

   
   }
   catch(Exception $e){
    die('Error:' .$e->getMessage()); 
   }
}
public function modifierProduit($id,$produit)
    {
        $sql = "UPDATE boutique
                SET nom = :nom,  
                    prix = :prix, 
                    description = :description,                 
                    image_path = :image_path,
                    categorie = categorie
                WHERE id = :id";

        try {
            $db = config::getConnexion();
            $query = $db->prepare($sql);
            $query->execute([
                'id' => $id,
                'nom'=> $produit->getNom(),
                'prix'=> $produit->getPrix(),
                'description'=> $produit->getDescript(),
                'image_path'=> $produit->getImage_P(),
                'categorie'=>$produit->getCategorie(),
            ]);
            
            if ($query->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Erreur lors de la mise à jour du produit : " . $e->getMessage();
            return false;
        }
    }

    public function trierProduitsParIntervalle($minPrix, $maxPrix)
    {
        $db = config::getConnexion();
        $sql = "SELECT * FROM boutique WHERE prix >= :minPrix AND prix <= :maxPrix ORDER BY prix ASC";
        $query = $db->prepare($sql);
        $query->execute([
            'minPrix' => $minPrix,
            'maxPrix' => $maxPrix
        ]);
        return $query->fetchAll();
    }


   /* public function genererCodeQRProduit($id_produit) {
        // Récupérer les détails du produit en fonction de son ID (à adapter selon votre logique)
        $produit = $this->getProduitById($id_produit);

        // Vérifier si le produit existe
        if ($produit) {
            // Créer une instance de Produit avec les détails du produit
            $produit_instance = new Produit($produit['id'], $produit['nom'], $produit['description'], $produit['prix'], $produit['image_path']);

            // Générer le code QR du produit
            $produit_instance->genererQRcode();
        } else {
            // Gérer le cas où le produit n'est pas trouvé
            echo "Produit non trouvé.";
        }
    }*/



public function getProduitById($id_Produit) {
    // Votre requête SQL pour récupérer les informations du produit en fonction de son ID
    $sql = "SELECT * FROM boutique WHERE id = :id";

    // Connexion à la base de données
    $db = config::getConnexion();

    try {
        // Préparer la requête
        $query = $db->prepare($sql);
        
        // Exécuter la requête en liant le paramètre :id_produit
        $query->execute(['id' => $id_produit]);

        // Récupérer les données du produit sous forme de tableau associatif
        $produit = $query->fetch(PDO::FETCH_ASSOC);

        // Retourner les données du produit
        return $produit;
    } catch(PDOException $e) {
        // Gérer les erreurs de requête SQL
        echo "Erreur SQL: " . $e->getMessage();
        return null;
    }
}
// produit.php

// produit.php

// Fonction pour récupérer les détails du produit en fonction de l'ID
function getproduitDetails($id_produit) {
    // Inclure le fichier de configuration pour obtenir l'objet PDO
    include 'c:/xampp/htdocs/boutique_en_ligne/config.php';

    // Connexion à la base de données
    $sql = config::getConnexion();

    // Requête SQL pour récupérer les détails du produit en fonction de l'ID
    $query = "SELECT * FROM boutique WHERE id_produit = :id_produit";
    $stmt = $sql->prepare($query);
    $stmt->bindParam(':id_produit', $id_produit);
    $stmt->execute();
    
    // Récupérer les détails du produit
    $produit_details = $stmt->fetch(PDO::FETCH_ASSOC);

    // Retourner les détails du produit
    return $produit_details;
}











  
}

?>
