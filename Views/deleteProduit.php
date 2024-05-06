<?php
include '../Controllers/produitC.php';
$produitC = new ProduitC();
$produitC->deleteProduit($_GET["id"]);
header('Location:ListProduit.php');

?>