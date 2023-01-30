<?php
    session_start();
        if( isset($_SESSION['Usuario']) ){
            include("FuncionesConexion.php");
            $Usuario = $_SESSION['Usuario'];
            //Obtener tipo de Usuario
            $Con2 = Conectar();
            $SQL2 = "SELECT Tipo FROM Usuarios
            WHERE UserName = '$Usuario';"; 
            $TipoU = Ejecutar($Con2, $SQL2);
            $TUs = mysqli_fetch_row($TipoU);
            Cerrar($Con2); 
            $TipoUsuario = $TUs[0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link  rel="icon"   href="https://pngimg.com/uploads/letter_q/letter_q_PNG46.png"  />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-dark bg-dark">
        <a class="navbar-brand" href="<?php if($TipoUsuario == "A" ){ print("MenuAdministrador.php");}else{print("MenuUsuario.php");} ?>">Inicio </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">    
        </ul>
        <li class="nav-item navbar-nav nav-link" style="color:white; font-size:25px">
            <?php print($_SESSION['Usuario']) ?>
        </li>
        <ul class="nav-item navbar-nav ">
            <a class="nav-link" href="cierraSesion.php">Cerrar Sesión</a>
        </ul>

        </div>
    </nav>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
</body>
</html>

<?php
    }else{
        header('Location: FAcceso.html');
    }
?>