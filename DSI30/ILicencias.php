<?php
    //Recibir variables enviadas al servidor

    //$Numero = $_GET['Numero'];
    $FechaExp = $_GET['FechaExp'];
    $Tipo = $_GET['Tipo'];
    $FechaVencimiento = $_GET['FechaVencimiento'];
    $IdConductor = $_GET['IdConductor'];

    //Imprimir datos
    /** 
    print("Numero = " . $Numero);
    print("FechaExp = " . $FechaExp);
    print("Tipo = " . $Tipo);
    print("FechaVencimiento = " . $FechaVencimiento);
    print("IdConductor = " . $IdConductor);*/
    
    //Formar SQL Implicitas
    $sql = "INSERT INTO Licencias VALUES('','$FechaExp','$Tipo','$FechaVencimiento','$IdConductor');";
    //print($sql);
    
    //Enviar datos al SMDB
    include("FuncionesConexion.php");
    $Con = Conectar();
    $Query = Ejecutar($Con, $sql);
    Cerrar($Con);

    if($Query ==1){
        print("Registro insertado");
    }

    //Enviar los datos a un archivo csv
    //Abrir
    $Manejador = fopen("Files/Licencias.csv","a");

    //Contar lineas
    $Manejador2 = fopen("Files/Licencias.csv","r");
    $Temporal = 0;
    $x = TRUE;
    while($Linea=fgets($Manejador2) and $x == TRUE){
        $Temporal = $Temporal + 1;
        if($Temporal >0){
            $x = FALSE;
        }
    }
    fclose($Manejador2);

    //Leer o escribir
    if($Temporal == 0){
        fwrite($Manejador, "Numero, FechaExp, Tipo, FechaVencimiento, IdConductor \n");
    }
    $Numero = "AI";
    $Mensaje = $Numero . ", " . $FechaExp . ", " . $Tipo . ", " . $FechaVencimiento . ", " . $IdConductor . "\n";
    
    fwrite($Manejador, $Mensaje);
    //Cerrar
    fclose($Manejador);
    
?>