<?php

    //arbir archivo
    function abrirArchivo($Archivo){
        $Manejador = fopen($Archivo,"r");
        //.. manda a la carpeta raiz
        // ../DSI30/Files/File2.txt
        return $Manejador;
    }
    function abrirDestino($Destino){
        $Manejador2 = fopen($Destino,"w");
        return $Manejador2;
    }
    function copiar($Manejador, $Manejador2){
        //leer y escribir
        while($Linea = fgets($Manejador)){
            fwrite($Manejador2, $Linea);
        }
        print("Copia Generada Correctamente.");
    }
    function cerrar($Manejador, $Manejador2){
         //cerrar
        fclose($Manejador);
        fclose($Manejador2);
    }     
    
?>