<?php
// Inclure le fichier contenant la classe CategorieC
include 'C:\xampp\htdocs\Boutique_en_ligne\Controllers\categorieC.php';

// Vérifier si le formulaire a été soumis en utilisant la méthode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données soumises par le formulaire
    $idCategorie = $_POST['idCategorie']; // ID de la catégorie à modifier
    $nom_categorie = $_POST['nom_categorie']; // Nouveau nom de la catégorie
    
    // Créer une instance de la classe CategorieC pour gérer les catégories
    $categorieC = new CategorieC();

    // Créer une instance de la classe Categorie avec les données mises à jour
    $categorie = new Categorie($nom_categorie, $idCategorie);

    // Appeler la méthode de mise à jour dans la classe CategorieC
    $categorieC->updateCategorie($categorie);

    // Rediriger l'utilisateur vers une page de confirmation ou autre page appropriée
    header('Location: /Boutique_en_ligne/Views/ListCategories.php');

    exit; // Assurer que le script se termine après la redirection
}
?>
