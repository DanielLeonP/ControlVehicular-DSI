<?php
    include("BaseMenu.php");
    $IdConductor = $_GET['IdConductor'];
    $Nombre = $_GET['Nombre'];
    $TipoSangre = $_GET['TipoSangre'];
    $Domicilio = $_GET['Domicilio'];
    $FechaNacimiento = $_GET['FechaNacimiento'];
    $Donador = $_GET['Donador'];
    $Foto = $_GET['Foto'];
    $Observacion = $_GET['Observacion'];
    $TelefonoEmergencia = $_GET['TelefonoEmergencia'];
    $Antiguedad = $_GET['Antiguedad'];
    $Restricciones = $_GET['Restricciones'];
    $Firma = $_GET['Firma'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="icon"   href="https://pngimg.com/uploads/letter_q/letter_q_PNG46.png"  />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Actualizar</title>
</head>
<body>
    <div>
        <div class="row">
			<div class="col-md-5 mx-auto">
                <div id="first">
                    <div class="myform form ">
                        <form method="POST">
                            <div class="form-group mx-auto container">
                                <div for="exampleInputEmail1" class="text-center" style="margin-top: 10px;"> <h4> Actualizar Conductor: </h4> </div>
                                <label>Id del Conductor:</label>
                                <input type="number" name="IdConductor" id="IdConductor" required class="form-control" value="<?php print($IdConductor); ?>" >
                                <label>Nombre:</label>
                                <input type="text" name="Nombre" id="Nombre" required class="form-control" value="<?php print($Nombre); ?>">
                                <label>Tipo de Sangre:</label>
                                <label>Anterior:<?php print($TipoSangre); ?></label>
                                <select name="TipoSangre" id="TipoSangre" class="form-control">
                                    <option value="1" selected>O negativo</option>
                                    <option value="2">O positivo</option>
                                    <option value="3">A negativo</option>
                                    <option value="4">A positivo</option>
                                    <option value="5">B negativo</option>
                                    <option value="6">B positivo</option>
                                    <option value="7">AB negativo</option>
                                    <option value="8">AB positivo</option>
                                </select>
                                <label>Domicilio:</label>
                                <input type="text" name="Domicilio" id="Domicilio" required class="form-control" value="<?php print($Domicilio); ?>">                                
                                <label>Fecha de Nacimiento</label>
                                <input type="date" name="FechaNacimiento" id="FechaNacimiento" required class="form-control" value="<?php print($FechaNacimiento); ?>">                                
                                <label>Donador:</label>
                                <label>Anterior:<?php print($Donador); ?></label>
                                <br>
                                <label for=""><input type="radio" name="Donador" id="Donador" value="Si" required> Sí</label>
                                <label for=""> <input type="radio" name="Donador" id="Donador" value="No" required> No</label>   
                                <br>                             
                                <label>Foto:</label>
                                <input type="file" name="Foto" id="Foto" required class="form-control" value="<?php print($Foto); ?>">                                
                                <label>Observación:</label>
                                <input type="text" name="Observacion" id="Observacion" required class="form-control" value="<?php print($Observacion); ?>">                                
                                <label>Telefono de Emergencia:</label>
                                <input type="number" name="TelefonoEmergencia" id="TelefonoEmergencia" required class="form-control" value="<?php print($TelefonoEmergencia); ?>">                                
                                <label>Antigüedad:</label>
                                <input type="date" name="Antiguedad" id="Antiguedad" required class="form-control" value="<?php print($Antiguedad); ?>">                                
                                <label>Restricciones:</label>
                                <input type="text" name="Restricciones" id="Restricciones" required class="form-control" value="<?php print($Restricciones); ?>">                                
                                <label>Firma:</label>
                                <input type="file" name="Firma" id="Firma" required class="form-control" value="<?php print($Firma); ?>">
                            </div>
                            <div class="col-md-12 text-center ">
                                <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Actualizar</button>
                                <hr class="hr-or">
                                
                            </div>                          
                        </form>                 
                    </div>
			</div>			
		</div>
    </div>      
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
</html>
<?php
    if($TipoUsuario = "A"){
        if(isset($_POST['IdConductor'])){
            $NNombre = $_POST['Nombre'];
            $NTipoSangre = $_POST['TipoSangre'];
            $NDomicilio = $_POST['Domicilio'];
            $NFechaNacimiento = $_POST['FechaNacimiento'];
            $NDonador = $_POST['Donador'];
            $NFoto = $_POST['Foto'];
            $NObservacion = $_POST['Observacion'];
            $NTelefonoEmergencia = $_POST['TelefonoEmergencia'];
            $NAntiguedad = $_POST['Antiguedad'];
            $NRestricciones = $_POST['Restricciones'];
            $NFirma = $_POST['Firma'];
            
            //include("FuncionesConexion.php");//Ya se encuentra en BaseMenu
            
            $Con = Conectar();
            $SQL = "UPDATE Conductores SET
            Nombre = '$NNombre',
            TipoSangre = '$NTipoSangre',
            Domicilio = '$NDomicilio',
            FechaNacimiento = '$NFechaNacimiento',
            Donador = '$NDonador',
            Foto = '$NFoto',
            Observacion = '$NObservacion',
            TelefonoEmergencia = '$NTelefonoEmergencia',
            Antiguedad = '$NAntiguedad',
            Restricciones = '$NRestricciones',
            Firma = '$NFirma'
            WHERE IdConductor = '$IdConductor';";
            $Result = Ejecutar($Con, $SQL);
            Cerrar($Con);
        }
    }
?>