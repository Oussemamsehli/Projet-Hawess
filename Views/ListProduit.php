<?php
include '../Controllers/produitC.php';
$produitC = new ProduitC();
$list=$produitC->listProduit();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <div align=center >
    <h1  >LISTE DES PRODUITS</h1>
    <h2> <a href="addProduit.php">AddPRODUIT</a></h2>
   
    </div>
    <table border='1' align="center" width="70%"> 
    <tr>
        <th>ID</th>
        <th>nom</th>
        <th>Prix</th>
        <th>Description</th>
        <th>image_path</th>
        <th>categorie</th>
       <th>Delete</th>
       <th>Modifier</th>
    </tr>

<?php
foreach ($list as $produit){

?>

<tr>
    <td><?=$produit['id'] ;?></td>
    <td><?=$produit['nom'] ;?></td>
    <td><?=$produit['prix'] ;?></td>
    <td><?=$produit['description'] ;?></td>
    <td><?=$produit['image_path'] ;?></td>
    <td><?=$produit['categorie'] ;?></td>
    <td>
        <a href="deleteproduit.php?id=<?= $produit['id'];?>">Delete</a>
    </td>
    <td>
        <a href="C:/xampp/htdocs/Boutique_en_ligne/Views/modifierProduit.php?id=<?= $produit['id'];?>">Modifier</a>
</td>

</tr>
<?php
}
?>
</table>


</body>
</html>