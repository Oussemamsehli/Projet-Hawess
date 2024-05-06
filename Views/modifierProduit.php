<?php
include '../Controllers/produitC.php';

// Vérifiez si l'ID du produit est passé en paramètre GET
if(isset($_GET['id'])) {
    $id_produit = $_GET['id'];

    // Instanciez la classe ProduitC
    $produitC = new ProduitC();

    // Récupérez les informations du produit à modifier en fonction de son ID
    $produit = $produitC->getProduitById($id_produit);

    // Vérifiez si des données ont été récupérées
    if($produit) {
        // Les données du produit ont été récupérées avec succès
        // Pré-remplissez les champs du formulaire avec les informations récupérées
        $nom = $produit['nom'];
        $prix = $produit['prix'];
        $description = $produit['description'];
        $image_path = $produit['image_path'];
        
    } else {
        // Aucune donnée du produit trouvée avec l'ID spécifié
        // Vous pouvez gérer cela comme vous le souhaitez, par exemple, rediriger vers une page d'erreur
        header('Location: erreur.php');
        exit;
    }
} else {
    // Aucun ID du produit passé en paramètre GET
    // Vous pouvez gérer cela comme vous le souhaitez, par exemple, rediriger vers une page d'erreur
    header('Location: erreur.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Produit</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <h1>Modifier Produit</h1>
    <form action="traitementModification.php" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
        <!-- Utilisez les variables PHP pour pré-remplir les champs du formulaire -->
        <input type="hidden" name="id_produit" value="<?= $id_produit; ?>">
        <label for="nom">Nom:</label>
        <input type="text" name="nom" id="nom" value="<?= $nom; ?>" required>
       
       
        <!-- Ajoutez les autres champs du formulaire ici -->
        <!-- Ajoutez les autres champs du formulaire et pré-remplissez-les avec les valeurs récupérées -->
<label for="prix">Prix:</label>
<input type="number" name="prix" id="prix" value="<?= $prix; ?>" required> €

 <!-- Ajoutez les autres champs du formulaire et pré-remplissez-les avec les valeurs récupérées -->
        <!-- Assurez-vous que les noms des champs correspondent aux noms de vos colonnes de base de données -->
        <!-- Exemple : -->
        <label for="description">Description:</label>
        <textarea name="description" id="description" required><?= $description; ?></textarea>
   

<label for="image">Image:</label>
<input type="file" name="image" id="image" value="<?= $image_path; ?>" required>


<!-- Ajoutez les autres champs du formulaire et pré-remplissez-les avec les valeurs récupérées -->
        <!-- Assurez-vous que les noms des champs correspondent aux noms de vos colonnes de base de données -->
        <!-- Exemple : -->
        <label for="categorie">Categorie:</label>
        <textarea name="categorie" id="categorie" required><?= $categorie; ?></textarea>



        <button type="submit">Modifier</button>
        <!-- Ajoutez un bouton pour annuler la modification si nécessaire -->
        <a href="ListProduit.php">Annuler</a>
    </form>
</body>
</html>
