<?php
    //Recibir variables enviadas al servidor
 
    //$IdVehiculo = $_REQUEST['IdVehiculo'];
    $Marca = $_REQUEST['Marca'];
    $Color = $_REQUEST['Color'];
    $Modelo = $_REQUEST['Modelo'];
    $Transmision = $_REQUEST['Transmision'];
    $NumeroMotor = $_REQUEST['NumeroMotor'];
    $Cilindro = $_REQUEST['Cilindro'];
    $Asiento = $_REQUEST['Asiento'];
    $Puerta = $_REQUEST['Puerta'];
    $Capacidad = $_REQUEST['Capacidad'];
    $Origen = $_REQUEST['Origen'];
    $Combustible = $_REQUEST['Combustible'];
    $Linea = $_REQUEST['Linea'];
    $Sublinea = $_REQUEST['Sublinea'];
    $Tipo = $_REQUEST['Tipo'];
    $Clase = $_REQUEST['Clase'];
    $ClaveVehicular = $_REQUEST['ClaveVehicular'];
    $Placa = $_REQUEST['Placa'];
    $NumeroSerie = $_REQUEST['NumeroSerie'];
 
    //Imprimir datos
    /**
    print("IdVehiculo = " . $IdVehiculo);
    print("Marca = " . $Marca);
    print("Color = " . $Color);
    print("Modelo = " . $Modelo);
    print("Transmision = " . $Transmision);
    print("NumeroMotor = " . $NumeroMotor);
    print("Cilindro = " . $Cilindro);
    print("Asiento = " . $Asiento);
    print("Puerta = " . $Puerta);
    print("Capacidad = " . $Capacidad);
    print("Origen = " . $Origen);
    print("Combustible = " . $Combustible);
    print("Linea = " . $Linea);
    print("Sublinea = " . $Sublinea);
    print("Tipo = " . $Tipo);
    print("Clase = " . $Clase);
    print("ClaveVehicular = " . $ClaveVehicular);
    print("Placa = " . $Placa);
    print("NumeroSerie = " . $NumeroSerie);
    */
  
    //Formar SQL Explicitas
    $sql = "INSERT INTO Vehiculos (IdVehiculo, Marca, Color, Modelo, Transmision, NumeroMotor, Cilindro, Asiento, Puerta, Capacidad, Origen, Combustible, Linea, Sublinea, Tipo, Clase, ClaveVehicular, Placa, NumeroSerie) VALUES ('', '$Marca', '$Color', '$Modelo', '$Transmision', '$NumeroMotor', '$Cilindro', '$Asiento', '$Puerta', '$Capacidad', '$Origen', '$Combustible', '$Linea', '$Sublinea', '$Tipo', '$Clase', '$ClaveVehicular','$Placa', '$NumeroSerie');";
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
    $Manejador = fopen("Files/Vehiculos.csv","a");
    
    //Contar lineas
    $Manejador2 = fopen("Files/Vehiculos.csv","r");
    $Temporal = 0;
    $x = TRUE;
    while($Lineaa=fgets($Manejador2) and $x == TRUE){
        $Temporal = $Temporal + 1;
        if($Temporal >0){
            $x = FALSE;
        }
    }
    fclose($Manejador2);

    //Leer o escribir
    if($Temporal == 0){
        fwrite($Manejador, "IdVehiculo, Marca, Color, Modelo, Transmision, NumeroMotor, Cilindro, Asiento, Puerta, Capacidad, Origen, Combustible, Linea, Sublinea, Tipo, Clase, ClaveVehicular, Placa, NumeroSerie \n");
    }
    $IdVehiculo = "AI";
    $Mensaje = $IdVehiculo .", ". $Marca .", ". $Color .", ". $Modelo .", ". $Transmision .", ". $NumeroMotor .", ". $Cilindro .", ". $Asiento .", ". $Puerta .", ". $Capacidad .", ". $Origen .", ". $Combustible .", ". $Linea .", ". $Sublinea .", ". $Tipo .", ". $Clase .", ". $ClaveVehicular .", ". $Placa .", ". $NumeroSerie . "\n";
    
    fwrite($Manejador, $Mensaje);
    //Cerrar
    fclose($Manejador);
?>