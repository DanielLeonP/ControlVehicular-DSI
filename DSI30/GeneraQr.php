<?php
    function GenerarQrCode($data, $file){
        include 'phpqrcode/qrlib.php';

        //Generacion de imagen
        QRcode::png($data, $file);
    }
?>