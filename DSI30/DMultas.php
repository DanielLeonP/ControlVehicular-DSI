<?php
    include("FuncionesConexion.php");
    $Valor =  $_GET['Id'];
    $Con = Conectar();
    $SQL = "DELETE FROM Multas WHERE idMulta = '$Valor' ";
    $Result =  Ejecutar($Con, $SQL);
    $RegistrosAfectados = mysqli_affected_rows($Con);
    if($RegistrosAfectados ==1){
        print("1 Registro Eliminado");
    }else{
        print("0 Registro Eliminado");
    }
    Cerrar($Con);
?>