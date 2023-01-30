<?php
        include("BaseMenu.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="icon"   href="https://pngimg.com/uploads/letter_q/letter_q_PNG46.png"  />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Consultar</title>
</head>
<body>
    <div>
        <div class="row">
			<div class="col-md-5 mx-auto">
                <div id="first">
                    <div class="myform form ">
                        <form method="POST">
                            <div class="form-group mx-auto container">
                                <div for="exampleInputEmail1" class="text-center" style="margin-top: 10px;"> <h4> Consulta de Vehiculo </h4> </div>
                                <label for="exampleInputEmail1">  Criterio: </label>
                                <input type="text" id="Criterio" name="Criterio" class="form-control" placeholder="Ingresa el criterio">     
                                <input type="radio" name="Atributo" id="Atributo" Value="IdVehiculo">IdVehiculo      
                                <input type="radio" name="Atributo" id="Atributo" Value="Marca" style="margin-left:34px;">Marca     
                                <input type="radio" name="Atributo" id="Atributo" Value="Color" style="margin-left:17px;">Color      
                                <input type="radio" name="Atributo" id="Atributo" Value="Modelo" style="margin-left:42px;">Modelo      
                                <input type="radio" name="Atributo" id="Atributo" Value="Transmision" style="margin-left:26px;">Transmision
                                <br>
                                <input type="radio" name="Atributo" id="Atributo" Value="Cilindro">Cilindro     
                                <input type="radio" name="Atributo" id="Atributo" Value="Asiento" style="margin-left:53px;">Asiento     
                                <input type="radio" name="Atributo" id="Atributo" Value="Puerta" style="margin-left:7px;">Puerta
                                <input type="radio" name="Atributo" id="Atributo" Value="Capacidad" style="margin-left:34px;">Capacidad     
                                <input type="radio" name="Atributo" id="Atributo" Value="Origen" style="margin-left:7px;">Origen 
                                <br>     
                                <input type="radio" name="Atributo" id="Atributo" Value="Combustible">Combustible
                                <input type="radio" name="Atributo" id="Atributo" Value="Linea" style="margin-left:20px;">Linea
                                <input type="radio" name="Atributo" id="Atributo" Value="Sublinea" style="margin-left:22px;">Sublinea
                                <input type="radio" name="Atributo" id="Atributo" Value="Tipo" style="margin-left:20px;">Tipo   
                                <input type="radio" name="Atributo" id="Atributo" Value="Clase" style="margin-left:49px;">Clase  
                                <br>  
                                <input type="radio" name="Atributo" id="Atributo" Value="ClaveVehicular">ClaveVehicular
                                <input type="radio" name="Atributo" id="Atributo" Value="Placa" style="margin-left:7px;">Placa      
                                <input type="radio" name="Atributo" id="Atributo" Value="NumeroSerie" style="margin-left:23px;">NumeroSerie
                            </div>
                            <div class="col-md-12 text-center ">
                                <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Buscar</button>
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
    <style>
        table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }
        td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        }
        
        tr:nth-child(even) {
        background-color: #dddddd;
        }
    </style>
