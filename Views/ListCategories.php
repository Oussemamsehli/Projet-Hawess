<?php
include '../Controllers/categorieC.php';
$categorieC = new CategorieC();
$list = $categorieC->listCategories();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des categories</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <div align=center>
        <h1>LISTE DES CATEGORIES</h1>
        <h2><a href="addCategorie.php">Ajouter une Categorie</a></h2>
    </div>
    <table border='1' align="center" width="70%"> 
        <tr>
            <th>ID</th>
            <th>Nom Categorie</th>
            <th>Delete</th>
       <th>Modifier</th>
        </tr>

        <?php foreach ($list as $categorie) { ?>

            <tr>
            <td><?= $categorie['idC']; ?></td>
                <td><?= $categorie['nom_categorie']; ?></td>
                <td>
                    <a href="deleteCategorie.php?id=<?= $categorie['idC']; ?>">Supprimer</a> </td>
                   <td> <a href="modifiercategorie.php?id=<?= $categorie['idC']; ?>">Modifier</a> </td>
               
            </tr>

        <?php } ?>
    </table>
</body>
</html>
