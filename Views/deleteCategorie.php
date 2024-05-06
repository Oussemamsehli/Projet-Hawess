<?php
include '../Controllers/categorieC.php';
$categorieC = new CategorieC();
$categorieC->deleteCategorie($_GET["idC"]);
header('Location:ListCategories.php');

?>