</html>
<?php
    if(isset($_POST['Criterio']) and isset($_POST['Atributo'])){
        $Criterio = $_POST['Criterio'];
        $Atributo = $_POST['Atributo'];

        $Con = Conectar();
        $SQL = "SELECT * FROM Vehiculos
        WHERE $Atributo LIKE '%$Criterio%';"; 

        $Result = Ejecutar($Con, $SQL);

        $n = mysqli_num_rows($Result);//numero de filas
        print("<table>");
        print("<tr>");
            print("<th class='text-center'> <H3> Id </H3> </th>");
            print("<th class='text-center'> <H3> Marca </H3> </th>");
            print("<th class='text-center'> <H3> Color </H3> </th>");
            print("<th class='text-center'> <H3> Modelo </H3> </th>");
            print("<th class='text-center'> <H3> Transmisión </H3> </th>");
            print("<th class='text-center'> <H3> Numero de Motor </H3> </th>");
            print("<th class='text-center'> <H3> No. Cilindros </H3> </th>");
            print("<th class='text-center'> <H3> No. asientos </H3> </th>");
            print("<th class='text-center'> <H3> No. Puertas </H3> </th>");
            print("<th class='text-center'> <H3> Capacidad </H3> </th>");
            print("<th class='text-center'> <H3> Origen </H3> </th>");
            print("<th class='text-center'> <H3> Combustible </H3> </th>");
            print("<th class='text-center'> <H3> Linea </H3> </th>");
            print("<th class='text-center'> <H3> Sublinea </H3> </th>");
            print("<th class='text-center'> <H3> Tipo </H3> </th>");
            print("<th class='text-center'> <H3> Clase </H3> </th>");
            print("<th class='text-center'> <H3> Clave Vehicular </H3> </th>");
            print("<th class='text-center'> <H3> Placa </H3> </th>");
            print("<th class='text-center'> <H3> Número de Serie </H3> </th>");
            if($TipoUsuario == "A" ){//Verificar si es administrador
                print("<th class='text-center'> <H3> Eliminar </H3> </th>");
                print("<th class='text-center'> <H3> Actualizar </H3> </th>");
            }
        print("</tr>");
        for($f=0; $f<$n; $f++){
            $Fila = mysqli_fetch_row($Result);
            print("<tr>");
                print("<th class='text-center'>" . $Fila[0] . "</th>");
                print("<th class='text-center'>" . $Fila[1] . "</th>");
                print("<th class='text-center'>" . $Fila[2] . "</th>");
                print("<th class='text-center'>" . $Fila[3] . "</th>");
                print("<th class='text-center'>" . $Fila[4] . "</th>");
                print("<th class='text-center'>" . $Fila[5] . "</th>");
                print("<th class='text-center'>" . $Fila[6] . "</th>");
                print("<th class='text-center'>" . $Fila[7] . "</th>");
                print("<th class='text-center'>" . $Fila[8] . "</th>");
                print("<th class='text-center'>" . $Fila[9] . "</th>");
                print("<th class='text-center'>" . $Fila[10] . "</th>");
                print("<th class='text-center'>" . $Fila[11] . "</th>");
                print("<th class='text-center'>" . $Fila[12] . "</th>");
                print("<th class='text-center'>" . $Fila[13] . "</th>");
                print("<th class='text-center'>" . $Fila[14] . "</th>");
                print("<th class='text-center'>" . $Fila[15] . "</th>");
                print("<th class='text-center'>" . $Fila[16] . "</th>");
                print("<th class='text-center'>" . $Fila[17] . "</th>");
                print("<th class='text-center'>" . $Fila[18] . "</th>");
                if($TipoUsuario == "A" ){//Verificar si es administrador
                    print("<th class='text-center'>" . '<a href="DVehiculos.php?Id=' . $Fila[0] . '" style=color:red;>Eliminar </a>' . "</th>");
                    print("<th class='text-center'>" . '<a href="UVehiculos.php?IdVehiculo=' . $Fila[0] . '&Marca=' . $Fila[1] . 
                    '&Color=' . $Fila[2] . '&Modelo=' . $Fila[3] . '&Transmision=' . $Fila[4] . 
                    '&NumeroMotor=' . $Fila[5] . '&Cilindro=' . $Fila[6] . '&Asiento=' . $Fila[7] . 
                    '&Puerta=' . $Fila[8] . '&Capacidad=' . $Fila[9] . '&Origen=' . $Fila[10] . 
                    '&Combustible=' . $Fila[11] . '&Linea=' . $Fila[12] . '&Sublinea=' . $Fila[13] . 
                    '&Tipo=' . $Fila[14] . '&Clase=' . $Fila[15] . '&ClaveVehicular=' . $Fila[16] . 
                    '&Placa=' . $Fila[17] . '&NumeroSerie=' . $Fila[18] . '">Actualizar </a>'. "</th>");
                }
            print("</tr>");
        }
        print("</table>");
        Cerrar($Con);
        print("<style>
        table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }
        td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        }
        
        tr:nth-child(even) {
        background-color: #dddddd;
        }
        </style>");  
    }
?>