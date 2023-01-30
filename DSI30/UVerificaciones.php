<?php
    include("BaseMenu.php");
    $Folio = $_GET['Folio'];
    $Tipo = $_GET['Tipo'];
    $CentroVehicular = $_GET['CentroVehicular'];
    $Dictamen = $_GET['Dictamen'];
    $Emision = $_GET['Emision'];
    $Tecnico = $_GET['Tecnico'];
    $Fecha = $_GET['Fecha'];
    $Hora = $_GET['Hora'];
    $Periodo = $_GET['Periodo'];
    $IdTarjeta = $_GET['IdTarjeta'];
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
                                <div for="exampleInputEmail1" class="text-center" style="margin-top: 10px;"> <h4> Actualizar Verificación: </h4> </div>
                                    <label>Folio:</label>
                                    <input type="number" name="Folio" id="Folio" required class="form-control" value="<?php print($Folio); ?>">                                    
                                    <label>Tipo:</label>
                                    <input type="text" name="Tipo" id="Tipo" required class="form-control" value="<?php print($Tipo); ?>">                                    
                                    <label>Centro Vehicular:</label>
                                    <input type="text" name="CentroVehicular" id="CentroVehicular" required class="form-control" value="<?php print($CentroVehicular); ?>">                                    
                                    <label>Dictamen</label>
                                    <input type="text" name="Dictamen" id="Dictamen" required class="form-control" value="<?php print($Dictamen); ?>">                                    
                                    <label>Emisión:</label>
                                    <input type="text" name="Emision" id="Emision" required class="form-control" value="<?php print($Emision); ?>">                                    
                                    <label>Técnico:</label>
                                    <input type="text" name="Tecnico" id="Tecnico" required class="form-control" value="<?php print($Tecnico); ?>">                                    
                                    <label>Fecha:</label>
                                    <input type="date" name="Fecha" id="Fecha" required class="form-control" value="<?php print($Fecha); ?>">                                    
                                    <label>Hora:</label>
                                    <input type="time" name="Hora" id="Hora" required class="form-control" value="<?php print($Hora); ?>">                                    
                                    <label>Periodo:</label>
                                    <input type="number" name="Periodo" id="Periodo" required class="form-control" value="<?php print($Periodo); ?>">                                    
                                    <label>IdTarjeta:</label>
                                    <input type="text" name="IdTarjeta" id="IdTarjeta" required class="form-control" value="<?php print($IdTarjeta); ?>">
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
            $NTipo = $_POST['Tipo'];
            $NCentroVehicular = $_POST['CentroVehicular'];
            $NDictamen = $_POST['Dictamen'];
            $NEmision = $_POST['Emision'];
            $NTecnico = $_POST['Tecnico'];
            $NFecha = $_POST['Fecha'];
            $NHora = $_POST['Hora'];
            $NPeriodo = $_POST['Periodo'];
            $NIdTarjeta = $_POST['IdTarjeta'];
            
            //include("FuncionesConexion.php");//Ya se encuentra en BaseMenu
            
            $Con = Conectar();
            $SQL = "UPDATE Verificaciones SET
            Tipo = '$NTipo',
            CentroVehicular = '$NCentroVehicular',
            Dictamen = '$NDictamen',
            Emision = '$NEmision',
            Tecnico = '$NTecnico',
            Fecha = '$NFecha',
            Hora = '$NHora',
            Periodo = '$NPeriodo',
            IdTarjeta = '$NIdTarjeta'
            WHERE Folio = '$Folio';";
            $Result = Ejecutar($Con, $SQL);
            Cerrar($Con);
        }
    }
?>