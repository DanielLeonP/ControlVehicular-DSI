<?php
    //Recibir variables enviadas al servidor
   
    //$Folio = $_GET['Folio'];
    $FechaExp = $_GET['FechaExp'];
    $OficinaExp = $_GET['OficinaExp'];
    $Uso = $_GET['Uso'];
    $TipoServicio = $_GET['TipoServicio'];
    $Movimiento = $_GET['Movimiento'];
    $IdPropietario = $_GET['IdPropietario'];
    $IdVehiculo = $_GET['IdVehiculo'];
  
    //Imprimir datos
    /**
    print("Folio = " . $Folio);
    print("FechaExp = " . $FechaExp);
    print("OficinaExp = " . $OficinaExp);
    print("Uso = " . $Uso);
    print("TipoServicio = " . $TipoServicio);
    print("Movimiento = " . $Movimiento);
    print("IdPropietario = " . $IdPropietario);
    print("IdVehiculo = " . $IdVehiculo);*/
    //Formar SQL Explicitas
    $sql = "INSERT INTO Tarjetas (Folio, FechaExp, OficinaExp, Uso, TipoServicio, Movimiento, IdPropietario, IdVehiculo) VALUES ('', '$FechaExp', '$OficinaExp', '$Uso', '$TipoServicio', '$Movimiento', '$IdPropietario', '$IdVehiculo');";
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
    $Manejador = fopen("Files/Tarjetas.csv","a");

    //Contar lineas
    $Manejador2 = fopen("Files/Tarjetas.csv","r");
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
        fwrite($Manejador,"Folio, FechaExp, OficinaExp, Uso, TipoServicio, Movimiento, IdPropietario, IdVehiculo \n");
    }
    
    $Folio = "AI";
    $Mensaje = $Folio . ", " . $FechaExp . ", " . $OficinaExp . ", " . $Uso . ", " . $TipoServicio . ", " . $Movimiento . ", " . $IdPropietario . ", " . $IdVehiculo . "\n";
    
    fwrite($Manejador, $Mensaje);
    //Cerrar
    fclose($Manejador);
?>