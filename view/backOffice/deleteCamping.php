<?php
require('../../controller/CampingController');

$campC = new CampingController();
$campC->deleteCamping($_GET['id']);
header('Location: campingBack.php');
?>