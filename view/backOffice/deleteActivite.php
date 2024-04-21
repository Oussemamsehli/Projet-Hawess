<?php
require('../../controller/ActivitesController');

$actC = new ActivitesController();
$actC->deleteActivities($_GET['id']);
header('Location: activiteBack.php?idCamping='.$_GET['idCamping']);
?>