<?php
    //Recibir variables enviadas al servidor

    //$IdConductor = $_REQUEST['IdConductor'];
    $Nombre = $_REQUEST['Nombre'];
    $TipoSangre = $_REQUEST['TipoSangre'];
    $Domicilio = $_REQUEST['Domicilio'];
    $FechaNacimiento = $_REQUEST['FechaNacimiento'];
    $Donador = $_REQUEST['Donador'];
    $Foto = $_REQUEST['Foto'];
    $Observacion = $_REQUEST['Observacion'];
    $TelefonoEmergencia = $_REQUEST['TelefonoEmergencia'];
    $Antiguedad = $_REQUEST['Antiguedad'];
    $Restricciones = $_REQUEST['Restricciones'];
    $Firma = $_REQUEST['Firma'];

    //Imprimir datos
    /**
    print("IdConductor = " . $IdConductor);
    print("Nombre = " . $Nombre);
    print("TipoSangre = " . $TipoSangre);
    print("Domicilio = " . $Domicilio);
    print("FechaNacimiento = " . $FechaNacimiento);
    print("Donador = " . $Donador);
    print("Foto = " . $Foto);
    print("Observacion = " . $Observacion);
    print("TelefonoEmergencia = " . $TelefonoEmergencia);
    print("Antiguedad = " . $Antiguedad);
    print("Restricciones = " . $Restricciones);
    print("Firma = " . $Firma);
    */
    
    //Formar SQL Implicitas
    $sql = "INSERT INTO Conductores VALUES('','$Nombre','$TipoSangre','$Domicilio','$FechaNacimiento','$Donador','$Foto','$Observacion','$TelefonoEmergencia','$Antiguedad','$Restricciones','$Firma');";
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
    $Manejador = fopen("Files/Conductores.csv","a");
    
    //Contar lineas
    $Manejador2 = fopen("Files/Conductores.csv","r");
    $Temporal = 0;
    $x = TRUE;
    while($Linea=fgets($Manejador2) and $x == TRUE){
        $Temporal = $Temporal + 1;
        if($Temporal >0){
            $x = FALSE;
        }
    }
    fclose($Manejador2);
    $IdConductor ="AI";
    //Leer o escribir
    if($Temporal == 0){
        fwrite($Manejador, "IdConductor, Nombre, TipoSangre, Domicilio, FechaNacimiento, Donador, Foto, Observacion, TelefonoEmergencia, Antiguedad, Restricciones, Firma \n");
    }
    
    $Mensaje = $IdConductor . ", " . $Nombre . ", " . $TipoSangre . ", " . $Domicilio . ", " . $FechaNacimiento . ", " . $Donador . ", " . $Foto . ", " . $Observacion . ", " . $TelefonoEmergencia . ", " . $Antiguedad . ", " . $Restricciones . ", " . $Firma. "\n";
    
    fwrite($Manejador, $Mensaje);
    //Cerrar
    fclose($Manejador);
?>

