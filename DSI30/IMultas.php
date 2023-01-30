<?php
    //Recibir variables enviadas al servidor

    //$IdMulta = $_POST['IdMulta'];
    $Motivo = $_POST['Motivo'];
    $Agente = $_POST['Agente'];
    $Fecha = $_POST['Fecha'];
    $Lugar = $_POST['Lugar'];
    $Monto = $_POST['Monto'];
    $Hora = $_POST['Hora'];   
    $FechaPago = $_POST['FechaPago'];   
    $Fundamento = $_POST['Fundamento'];
    $Garantia = $_POST['Garantia'];  
    $IdTarjeta = $_POST['IdTarjeta']; 
    $IdVerificacion = $_POST['IdVerificacion'];   
    $IdLicencia = $_POST['IdLicencia'];

    //Imprimir datos
    /**
    print("IdMulta = " . $IdMulta);
    print("Motivo = " . $Motivo);
    print("Agente = " . $Agente);
    print("Fecha = " . $Fecha);
    print("Lugar = " . $Lugar);
    print("Garantia = " . $Garantia);
    print("Monto = " . $Monto);
    print("Hora = " . $Hora);
    print("FechaPago = " . $FechaPago);
    print("Fundamento = " . $Fundamento);
    print("IdTarjeta = " . $IdTarjeta);
    print("IdVerificacion = " . $IdVerificacion);
    print("IdLicencia = " . $IdLicencia);
    */
    
    //Formar SQL Implicitas
    $sql = "INSERT INTO Multas VALUES('','$Motivo','$Agente','$Fecha','$Lugar','$Garantia','$Monto','$Hora','$FechaPago','$Fundamento','$IdTarjeta','$IdVerificacion','$IdLicencia');";
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
    $Manejador = fopen("Files/Multas.csv","a");

    //Contar lineas
    $Manejador2 = fopen("Files/Multas.csv","r");
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
        fwrite($Manejador, "IdMulta, Motivo, Agente, Fecha, Lugar, Garantia, Monto, Hora, FechaPago, Fundamento, IdTarjeta, IdVerificacion \n");
    }
    $IdMulta ="AI";
    $Mensaje = $IdMulta . ", " . $Motivo . ", " . $Agente . ", " . $Fecha . ", " . $Lugar . ", " . $Garantia . ", " . $Monto . ", " . $Hora . ", " . $FechaPago . ", " . $Fundamento . ", " . $IdTarjeta . ", " . $IdVerificacion . ", " . $IdLicencia. "\n";
    
    fwrite($Manejador, $Mensaje);
    //Cerrar
    fclose($Manejador);

?>