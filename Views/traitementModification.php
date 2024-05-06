<?php
include '../Controllers/produitC.php';


// Vérifiez si le formulaire de modification a été soumis
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérez les données du formulaire
    $id_produit = $_POST['id_produit'];
    $nom = $_POST['nom'];
    $prix = $_POST['prix'];
    $description = $_POST['description'];
    $image_path = $_FILES['image']['name']; // Si vous permettez à l'utilisateur de modifier l'image
    $categorie = $_POST['categorie'];

    // Créez un objet Produit avec les nouvelles données
    $produit = new Produit($nom, $prix, $description,  $image_path);

    // Instanciez la classe HebergementC
    $produitC = new ProduitC();

    // Modifiez le produit dans la base de données
    $result = $produitC->modifierProduit($id_produit,$produit);

    if($result) {
        // La modification a réussi
        // Redirigez l'utilisateur vers la liste des produits avec un message de succès
        header('Location: ListProduit.php?success=modification_success');
        exit;
    } else {
        // La modification a échoué
        // Vous pouvez gérer cela comme vous le souhaitez, par exemple, afficher un message d'erreur
        header('Location: erreur.php');
        exit;
    }
} else {
    // Le formulaire de modification n'a pas été soumis
    // Vous pouvez gérer cela comme vous le souhaitez, par exemple, rediriger vers une page d'erreur
    header('Location: erreur.php');
    exit;
}
?>
