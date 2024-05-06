<?php
include '../Controllers/categorieC.php';
$categorieC = new CategorieC();

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie si les données du formulaire sont présentes
    if (isset($_POST['categorie']) && isset($_POST['search'])) {
        $idC = $_POST['categorie'];
        // Appelle la méthode pour afficher les produits de la catégorie sélectionnée
        $list = $categorieC->afficheProduits($idC);
    }
}

// Récupère toutes les catégories pour le menu déroulant
$categories = $categorieC->AfficheCategories();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Recherche de produits</title>
</head>
<body>
    <h1>Recherche de produits par catégorie</h1>
    <form action="" method="POST">
        <label for="categorie">Sélectionnez une catégorie :</label> 
        <select name="categorie" id="categorie">
            <?php
            // Affiche toutes les catégories dans le menu déroulant
            foreach ($categories as $categorie) {
                echo '<option value="' . $categorie['idC'] . '">' . $categorie['nom_categorie'] . '</option>';
            }
            ?>
        </select>
        <input type="submit" value="Rechercher" name="search">
    </form>

    <?php if (isset($list)) { ?>
        <br>
        <h2>Produits correspondants à la catégorie sélectionnée :</h2>
        <ul>
            <?php foreach ($list as $produit) { ?>
                <li>
                    <?= $produit['nom'] ?> - <?= $produit['prix'] ?>£ - <?= $produit['description'] ?>
                    <img src="/Boutique_en_ligne/Ressources/images/tente.jpg" alt="Tente de Camping"   width="100">
                    <img src="/Boutique_en_ligne/Ressources/images/sacs_couchages.png" alt="Sacs de Couchage" width="100">


                </li>
            <?php } ?>
        </ul>
    <?php } ?>
</body>
</html>
