<?php
include "../../../controllers/reclamationController.php"; 
$reclamationController = new reclamationC();
$reclamationCountByStatus = $reclamationController->getReclamationCountByStatus();


$jsonData = json_encode($reclamationCountByStatus);


header('Content-Type: application/json');


echo $jsonData;
