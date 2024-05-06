<?php
// Include the PHP file with database connection
include '../Models/categorie.php'; // Inclure le modèle categorie si nécessaire
include '../config.php';
$produitC = new CategorieC();

class CategorieC {
    public function listCategories() {
        $sql = "SELECT * FROM Categorie";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function deleteCategorie($id){
        $sql="DELETE FROM Categorie where idC= :idC";
        $db=config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindvalue(':idC',$id);
        try
        {
            $req->execute();
    
        }
        catch(Exception $e)
        {
            die('Error:' .$e->getMessage());
        }
    }

    function addCategorie($categorie){
        $sql = "INSERT INTO Categorie(idC,nom_categorie)
                VALUES (null, :nom_categorie)";
       // $sql="INSERT INTO boutique VALUES (NULL,:nom,:prix,:description,:image_path)";  
        $db=config::getConnexion();
       try{
       // print_r($categorie->getdate()->format("Y-m-d"));
        $query=$db->prepare($sql);
        $query->execute([
            'nom_categorie'=> $categorie->getnom_categorie(),
        ]);
    
       
       }
       catch(Exception $e){
        die('Error:' .$e->getMessage()); 
       }
    }

    public function updateCategorie($categorie) {
        $sql = "UPDATE Categorie
                SET nom_categorie = :nom_categorie
                WHERE id_categorie = :id_categorie";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom_categorie' => $categorie->getnom_categorie(),
                'id_categorie' => $categorie->getid_categorie(),
            ]);
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function AfficheProduits($idC) {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare("SELECT * FROM boutique WHERE categorie = :id ");
            $query->execute(['id' => $idC]);
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
}

public function AfficheCategories() {
    try {
        $pdo = config::getConnexion();
        $query = $pdo->prepare("SELECT * FROM Categorie");
        $query->execute();
        return $query->fetchAll();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

    



    public function getCategorieID($id_produit) {
        $sql = "SELECT id_categorie FROM Categorie WHERE id_produit = :id_produit";   //ici
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['id_produit' => $id_produit]);
            $categorie_id = $query->fetch(PDO::FETCH_ASSOC);  //ici
            return $categorie_id;                             //ici
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
   
}
?>
