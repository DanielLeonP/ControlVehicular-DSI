<?php

    // //abrir
    // $Manejador = fopen("../DSI30/Files/File1.txt","a");
    // print_r($Manejador);
    
    // //escribir
    // $Resultado = fwrite($Manejador,"Prueba de leer el contenido del archivo. \n");
    // print($Resultado);
    // //fputs();

    // //cerrar
    // fclose($Manejador);

    //Leer Caracteres
    print("Lectura por caracteres:<br><br>");
    //abrir
    $Manejador = fopen("../DSI30/Files/File1.txt","r");
    while (False != ($Caracter = fgetc($Manejador))) {
        print($Caracter);
        if($Caracter == "."){
            print("<br>");
        }
    }

    print("<br><br>Lectura por lineas:<br><br>");

    //Leer Lineas
    //abrir
    $Manejador2 = fopen("../DSI30/Files/File1.txt","r");
    
    while (False != ($Linea = fgets($Manejador2))) {
        print($Linea);
        print("<br>");
    }

?>