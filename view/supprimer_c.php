<?php 

$idcommentaire = $_GET['idcommentaire'];
include_once "../controller/commentaireC.php";

$commentaireC= new commentaireC();
$commentaireC->deletecommentaire($idcommentaire); 
header('Location:afficher.php');

?>