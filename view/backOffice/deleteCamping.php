<?php
require('../../controller/CampingController');

$campingC = new CampingController();
$campingC->deleteCamping($_GET['id']);
header('Location: campingBack.php');
?>