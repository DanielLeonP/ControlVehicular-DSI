<?php
/**
    //conectar y seleccionar BD
    $Con = mysqli_connect("127.0.0.1", "root", "","ControlVehicular30");
    //print_r($Con);

    // Consultar
    $SQL="INSERT INTO Conductores VALUES('1','1','4','12','2021-02-10','Si','debug.log','123','123','21','213','ProyectoEstructura de Datos.fsthumb');";
    $query = mysqli_query($Con,$SQL);
    //print($query);
    
    //Cerrar
    $Cerrar = mysqli_close($Con);
    print($Cerrar);*/
?>