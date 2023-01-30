<html>
    <form method = "POST" action = "">
        <label>Archivo:</label>
        <input type="text" name="Archivo" id="Archivo" required>
        <br>
        <label>Destino:</label>
        <input type="text" name="Destino" id="Destino" required>
        <br>
        <input type="submit">
        </form>
</html>

<?php
    if(isset($_POST['Archivo']) and isset($_POST['Destino'])){
        $Archivo = $_POST['Archivo'];
        $Destino = $_POST['Destino'];

        include("CopiarArchivo.php");

        //Validar path de Archivo
        $Archivo = realpath($Archivo);
        $Destino = realpath($Destino);
        if($Archivo !=NULL){
            //Validar path de Destino
            if($Destino!=NULL){
                //Abrir
                $Manejador1 = abrirArchivo($Archivo);
                $Manejador2 = abrirDestino($Destino);
                //Copiar
                copiar($Manejador1, $Manejador2);
                //Cerrar
                cerrar($Manejador1, $Manejador2);
            }else{
                print("Direccion de Destino incorrecto.");
            }
        }else{
            print("Direccion de Archivo incorrecto.");
        }
    }       

?>