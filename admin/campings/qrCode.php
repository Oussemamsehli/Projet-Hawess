<?php
require_once ('C:\wamp64\www\Oussema Msehli\phpqrcode\qrlib.php');

if(isset($_GET['data'])) {
    $fileName = 'qrcode.png';
    QRcode::png($_GET['data'], $fileName,QR_ECLEVEL_L,20);
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . $fileName . '"');
    readfile($fileName);
    unlink($fileName);
}
?>