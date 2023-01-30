<?php
    include("FuncionesConexion.php");
    $Valor =  $_GET['Fol'];
    $Con = Conectar();
    $SQL = "DELETE FROM Verificaciones WHERE Folio = '$Valor' ";
    $Result =  Ejecutar($Con, $SQL);
    $RegistrosAfectados = mysqli_affected_rows($Con);
    if($RegistrosAfectados ==1){
        print("1 Registro Eliminado");
    }else{
        print("0 Registro Eliminado");
    }
    Cerrar($Con);
?>