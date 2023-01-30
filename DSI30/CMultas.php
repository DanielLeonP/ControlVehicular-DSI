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
                                <div for="exampleInputEmail1" class="text-center" style="margin-top: 10px;"> <h4> Consulta de Multa </h4> </div>
                                <label for="exampleInputEmail1">  Criterio: </label>
                                <input type="text" id="Criterio" name="Criterio" class="form-control" placeholder="Ingresa el criterio">
                                <input type="radio" name="Atributo" id="Atributo" Value="IdMulta">IdMulta
                                <input type="radio" name="Atributo" id="Atributo" Value="Motivo" style="margin-left:22px;">Motivo
                                <input type="radio" name="Atributo" id="Atributo" Value="Agente" style="margin-left:50px;">Agente
                                <input type="radio" name="Atributo" id="Atributo" Value="Fecha" style="margin-left:17px;">Fecha
                                <br>
                                <input type="radio" name="Atributo" id="Atributo" Value="Lugar">Lugar
                                <input type="radio" name="Atributo" id="Atributo" Value="Garantia" style="margin-left:36px;">Garantia
                                <input type="radio" name="Atributo" id="Atributo" Value="Monto" style="margin-left:40px;">Monto
                                <input type="radio" name="Atributo" id="Atributo" Value="Hora" style="margin-left:21px;">Hora
                                <br>
                                <input type="radio" name="Atributo" id="Atributo" Value="FechaPago">FechaPago  
                                <input type="radio" name="Atributo" id="Atributo" Value="Fundamento" style="margin-left:10px;">Fundamento  
                                <input type="radio" name="Atributo" id="Atributo" Value="IdTarjeta" style="margin-left:10px;">IdTarjeta
                                <input type="radio" name="Atributo" id="Atributo" Value="IdVerificacion" style="margin-left:10px;">IdVerificacion
                                <input type="radio" name="Atributo" id="Atributo" Value="IdLicencia" style="margin-left:10px;">IdLicencia
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
        $SQL = "SELECT * FROM Multas
        WHERE $Atributo LIKE '%$Criterio%';"; 

        $Result = Ejecutar($Con, $SQL);

        $n = mysqli_num_rows($Result);//numero de filas
        print("<table>");
        print("<tr>");
            print("<th class='text-center'> <H3> Id </H3> </th>");
            print("<th class='text-center'> <H3> Motivo </H3> </th>");
            print("<th class='text-center'> <H3> Agente </H3> </th>");
            print("<th class='text-center'> <H3> Fecha </H3> </th>");
            print("<th class='text-center'> <H3> Lugar </H3> </th>");
            print("<th class='text-center'> <H3> Garantía </H3> </th>");
            print("<th class='text-center'> <H3> Monto </H3> </th>");
            print("<th class='text-center'> <H3> Hora </H3> </th>");
            print("<th class='text-center'> <H3> Fecha de Pago </H3> </th>");
            print("<th class='text-center'> <H3> Fundamento </H3> </th>");
            print("<th class='text-center'> <H3> Id Tarjeta </H3> </th>");
            print("<th class='text-center'> <H3> Id Verificación </H3> </th>");
            print("<th class='text-center'> <H3> Id Licencia </H3> </th>");
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
                if($TipoUsuario == "A" ){//Verificar si es administrador
                    print("<th class='text-center'>" . '<a href="DMultas.php?Id=' . $Fila[0] . '" style=color:red;>Eliminar </a>'. "</th>");
                    print("<th class='text-center'>" . '<a href="UMultas.php?IdMulta=' . $Fila[0] . '&Motivo=' . $Fila[1] . 
                    '&Agente=' . $Fila[2] . '&Fecha=' . $Fila[3] . '&Lugar=' . $Fila[4] . 
                    '&Garantia=' . $Fila[5] . '&Monto=' . $Fila[6] . '&Hora=' . $Fila[7] . 
                    '&FechaPago=' . $Fila[8] . '&Fundamento=' . $Fila[9] . '&IdTarjeta=' . $Fila[10] . 
                    '&IdVerificacion=' . $Fila[11] . '&IdLicencia=' . $Fila[12] . '">Actualizar </a>'. "</th>");
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