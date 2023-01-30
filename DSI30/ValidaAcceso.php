<?php
    //Recibir las variables del formulario
    $FUsuario = $_POST['Usuario'];
    $FPassword = $_POST['Password'];
    session_start();

    //Verificar los datos en la tabla en el SMDB
    include("FuncionesConexion.php");
    
    $Con = Conectar();
    
    $SQL = "SELECT * 
        FROM Usuarios
        WHERE Username = '$FUsuario';";
    
    $Result = Ejecutar($Con, $SQL);
    $Existe = mysqli_num_rows($Result);
    
    if($Existe==1){
        $Fila = mysqli_fetch_row($Result);
        if($FPassword == $Fila[1]){//conraseña
            if($Fila[5]==1){//inactividad (status)
                if($Fila[3] == 0){//bloqueado
                    print("Acceso Correcto");
                    //Actualizar intentos a 0
                    $SQL2 = "UPDATE Usuarios
                        SET Intentos = 0
                        WHERE Username = '$FUsuario';";
                    Ejecutar($Con, $SQL2);

                    $_SESSION["Usuario"]=$FUsuario;//sesion

                    if($Fila[2]=="A"){
                        //maneras de redireccionar
                        //print('<a href="MenuAdministrador.php">Administrador</a>');
                        header('Location: MenuAdministrador.php');
                    }else{
                        //maneras de redireccionar
                        //print('<a href="MenuUsuario.php">Usuario</a>');
                        header('Location: MenuUsuario.php');
                    }

                }else{
                    print("Usuario Bloqueado");
                }            
            }else{
                print("Usuario Inactivo");
            }
        }else{
            print("Contraseña Incorrecta");
            if($Fila[4]<3 and $Fila[3]==0){//verificar que los intentos sean menor a 3
                $SQL2 = "UPDATE Usuarios 
                    SET Intentos = Intentos + 1
                    WHERE Username = '$FUsuario';";
                Ejecutar($Con, $SQL2);
                if($Fila[4]==2){//cambiar a bloqueado e intentos a 0
                    $SQL2 = "UPDATE Usuarios 
                        SET bloqueado = 1,
                        Intentos = 0
                    WHERE Username = '$FUsuario';";
                    Ejecutar($Con, $SQL2);
                }
            }
        }
    }else{
        print("Usuario no existe");
    }
    Cerrar($Con);

?>