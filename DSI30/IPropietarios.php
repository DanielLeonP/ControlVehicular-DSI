<?php
    //Recibir variables enviadas al servidor
    
    //$IdPropietario = $_REQUEST['IdPropietario'];
    $Nombre = $_REQUEST['Nombre'];
    $Localidad = $_REQUEST['Localidad'];
    $Municipio = $_REQUEST['Municipio'];
    $RFC = $_REQUEST['RFC'];
   
    //Imprimir datos
    /**
    print("IdPropietario = " . $IdPropietario);
    print("Nombre = " . $Nombre);
    print("Localidad = " . $Localidad);
    print("Municipio = " . $Municipio);
    print("RFC = " . $RFC);
    */
  
    //Formar SQL Explicitas
    $sql = "INSERT INTO Propietarios (IdPropietario, Nombre, Localidad, Municipio, RFC) VALUES('','$Nombre','$Localidad','$Municipio','$RFC');";
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
    $Manejador = fopen("Files/Propietarios.csv","a");

    //Contar lineas
    $Manejador2 = fopen("Files/Propietarios.csv","r");
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
        fwrite($Manejador, "IdPropietario, Nombre, Localidad, Municipio, RFC \n");
    }
    $IdPropietario = "AI";
    $Mensaje = $IdPropietario . ", " . $Nombre . ", " . $Localidad . ", " . $Municipio . ", " . $RFC. "\n";
    
    fwrite($Manejador, $Mensaje);
    //Cerrar
    fclose($Manejador);

?>