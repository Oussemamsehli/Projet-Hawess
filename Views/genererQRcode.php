<?php
include 'C:/xampp/htdocs/Boutique_en_ligne/Controllers/produitC.php';

// Créer une instance de ProduitC
$produitC = new ProduitC();

// Appeler la méthode pour générer le code QR d'un produit (à adapter selon votre logique)
$produitC->genererCodeQRProduit(1); // Exemple : générer le code QR du produit avec l'ID 1
?>
