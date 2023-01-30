<?php
    include("BaseMenu.php");
    $IdMulta = $_GET['IdMulta'];
    $Motivo = $_GET['Motivo'];
    $Agente = $_GET['Agente'];
    $Fecha = $_GET['Fecha'];
    $Lugar = $_GET['Lugar'];
    $Monto = $_GET['Monto'];
    $Hora = $_GET['Hora'];   
    $FechaPago = $_GET['FechaPago'];   
    $Fundamento = $_GET['Fundamento'];
    $Garantia = $_GET['Garantia'];  
    $IdTarjeta = $_GET['IdTarjeta']; 
    $IdVerificacion = $_GET['IdVerificacion'];   
    $IdLicencia = $_GET['IdLicencia'];
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
                                <div for="exampleInputEmail1" class="text-center" style="margin-top: 10px;"> <h4> Actualizar Multa: </h4> </div>
                                <label>Id Multa:</label>
                                <input type="number" name="IdMulta" id="IdMulta" required class="form-control" value="<?php print($IdMulta); ?>">                                
                                <label>Motivo:</label>
                                <input type="text" name="Motivo" id="Motivo" required class="form-control" value="<?php print($Motivo); ?>">                                
                                <label>Agente:</label>
                                <input type="text" name="Agente" id="Agente" required class="form-control" value="<?php print($Agente); ?>">                                
                                <label>Fecha</label>
                                <input type="date" name="Fecha" id="Fecha" required class="form-control" value="<?php print($Fecha); ?>">                                
                                <label>Lugar:</label>
                                <input type="text" name="Lugar" id="Lugar" required class="form-control" value="<?php print($Lugar); ?>">                                
                                <label>Monto:</label>
                                <input type="number" name="Monto" id="Monto" required class="form-control" value="<?php print($Monto); ?>">                                
                                <label>Hora:</label>
                                <input type="time" name="Hora" id="Hora" required class="form-control" value="<?php print($Hora); ?>">                                
                                <label>Fecha de Pago:</label>
                                <input type="date" name="FechaPago" id="FechaPago" required class="form-control" value="<?php print($FechaPago); ?>">                                
                                <label>Fundamento:</label>
                                <input type="text" name="Fundamento" id="Fundamento" required class="form-control" value="<?php print($Fundamento); ?>">                                
                                <label>Garantía:</label>
                                <label>Anterior: value="<?php print($Garantia); ?>"</label>
                                <select name="Garantia" id="Garantia" class="form-control">
                                    <option value="1">Tarjeta</option>
                                    <option value="2">Verificación</option>
                                    <option value="3">Licencia</option>
                                </select>                                
                                <label>Id Tarjeta:</label>
                                <input type="number" name="IdTarjeta" class="form-control" id="IdTarjeta"value="<?php print($IdTarjeta); ?>">                                
                                <label>Id Verificación:</label>
                                <input type="number" name="IdVerificacion" class="form-control" id="IdVerificacion" value="<?php print($IdVerificacion); ?>">                                
                                <label>Id Licencia:</label>
                                <input type="number" name="IdLicencia" class="form-control" id="IdLicencia" value="<?php print($IdLicencia); ?>">
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
        if(isset($_POST['IdMulta'])){
            $NMotivo = $_POST['Motivo'];
            $NAgente = $_POST['Agente'];
            $NFecha = $_POST['Fecha'];
            $NLugar = $_POST['Lugar'];
            $NMonto = $_POST['Monto'];
            $NHora = $_POST['Hora'];   
            $NFechaPago = $_POST['FechaPago'];   
            $NFundamento = $_POST['Fundamento'];
            $NGarantia = $_POST['Garantia'];  
            $NIdTarjeta = $_POST['IdTarjeta']; 
            $NIdVerificacion = $_POST['IdVerificacion'];   
            $NIdLicencia = $_POST['IdLicencia'];
            
            //include("FuncionesConexion.php");//Ya se encuentra en BaseMenu
            
            $Con = Conectar();
            $SQL = "UPDATE Multas SET
            Motivo = '$NMotivo',
            Agente = '$NAgente',
            Fecha = '$NFecha',
            Lugar = '$NLugar',
            Monto = '$NMonto',
            Hora = '$NHora',   
            FechaPago = '$NFechaPago',   
            Fundamento = '$NFundamento',
            Garantia = '$NGarantia',  
            IdTarjeta = '$NIdTarjeta', 
            IdVerificacion = '$NIdVerificacion',   
            IdLicencia = '$NIdLicencia'
            WHERE IdMulta = '$IdMulta';";
            $Result = Ejecutar($Con, $SQL);
            Cerrar($Con);
        }
    }
?>