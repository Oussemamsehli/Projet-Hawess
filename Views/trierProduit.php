<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Produits Triés par Intervalle de Prix</title>
</head>
<body>
    <h1>Liste des Produits Triés par Intervalle de Prix</h1>

    <form action="" method="GET">
        <button type="submit" name="interval" value="0-20">0 - 20£</button>
        <button type="submit" name="interval" value="20-50">20 - 50£</button>
        <button type="submit" name="interval" value="50-100">50 - 100£</button>
    </form>

    <?php
    // Inclure le contrôleur
    include('C:/xampp/htdocs/Boutique_en_ligne/Controllers/ProduitC.php');

    // Créer une instance du contrôleur
    $produitController = new ProduitC();

    // Vérifier si un intervalle de prix a été sélectionné
    if (isset($_GET['interval'])) {
        // Récupérer les bornes de l'intervalle de prix
        $interval = $_GET['interval'];
        $bounds = explode('-', $interval);
        $minPrix = $bounds[0];
        $maxPrix = $bounds[1];

        // Appeler la fonction de tri des produits par intervalle de prix
        $produitsTriés = $produitController->trierProduitsParIntervalle($minPrix, $maxPrix);

        // Afficher les produits triés
        if (!empty($produitsTriés)) {
            echo '<ul>';
            foreach ($produitsTriés as $produit) {
                echo '<li>' . $produit['nom'] . ' - ' . $produit['prix'] . '£ - ' . $produit['description'] . '</li>';
                echo '<img src="' . $produit['image_path'] . '" alt="' . $produit['nom'] . '" width="100">';
            }
            echo '</ul>';
        } else {
            echo '<p>Aucun produit trouvé dans cet intervalle de prix.</p>';
        }
    }
    ?>
</body>
</html>
