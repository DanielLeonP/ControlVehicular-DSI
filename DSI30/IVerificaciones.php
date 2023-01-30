<?php
    //Recibir variables enviadas al servidor
   
    //$Folio = $_REQUEST['Folio'];
    $Tipo = $_REQUEST['Tipo'];
    $CentroVehicular = $_REQUEST['CentroVehicular'];
    $Dictamen = $_REQUEST['Dictamen'];
    $Emision = $_REQUEST['Emision'];
    $Tecnico = $_REQUEST['Tecnico'];
    $Fecha = $_REQUEST['Fecha'];
    $Hora = $_REQUEST['Hora'];
    $Periodo = $_REQUEST['Periodo'];
    $IdTarjeta = $_REQUEST['IdTarjeta'];
  
    //Imprimir datos
    /**
    print("Folio = " . $Folio);
    print("Tipo = " . $Tipo);
    print("CentroVehicular = " . $CentroVehicular);
    print("Dictamen = " . $Dictamen);
    print("Emision = " . $Emision);
    print("Tecnico = " . $Tecnico);
    print("Fecha = " . $Fecha);
    print("Hora = " . $Hora);
    print("Periodo = " . $Periodo);
    print("IdTarjeta = " . $IdTarjeta);*/
    //Formar SQL Explicitas
    $sql = "INSERT INTO Verificaciones (Folio, Tipo, CentroVehicular, Dictamen, Emision, Tecnico, Fecha, Hora, Periodo, IdTarjeta) VALUES ('', '$Tipo', '$CentroVehicular', '$Dictamen', '$Emision', '$Tecnico', '$Fecha', '$Hora', '$Periodo', '$IdTarjeta');";
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
    $Manejador = fopen("Files/Verificaciones.csv","a");
    
    //Contar lineas
    $Manejador2 = fopen("Files/Verificaciones.csv","r");
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
        fwrite($Manejador, "Folio, Tipo, CentroVehicular, Dictamen, Emision, Tecnico, Fecha, Hora, Periodo, IdTarjeta \n");
    }
    $Folio = "AI";
    $Mensaje = $Folio . ", " . $Tipo . ", " . $CentroVehicular . ", " . $Dictamen . ", " . $Emision . ", " . $Tecnico . ", " . $Fecha . ", " . $Hora . ", " . $Periodo . ", " . $IdTarjeta . "\n";
    
    fwrite($Manejador, $Mensaje);
    //Cerrar
    fclose($Manejador);
?>