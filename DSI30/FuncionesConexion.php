<?php
    function Conectar(){
        $Servidor= "127.0.0.1";
        $Usuario="root";
        $Password="";
        $BD="ControlVehicular30";
        $Con = mysqli_connect($Servidor, $Usuario, $Password, $BD);
        return $Con;
    }
    function Ejecutar($Con, $SQL){
        $Query = mysqli_query($Con, $SQL) or die(mysqli_error($Con));//die nos muestra el error en caso de no funcionar
        return $Query;
    }
    function Cerrar($Con){
        mysqli_close($Con);
    }

?>