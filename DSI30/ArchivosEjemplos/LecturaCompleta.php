<?php
    //abrir
    $Manejador = fopen("File1.txt","r");


    //Formas diferentes de lectura:
    while($Linea=fgets($Manejador)){
        print($Linea);
    }
    
    // while(!feof($Manejador)){
    //     $Linea = fgets($Manejador);
    //     print($Linea);
    // }


    fclose($Manejador);

?>