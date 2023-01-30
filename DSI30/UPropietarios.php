<?php
    include("BaseMenu.php");
    $IdPropietario =$_GET['IdPropietario'];
    $Nombre =$_GET['Nombre'];
    $Localidad =$_GET['Localidad'];
    $Municipio =$_GET['Municipio'];
    $RFC =$_GET['RFC'];
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
                                <div for="exampleInputEmail1" class="text-center" style="margin-top: 10px;"> <h4> Actualizar Propietario: </h4> </div>
                                <label>Id Propietario:</label>
                                <input type="number" name="IdPropietario" id="IdPropietario" required class="form-control" value="<?php print($IdPropietario); ?>" >
                                <label>Nombre:</label>
                                <input type="text" name="Nombre" id="Nombre" required class="form-control" value="<?php print($Nombre); ?>">                                
                                <label>Localidad:</label>
                                <input type="text" name="Localidad" id="Localidad" required class="form-control" value="<?php print($Localidad); ?>">                                
                                <label>Municipio:</label>
                                <input type="text" name="Municipio" id="Municipio" required class="form-control" value="<?php print($Municipio); ?>">                                
                                <label>RFC:</label>
                                <input type="text" name="RFC" id="RFC" required class="form-control" value="<?php print($RFC); ?>">
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
        if(isset($_POST['IdPropietario'])){
            $NNombre = $_POST['Nombre'];
            $NLocalidad = $_POST['Localidad'];
            $NMunicipio = $_POST['Municipio'];
            $NRFC = $_POST['RFC'];
            
            //include("FuncionesConexion.php");//Ya se encuentra en BaseMenu
            
            $Con = Conectar();
            $SQL = "UPDATE Propietarios SET
            Nombre = '$NNombre', 
            Localidad = '$NLocalidad', 
            Municipio = '$NMunicipio', 
            RFC = '$NRFC'
            WHERE idPropietario = '$IdPropietario'";
            $Result = Ejecutar($Con, $SQL);
            Cerrar($Con);
        }
    }
?>