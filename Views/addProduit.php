<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="form.css">
    <script src="form.js"></script>
</head>
<body>
<h1 align="left"><a href="ListProduit.php">Retour</a></h1>
<h1 align="center">Formulaire d'ajout de produit</h1>
<form action="" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
    <table align="center">
        <tr>
            <th colspan="2">Informations sur le produit</th>
        </tr>
        <tr>
            <td><label for="nom">Nom:</label></td>
            <td><input type="text" name="nom" id="nom" required></td>
        </tr>

        <tr>
            <td><label for="prix">Prix:</label></td>
            <td><input type="number" name="prix" id="prix" required> €</td>
        </tr>
       
        <tr>
            <td><label for="description">Description:</label></td>
            <td><textarea name="description" id="description" required></textarea></td>
        </tr>
     
        
        <tr>
            <td><label for="image">Image:</label></td>
            <td><input type="file" name="image" id="image" accept="image/*" required></td>
        </tr>

        <tr>
            <td><label for="categorie">Categorie:</label></td>
            <td>
                <select name="categorie" id="categorie" required>
                    <option value="">Sélectionner une categorie</option>
                    <option value="1">categorie 1</option>
                    <option value="2">categorie 2</option>
                    <option value="3">categorie 3</option>
                    <option value="4">categorie 4</option>
                    <option value="5">categorie 5</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <button type="submit">Envoyer</button>
                <button type="reset">Annuler</button>
            </td>
        </tr>
    </table>
</form>
</body>
</html>

<?php
include '../Controllers/produitC.php';

$produitC = new ProduitC();

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifie si un fichier a été téléchargé
    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        // Définir le chemin d'accès où l'image sera stockée sur le serveur
        $targetDir = "c:/xampp/htdocs/boutique_en_ligne/Ressources/images/";
        $targetFile = $targetDir . basename($_FILES['image']['name']);
        
        // Déplacer le fichier téléchargé vers l'emplacement de stockage
        if(move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            // Le fichier a été téléchargé avec succès, enregistrer le chemin d'accès dans la base de données
            $image_path = $targetFile;
        } else {
            // Une erreur s'est produite lors du téléchargement de l'image
            echo "Erreur lors du téléchargement de l'image.";
            exit; // Arrêter l'exécution du script
        }
    } else {
        // Aucune image n'a été téléchargée
        echo "Veuillez sélectionner une image.";
        exit; // Arrêter l'exécution du script
    }
    // Créer un nouvel objet Produit avec les données du formulaire
    $produit = new Produit(/*$_POST ['id'],*/$_POST['nom'],  $_POST['prix'], $_POST['description'], $image_path, $_POST['categorie']);
    $produitC->addProduit($produit);
    header('Location:ListProduit.php');
    
    exit;
} else {
    // Méthode HTTP incorrecte
    echo "Requête invalide.";
    exit;
}
?>
