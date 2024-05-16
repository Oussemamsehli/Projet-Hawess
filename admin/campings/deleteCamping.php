<?php
require('../../controllers/CampingController.php');

$campC = new CampingController();
$campC->deleteCamping($_GET['id']);
header('Location: campinGBack.php');
?>