<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="form.css">
    <script src="form.js"></script>
</head>
<body>
<h1 align="left"><a href="ListCategories.php">Retour</a></h1>
<h1 align="center">Formulaire d'ajout d'une categorie</h1>
<form action="" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
    <table align="center">
        <tr>
            <th colspan="2">Informations de la Categorie</th>
        </tr>
        <tr>
            <td><label for="nom_categorie">Nom_categorie:</label></td>
            <td><input type="text" name="nom_categorie" id="nom_categorie" required></td>
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
include '../Controllers/categorieC.php';

$categorieC = new CategorieC();

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifie si un fichier a été téléchargé
   /* if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
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
    }*/
    // Créer un nouvel objet Produit avec les données du formulaire
    $categorie = new Categorie($_POST['nom_categorie']);
    $categorieC->addCategorie($categorie);
    header('Location:ListCategories.php');
    
    exit;
} else {
    // Méthode HTTP incorrecte
 // echo "Requête invalide.";
    exit;
}
?>
