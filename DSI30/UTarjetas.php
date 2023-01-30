<?php
    include("BaseMenu.php");
    $Folio = $_GET['Folio'];
    $FechaExp = $_GET['FechaExp'];
    $OficinaExp = $_GET['OficinaExp'];
    $Uso = $_GET['Uso'];
    $TipoServicio = $_GET['TipoServicio'];
    $Movimiento = $_GET['Movimiento'];
    $IdPropietario = $_GET['IdPropietario'];
    $IdVehiculo = $_GET['IdVehiculo'];
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
                                <div for="exampleInputEmail1" class="text-center" style="margin-top: 10px;"> <h4> Actualizar Tarjeta: </h4> </div>
                                    <label >Folio:</label>
                                    <input type="number" name="Folio" id="Folio"  required class="form-control" value="<?php print($Folio); ?>">                                   
                                    <label >Fecha de Expedición:</label>
                                    <input type="date" name="FechaExp" id="FechaExp" required class="form-control" value="<?php print($FechaExp); ?>">                                   
                                    <label >Oficina que Expede:</label>
                                    <input type="text" name="OficinaExp" id="OficinaExp" required class="form-control" value="<?php print($OficinaExp); ?>">                                   
                                    <label >Uso:</label>
                                    <input type="text" name="Uso" id="Uso" required class="form-control" value="<?php print($Uso); ?>">                                   
                                    <label >Tipo de Servicio:</label>
                                    <label >Anterior: <?php print($TipoServicio); ?></label>
                                    <select id="TipoServicio" name="TipoServicio" class="form-control">
                                        <option value="Publico" selected>Público</option>
                                        <option value="Privado" >Privado</option>
                                    </select>                                   
                                    <label >Movimiento:</label>
                                    <input type="text" name="Movimiento" id="Movimiento" required class="form-control" value="<?php print($Movimiento); ?>">                                   
                                    <label >Id Propietario:</label>
                                    <input type="number" name="IdPropietario" id="IdPropietario" required class="form-control" value="<?php print($IdPropietario); ?>">                                   
                                    <label >Id Vehiculo:</label>
                                    <input type="number" name="IdVehiculo" id="IdVehiculo" required class="form-control" value="<?php print($IdVehiculo); ?>">
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
        if(isset($_POST['Folio'])){
            $NFechaExp = $_POST['FechaExp'];
            $NOficinaExp = $_POST['OficinaExp'];
            $NUso = $_POST['Uso'];
            $NTipoServicio = $_POST['TipoServicio'];
            $NMovimiento = $_POST['Movimiento'];
            $NIdPropietario = $_POST['IdPropietario'];
            $NIdVehiculo = $_POST['IdVehiculo'];
            
            //include("FuncionesConexion.php");//Ya se encuentra en BaseMenu
            
            $Con = Conectar();
            $SQL = "UPDATE Tarjetas SET
            FechaExp = '$NFechaExp',
            OficinaExp = '$NOficinaExp',
            Uso = '$NUso',
            TipoServicio = '$NTipoServicio',
            Movimiento = '$NMovimiento',
            IdPropietario = '$NIdPropietario',
            IdVehiculo = '$NIdVehiculo'
            WHERE Folio = '$Folio';";
            $Result = Ejecutar($Con, $SQL);
            Cerrar($Con);
        }
    }
?>