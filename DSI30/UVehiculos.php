<?php
    include("BaseMenu.php");
    $IdVehiculo = $_GET['IdVehiculo'];
    $Marca = $_GET['Marca'];
    $Color = $_GET['Color'];
    $Modelo = $_GET['Modelo'];
    $Transmision = $_GET['Transmision'];
    $NumeroMotor = $_GET['NumeroMotor'];
    $Cilindro = $_GET['Cilindro'];
    $Asiento = $_GET['Asiento'];
    $Puerta = $_GET['Puerta'];
    $Capacidad = $_GET['Capacidad'];
    $Origen = $_GET['Origen'];
    $Combustible = $_GET['Combustible'];
    $Linea = $_GET['Linea'];
    $Sublinea = $_GET['Sublinea'];
    $Tipo = $_GET['Tipo'];
    $Clase = $_GET['Clase'];
    $ClaveVehicular = $_GET['ClaveVehicular'];
    $Placa = $_GET['Placa'];
    $NumeroSerie = $_GET['NumeroSerie'];
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
                                <div for="exampleInputEmail1" class="text-center" style="margin-top: 10px;"> <h4> Actualizar Vehiculo: </h4> </div>
                                    <label>Id Vehiculo:</label>
                                    <input type="number" name="IdVehiculo" id="IdVehiculo" required class="form-control" value="<?php print($IdVehiculo); ?>">                                 
                                    <label>Marca:</label>
                                    <input type="text" name="Marca" id="Marca" required class="form-control" value="<?php print($Marca); ?>">                                 
                                    <label>Color:</label>
                                    <input type="text" name="Color" id="Color" required class="form-control" value="<?php print($Color); ?>">                                 
                                    <label>Modelo:</label>
                                    <input type="text" name="Modelo" id="Modelo" required class="form-control" value="<?php print($Modelo); ?>">                                 
                                    <label>Transmisión:</label>
                                    <label>Anterior:<?php print($Transmision); ?></label>
                                    <select name="Transmision" id="Transmision" required class="form-control" >
                                        <option value="1" selected>Manual</option>
                                        <option value="2">Automático</option>
                                        <option value="3">CVT</option>
                                        <option value="4">Doble embrague</option>
                                        <option value="5">Secuencial</option>
                                        <option value="6">Semmiautomática</option>
                                    </select>                                 
                                    <label>Numero de Motor:</label>
                                    <input type="number" name="NumeroMotor" id="NumeroMotor" required class="form-control" value="<?php print($NumeroMotor); ?>">                                 
                                    <label>Cilindros:</label>
                                    <input type="number" name="Cilindro" id="Cilindro" required class="form-control" value="<?php print($Cilindro); ?>">                                 
                                    <label>Asientos:</label>
                                    <input type="number" name="Asiento" id="Asiento" required class="form-control" value="<?php print($Asiento); ?>">                                 
                                    <label>Puertas:</label>
                                    <input type="number" name="Puerta" id="Puerta" required class="form-control" value="<?php print($Puerta); ?>">                                 
                                    <label>Capacidad:</label>
                                    <input type="number" name="Capacidad" id="Capacidad" required class="form-control" value="<?php print($Capacidad); ?>">                                 
                                    <label>Origen:</label>
                                    <input type="text" name="Origen" id="Origen" required class="form-control" value="<?php print($Origen); ?>">                                 
                                    <label>Combustible:</label>
                                    <label>Anterior:<?php print($Combustible); ?></label>
                                    <select name="Combustible" id="Combustible" required class="form-control" >
                                        <option value="1" selected>Gasolina</option>
                                        <option value="2">Diesel</option>
                                        <option value="3">Híbrido</option>
                                        <option value="4">Eléctrico</option>
                                        <option value="5">Etanol</option>
                                        <option value="6">Biodisel</option>
                                        <option value="7">Gas Natural</option>
                                    </select>                                 
                                    <label>Linea:</label>
                                    <input type="text" name="Linea" id="Linea" required class="form-control" value="<?php print($Linea); ?>">                                 
                                    <label>Sublinea:</label>
                                    <input type="text" name="Sublinea" id="Sublinea" required class="form-control" value="<?php print($Sublinea); ?>">                                 
                                    <label>Tipo:</label>
                                    <input type="text" name="Tipo" id="Tipo" required class="form-control" value="<?php print($Tipo); ?>">                                 
                                    <label>Clase:</label>
                                    <input type="text" name="Clase" id="Clase" required class="form-control" value="<?php print($Clase); ?>">                                 
                                    <label>Clave Vehicular:</label>
                                    <input type="number" name="ClaveVehicular" id="ClaveVehicular" required class="form-control" value="<?php print($ClaveVehicular); ?>">                                 
                                    <label>Placa:</label>
                                    <input type="text" name="Placa" id="Placa" required class="form-control" value="<?php print($Placa); ?>">                                 
                                    <label>NumeroSerie:</label>
                                    <input type="text" name="NumeroSerie" id="NumeroSerie" required class="form-control" value="<?php print($NumeroSerie); ?>">
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
        if(isset($_POST['IdVehiculo'])){
            $NMarca = $_POST['Marca'];
            $NColor = $_POST['Color'];
            $NModelo = $_POST['Modelo'];
            $NTransmision = $_POST['Transmision'];
            $NNumeroMotor = $_POST['NumeroMotor'];
            $NCilindro = $_POST['Cilindro'];
            $NAsiento = $_POST['Asiento'];
            $NPuerta = $_POST['Puerta'];
            $NCapacidad = $_POST['Capacidad'];
            $NOrigen = $_POST['Origen'];
            $NCombustible = $_POST['Combustible'];
            $NLinea = $_POST['Linea'];
            $NSublinea = $_POST['Sublinea'];
            $NTipo = $_POST['Tipo'];
            $NClase = $_POST['Clase'];
            $NClaveVehicular = $_POST['ClaveVehicular'];
            $NPlaca = $_POST['Placa'];
            $NNumeroSerie = $_POST['NumeroSerie'];
            
            //include("FuncionesConexion.php");//Ya se encuentra en BaseMenu
            
            $Con = Conectar();
            $SQL = "UPDATE Vehiculos SET
            Marca = '$NMarca',
            Color = '$NColor',
            Modelo = '$NModelo',
            Transmision = '$NTransmision',
            NumeroMotor = '$NNumeroMotor',
            Cilindro = '$NCilindro',
            Asiento = '$NAsiento',
            Puerta = '$NPuerta',
            Capacidad = '$NCapacidad',
            Origen = '$NOrigen',
            Combustible = '$NCombustible',
            Linea = '$NLinea',
            Sublinea = '$NSublinea',
            Tipo = '$NTipo',
            Clase = '$NClase',
            ClaveVehicular = '$NClaveVehicular',
            Placa = '$NPlaca',
            NumeroSerie = '$NNumeroSerie'
            WHERE IdVehiculo = '$IdVehiculo';";
            $Result = Ejecutar($Con, $SQL);
            Cerrar($Con);
        }
    }
?>