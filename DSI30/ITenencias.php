<?php
    //Recibir variables enviadas al servidor
  
    //$IdTenencia = $_POST['IdTenencia'];
    $Monto = $_POST['Monto'];
    $Tipo = $_POST['Tipo'];
    $Periodo = $_POST['Periodo'];
    $Lugar = $_POST['Lugar'];
    $IdTarjeta = $_POST['IdTarjeta'];
  
    //Imprimir datos
    /**print("IdTenencia = " . $IdTenencia);
    print("Monto = " . $Monto);
    print("Tipo = " . $Tipo);
    print("Periodo = " . $Periodo);
    print("Lugar = " . $Lugar);
    print("IdTarjeta = " . $IdTarjeta);
    */
  
    //Formar SQL Implicitas
    //Dejar vacio los valores autoincrementables
    $sql = "INSERT INTO Tenencias VALUES('','$Monto','$Tipo','$Periodo','$Lugar','$IdTarjeta');";
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
    $Manejador = fopen("Files/Tenencias.csv","a");

    //Contar lineas
    $Manejador2 = fopen("Files/Tenencias.csv","r");
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
        fwrite($Manejador, "IdTenencia, Monto, Tipo, Periodo, Lugar, IdTarjeta \n");
    }
    $IdTenencia = "AI";
    $Mensaje = $IdTenencia . "," . $Monto . "," . $Tipo . "," . $Periodo. "," . $Lugar . "," . $IdTarjeta . "\n";
    
    fwrite($Manejador, $Mensaje);
    //Cerrar
    fclose($Manejador);

?>